<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

use \Illuminate\Support\Facades\DB;
use Illuminate\Http\isMethod;
use \Illuminate\Support\Facades\Validator;
use App\Models\Video;
use App\Models\Hotel;
use App\Models\User;
use App\Models\Room;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function login()
    {
        $user = Auth::user();

        return view('login', compact('user'));
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }



    public function postLogin(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user(); // Get the authenticated user

            if ($user->type == 'admin') {
                return view('admin.index');
            } else {
                return view('index', ['user' => $user]); // Pass the user to the view
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function store(Request $request)
    {
        if ($request->isMethod('POST')) {
            $user = DB::table('users')->where('email', $request->email)->first();
            if (!$user) {
                $newUser = new User();
                $newUser->name = $request->name;
                $newUser->email = $request->email;

                $newUser->password = Hash::make($request->password);


                $newUser->save();
                return redirect()->route('login')->with('message', 'create account success!');
            } else {
                return redirect()->route('login')->with('message', 'Account exist!');
            }
        }
    }

    public function index()
    {
        $user = Auth::user();



        return view('index', compact('user'));
    }

    public function detail_room($id)
    {
        

        $room = Room::findOrFail($id);
        $booking=Booking::where('checkout_date','>=',Carbon::now()->format('Y-m-d 12:00:00'))->get();
        $room_id=[];
        foreach ($booking as $book) {
            array_push($room_id,$book->room_id);
        }
        $isBooked=false;
        if (in_array($room->id,$room_id)) {
            $isBooked=true;
        }
        $room['isBooked']=$isBooked;
        // dd($hotel_id);
        return view('detail-room',  ['room' => $room]);
    }


    public function booking(Request $request)
    {
        // dd($request->all());
        $id=$request->room;
        $room = Room::findOrFail($id);
        // dd($hotel_id);
        return view('booking',compact('room'));
    }
    public function hotel()
    {
        $hotels = Hotel::all();
        return view('hotel',  ['hotels' => $hotels]);
    }

    public function contact()
    {
        $users = User::all();
        return view('contact');
    }

    public function about()
    {
        $users = User::all();
        return view('about');
    }

    public function user()
    {
        return view('user-management');
    }

    public function detialRoom($id)
    {
        $hotels = hotel::find($id);
        $rooms=Room::where('hotel_id',$id)->get();
        $booking=Booking::where('checkout_date','>=',Carbon::now()->format('Y-m-d 12:00:00'))->get();
        $room_id=[];
        foreach ($booking as $book) {
            array_push($room_id,$book->room_id);
        }
        foreach ($rooms as $room) {
            $isBooked=false;
            if (in_array($room->id,$room_id)) {
                $isBooked=true;
            }
            $room['isBooked']=$isBooked;
        }
        return view('detail-hotel', compact('hotels','rooms'));
    }

    public function detialUser($id)
    {
        $users = user::find($id);
        $bookings=Booking::where('user_id',$id)->get();
        return view('user-detail', compact('users','bookings'));
    }

    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password'        => 'required',
            'new_password'         => 'required|min:8|max:30',
            'password' => 'required|same:new_password'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => 'validations fails',
                'errors' => $validator->errors()
            ], 422);
        }
        $user = $request->user();

        if (Hash::check($request->old_password, $user->password)) {
            $user->update([
                'password' => Hash::make($request->password)
            ]);


            return response()->json([
                'message' => ' password successfully updated',
                'errors' => $validator->errors()
            ], 200);
        } else {
            return response()->json([
                'message' => 'old password does not match',
                'errors' => $validator->errors()
            ], 422);
        }
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');

        if ($request->input('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();

        return redirect()->back()->with('success', 'Account details updated successfully!');

    }
    public function search (Request $request){
        $search = $request-> keyWords;

        $hotels = Hotel::query()
        ->where('name','LIKE', "%{$search}%")->get();

        return view ('hotel', compact('hotels'));

    }
}
