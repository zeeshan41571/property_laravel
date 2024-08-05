<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Properties') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <a href="{{ route('properties.create') }}" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Create New</a>
                    <br><br>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="border text-left" style="text-align: left;">Appartment No</th>
                                <th class="border text-left" style="text-align: left;width: 200px;">Description</th>
                                <th class="border text-left" style="text-align: left;">Location</th>
                                <th class="border text-left" style="text-align: left;">Contact Person</th>
                                <th class="border text-left" style="text-align: left;">Contact Phone</th>
                                <th class="border text-left" style="text-align: left;">Parking No</th>
                                <th class="border text-left" style="text-align: left;">Owner</th>
                                <th class="border text-left" style="text-align: left;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($properties->isEmpty())
                                <tr>
                                    <td colspan="8" class="border px-4 py-2 text-center">No properties found.</td>
                                </tr>
                            @else   
                                @foreach ($properties as $property)
                                    <tr>
                                        <td class="border px-2 py-2">{{ $property->title }}</td>
                                        <td class="border px-2 py-2">{{ $property->description }}</td>
                                        <td class="border px-2 py-2">{{ $property->location }}</td>
                                        <td class="border px-2 py-2">{{ $property->contact_person }}</td>
                                        <td class="border px-2 py-2">{{ $property->contact_phone }}</td>
                                        <td class="border px-2 py-2">{{ $property->parking_no }}</td>
                                        <td class="border px-2 py-2">{{ $property->user->name }}</td>
                                        <td class="border px-2 py-2">
                                            <a href="{{ route('properties.edit', $property->id) }}" class="btn btn-warning"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a> | 
                                            <form action="{{ route('properties.destroy', $property->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-times" aria-hidden="true"></i> Delete</button>
                                            </form> |
                                            <a href="{{ route('create-booking', $property->id) }}" class="btn btn-info"><i class="fa fa-plus" aria-hidden="true"></i> Create Booking</a>
                                        </td>
                                    </tr>
                                @endforeach
                           
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>