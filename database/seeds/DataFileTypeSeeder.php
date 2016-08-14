<?php

use Illuminate\Database\Seeder;
use App\DataFileType;

class DataFileTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('data_file_types')->delete();
        
        $data = [
            // ['type' => 'Syllabus'], 
            ['type' => 'Sample Papers'],
            ['type' => 'Previous Year Papers'],
            ['type' => 'Key Notes'],
            // ['type' => 'Reference Material']
        ];
           
        foreach ($data as $value) {
            DataFileType::create($value);
        }
    }
}
