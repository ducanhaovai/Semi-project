<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;


class RoomController extends Controller
{
    // list data
    public function index()
    {
        $hotels = Hotel::all();
        $users = User::all();
        return view('admin.room.list', compact('hotels', 'users'));
    }
    // detail data by id
    public function show($id)
    {
        
        return view('admin.room.detail');
    }
    // view form add data
    public function create()
    {
        $roomAvailable = true;
        $hotels = Hotel::all();
        $users = User::all();
        return view('admin.room.form', compact('hotels', 'users', 'roomAvailable'));
    }
    
    // function to save data
    public function store(Request $request)
    {
        if ($request->isMethod('POST')) {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'price' => 'required',
                'img' => 'required|image|mimes:jpg,jpeg,png|max:1000',
                'des' => 'required',
                'address' => 'required'

                
                
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            if ($request->hasFile('img')) {
                $file = $request->file('img');
                $path = public_path('images/product');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move($path, $fileName);
            } else {
                $fileName = 'noname.jpg';
            }
            $newHotel = new Hotel();
            $newHotel->name = $request->name;
            $newHotel->price = $request->price;
            $newHotel->img = $fileName;
            $newHotel->phone = $request->phone;
            $newHotel->des = $request->des;
            $newHotel->address = $request->address;
            
            
            $newHotel->save();
            return redirect()->route('admin.index')
                ->with('success', 'Product created successfully.');
        }
    }

    // view form edit data by id
    public function edit($id)
    {
        return view('admin.room.form');
    }
    // function to update data
    public function update($id)
    {
        // code here
    }
    // function to update data by id
    public function destroy($id)
    {
        // code here
    }
}
