<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Collage;
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
        Collage::factory()->create([
          'name' => 'FEI STU',
            'description' => 'Poslaním Fakulty elektrotechniky a informatiky, jednej z najstarších
                technických fakúlt na Slovensku s bohatou vedeckou a výskumnou činnosťou, 
                je poskytovanie kvalitného vzdelávania na báze slobodného vedeckého bádania
                a tvorivej výskumnej práce.',
        ]);
    }
}
