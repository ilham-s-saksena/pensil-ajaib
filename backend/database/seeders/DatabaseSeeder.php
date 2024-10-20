<?php

namespace Database\Seeders;

// use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
  public function run()
{
    User::create([
        'name' => 'Admin',
        'email' => 'admin@example.com',
        'password' => bcrypt('adminpassword'),
        'role' => 'admin',
    ]);

    Category::create(['name' => 'Web Development']);
    Category::create(['name' => 'Design Grafis']);
}
}
