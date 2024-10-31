<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Technology;

// Helpers
use Illuminate\Support\Facades\Schema;

class ProjectSeeder extends Seeder
{
    /**
        * Run the database seeds.
    */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function() {
            Project::truncate();
        });

        
        $technologies = Technology::all();

        for ($i = 0; $i < 25; $i++) {
            $projectName = fake()->sentence();
            $sluggedName = str()->slug($projectName);

            $project = Project::create([
                'name' => $projectName,
                'description' => fake()->paragraph(),
                'slug' => $sluggedName,
                'creation_date' => now(),
                'expiring_date' => fake()->dateTimeThisMonth('+7 days'),
                'label_tag' => fake()->word(),
                'price' => rand(0, 1000),
                'completed' => fake()->boolean(),
            ]);

            // Associa casualmente delle tecnologie al progetto
            $project->technologies()
                    ->attach($technologies->random(rand(1, 3))->pluck('id')->toArray()
            );
        }
    }
}
