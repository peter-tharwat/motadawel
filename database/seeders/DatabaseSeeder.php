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

        
	   if(!\App\Models\User::where('email','admin@admin.com')->count())
        \App\Models\User::create([
        	 'name'=>'admin',
        	 'email'=>'admin@admin.com',
        	 'password'=>bcrypt('password'),
        	 'power'=>'ADMIN'
        ]);
      if(!\App\Models\User::where('email','user@admin.com')->count())
        \App\Models\User::create([
        	 'name'=>'user',
        	 'email'=>'user@admin.com',
        	 'password'=>bcrypt('password'),
        	 'power'=>'USER'
        ]);

    $setting=\App\Models\Setting::first();
    if($setting==null)
        \App\Models\Setting::create();
        
    }
}