<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\CobaAksiBerbahaya;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        CobaAksiBerbahaya::create([
            'name' => 'ASU'
        ]);
        CobaAksiBerbahaya::create([
            'name' => 'PEPEQ'
        ]);
        CobaAksiBerbahaya::create([
            'name' => 'JEMBUT'
        ]);
    }
}
