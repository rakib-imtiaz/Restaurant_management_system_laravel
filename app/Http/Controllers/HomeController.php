<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.home');
    }

    public function menu()
    {
        $menuItems = [
            'Starters' => [
                [
                    'name' => 'Classic Bruschetta',
                    'description' => 'Toasted garlic bread topped with fresh tomatoes, basil and extra virgin olive oil',
                    'price' => 8.50,
                    'image' => 'https://images.unsplash.com/photo-1572695157366-5e585ab2b69f?q=80&w=1974&auto=format&fit=crop'
                ],
                [
                    'name' => 'Fresh Caprese Salad',
                    'description' => 'Sliced fresh mozzarella with tomatoes and basil, drizzled with balsamic glaze',
                    'price' => 12.00,
                    'image' => 'https://images.unsplash.com/photo-1608797178974-15b35a6bedc7?q=80&w=2070&auto=format&fit=crop'
                ],
            ],
            'Pasta Dishes' => [
                [
                    'name' => 'Classic Carbonara',
                    'description' => 'Spaghetti with creamy egg sauce, crispy bacon, parmesan cheese and black pepper',
                    'price' => 16.50,
                    'image' => 'https://images.unsplash.com/photo-1612874742237-6526221588e3?q=80&w=2071&auto=format&fit=crop'
                ],
                [
                    'name' => 'Spicy Tomato Penne',
                    'description' => 'Penne pasta in a spicy tomato sauce with garlic and fresh chili',
                    'price' => 14.00,
                    'image' => 'https://images.unsplash.com/photo-1563379926898-05f4575a45d8?q=80&w=2070&auto=format&fit=crop'
                ],
            ],
            'Wood-Fired Pizzas' => [
                [
                    'name' => 'Classic Margherita',
                    'description' => 'Fresh tomato sauce, mozzarella cheese, fresh basil and olive oil',
                    'price' => 15.00,
                    'image' => 'https://images.unsplash.com/photo-1604068549290-dea0e4a305ca?q=80&w=2067&auto=format&fit=crop'
                ],
                [
                    'name' => 'Four Cheese Special',
                    'description' => 'Blend of four Italian cheeses: mozzarella, gorgonzola, parmesan, and fontina',
                    'price' => 17.50,
                    'image' => 'https://images.unsplash.com/photo-1513104890138-7c749659a591?q=80&w=2070&auto=format&fit=crop'
                ],
            ],
            'Desserts' => [
                [
                    'name' => 'Classic Tiramisu',
                    'description' => 'Coffee-flavored Italian dessert made with mascarpone cheese and cocoa',
                    'price' => 8.00,
                    'image' => 'https://images.unsplash.com/photo-1551529674-48920e9b835b?q=80&w=1964&auto=format&fit=crop'
                ],
                [
                    'name' => 'Vanilla Panna Cotta',
                    'description' => 'Silky smooth vanilla cream dessert served with fresh berry sauce',
                    'price' => 7.50,
                    'image' => 'https://images.unsplash.com/photo-1488477181946-6428a0291777?q=80&w=1974&auto=format&fit=crop'
                ],
            ],
        ];

        return view('pages.menu', compact('menuItems'));
    }

    public function events()
    {
        return view('pages.events');
    }

    public function story()
    {
        return view('pages.story');
    }

    public function reservations()
    {
        return view('pages.reservation');
    }
}
