<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use PHPUnit\Runner\Hook;

class RoomController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // list data
    public function index()
    {
        $rooms = Room::all();
        $hotels = Hotel::all();
        return view('admin.room.list', compact('rooms', 'hotels'));
    }
    // detail data by id
    public function show($id)
    {
        $room = Room::findOrFail($id);
        return view('admin.room.detail', compact('room'));
    }
    // view form add data
    public function create()
    {
        $hotels = Hotel::all();
        $users = User::all();
        return view('admin.room.create', compact('hotels', 'users'));
    }

    // function to save data
    public function store(Request $request)
    {
        if ($request->isMethod('POST')) {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'price' => 'required',
                'img' => 'required|image|mimes:jpg,jpeg,png|max:100000',
                'des' => 'required',
                'hotel_id' => 'required',
                'max_occupancy' => 'required'

            ]);
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            if ($request->hasFile('img')) {
                $file = $request->file('img');
                $path = public_path('images/rooms');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move($path, $fileName);
            } else {
                $fileName = 'noname.jpg';
            }
            $input=$request->all();
            $input['img']=$fileName;
            Room::create($input);
            return redirect()->route('room')
                ->with('success', 'Product created successfully.');
        }
    }

    // view form edit data by id
    public function edit($id)
    {
        $room = Room::find($id);
        $hotels = Hotel::all();
        return view('admin.room.edit', compact('room','hotels'));
    }
    // function to update data
    public function update(Request $request, $id)
    {
        $room = Room::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required',
            'des' => 'required',
            'hotel_id' => 'required',
            'max_occupancy' => 'required'

        ]);

        if ($validator->fails()) {

            return redirect()->back()

                ->withErrors($validator)

                ->withInput();
        }

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $path = public_path('images/rooms');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move($path, $fileName);
        } else {

            $fileName = $room->img;
        }

        $input = $request->all();

        $input['img'] = $fileName;

        $room->update($input);
        return redirect()->route('room');
    }
    // function to update data by id
    public function destroy($id)
    {
        $room = Room::findOrFail($id);
        $room->delete();
        return redirect()->route('room')->withSuccess("Test");
    }

    public function room($id)
    {
        // Get the hotel with the specified ID
        $hotels = Hotel::findOrFail($id);

        // Display a form to add a new room
        return view('admin.room.room', compact('hotels'));
    }

    public function saveRoom(Request $request, $id)
    {
        // Get the hotel with the specified ID
        $hotels = Hotel::findOrFail($id);

        // Validate the input data
        $data = $request->validate([
            'name' => 'required',
            'des' => 'required',
            'price' => 'required|numeric',
            'img' => 'required|image|mimes:jpg,jpeg,png|max:1000',
            'max_occupancy' => 'required|integer',
            
        ]);

        // Create a new room for the hotel
        $rooms = new Room($data);
        $rooms->hotel()->associate($hotels);
        $rooms->save();

        // Redirect to the hotel rooms page
        return redirect()->route('admin.room.room', ['id' => $id])->with('success', 'Room added successfully.');
    }

    

    
}
