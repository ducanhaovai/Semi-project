<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $hotels = Hotel::all();
        return view('admin.index', ['hotels' => $hotels]);
    }
}
