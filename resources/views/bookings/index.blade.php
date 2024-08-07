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
                    <a href="{{ route('bookings.create') }}" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Create New</a>
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
                            @if ($bookings->isNotEmpty())
                                @foreach ($bookings as $booking)
                                    <tr>
                                        @php
                                            $firstGuest = $booking->guests->first();
                                        @endphp
                                        <td class="border">
                                            @if ($firstGuest)
                                                {{ $firstGuest->guest_name }} {{ $firstGuest->guest_surname }}
                                            @endif
                                        </td>
                                        <td class="border">{{ $booking->arrival_date }}</td>
                                        <td class="border">{{ $booking->arrival_time }}</td>
                                        <td class="border">{{ $booking->departure_date }}</td>
                                        <td class="border">{{ $booking->departure_time }}</td>
                                        <td class="border">{{ $booking->property->title }}</td>
                                        <td class="border">{{ $booking->guests->count() }}</td>
                                        <td class="border">
                                            <a class="btn btn-warning" href="{{ route('bookings.edit', $booking->id) }}">
                                                <i class="fa fa-edit" aria-hidden="true"></i> Edit
                                            </a> | 
                                            <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this booking?')">
                                                    <i class="fa fa-times" aria-hidden="true"></i> Delete
                                                </button>
                                            </form> |
                                            <a class="btn btn-info" href="{{ route('bookings.details', $booking->id) }}">
                                                <i class="fa fa-eye" aria-hidden="true"></i> View Details
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="8" class="border text-center">No booking records found.</td>
                                </tr>
                            @endif
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
