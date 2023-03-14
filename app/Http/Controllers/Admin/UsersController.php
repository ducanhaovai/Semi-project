<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use PHPUnit\Runner\Hook;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // list data
    public function index()
    {
        $users = User::all();
        return view('admin.users.list', compact('users'));
    }
    // detail data by id
    public function show($id)
    {
        $hotel = Hotel::findOrFail($id);
        return view('admin.users.detail', compact('hotel'));
    }
    // view form add data
    public function create()
    {
        return view('admin.users.create');
    }

    // function to save data
    public function store(Request $request)
    {
        if ($request->isMethod('POST')) {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'password' => 'required',
                'type' => 'required'
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            $input=$request->all();
            $input['password']=Hash::make($request->password);
            User::create($input);
            
            return redirect()->route('users')
                ->with('success', 'User created successfully.');
        }
    }

    // view form edit data by id
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit', compact('user'));
    }
    // function to update data
    public function update(Request $request, $id)
    {
        $users = User::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'type' => 'required'

        ]);

        if ($validator->fails()) {

            return redirect()->back()

                ->withErrors($validator)

                ->withInput();
        }
        $input = $request->all();
        if ($request->password=='') {
            $input['password']=$users->password;
        }
        else{
            $input['password']=Hash::make($request->password);

        }

        $users->update($input);
        return redirect()->route('users');
    }
    // function to update data by id
    public function destroy($id)
    {
        $users = User::findOrFail($id);
        $users->delete();
        return redirect()->route('users');
    }
}
