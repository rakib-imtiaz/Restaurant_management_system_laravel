@extends('layouts.admin')

@section('title', 'Manage Menu Items')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <h2 class="text-2xl font-semibold">Menu Items</h2>
    <button onclick="document.getElementById('addMenuModal').classList.remove('hidden')"
        class="bg-gold text-white px-4 py-2 rounded hover:bg-opacity-90">
        Add New Item
    </button>
</div>

<!-- Menu Items Table -->
<div class="bg-white rounded-lg shadow">
    <table class="min-w-full">
        <thead>
            <tr class="border-b">
                <th class="px-6 py-3 text-left">Name</th>
                <th class="px-6 py-3 text-left">Category</th>
                <th class="px-6 py-3 text-left">Price</th>
                <th class="px-6 py-3 text-left">Status</th>
                <th class="px-6 py-3 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($menuItems as $item)
            <tr class="border-b hover:bg-gray-50">
                <td class="px-6 py-4">
                    <div>{{ $item->name }}</div>
                    <div class="text-sm text-gray-600">{{ Str::limit($item->description, 50) }}</div>
                </td>
                <td class="px-6 py-4">{{ $item->category->name }}</td>
                <td class="px-6 py-4">€{{ number_format($item->price, 2) }}</td>
                <td class="px-6 py-4">
                    <span class="px-2 py-1 rounded-full text-sm {{ $item->is_available ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                        {{ $item->is_available ? 'Available' : 'Unavailable' }}
                    </span>
                </td>
                <td class="px-6 py-4">
                    <div class="flex space-x-3">
                        <button onclick="editMenuItem({{ $item->id }})"
                            class="text-blue-600 hover:text-blue-900">Edit</button>
                        <form action="{{ route('admin.menu.destroy', $item) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this item?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Add Menu Item Modal -->
<div id="addMenuModal" class="fixed inset-0 bg-black bg-opacity-50 hidden">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-md">
            <div class="p-6">
                <h3 class="text-xl font-semibold mb-4">Add New Menu Item</h3>
                <form action="{{ route('admin.menu.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium mb-1">Name</label>
                            <input type="text" name="name" required
                                class="w-full border rounded px-3 py-2">
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-1">Category</label>
                            <select name="category_id" required class="w-full border rounded px-3 py-2">
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-1">Price</label>
                            <input type="number" step="0.01" name="price" required
                                class="w-full border rounded px-3 py-2">
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-1">Description</label>
                            <textarea name="description" rows="3"
                                class="w-full border rounded px-3 py-2"></textarea>
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox" name="is_available" id="is_available" checked>
                            <label for="is_available" class="ml-2">Available</label>
                        </div>
                    </div>

                    <div class="mt-6 flex justify-end space-x-3">
                        <button type="button"
                            onclick="document.getElementById('addMenuModal').classList.add('hidden')"
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