<link rel="stylesheet" href="{{ asset('css/print.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="print-page-buttons">
    <a href="{{ route('parkings.index')}}" class="btn btn-large btn-secondary">Back to home</a>
    <a href="{{ route('parkings.edit', $parking->id) }}" class="btn btn-large btn-warning">Edit Data</a>
    <button onclick="window.print()" class=" print-button">Print this page</button>
</div>

<div class="container">
    <div class="row">
        <div class="col-7">
            <b>Responsible for the vehicle and the right parking:</b>
            <div class="info">
                <br/>
                <div class="name-fields">
                    {{ $parking->name }} {{ $parking->surname }}
                </div>
                <p>{{ $parking->phone_number }}</p>
            </div>
            <p>Apartment: {{ $parking->apartment_number }}</p>
        </div>
        <div class="col-5 right-text">
            <p>{{ $parking->apartment_number }}</p>
            <p>{{ $parking->car_license_plate }}</p>
        </div>
    </div>
    <div class="liner">
        @if($parking->arrival_date)
            <div class="row arrival">
                <div class="col-6">
                    Arrival: {{ \Carbon\Carbon::parse($parking->arrival_date)->format('Y-m-d') }}
                </div>
                <div class="col-6">
                    Departure: {{ $parking->departure_date ? \Carbon\Carbon::parse($parking->departure_date)->format('Y-m-d') : 'N/A' }}
                </div>
            </div>
        @endif
        @if($parking->year)
            <div class="row year">
                <div class="col-12">
                    <p>Year: {{ $parking->year }}</p>
                </div>
            </div>
        @endif
    </div>
    <p>Car Brand: {{ $parking->car_brand }}</p>
    <p>Car Color: {{ $parking->car_color }}</p>
    <p>Car License Plate: {{ $parking->car_license_plate }}</p>
    <p>Parking Spot: {{ $parking->parking_spot }} (P=Parking, G=Garage)</p>
    <div class="container permit">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-6 mt-1">
                <br>
                <h2>Parking Permit</h2>
                <p>Car Color: {{ $parking->car_color }}</p>
                <p>Car Brand: {{ $parking->car_brand }}</p>
                <h4>Parking Spot: {{ $parking->parking_spot }} / {{ $parking->apartment_number }}</h4>
                <h4>Car License Plate: {{ $parking->car_license_plate }}</h4>
                @if($parking->year)
                    <p>{{ $parking->year }}</p>
                @endif
                @if($parking->arrival_date)
                    <p>{{ \Carbon\Carbon::parse($parking->arrival_date)->format('Y-m-d') }} - {{ $parking->departure_date ? \Carbon\Carbon::parse($parking->departure_date)->format('Y-m-d') : 'N/A' }}</p>
                @endif
            </div>
            <div class="col-5 copy-reserve mt-1">
                <br>
                <h3>Copy Reserve</h3>
                <div class="circle"></div>
                <div class="linees">Printed By : {{ Auth::user()->name }}</div>
            </div>
        </div>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-6 mt-1">
                <br>
                <h2>Parking Permit</h2>
                <p>Car Color: {{ $parking->car_color }}</p>
                <p>Car Brand: {{ $parking->car_brand }}</p>
                <h4>Parking Spot: {{ $parking->parking_spot }} / {{ $parking->apartment_number }}</h4>
                <h4>Car License Plate: {{ $parking->car_license_plate }}</h4>
                @if($parking->year)
                    <p>{{ $parking->year }}</p>
                @endif
                @if($parking->arrival_date)
                    <p>{{ \Carbon\Carbon::parse($parking->arrival_date)->format('Y-m-d') }} - {{ $parking->departure_date ? \Carbon\Carbon::parse($parking->departure_date)->format('Y-m-d') : 'N/A' }}</p>
                @endif
            </div>
            <div class="col-5 copy-guest mt-1">
                <br>
                <h3>Copy Guest</h3>
                <div class="circle"></div>
                <div class="linees">Printed By : {{ Auth::user()->name }}</div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>