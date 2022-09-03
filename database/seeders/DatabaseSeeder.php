<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();

        $admin = \App\Models\Admin::where('email', 'admin@abc.com')->first();

        if(! $admin) {

            // create default administrator account

            \App\Models\Admin::factory()->create([
                'name' => 'Adminstrator',
                'email' => 'admin@abc.com',
            ]);

        }

        
    }
}
