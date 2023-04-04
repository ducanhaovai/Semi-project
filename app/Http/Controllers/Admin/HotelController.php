<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Room;
use PHPUnit\Runner\Hook;

class HotelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // list data
    public function index()
    {
        $hotels = Hotel::all();
        $users = User::all();
        return view('admin.hotel.list', compact('hotels', 'users'));
    }
    // detail data by id
    public function show($id)
    {
        $hotel = Hotel::findOrFail($id);
        return view('admin.hotel.detail', compact('hotel'));
    }
    // view form add data
    public function create()
    {
        $hotelAvailable = true;
        $hotels = Hotel::all();
        $users = User::all();
        return view('admin.hotel.create', compact('hotels', 'users', 'hotelAvailable'));
    }

    // function to save data
    public function store(Request $request)
    {
        if ($request->isMethod('POST')) {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                
                'img' => 'required|image|mimes:jpg,jpeg,png|max:100000',
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
            
            $newHotel->img = $fileName;
            $newHotel->phone = $request->phone;
            $newHotel->des = $request->des;
            $newHotel->address = $request->address;


            $newHotel->save();
            return redirect()->route('admin.hotel')
                ->with('success', 'Product created successfully.');
        }
    }

    // view form edit data by id
    public function edit($id)
    {
        $hotel = Hotel::find($id);
        return view('admin.hotel.edit', compact('hotel'));
    }
    // function to update data
    public function update(Request $request, $id)
    {
        $hotel = Hotel::findOrFail($id);
        $validator = Validator::make($request->all(), [

            'name' => 'required',
            
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

            $fileName = $hotel->image;
        }

        $input = $request->all();

        $input['img'] = $fileName;

        $hotel->update($input);
        return redirect()->route('admin.hotel');
    }
    // function to update data by id
    public function destroy($id)
    {
        $hotel = Hotel::findOrFail($id);
        $hotel->delete();
        return redirect()->route('admin.hotel');
    }
}
