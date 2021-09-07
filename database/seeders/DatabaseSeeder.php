<?php

namespace Database\Seeders;

use App\Models\Commentaire;
use App\Models\Video;
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
        Video::factory(10)->create();
        Commentaire::factory(20)->create();
        
    }
}
