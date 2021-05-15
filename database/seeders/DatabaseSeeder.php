<?php

namespace Database\Seeders;

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
        //\App\Models\User::factory(10)->create();
        //(new HatabaseSeeder());

        
	 
        \App\Models\User::create([
        	 'name'=>'admin',
        	 'email'=>'admin@admin.com',
        	 'password'=>bcrypt('password'),
        	 'power'=>'ADMIN'
        ]);
        \App\Models\User::create([
        	 'name'=>'user',
        	 'email'=>'user@admin.com',
        	 'password'=>bcrypt('password'),
        	 'power'=>'USER'
        ]);
        \App\Models\Setting::create([]);
    }
}