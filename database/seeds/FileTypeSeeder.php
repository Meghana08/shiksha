<?php

use Illuminate\Database\Seeder;
use App\FileType;

class FileTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('website_contents')->delete();
        
        $data = [
            ['type' => 'text'],
            ['type' => 'image'],
            ['type' => 'video'],
            ['type' => 'audio'],
            ['type' => 'ppt'],
            ['type' => 'pdf']
        ];
           
        foreach ($data as $value) {
            FileType::create($value);
        }
    }
}
