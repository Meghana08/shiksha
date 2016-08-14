<?php

use Illuminate\Database\Seeder;
use App\UserType;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_types')->delete();
        
        $data = [
            ['type' => 'admin'], 
            ['type' => 'student'], 
            ['type' => 'teacher']
        ];
           
        foreach ($data as $value) {
            UserType::create($value);
        }
    }
}
