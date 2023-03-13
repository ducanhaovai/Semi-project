<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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

class HomeController extends Controller
{
    public function login()
    {
        
        return view('login');
    }
    public function logout(Request $request) {
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
        
        
        
        return view('index');
    }

    public function detail_room()
    {
        
        return view('detail-room');
    }

    public function hotel()
    {
        $users = User::all();
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

    public function detialRoom($id){
        $hotels = hotel::find($id);
        return view('detail-room',compact('hotels'));

    }
}
