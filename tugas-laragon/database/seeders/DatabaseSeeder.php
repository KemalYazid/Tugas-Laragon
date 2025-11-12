<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Article;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(RoleSeeder::class); // Tambahkan ini dulu

        User::factory()->create([
            'name' => 'Kemal',
            'email' => '230705207@student.ar-raniry.ac.id',
            'role_id' => 1, 
            'password' => bcrypt('12345678'),
        ]);

        Article::factory()->create([
            'title' => 'project laragon',
            'content' => 'Lorem ipsum',
            'user_id' => 1,
        ]);
    }
}
