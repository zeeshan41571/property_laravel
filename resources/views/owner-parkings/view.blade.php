<link rel="stylesheet" href="{{ asset('css/print.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="print-page-buttons">
    <a href="{{ route('owner-parkings.index')}}" class="btn btn-large btn-secondary">Back to home</a>
    <a href="{{ route('owner-parkings.edit', $owner_parking->id) }}" class="btn btn-large btn-warning">Edit Data</a>
    <button onclick="window.print()" class=" print-button">Print this page</button>
</div>

<div class="container">
    <div class="row">
        <div class="col-7">
            <b>Responsible for the vehicle and the right parking:</b>
            <div class="info">
                <br/>
                <div class="name-fields">
                    {{ $owner_parking->name }} {{ $owner_parking->surname }}
                </div>
                <p>{{ $owner_parking->phone_number }}</p>
            </div>
            <p>Apartment: {{ $owner_parking->apartment_number }}</p>
        </div>
        <div class="col-5 right-text">
            <p>{{ $owner_parking->apartment_number }}</p>
            <p>{{ $owner_parking->car_license_plate }}</p>
        </div>
    </div>
    <div class="liner">
        @if($owner_parking->year)
            <div class="row year">
                <div class="col-12">
                    <p>Year: {{ $owner_parking->year }}</p>
                </div>
            </div>
        @endif
    </div>
    <p>Car Brand: {{ $owner_parking->car_brand }}</p>
    <p>Car Color: {{ $owner_parking->car_color }}</p>
    <p>Car License Plate: {{ $owner_parking->car_license_plate }}</p>
    <p>Parking Spot: {{ $owner_parking->parking_spot }} (P=Parking, G=Garage)</p>
    <div class="container permit">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-6 mt-1">
                <br>
                <h2>Parking Permit</h2>
                <p>Car Color: {{ $owner_parking->car_color }}</p>
                <p>Car Brand: {{ $owner_parking->car_brand }}</p>
                <h4>Parking Spot: {{ $owner_parking->parking_spot }} / {{ $owner_parking->apartment_number }}</h4>
                <h4>Car License Plate: {{ $owner_parking->car_license_plate }}</h4>
                @if($owner_parking->year)
                    <p>{{ $owner_parking->year }}</p>
                @endif
            </div>
            <div class="col-5 copy-reserve mt-1">
                <br>
                <h3>Copy Reserve</h3>
                <div class="circle"></div>
                <div class="linees">Printed By : {{Auth::user()->name }}</div>
            </div>
        </div>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-6 mt-1">
                <br>
                <h2>Parking Permit</h2>
                <p>Car Color: {{ $owner_parking->car_color }}</p>
                <p>Car Brand: {{ $owner_parking->car_brand }}</p>
                <h4>Parking Spot: {{ $owner_parking->parking_spot }} / {{ $owner_parking->apartment_number }}</h4>
                <h4>Car License Plate: {{ $owner_parking->car_license_plate }}</h4>
                @if($owner_parking->year)
                    <p>{{ $owner_parking->year }}</p>
                @endif
            </div>
            <div class="col-5 copy-guest mt-1">
                <br>
                <h3>Copy Owner</h3>
                <div class="circle"></div>
                <div class="linees">Printed By : {{ Auth::user()->name }}</div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>