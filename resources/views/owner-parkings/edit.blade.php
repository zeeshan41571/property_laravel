<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Update Parking Entry') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if ($errors->any())
                        <div>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('owner-parkings.update', $owner_parking->id) }}" method="POST">
                        @csrf
                        @method('PUT') <!-- This is important for update requests -->
                        <div>
                            <label for="name">Name:</label>
                            <input type="text" value="{{ old('name', $owner_parking->name) }}" name="name" id="name" class="block mt-1 w-full" required>
                        </div>
                        <div>
                            <label for="surname">Surname:</label>
                            <input type="text" name="surname" value="{{ old('name', $owner_parking->surname) }}" id="surname" class="block mt-1 w-full" required>
                        </div>
                        <div>
                            <label for="phone_number">Phone Number:</label>
                            <input type="text" name="phone_number" value="{{ old('phone_number', $owner_parking->phone_number) }}" id="phone_number"  class="block mt-1 w-full" required>
                        </div>
                        <div>
                            <label for="apartment_number">Apartment Number:</label>
                            <input type="text" name="apartment_number" value="{{ old('apartment_number', $owner_parking->apartment_number) }}" id="apartment_number" class="block mt-1 w-full" required>
                        </div>
                        <div>
                            <label for="parking_spot">Parking Spot:</label>
                            <input type="text" name="parking_spot" id="parking_spot" value="{{ old('parking_spot', $owner_parking->parking_spot) }}" class="block mt-1 w-full" required>
                        </div>
                        <div>
                            <label for="year">Year:</label>
                            <select name="year" id="year" class="block mt-1 w-full">
                                @for($year = 2024; $year <= 2030; $year++)
                                    <option value="{{ $year }}" {{ $year == $owner_parking->year ? 'selected' : '' }}>
                                        {{ $year }}
                                    </option>
                                @endfor
                            </select>
                        </div>
                        <div>
                            <label for="car_brand">Car Brand:</label>
                            <input type="text" name="car_brand" id="car_brand" value="{{ old('car_brand', $owner_parking->car_brand) }}" class="block mt-1 w-full" required>
                        </div>
                        <div>
                            <label for="car_color">Car Color:</label>
                            <input type="text" name="car_color" id="car_color" value="{{ old('car_color', $owner_parking->car_color) }}"  class="block mt-1 w-full" required>
                        </div>
                        <div>
                            <label for="car_license_plate">Car License Plate:</label>
                            <input type="text" name="car_license_plate" id="car_license_plate" value="{{ old('car_license_plate', $owner_parking->car_license_plate) }}"  class="block mt-1 w-full" required>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save" aria-hidden="true"></i> Update</button>
                        <a href="{{ route('owner-parkings.index') }}" class="btn btn-warning"><i class="fa fa-remove" aria-hidden="true"></i> Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
