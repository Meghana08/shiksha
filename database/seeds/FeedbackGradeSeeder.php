<?php

use Illuminate\Database\Seeder;
use App\FeedbackGrade;

class FeedbackGradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('feedback_grades')->delete();
        
        $data = [
            ['name' => 'poor'],
            ['name' => 'average'],
            ['name' => 'good'],
            ['name' => 'excellent'],
            ['name' => 'outstanding']
        ];
           
        foreach ($data as $value) {
            FeedbackGrade::create($value);
        }
    }
}
