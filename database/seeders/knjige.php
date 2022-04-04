<?php

namespace Database\Seeders;

use App\Models\Knjiga;
use Illuminate\Database\Seeder;

class knjige extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 50; $i++){
            Knjiga::create([
                'naziv' => $faker->sentence(1),
                'autor' => $faker->name,
                'procitano' => rand(0,1),
                'ocena' => rand(1,10),
                'zanrId' => rand(1,3)
            ]);
        }
    }
}
