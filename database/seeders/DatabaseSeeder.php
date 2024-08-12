<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    
    public function run()
    {
        $users = User::factory(1)->create();
        $this->call([
            //PostSeeder::class
            // CategorySeeder::class
        ]);
    }
}
