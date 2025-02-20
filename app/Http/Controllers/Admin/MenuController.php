<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuItem;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index()
    {
        $menuItems = MenuItem::with('category')->latest()->paginate(10);
        $categories = Category::all();
        return view('admin.menu.index', compact('menuItems', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.menu.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'is_available' => 'nullable|boolean',
            'is_featured' => 'nullable|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'image_url' => 'nullable|string'
        ]);

        // Set default values for boolean fields
        $validated['is_available'] = $request->has('is_available');
        $validated['is_featured'] = $request->has('is_featured');

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('menu-items', 'public');
            $validated['image_url'] = Storage::url($imagePath);
        } elseif ($request->filled('image_url')) {
            $validated['image_url'] = $request->image_url;
        }

        // Create the menu item
        $menuItem = MenuItem::create($validated);

        return redirect()->route('admin.menu.index')
            ->with('success', 'Menu item created successfully');
    }

    public function edit(MenuItem $menuItem)
    {
        $categories = Category::all();
        return view('admin.menu.edit', compact('menuItem', 'categories'));
    }

    public function update(Request $request, MenuItem $menuItem)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'is_available' => 'nullable|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'image_url' => 'nullable|string'
        ]);

        // Handle is_available checkbox
        $validated['is_available'] = $request->boolean('is_available');

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists and is not an external URL
            if ($menuItem->image_url && !str_starts_with($menuItem->image_url, 'http')) {
                Storage::delete('public/' . str_replace('/storage/', '', $menuItem->image_url));
            }

            $imagePath = $request->file('image')->store('menu-items', 'public');
            $validated['image_url'] = Storage::url($imagePath);
        } elseif ($request->filled('image_url')) {
            $validated['image_url'] = $request->image_url;
        }

        // Update the menu item with all fields
        $menuItem->fill($validated);
        $menuItem->save();

        return redirect()->route('admin.menu.index')
            ->with('success', 'Menu item updated successfully');
    }

    public function destroy(MenuItem $menuItem)
    {
        $menuItem->delete();

        return redirect()->route('admin.menu.index')
            ->with('success', 'Menu item deleted successfully');
    }
}
