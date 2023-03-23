<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class BookingsController1 extends Controller
{
    public function index()
    {
        $roomAvailable = true;
        $bookings = Booking::all();
        if (Auth::user()->type=='user') {
            $bookings = Booking::where('user_id',Auth::id())->get();
        }
        return view('admin.room.list-booking', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roomAvailable = true;
        $hotels = Hotel::all();
        $users = User::all();

        return view('admin.room.form', compact('hotels', 'users', 'roomAvailable'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            // 'user_id' => 'required|exists:users,id',
            'room_id' => 'required',
            'checkin_date' => 'required|date',
            'checkout_date' => 'required|date',
        ]);
        if ($request->user_id == '') {
            // dd('ấdf');
            return redirect()->route('login');
        }
        $roomAvailable = $this->isRoomAvailable($validatedData['room_id'], $validatedData['checkin_date'], $validatedData['checkout_date']);

        if (!$roomAvailable) {
            return redirect()->back()->withErrors(['message', 'Sorry, the room is not available for the selected dates.']);
        }
        $input=$request->all();
        $input['checkin_date'] = Carbon::createFromFormat('m/d/Y', $input['checkin_date'])->format('Y-m-d 14:00:00');
        $input['checkout_date'] = Carbon::createFromFormat('m/d/Y', $input['checkout_date'])->format('Y-m-d 12:00:00');
        // dd($input);
        $booking = Booking::create($input);

        return redirect()->route('admin.listBookings');
    }

    private function isRoomAvailable($hotelId, $checkinDate, $checkoutDate)
    {
        $bookings = Booking::where('room_id', $hotelId)
            ->where(function ($query) use ($checkinDate, $checkoutDate) {
                $query->whereBetween('checkin_date', [$checkinDate, $checkoutDate])
                    ->orWhereBetween('checkout_date', [$checkinDate, $checkoutDate]);
            })
            ->get();

        return $bookings->count() === 0;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
