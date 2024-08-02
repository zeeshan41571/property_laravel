<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Users') }}
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
                    <a href="{{ route('users.create') }}" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Create New</a>
                    <br><br>
                    <table class="table table-striped" width="100%">
                        <thead>
                            <tr>
                                <th class="border text-left alignleft" style="text-align: left;">Name</th>
                                <th class="border text-left alignleft" style="text-align: left;">Email</th>
                                <th class="border text-left alignleft" style="text-align: left;">Roles</th>
                                <th class="border text-left alignleft" style="text-align: left;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($users->isEmpty())
                                <tr>
                                    <td colspan="3" class="border text-center">No users found</td>
                                </tr>
                            @else
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="border">{{ $user->name }}</td>
                                        <td class="border">{{ $user->email }}</td>
                                        <td class="border">
                                            @foreach ($user->roles as $role)
                                                {{ $role->name }}{{ !$loop->last ? ',' : '' }}
                                            @endforeach
                                        </td>
                                        <td class="border">
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a> | 
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')"><i class="fa fa-times" aria-hidden="true"></i> Delete</button>
                                            </form>
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