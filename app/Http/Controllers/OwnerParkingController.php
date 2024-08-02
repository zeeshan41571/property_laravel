<?php

namespace App\Http\Controllers;
use App\Models\OwnerParking;
use Illuminate\Http\Request;

class OwnerParkingController extends Controller
{
    // Display a listing of the parking entries
    public function index()
    {
        $owner_parkings = OwnerParking::all();
        return view('owner-parkings.index', compact('owner_parkings'));
    }
    // Show the form for creating a new parking entry
    public function create()
    {
        return view('owner-parkings.create');
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
            'year' => 'required|string|max:20',
            'car_brand' => 'required|string|max:255',
            'car_color' => 'required|string|max:50',
            'car_license_plate' => 'required|string|max:20',
        ]);
        $owner_parking = OwnerParking::create($request->all());
        return redirect()->route('owner-parkings.show', $owner_parking->id)
                         ->with('success', 'Parking details saved successfully.');
    }

    
    public function edit(OwnerParking $owner_parking)
    {
        return view('owner-parkings.edit', compact('owner_parking'));
    }
    public function update(Request $request, OwnerParking $owner_parking)
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'phone_number' => 'required',
            'apartment_number' => 'required',
            'parking_spot' => 'required',
            'year' => 'required',
            'car_brand' => 'required',
            'car_color' => 'required',
            'car_license_plate' => 'required',
        ]);

        $owner_parking->update($request->all());
        return redirect()->route('owner-parkings.index')->with('success', 'Parking details updated successfully.');
    }
    public function destroy(OwnerParking $owner_parking)
    {
        $owner_parking->delete();
        return redirect()->route('owner-parkings.index')->with('success', 'Parking details deleted successfully.');
    }
    public function show($id)
    {
        $owner_parking = OwnerParking::findOrFail($id);
        return view('owner-parkings.view', compact('owner_parking'));
    }
}
