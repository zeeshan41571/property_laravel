<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    public function index()
    {
        $user = Auth::user();
    
        if ($user->hasRole('admin')) {
            // Admin can view all properties
            $properties = Property::with('user')->get();
        } else {
            // Other users can only view their own properties
            $properties = $user->properties()->with('user')->get();
        }

        return view('properties.index', compact('properties'));
    }

    public function create()
    {
        return view('properties.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'contact_person' => 'nullable|string|max:255',
            'contact_phone' => 'nullable|string|max:20',
            'parking_no' => 'nullable|string|max:20',
        ]);

        $property = new Property($request->all());
        $property->user_id = Auth::id();
        $property->save();

        return redirect()->route('properties.index')->with('success', 'Property added successfully.');
    }

    public function edit(Property $property)
    {
        $user = Auth::user();

        if ($user->hasRole('admin') || $property->user_id == $user->id) {
            return view('properties.edit', compact('property'));
        } else {
            return redirect()->route('properties.index')->with('error', 'Unauthorized access.');
        }
    }

    public function update(Request $request, Property $property)
    {
        $user = Auth::user();

        if ($user->hasRole('admin') || $property->user_id == $user->id) {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'location' => 'required|string|max:255',
                'contact_person' => 'nullable|string|max:255',
                'contact_phone' => 'nullable|string|max:20',
                'parking_no' => 'nullable|string|max:20',
            ]);

            $property->update($request->all());

            return redirect()->route('properties.index')->with('success', 'Property updated successfully.');
        } else {
            return redirect()->route('properties.index')->with('error', 'Unauthorized access.');
        }
    }

    public function destroy(Property $property)
    {
        $user = Auth::user();

        if ($user->hasRole('admin') || $property->user_id == $user->id) {
            $property->delete();

            return redirect()->route('properties.index')->with('success', 'Property deleted successfully.');
        } else {
            return redirect()->route('properties.index')->with('error', 'Unauthorized access.');
        }
    }
}
