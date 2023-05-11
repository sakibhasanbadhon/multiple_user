<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'name' =>'admin',
            'slug' =>'admin',
        ]);

        Role::create([
            'name' =>'provider',
            'slug' =>'provider',
        ]);

        Role::create([
            'name' =>'customer',
            'slug' =>'customer',
        ]);
    }
}
