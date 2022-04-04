<?php

namespace Database\Seeders;

use App\Models\Zanr;
use Illuminate\Database\Seeder;

class zanrovi extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Zanr::create([
            'zanr' => 'Drama'
        ]);

        Zanr::create([
            'zanr' => 'Epska fantastika'
        ]);

        Zanr::create([
            'zanr' => 'Komedija'
        ]);
    }
}
