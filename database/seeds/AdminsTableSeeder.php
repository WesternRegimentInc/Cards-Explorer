<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::table('admins')->insert([
		    'name'           => 'Abiye Chris. I. Surulere',
		    'email'          => 'suruabiye@gmail.com',
		    'phone'          => '0803000000',
		    'password'          => bcrypt('chris'),
		    'post'           => 'Administrator',
		    'remember_token' => str_random(60),
		    'avatar' => 'images/user.png',
		    'created_at' => Carbon\Carbon::now(),
		    'updated_at' => Carbon\Carbon::now(),
	    ]);
    }
}
