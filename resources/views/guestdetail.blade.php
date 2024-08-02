<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Booking Details') }}
        </h2>
    </x-slot>

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
                            <input type="hidden" id="bookingId" name="bookingId" value="{{ $guestDetail->id }}">
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
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="border px-2 py-2" style="text-align: left;">Title</th>
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
                    <table class="table-auto" width='100%'>
                        <thead>
                            <tr class="text-left">
                                <th class="border px-4 py-2 text-left" style="text-align: left;">Arriavl</th>
                                <th class="border px-4 py-2 text-left" style="text-align: left;">Arriavl Time</th>
                                <th class="border px-4 py-2 text-left" style="text-align: left;">Departure</th>
                                <th class="border px-4 py-2 text-left" style="text-align: left;">Departure Time</th>
                            </tr>
                        </thead>
                            <td>{{ $guestDetail->arrival_date }}</td>
                            <td>{{ $guestDetail->arrival_time }}</td>
                            <td>{{ $guestDetail->departure_date }}</td>
                            <td>{{ $guestDetail->departure_time }}</td>
                        <tbody>
                        </tbody>
                    </table>
                    <br/>
                    <h2 class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 hover:border-transparent rounded">Guests Information</h2>
                    <table class="table-auto" width='100%'>
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
                            @php
                                $guests_info = array_shift($guestsData);
                            @endphp
                            @foreach ($guests_info as  $guest)
                                <tr>                                       
                                    <td>{{ $guest['guestName'] }}</td>
                                    <td>{{ $guest['guestSurName'] }}</td>
                                    <td>{{ $guest['guestEmail'] }}</td>
                                    <td>{{ $guest['guestPhone'] }}</td>
                                    <td>{{ $guest['guestStreet'] }}</td>
                                    <td>{{ $guest['guestStreet1'] }}</td>
                                    <td>{{ $guest['guestStreet2'] }}</td>
                                    <td>{{ $guest['guestPostal'] }}</td>
                                    <td>{{ $guest['guestCity'] }}</td>
                                    <td>{{ $guest['guestCountry'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                      <br/>
                      <h2 class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 hover:border-transparent rounded">Additional Instructions</h2>
                      @if(!empty($recepInstruction['instruction']['instruction']))
                        <ul>
                            @foreach($recepInstruction['instruction']['instruction'] as $instruction)
                                <li>{{ trim($instruction) }}</li>
                            @endforeach
                        </ul>
                    @else
                        No instructions available.
                    @endif
                    <div class="booking_details_btns">
                        <div class="btnEmail">
                            <button class="btnEmail" id="btnEmail">Email</button>
                        </div>
                        <div class="btnPrint">
                            <button class="btnprint" id="btnprint">Print</button>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>
