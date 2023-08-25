<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Sami Mansour',
            'email' => 'sami@gmail.com',
            'permissions' => [
                'blog_post-list',
                'blog_post-create',
                'blog_post-update',
                'blog_post-delete'
            ],
        ]);

        User::factory()->create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'permissions' => [
                'blog_post-list'
            ],
        ]);
    }
}
