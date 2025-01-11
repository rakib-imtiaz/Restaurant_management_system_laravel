@extends('layouts.admin')

@section('title', 'Manage Tables')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <h2 class="text-2xl font-semibold">Restaurant Tables</h2>
    <button onclick="document.getElementById('addTableModal').classList.remove('hidden')"
        class="bg-gold text-white px-4 py-2 rounded hover:bg-opacity-90">
        Add New Table
    </button>
</div>

<!-- Tables Grid -->
<div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
    @foreach($tables as $table)
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex justify-between items-start mb-4">
            <div>
                <h3 class="text-xl font-semibold">Table #{{ $table->table_number }}</h3>
                <p class="text-gray-600">Capacity: {{ $table->capacity }} persons</p>
            </div>
            <span class="px-2 py-1 rounded-full text-sm {{ $table->is_available ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                {{ $table->is_available ? 'Available' : 'Occupied' }}
            </span>
        </div>

        <div class="flex space-x-3">
            <button onclick="editTable({{ $table->id }})"
                class="text-blue-600 hover:text-blue-900">Edit</button>
            <form action="{{ route('admin.tables.destroy', $table) }}" method="POST"
                onsubmit="return confirm('Are you sure you want to delete this table?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
            </form>
        </div>
    </div>
    @endforeach
</div>

<!-- Add Table Modal -->
<div id="addTableModal" class="fixed inset-0 bg-black bg-opacity-50 hidden">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-md">
            <div class="p-6">
                <h3 class="text-xl font-semibold mb-4">Add New Table</h3>
                <form action="{{ route('admin.tables.store') }}" method="POST">
                    @csrf
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium mb-1">Table Number</label>
                            <input type="number" name="table_number" required
                                class="w-full border rounded px-3 py-2">
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-1">Capacity</label>
                            <input type="number" name="capacity" required
                                class="w-full border rounded px-3 py-2">
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox" name="is_available" id="is_available" checked>
                            <label for="is_available" class="ml-2">Available</label>
                        </div>
                    </div>

                    <div class="mt-6 flex justify-end space-x-3">
                        <button type="button"
                            onclick="document.getElementById('addTableModal').classList.add('hidden')"
                            class="px-4 py-2 border rounded">Cancel</button>
                        <button type="submit"
                            class="px-4 py-2 bg-gold text-white rounded">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection