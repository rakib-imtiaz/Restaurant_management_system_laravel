@extends('layouts.admin')

@section('title', 'Edit Menu Item')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-lg shadow-lg p-6">
        <h2 class="text-2xl font-semibold mb-6">Edit Menu Item</h2>

        <form action="{{ route('admin.menu.update', $menuItem) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Name</label>
                    <input type="text" name="name" value="{{ $menuItem->name }}" required
                        class="w-full border rounded px-3 py-2">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Category</label>
                    <select name="category_id" required class="w-full border rounded px-3 py-2">
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ $menuItem->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Price</label>
                    <input type="number" step="0.01" name="price" value="{{ $menuItem->price }}" required
                        class="w-full border rounded px-3 py-2">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Description</label>
                    <textarea name="description" rows="3"
                        class="w-full border rounded px-3 py-2">{{ $menuItem->description }}</textarea>
                </div>

                <div class="flex items-center">
                    <input type="checkbox" name="is_available" id="is_available"
                        {{ $menuItem->is_available ? 'checked' : '' }}>
                    <label for="is_available" class="ml-2">Available</label>
                </div>
            </div>

            <div class="mt-6 flex justify-end space-x-3">
                <a href="{{ route('admin.menu.index') }}"
                    class="px-4 py-2 border rounded">Cancel</a>
                <button type="submit"
                    class="px-4 py-2 bg-gold text-white rounded">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection