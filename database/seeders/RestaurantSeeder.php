<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\Category;
use App\Models\MenuItem;
use App\Models\Table;

class RestaurantSeeder extends Seeder
{
    public function run()
    {
        // Create roles
        $adminRole = Role::create(['name' => 'admin']);
        $staffRole = Role::create(['name' => 'staff']);
        $customerRole = Role::create(['name' => 'customer']);

        // Create admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@restaurant.com',
            'password' => bcrypt('password'),
            'role_id' => $adminRole->id,
        ]);

        // Create categories
        $categories = ['Main Course', 'Appetizers', 'Desserts', 'Drinks'];
        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }

        // Create tables
        for ($i = 1; $i <= 10; $i++) {
            Table::create([
                'table_number' => $i,
                'capacity' => rand(2, 8),
                'is_available' => true,
            ]);
        }

        // Create sample menu items
        $menuItems = [
            ['name' => 'Spaghetti Carbonara', 'price' => 15.99, 'category_id' => 1],
            ['name' => 'Caesar Salad', 'price' => 8.99, 'category_id' => 2],
            ['name' => 'Tiramisu', 'price' => 7.99, 'category_id' => 3],
            ['name' => 'House Wine', 'price' => 6.99, 'category_id' => 4],
        ];

        foreach ($menuItems as $item) {
            MenuItem::create([
                'name' => $item['name'],
                'description' => 'Delicious ' . $item['name'],
                'price' => $item['price'],
                'category_id' => $item['category_id'],
                'is_available' => true,
            ]);
        }
    }
} 