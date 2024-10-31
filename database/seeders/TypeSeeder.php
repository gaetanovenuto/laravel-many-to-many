<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Helpers
use Illuminate\Support\Facades\Schema;

// Model
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Schema::withoutForeignKeyConstraints(function () {
            Type::truncate();
        });

        $allTypes = [
            'FrontEnd',
            'BackEnd',
            'FullStack',
            'AI',
            'WebDesign'
        ];
        
        foreach ($allTypes as $singleType) {
            $type = Type::create([
                'name' => $singleType,
                'slug' => str()->slug($singleType),
            ]);
        }
    }
}
