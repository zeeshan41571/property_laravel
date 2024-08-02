<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage User Roles') }}
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
                    <a href="{{ route('createUserRole') }}" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Create New</a>
                    <br><br>
                    <table class="table table-striped" width='100%'>
                        <thead>
                            <tr class="text-left">
                              <th class="border text-left" style="text-align: left;">Role Name</th>
                              <th class="border text-left" style="text-align: left;">Actions</th>
                            </tr>
                          </thead>
                        <tbody>
                            @if ($roles->isEmpty())
                                <tr>
                                    <td colspan="2" class="border text-center">No records found</td>
                                </tr>
                            @else
                                @foreach ($roles as $role)
                                    <tr>
                                        <td class="border">{{ $role->name }}</td>
                                        <td class="border">
                                            <a class="btn btn-warning" href="{{ route('roles.edit', $role->id) }}"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a> | 
                                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this role?')"><i class="fa fa-times" aria-hidden="true"></i> Delete</button>
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