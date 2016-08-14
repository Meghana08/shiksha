<?php

use Illuminate\Database\Seeder;
use App\ClassSubject;
use App\ClassName;
use App\Subject;
use Faker\Factory;

class CreateClassSubjectContent extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('class_subjects')->delete();
        

    	for ($i=1; $i<=10 ; $i++) {     		 
			// if( env('APP_ENV') == 'development') {
    			ClassSubject::create([
    				'class_id' => ClassName::where('name',$i)->value('id'), 
    				'subject_id' => Subject::where('name','English-A')->value('id')]);
    			ClassSubject::create([
    				'class_id' => ClassName::where('name',$i)->value('id'), 
    				'subject_id' => Subject::where('name','English-B')->value('id')]);
    			ClassSubject::create([
    				'class_id' => ClassName::where('name',$i)->value('id'), 
    				'subject_id' => Subject::where('name','Hindi-A')->value('id')]);
    			ClassSubject::create([
    				'class_id' => ClassName::where('name',$i)->value('id'), 
    				'subject_id' => Subject::where('name','Hindi-B')->value('id')]);
    			ClassSubject::create([
    				'class_id' => ClassName::where('name',$i)->value('id'), 
    				'subject_id' => Subject::where('name','Mathematics')->value('id')]);
    			ClassSubject::create([
    				'class_id' => ClassName::where('name',$i)->value('id'), 
    				'subject_id' => Subject::where('name','Science')->value('id')]);
    			ClassSubject::create([
    				'class_id' => ClassName::where('name',$i)->value('id'), 
    				'subject_id' => Subject::where('name','Social Studies')->value('id')]);
			// }    	
    	}

    	$this->command->info('ClassSubject content data made!');
    }
}