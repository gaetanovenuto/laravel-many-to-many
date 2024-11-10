<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models

use App\Models\Technology;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $technologies = ['iOS', 'Android', 'Windows', 'Linux'];

        foreach ($technologies as $tech) {
        Technology::create(['name' => $tech]);
        }
    }
}
