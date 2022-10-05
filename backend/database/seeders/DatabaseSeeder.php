<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Collage;
use App\Models\Rating;
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
        $user =  User::factory()->create([
            'name' => 'test',
            'email' => 'email@email.com',
            'password' => bcrypt('test123')
        ]);

        $collage = Collage::factory()->create([
            'name' => 'FEI STU',
            'description' => 'Poslaním Fakulty elektrotechniky a informatiky, jednej z najstarších
                technických fakúlt na Slovensku s bohatou vedeckou a výskumnou činnosťou, 
                je poskytovanie kvalitného vzdelávania na báze slobodného vedeckého bádania
                a tvorivej výskumnej práce.',
        ]);

        Rating::factory()->create([
            'user_id' => $user->id,
            'collage_id' => $collage->id,
            'rating' => '3',
            'body' => 'Nic moc akoze'
        ]);
    }
}
