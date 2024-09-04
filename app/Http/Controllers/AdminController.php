<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use App\Models\Booking;
use App\Models\Contact;
use App\Models\Gallary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\SendEmailNotification; // Corrected the namespace for SendEmailNotification
use Illuminate\Support\Facades\Notification;

class AdminController extends Controller
{
    // Display the homepage depending on user type
    public function index()
    {
        if(Auth::id())
        {
            $usertype = Auth()->user()->usertype;

            // If the user is a regular user, show the homepage
            if($usertype == 'user')
            {
                $room = Room::all();
                $gallary = Gallary::all();
                return view('home.index', compact('room', 'gallary'));
            }
            // If the user is an admin, show the admin dashboard
            else if($usertype == 'admin')
            {
                return view('admin.index');
            }
            // If the user type is neither, redirect back
            else 
            {
                return redirect()->back();
            }
        }
    }

    // Display the homepage (available for all users)
    public function home()
    {
        $room = Room::all();
        $gallary = Gallary::all();
        return view('home.index', compact('room', 'gallary'));
    }

    // Show the form for creating a new room
    public function create_room()
    {
        return view('admin.create_room');
    }

    // Add a new room to the database
    public function add_room(Request $request)
    {
        $data = new Room();

        // Set the room details
        $data->room_title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->wifi = $request->wifi;
        $data->room_type = $request->room_type;

        // Handle image upload
        $image = $request->image;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('room', $imagename);
            $data->image = $imagename; // Save the image name to the database
        }

        // Save the room data to the database
        $data->save();

        return redirect()->back()->with('success', 'Room added successfully!');
    }

    // View all rooms
    public function view_room()
    {
        $data = Room::all();
        return view('admin.view_room', compact('data'));   
    }

    // Delete a room
    public function delete_data($id)
    {
        $data = Room::find($id);
        $data->delete();
        return redirect()->back();
    }

    // Show the form for updating a room
    public function update_data($id)
    {
        $data = Room::find($id);
        return view('admin.update_data', compact('data'));
    }

    // Edit and update a room's details
    public function edit_room(Request $request, $id)
    {
        // Find the room by ID
        $data = Room::findOrFail($id); // Use findOrFail for better error handling
    
        // Update the room fields
        $data->update([
            'room_title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'wifi' => $request->wifi,
            'room_type' => $request->room_type,
        ]);
    
        // Handle the image upload if a new image is provided
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('room'), $imagename);
    
            // Update the image field in the database
            $data->update(['image' => $imagename]);
        }
    
        // Redirect to the view room page with a success message
        return redirect()->back()->with('success', 'Room updated successfully');
    }

    // View all bookings
    public function bookings()
    {
        $data = Booking::all();
        return view('admin.bookings', compact('data'));
    }

    // Delete a booking request
    public function delete_booking($id)
    {
        $data = Booking::find($id);
        $data->delete();
        return redirect()->back();
    }

    // Approve a booking
    public function approve_booking($id)
    {
        $booking = Booking::find($id);
        $booking->status = 'approved';
        $booking->save();
        return redirect()->back();
    }

    // Reject a booking
    public function reject_booking($id)
    {
        $booking = Booking::find($id);
        $booking->status = 'rejected';
        $booking->save();
        return redirect()->back(); 
    }

    // View the gallery
    public function view_gallary()
    {
        $gallary = Gallary::all();
        return view('admin.gallary', compact('gallary'));
    }

    // Upload an image to the gallery
    public function upload_gallary(Request $request)
    {
        $data = new Gallary;
        $image = $request->image;
        if($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('gallary',$imagename);
            $data->image = $imagename;
            $data->save();

            return redirect()->back();
        }
    }

    // Delete an image from the gallery
    public function delete_gallary($id)
    {
        $data = Gallary::find($id);
        $data->delete();
        return redirect()->back();
    }

    // View all contact messages
    public function all_messages()
    {
        $data = Contact::all();
        return view('admin.messages', compact('data'));
    }

    // Show the form to send an email to a specific contact
    public function send_mail($id)
    {   
        $data = Contact::find($id);
        return view('admin.send_mail', compact('data'));
    }

    // Send an email notification to a specific contact
    public function mail(Request $request, $id)
    {
        $contact = Contact::find($id);

        // Create the email details array
        $details = [
            'greeting' => $request->greeting,
            'body' => $request->body,
            'action_text' => $request->action_text,
            'action_url' => $request->action_url,
            'endline' => $request->endline,
        ];

        // Send the email notification using the Notification facade
        Notification::send($contact, new SendEmailNotification($details));
        
        return redirect()->back()->with('success', 'Email sent successfully!');
    }
}
