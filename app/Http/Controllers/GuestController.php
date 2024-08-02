<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class GuestController extends Controller
{
    public function index($id = 0)
    {
        $user = auth()->user();
        if ($id) {
            $property_details = Property::find($id);
            return view('visitorform' , compact('id', 'property_details'));
        } else {
            $properties = $user->hasRole('admin') ? Property::all() : $user->properties; // Adjust as needed
            return view('visitorform', compact('id','properties'));

        }
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        // Collect the data from the request
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
        $instruction = $request->input('instruction');


        // Initialize an array to store guests data
        $guestsData = [];

        // Loop through each guest's data
        for ($i = 0; $i < count($guestName); $i++) {
            // Prepare guest data for the current iteration
            $guestData = [
                'guestName' => $guestName[$i],
                'guestSurName' => $guestSurName[$i],
                'guestEmail' => $guestEmail[$i],
                'guestPhone' => $guestPhone[$i],
                'guestStreet' => $guestStreet[$i],
                'guestStreet1' => $guestStreet1[$i],
                'guestStreet2' => $guestStreet2[$i],
                'guestPostal' => $guestPostal[$i],
                'guestCity' => $guestCity[$i],
                'guestCountry' => $guestCountry[$i],
                // Add other fields as needed
            ];

            // Store guest data in the structured array
            $guestsData['guest_' . ($i + 1)] = $guestData;
        }



        // Initialize an array to store guests data
        $recpInsturction = [];

        // Loop through each guest's data
        // for ($j = 0; $j < count($instruction); $j++) {
        // Prepare guest data for the current iteration
        $recpInsturction = [

            'instruction' => $instruction,
            // Add other fields as needed
        ];

        // Store guest data in the structured array
        // $recpInsturction['instruction_' . ($j + 1)] = $recpInsturction;
        // }





        // Structure the final array as per your desired format
        $dataToSave = [
            'guests_data' => $guestsData
        ];

        // Structure the final array as per your desired format
        $instructionToSave = [
            'instruction' => $recpInsturction
        ];

        $jsonData = json_encode($dataToSave);
        $jsonInstructionData = json_encode($instructionToSave);

        // Save the JSON data to the database
        $guestData = new Guest();
        $guestData->guestJsonData = $jsonData;
        // dd($jsonData);
        $guestData->instruction = $jsonInstructionData;
        // dd($jsonInstructionData);



        $guestData->arrival_date = $request->input('arrival_date');
        $guestData->arrival_time = $request->input('arrival_time');
        $guestData->departure_date = $request->input('departure_date');
        $guestData->departure_time = $request->input('departure_time');

        $guestData->urlLink = $request->uniqueLink;
        $guestData->ownerUrlLink = $request->ownLink;

        $user_id = $guestData->user_id = Auth::id();
        $property_id = $request->input('property_id');
        // $property_detail = Property::find($user_id);
        // $property_id = $property_detail->id;
        $guestData->property_id = $property_id;
        // dd($property_detail->id);
        $guestData->save();
        return redirect()->route('guestDetail', ['id' => $guestData->id])->with('success', 'Booking updated successfully.');
        // return redirect()->route('manageguest')->with('success', 'Booking created successfully.');
    }


    public function show()
    {
        $showUser = Guest::all();
        return view('manageguestform', compact('showUser'));
    }


    public function guestDetail($id)
    {
        $guestDetail = Guest::find($id);
        $guestsData = json_decode($guestDetail->guestJsonData, true);
        $recepInstruction = json_decode($guestDetail->instruction, true);
        $property_details = Property::find($guestDetail->property_id);
        // dd($property_details);
        return view('guestdetail', compact('guestDetail', 'guestsData', 'recepInstruction', 'property_details'));
    }


    public function edit($id)
    {
        $guest = Guest::find($id);
        $property_details = Property::find($guest->property_id);
        return view('editvisitform', ['guest' => $guest, 'property_details'=> $property_details]);
    }

    public function update(Request $request, $id)
    {


        // Collect the data from the request
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
        $instruction = $request->input('instruction');


        // Initialize an array to store guests data
        $guestsData = [];

        // Loop through each guest's data
        for ($i = 0; $i < count($guestName); $i++) {
            // Prepare guest data for the current iteration
            $guestData = [
                'guestName' => $guestName[$i],
                'guestSurName' => $guestSurName[$i],
                'guestEmail' => $guestEmail[$i],
                'guestPhone' => $guestPhone[$i],
                'guestStreet' => $guestStreet[$i],
                'guestStreet1' => $guestStreet1[$i],
                'guestStreet2' => $guestStreet2[$i],
                'guestPostal' => $guestPostal[$i],
                'guestCity' => $guestCity[$i],
                'guestCountry' => $guestCountry[$i],
                // Add other fields as needed
            ];

            // Store guest data in the structured array
            $guestsData['guest_' . ($i + 1)] = $guestData;
        }



        // Initialize an array to store guests data
        $recpInsturction = [];

        // Loop through each guest's data
        // for ($j = 0; $j < count($instruction); $j++) {
        // Prepare guest data for the current iteration
        $recpInsturction = [

            'instruction' => $instruction,
            // Add other fields as needed
        ];

        // Store guest data in the structured array
        // $recpInsturction['instruction_' . ($j + 1)] = $recpInsturction;
        // }





        // Structure the final array as per your desired format
        $dataToSave = [
            'guests_data' => $guestsData
        ];

        // Structure the final array as per your desired format
        $instructionToSave = [
            'instruction' => $recpInsturction
        ];

        $jsonData = json_encode($dataToSave);
        $jsonInstructionData = json_encode($instructionToSave);

        // Save the JSON data to the database
        $guestData = Guest::find($id);
        $guestData->guestJsonData = $jsonData;
        // dd($jsonData);
        $guestData->instruction = $jsonInstructionData;
        // dd($jsonInstructionData);



        $guestData->arrival_date = $request->input('arrival_date');
        $guestData->arrival_time = $request->input('arrival_time');
        $guestData->departure_date = $request->input('departure_date');
        $guestData->departure_time = $request->input('departure_time');

        $guestData->urlLink = $request->uniqueLink;
        $guestData->ownerUrlLink = $request->ownLink;

        $user_id = $guestData->user_id = Auth::id();
        $property_id = $request->input('property_id');
        $guestData->property_id = $property_id;
        // dd($property_detail->id);
        $guestData->save();
        return redirect()->route('guestDetail', ['id' => $id])->with('success', 'Booking updated successfully.');
        // return redirect()->route('guestDetail')->with('success', 'Booking updated successfully.');
    }

    public function destroy($id)
    {
        $guest = Guest::find($id);
        $guest->delete();

        return redirect()->route('manageguest')->with('success', 'Booking deleted successfully.');
    }
}
