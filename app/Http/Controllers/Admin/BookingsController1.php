<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use Illuminate\Http\Request;
use App\Models\Booking;

use App\Models\User;


class BookingsController1 extends Controller
{
    public function index()
    {
        $roomAvailable = true;
        $bookings = Booking::all();

        return view('admin.room.list_booking', compact('bookings'));
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
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'hotel_id' => 'required',
            'checkin_date' => 'required|date',
            'checkout_date' => 'required|date',
        ]);

        $roomAvailable = $this->isRoomAvailable($validatedData['hotel_id'], $validatedData['checkin_date'], $validatedData['checkout_date']);

        if (!$roomAvailable) {
            return redirect()->back()->withErrors(['message' => 'Sorry, the room is not available for the selected dates.']);
        }

        $booking = Booking::create($validatedData);

        return redirect()->route('admin.room.list_booking', $booking);
    }

    private function isRoomAvailable($hotelId, $checkinDate, $checkoutDate)
    {
        $bookings = Booking::where('hotel_id', $hotelId)
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
