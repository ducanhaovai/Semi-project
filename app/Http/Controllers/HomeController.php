<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use \Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
=======
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
>>>>>>> HongPhuc

class HomeController extends Controller
{
    public function index()
    {
        return view('index');
    }

<<<<<<< HEAD
    public function room()
    {
        return view('room');
    }

=======
>>>>>>> HongPhuc
    public function detail_room()
    {
        return view('detail-room');
    }
<<<<<<< HEAD

    public function login()
    {
        return view('login');
    }

    public function register(Request $request)
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

    public function postLogin(Request $request)
    {
        
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if (Auth::user()->type == 'admin') {
                
                    return view('admin.index', compact('videos'));
            } else {
        
                
                
        
                return view('index');
            }
        } else {
            return redirect()->route('login');
        }
    }
=======
>>>>>>> HongPhuc
}
