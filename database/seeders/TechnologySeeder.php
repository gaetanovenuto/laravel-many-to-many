<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Helpers
use Illuminate\Support\Facades\Schema;

// Model
use App\Models\Technology;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function() {
            Technology::truncate();
        });

        $allTechnologies = [
            'Android',
            'Windows',
            'iOS',
            'Linux'
        ];
        
        foreach ($allTechnologies as $singleTechnology) {
            $Technology = Technology::create([
                'name' => $singleTechnology,
                'slug' => str()->slug($singleTechnology)
            ]);
        }
    }
}
