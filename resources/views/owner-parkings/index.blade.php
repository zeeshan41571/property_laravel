<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('All Parking Entries') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('owner-parkings.create') }}" class="btn btn-success "><i class="fa fa-plus" aria-hidden="true"></i> Create New</a>
                    <br><br>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <br>
                    <table width='100%' class="table table-striped">
                        <thead>
                            <tr>
                                <th class="border text-left" style="text-align: left;">Name</th>
                                <th class="border text-left" style="text-align: left;">Surname</th>
                                <th class="border text-left" style="text-align: left;">Apartment Number</th>
                                <th class="border text-left" style="text-align: left;">Parking Spot</th>
                                <th class="border text-left" style="text-align: left;">Year</th>
                                <th class="border text-left" style="text-align: left;">Car Brand</th>
                                <th class="border text-left" style="text-align: left;">Car License Plate</th>
                                <th class="border text-left" style="text-align: left;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($owner_parkings as $parking)
                                <tr>
                                    <td class="border">{{ $parking->name }}</td>
                                    <td class="border">{{ $parking->surname }}</td>
                                    <td class="border">{{ $parking->apartment_number }}</td>
                                    <td class="border">{{ $parking->parking_spot }}</td>
                                    <td class="border">{{ $parking->year }}</td>
                                    <td class="border">{{ $parking->car_brand }}</td>
                                    <td class="border">{{ $parking->car_license_plate }}</td>
                                    <td class="border">
                                        <a href="{{ route('owner-parkings.edit', $parking->id) }}" class="btn btn-warning"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a> | 
                                        @if(Auth::user()->roles->contains('name', 'admin'))
                                        <form action="{{ route('owner-parkings.destroy', $parking->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-remove" aria-hidden="true"></i> Delete</button> | 
                                        </form>
                                        @endif
                                        <a href="{{ route('owner-parkings.show', $parking->id) }}" class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="13">No parking entries found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
