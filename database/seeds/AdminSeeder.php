<?php

use App\User;
use App\UserType;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Admin::truncate();

        // if( env('APP_ENV') == 'development')
        User::create(['email' => 'admin@admin.com', 'name' => 'admin', 'password' => bcrypt('admin@1234'), 'type_id' => UserType::where('type','admin')->value('id')]);

    }
}
