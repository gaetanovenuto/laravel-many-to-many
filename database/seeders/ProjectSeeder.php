<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Model
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Project::truncate();
        
        for($i=0; $i<25; $i++) {

            $projectName = fake()->sentence();
            $sluggedName = str()->slug($projectName);

            Project::create([
                'name' => $projectName,
                'description' => fake()->paragraph(),
                'slug' => $sluggedName,
                'creation_date' => date('Y/m/d h/i/m'),
                'expiring_date' => fake()->dateTimeThisMonth('+7 days'),
                'label_tag' => fake()->word(),
                'price' => rand(0, 1000),
                'completed' => fake()->boolean(),
            ]);

        }
    }
}