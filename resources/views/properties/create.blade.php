<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Property') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if ($errors->any())
                        <div class="bg-red-500 text-white p-4 mb-4" style="background: red">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('properties.store') }}" method="POST">
                        @csrf
                
                        <div class="mb-4">
                            <label for="title" class="block text-gray-700">Appartment No:</label>
                            <input type="text" id="title" name="title" class="w-full px-3 py-2 border rounded" required>
                        </div>
                
                        <div class="mb-4">
                            <label for="description" class="block text-gray-700">Description:</label>
                            <textarea id="description" name="description" class="w-full px-3 py-2 border rounded" required></textarea>
                        </div>
                
                        <div class="mb-4">
                            <label for="location" class="block text-gray-700">Location:</label>
                            <input type="text" id="location" name="location" class="w-full px-3 py-2 border rounded" required>
                        </div>
                
                        <div class="mb-4">
                            <label for="contact_person" class="block text-gray-700">Contact Person:</label>
                            <input type="text" id="contact_person" name="contact_person" class="w-full px-3 py-2 border rounded">
                        </div>
                
                        <div class="mb-4">
                            <label for="contact_phone" class="block text-gray-700">Contact Phone:</label>
                            <input type="text" id="contact_phone" name="contact_phone" class="w-full px-3 py-2 border rounded">
                        </div>
                
                        <div class="mb-4">
                            <label for="parking_no" class="block text-gray-700">Parking No:</label>
                            <input type="text" id="parking_no" name="parking_no" class="w-full px-3 py-2 border rounded">
                        </div>
                
                        <div>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save" aria-hidden="true"></i> Save</button>
                            <a href="{{ route('properties.index') }}" class="btn btn-warning"><i class="fa fa-remove" aria-hidden="true"></i> Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>