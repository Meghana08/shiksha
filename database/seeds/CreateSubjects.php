<?php

use Illuminate\Database\Seeder;
use App\Subject;

class CreateSubjects extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->delete();
        
        $data = [
            ['name' => 'English-A'], 
            ['name' => 'English-B'], 
            ['name' => 'Hindi-A'],
            ['name' => 'Hindi-B'],
            ['name' => 'Mathematics'],
            ['name' => 'Science'],
            ['name' => 'Social Studies'],
            ['name' => 'Physics'],
            ['name' => 'Chemistry'],
            ['name' => 'Biology'],
            ['name' => 'Computer Science'],
            ['name' => 'Information Practices'],
            ['name' => 'History'],
            ['name' => 'Political Science']
        ];
           
        foreach ($data as $value) {
            Subject::create($value);
        }
    }
}
