<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();
        $types = Type::all();
        $technologies = Technology::all();
      
        for ($i = 0; $i < 25; $i++) {
            
            $project = Project::create([
                'name' => $faker->sentence(3),
                'slug' => Str::slug($faker->sentence(3)),
                'image' => $faker->imageUrl(320, 240, 'business', true),
                'type_id' => $types->random()->id,
            ]);

            $project->technologies()->attach($technologies->random(rand(1, 3))->pluck('id'));
        }
    }
}