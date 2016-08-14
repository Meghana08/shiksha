<?php

use Illuminate\Database\Seeder;
use App\ClassName;

class ClassNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('class_names')->delete();
        
        $data = [
            ['name' => '1'], 
            ['name' => '2'],
            ['name' => '3'],
            ['name' => '4'],
            ['name' => '5'],
            ['name' => '6'],
            ['name' => '7'],
            ['name' => '8'],
            ['name' => '9'],
            ['name' => '10'],
            ['name' => '11'],
            ['name' => '12'],
            ['name' => 'b-com'],
            ['name' => 'bba'],
            ['name' => 'bca'],
            ['name' => 'entrance-bca'],
            ['name' => 'entrance-btech'],
            ['name' => 'entrance-ca'],
            ['name' => 'entrance-cpt'],
            ['name' => 'entrance-cat'],
            ['name' => 'aptitude']
        ];
           
        foreach ($data as $value) {
            ClassName::create($value);
        }
    }
}
