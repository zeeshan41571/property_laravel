<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Booking Details') }}
        </h2>
    </x-slot>
    <style>
        @media print {
            nav.bg-white.border-b.border-gray-100 {
                display: none;
            }
            .booking_details_btns {
                display: none;
            }
        }
    </style>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Popup overlay -->
                    <div id="popupOverlay" class="popup-overlay"></div>
                    <div id="emailPopup" class="popup">
                        <span id="closePopup" class="close-popup">&times;</span>
                        <h3 class="text-xl font-bold mb-4">Send Email</h3>
                        <form action="{{ route('generate.pdf') }}" method="POST">
                            @csrf
                            <input type="hidden" id="bookingId" name="bookingId" value="{{ $booking->id }}">
                            <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Send Email To:</label>
                            <select id="role" name="role" required class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5 mb-4">
                                    <option value="owner">Owner</option>
                                    <option value="guest">Guest</option>
                            </select>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email:</label>
                            <input type="email" id="email" name="email" required class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5 mb-4">
                            <button type="submit" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Send</button>
                        </form>
                    </div>
                    <h2 class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 hover:border-transparent rounded">Property Details</h2>
                    <table class="table table-bordered w-full">
                        <thead>
                            <tr>
                                <th class="border px-2 py-2" style="text-align: left;">Appartment No</th>
                                <th class="border px-2 py-2" style="text-align: left;">Description</th>
                                <th class="border px-2 py-2" style="text-align: left;">Location</th>
                                <th class="border px-2 py-2" style="text-align: left;">Contact Person</th>
                                <th class="border px-2 py-2" style="text-align: left;">Contact Phone</th>
                                <th class="border px-2 py-2" style="text-align: left;">Parking No</th>
                                <th class="border px-2 py-2" style="text-align: left;">Owner</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td class="border px-2 py-2">{{ $property_details->title }}</td>
                                    <td class="border px-2 py-2">{{ $property_details->description }}</td>
                                    <td class="border px-2 py-2">{{ $property_details->location }}</td>
                                    <td class="border px-2 py-2">{{ $property_details->contact_person }}</td>
                                    <td class="border px-2 py-2">{{ $property_details->contact_phone }}</td>
                                    <td class="border px-2 py-2">{{ $property_details->parking_no }}</td>
                                    <td class="border px-2 py-2">{{ $property_details->user->name }}</td>
                                </tr>
                        </tbody>
                    </table>
                    <br/>
                    <h2 class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 hover:border-transparent rounded">Timing Deails</h2>
                    <table class="table table-bordered w-full" width='100%'>
                        <thead>
                            <tr class="text-left">
                                <th class="border px-4 py-2 text-left" style="text-align: left;">Arrival</th>
                                <th class="border px-4 py-2 text-left" style="text-align: left;">Arrival Time</th>
                                <th class="border px-4 py-2 text-left" style="text-align: left;">Departure</th>
                                <th class="border px-4 py-2 text-left" style="text-align: left;">Departure Time</th>
                            </tr>
                        </thead>
                            <td>{{ $booking->arrival_date }}</td>
                            <td>{{ $booking->arrival_time }}</td>
                            <td>{{ $booking->departure_date }}</td>
                            <td>{{ $booking->departure_time }}</td>
                        <tbody>
                        </tbody>
                    </table>
                    <br/>
                    <h2 class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 hover:border-transparent rounded">Guests Information</h2>
                    <table class="table table-bordered w-full" width='100%'>
                        <thead>
                            <tr class="text-left">
                              <th class="border px-4 py-2 text-left" style="text-align: left;">Name</th>
                              <th class="border px-4 py-2 text-left" style="text-align: left;">Surname</th>
                              <th class="border px-4 py-2 text-left" style="text-align: left;">Email</th>
                              <th class="border px-4 py-2 text-left" style="text-align: left;">Phone</th>
                              <th class="border px-4 py-2 text-left" style="text-align: left;">Street</th>
                              <th class="border px-4 py-2 text-left" style="text-align: left;">Street1</th>
                              <th class="border px-4 py-2 text-left" style="text-align: left;">Street2</th>
                              <th class="border px-4 py-2 text-left" style="text-align: left;">Postal</th>
                              <th class="border px-4 py-2 text-left" style="text-align: left;">City</th>
                              <th class="border px-4 py-2 text-left" style="text-align: left;">Country</th>
                            </tr>
                          </thead>
                        <tbody>
                            @foreach ($guestsData as  $guest)
                                <tr>                                       
                                    <td>{{ $guest->guest_name }}</td>
                                    <td>{{ $guest->guest_surname }}</td>
                                    <td>{{ $guest->guest_email }}</td>
                                    <td>{{ $guest->guest_phone }}</td>
                                    <td>{{ $guest->guest_street }}</td>
                                    <td>{{ $guest->guest_street1 }}</td>
                                    <td>{{ $guest->guest_street2 }}</td>
                                    <td>{{ $guest->guest_postal }}</td>
                                    <td>{{ $guest->guest_city }}</td>
                                    <td>{{ $guest->guest_country }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                      <br/>
                      <h2 class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 hover:border-transparent rounded">Additional Instructions</h2>
                      @php
                        //   dd($recepInstruction);

                      @endphp
                      @if(!empty($recepInstruction['instructions']))
                        <ul class="list-group">
                            @foreach($recepInstruction['instructions'] as $instruction)
                                <li class="list-group-item">{{ trim($instruction) }}</li>
                            @endforeach
                        </ul>
                    @else
                        No instructions available.
                    @endif
                    <div class="booking_details_btns">
                        <a href="{{ route('bookings.index') }}" class="btn btn-warning text-white text-bold" style="font-weight: bold;"><i class="fa fa-remove" aria-hidden="true"></i> Return To Menu</a>
                        <div class="btnEmail">
                            <button class="btnEmail" id="btnEmail"><i class="fa fa-envelope" aria-hidden="true"></i> Email</button>
                        </div>
                        <div class="btnPrint">
                            <button class="btnprint" id="btnprint" onclick="window.print()"><i class="fa fa-print" aria-hidden="true"></i> Print</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
