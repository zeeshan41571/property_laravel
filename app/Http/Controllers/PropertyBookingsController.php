<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\GuestInfo;
use App\Models\PropertyBookings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertyBookingsController extends Controller
{
    public function index($id = 0)
    {
        $bookings = PropertyBookings::with(['property', 'guests'])->get();
        return view('bookings.index', compact('bookings'));
        
    }
    public function create($id = 0)
    {
        $user = auth()->user();
        if ($id) {
            $property_details = Property::find($id);
            return view('bookings.create' , compact('id', 'property_details'));
        } else {
            $properties = $user->hasRole('admin') ? Property::all() : $user->properties; // Adjust as needed
            return view('bookings.create', compact('id','properties'));

        }
    }
    public function store(Request $request)
    {
        $guestName = $request->input('guestName');
        $guestSurName = $request->input('guestSurName');
        $guestEmail = $request->input('guestEmail');
        $guestPhone = $request->input('guestPhone');
        $guestStreet = $request->input('guestStreet');
        $guestStreet1 = $request->input('guestStreet1');
        $guestStreet2 = $request->input('guestStreet2');
        $guestPostal = $request->input('guestPostal');
        $guestCity = $request->input('guestCity');
        $guestCountry = $request->input('guestCountry');    
        $documentType = $request->input('documentType');
        $document_number = $request->input('documentNumber');


        $instruction = $request->input('instruction');
        $recpInsturction = [];
        $recpInsturction = [
            'instructions' => $instruction,
        ];
        $jsonInstructionData = json_encode($recpInsturction);

        $booking_obj = new PropertyBookings();
        $booking_obj->arrival_date = $request->input('arrival_date');
        $booking_obj->arrival_time = $request->input('arrival_time');
        $booking_obj->departure_date = $request->input('departure_date');
        $booking_obj->departure_time = $request->input('departure_time');
        $booking_obj->instructions = $jsonInstructionData;
        $booking_obj->user_id = Auth::id();
        $property_id = $request->input('property_id');
        $booking_obj->property_id = $property_id;
        $booking_obj->save();
        // Get the ID of the newly created booking
        $booking_id = $booking_obj->id;
        $guestsData = [];

        // Loop through each guest's data
        for ($i = 0; $i < count($guestName); $i++) {

            $path1 = 'nil';
            $path2 = 'nil';

            // Check and store the first document image
            if ($request->hasFile('documentImage1.'.$i)) {
                $path1 = $request->file('documentImage1.'.$i)->store('documents');
            }

            // Check and store the second document image
            if ($request->hasFile('documentImage2.'.$i)) {
                $path2 = $request->file('documentImage2.'.$i)->store('documents');
            }
            // Prepare guest data for the current iteration
            $guestData = [
                'guest_name' => $guestName[$i],
                'guest_surname' => $guestSurName[$i],
                'guest_email' => $guestEmail[$i],
                'guest_phone' => $guestPhone[$i],
                'guest_street' => $guestStreet[$i],
                'guest_street1' => $guestStreet1[$i],
                'guest_street2' => $guestStreet2[$i],
                'guest_postal' => $guestPostal[$i],
                'guest_city' => $guestCity[$i],
                'guest_country' => $guestCountry[$i],
                'document_type' => $documentType[$i],
                'document_number' => $document_number[$i],
                'document_image1' => $path1,
                'document_image2'=>$path2,
                'property_bookings_id' => $booking_id,
            ];

            // Store guest data in the structured array
            $guestsData['guest_' . ($i + 1)] = $guestData;
        }
        foreach ($guestsData as $guest) {
            GuestInfo::create($guest);
        }
        return redirect()->route('bookings.index');
    }
    public function edit($id)
    {
        $booking = PropertyBookings::findOrFail($id);
        $guests = GuestInfo::where('property_bookings_id', $id)->get();
        $property_details = Property::find($booking->property_id);
        return view('bookings.edit', compact('booking', 'guests', 'property_details'));
    }
    public function update(Request $request, $id)
    {
        $guestId = $request->input('guestId');
        $guestName = $request->input('guestName');
        $instruction = $request->input('instruction');
        $recpInsturction = [];
        $recpInsturction = [
            'instructions' => $instruction,
        ];
        $jsonInstructionData = json_encode($recpInsturction);

        $booking_obj = PropertyBookings::findOrFail($id);
        $booking_obj->arrival_date = $request->input('arrival_date');
        $booking_obj->arrival_time = $request->input('arrival_time');
        $booking_obj->departure_date = $request->input('departure_date');
        $booking_obj->departure_time = $request->input('departure_time');
        $property_id = $request->input('property_id');
        $booking_obj->instructions = $jsonInstructionData;
        $booking_obj->user_id = Auth::id();
        $booking_obj->property_id = $property_id;
        $booking_obj->save();

        // Loop through each guest's data
        for ($i = 0; $i < count($guestName); $i++) {
            $guest = GuestInfo::find($guestId[$i]);
            if (!$guest) {
                $guest = new GuestInfo();
            }
            // Handle file uploads
            $path1 = $guest->document_image1;
            $path2 = $guest->document_image2;

            // Check and store the first document image
            if ($request->hasFile('documentImage1.'.$i)) {
                $path1 = $request->file('documentImage1.'.$i)->store('documents');
            }

            // Check and store the second document image
            if ($request->hasFile('documentImage2.'.$i)) {
                $path2 = $request->file('documentImage2.'.$i)->store('documents');
            }
            // Update guest details
            $guest->guest_name = $guestName[$i];
            $guest->guest_surname = $request->input('guestSurName.' . $i);
            $guest->guest_email = $request->input('guestEmail.' . $i);
            $guest->guest_phone = $request->input('guestPhone.' . $i);
            $guest->guest_street = $request->input('guestStreet.' . $i);
            $guest->guest_street1 = $request->input('guestStreet1.' . $i);
            $guest->guest_street2 = $request->input('guestStreet2.' . $i);
            $guest->guest_postal = $request->input('guestPostal.' . $i);
            $guest->guest_city = $request->input('guestCity.' . $i);
            $guest->guest_country = $request->input('guestCountry.' . $i);
            $guest->document_type = $request->input('documentType.' . $i);
            $guest->document_number = $request->input('documentNumber.' . $i);
            $guest->document_image1 = $path1;
            $guest->document_image2 = $path2;
            $guest->property_bookings_id = $id;
            $guest->save();
        }
        return redirect()->route('bookings.index', ['id' => $id])->with('success', 'Booking updated successfully.');
    }

    public function destroy($id)
    {
        $booking = PropertyBookings::findOrFail($id);
        $booking->delete();
        return redirect()->route('bookings.index')->with('success', 'Booking deleted successfully.');
    }
    public function details($id)
    {   
        $booking = PropertyBookings::findOrFail($id);
        $guestsData = GuestInfo::where('property_bookings_id', $id)->get();
        $recepInstruction = json_decode($booking->instructions, true);
        $property_details = Property::find($booking->property_id);
        // dd($property_details);
        return view('bookings.view', compact('booking', 'guestsData', 'recepInstruction', 'property_details'));
    }
}
