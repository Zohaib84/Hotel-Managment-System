<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Booking;
use App\Models\Contact;
use App\Models\Gallary;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function room_details($id)
    {
        $room = Room::find($id);
        return view('home.room_details',  compact('room'));
    }

    public function room_booking(Request $request, $id)
    {   

        $request->validate([
            'startDate' =>'required|date',
            'endDate' => 'date|after:startDate',
        ]);
        $data = new Booking();

        $data->room_id = $request->id;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        $startDate = $request->startDate;
        $endDate = $request->endDate;

        $isBooked = Booking::where('room_id', $id)
                            ->where('start_date', '<=', $endDate)
                            ->where('end_date', '>=', $startDate)->exists();

        if($isBooked)
        {
            return redirect()->back()->with('message', 'Room is already booked, please try different date');
        }

        else
        {
            $data->start_date = $request->startDate;
            $data->end_date = $request->endDate;
            $data->save();
            return redirect()->back()->with('message', 'Room Booked Successfully');
        }        
    }

    public function contact(Request $request)
    {
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;

        $contact->save();
        return redirect()->back()->with('message', 'Message Sent Successfully');
    }

    public function our_rooms()
    {   $room = Room::all();
        return view('home.our_rooms', compact('room'));
    }

    public function hotel_gallary()
    {   $gallary = Gallary::all();
        return view('home.hotel_gallary', compact('gallary'));
    }

    public function contact_us()
    {   $contact_us = Contact::all();
        return view('home.contact_us', compact('contact_us'));
    }
}
