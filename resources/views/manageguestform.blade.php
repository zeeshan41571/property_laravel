<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Bookings') }}
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
                    <a href="{{ route('booking-form') }}" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Create New</a>
                    <br><br>
                    <table class="table table-striped" width='100%'>
                        <thead>
                            <tr class="text-left">
                              <th class="border text-left" style="text-align: left;">Guest Name</th>
                              <th class="border text-left" style="text-align: left;">Arrival</th>
                              <th class="border text-left" style="text-align: left;">Arrival Time</th>
                              <th class="border text-left" style="text-align: left;">Departure</th>
                              <th class="border text-left" style="text-align: left;">Departure Time</th>
                              <th class="border text-left" style="text-align: left;">Appartment No</th>
                              <th class="border text-left" style="text-align: left;">Guest Count</th>
                              <th class="border text-left" style="text-align: left;">Actions</th>
                            </tr>
                          </thead>
                        <tbody>

                            @if ($showUser->isNotEmpty())
                                @foreach ($showUser as $guest)
                                    <tr>
                                        @php
                                            $guestsData = json_decode($guest->guestJsonData, true);
                                            // $property_details = Property::find($guest->property_id);
                                            // $data = json_decode($guestsData, true);
                                            // dd($guestsData['guests_data']);
                                        @endphp
                                        <td class="border">{{ $guestsData['guests_data']['guest_1']['guestName'] }} {{ $guestsData['guests_data']['guest_1']['guestSurName'] }}</td>
                                        <td class="border">{{ $guest->arrival_date }}</td>
                                        <td class="border">{{ $guest->arrival_time }}</td>
                                        <td class="border">{{ $guest->departure_date }}</td>
                                        <td class="border">{{ $guest->departure_time }}</td>
                                        <td class="border">{{ $guest->property->title}}</td>
                                        <td class="border">{{ count($guestsData['guests_data'])}}</td>
                                        <td class="border">
                                            <a class="btn btn-warning" href="{{route('edit-booking',$guest->id)}}"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a> | 
                                            <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this role?')" href="{{route('guest-delete',$guest->id)}}"><i class="fa fa-times" aria-hidden="true"></i> Delete</a> |
                                            <a class="btn btn-info"  href="{{route('guestDetail',$guest->id)}}"><i class="fa fa-eye" aria-hidden="true"></i> View Details</a>
                                                {{-- <button type="submit" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 hover:border-transparent rounded" onclick="return confirm('Are you sure you want to delete this role?')">Delete</button> --}}
                                        
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                            <td colspan="7" class="border text-center">No booking records found.</td>
                        @endif
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
