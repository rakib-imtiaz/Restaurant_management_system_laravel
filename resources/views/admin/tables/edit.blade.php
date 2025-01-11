@extends('layouts.admin')

@section('title', 'Edit Table')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-lg shadow-lg p-6">
        <h2 class="text-2xl font-semibold mb-6">Edit Table #{{ $table->table_number }}</h2>

        <form action="{{ route('admin.tables.update', $table) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Table Number</label>
                    <input type="number" name="table_number" value="{{ $table->table_number }}" required
                        class="w-full border rounded px-3 py-2">
                    @error('table_number')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Capacity</label>
                    <input type="number" name="capacity" value="{{ $table->capacity }}" required
                        class="w-full border rounded px-3 py-2">
                    @error('capacity')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center">
                    <input type="checkbox" name="is_available" id="is_available"
                        {{ $table->is_available ? 'checked' : '' }}>
                    <label for="is_available" class="ml-2">Available</label>
                </div>
            </div>

            <div class="mt-6 flex justify-end space-x-3">
                <a href="{{ route('admin.tables.index') }}"
                    class="px-4 py-2 border rounded">Cancel</a>
                <button type="submit"
                    class="px-4 py-2 bg-gold text-white rounded">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection