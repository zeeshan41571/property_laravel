<?php

namespace App\Http\Controllers;
use App\Models\Parking;
use Illuminate\Http\Request;

class ParkingController extends Controller
{
    // Display a listing of the parking entries
    public function index()
    {
        $parkings = Parking::all();
        return view('parkings.index', compact('parkings'));
    }
    // Show the form for creating a new parking entry
    public function create()
    {
        return view('parkings.create');
    }

    // Store a newly created parking entry in storage
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'apartment_number' => 'required|string|max:20',
            'parking_spot' => 'required|string|max:50',
            'arrival_date' => 'required|date',
            'departure_date' => 'required|date',
            'car_brand' => 'required|string|max:255',
            'car_color' => 'required|string|max:50',
            'car_license_plate' => 'required|string|max:20',
        ]);
        $parking = Parking::create($request->all());
        return redirect()->route('parkings.show', $parking->id)
                         ->with('success', 'Parking details saved successfully.');
    }

    
    public function edit(Parking $parking)
    {
        return view('parkings.edit', compact('parking'));
    }
    public function update(Request $request, Parking $parking)
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'phone_number' => 'required',
            'apartment_number' => 'required',
            'parking_spot' => 'required',
            'arrival_date' => 'required|date',
            'departure_date' => 'required|date',
            'car_brand' => 'required',
            'car_color' => 'required',
            'car_license_plate' => 'required',
        ]);

        $parking->update($request->all());
        return redirect()->route('parkings.index')->with('success', 'Parking details updated successfully.');
    }
    public function destroy(Parking $parking)
    {
        $parking->delete();
        return redirect()->route('parkings.index')->with('success', 'Parking details deleted successfully.');
    }
    public function show($id)
    {
        $parking = Parking::findOrFail($id);
        return view('parkings.view', compact('parking'));
    }
}
