<?php

use Illuminate\Database\Seeder;
use  Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // $this->call('AdminSeeder');
        // $this->command->info('Admin table seeded!');

        $this->call('UserTypeSeeder');
        $this->command->info('User Types table seeded!');

        $this->call('ClassNameSeeder');
        $this->command->info('Class names table seeded!');

        $this->call('DataFileTypeSeeder');
        $this->command->info('Data File Types table seeded!');

        //Creating Data
        $this->call('CreateSubjects');
        $this->command->info('Subject table seeded!');

        $this->call('CreateClassSubjectContent');
        $this->command->info('Class Subject table seeded!');

        $this->call('FileTypeSeeder');
        $this->command->info('FileType table seeded!');

        $this->call('WebsiteContentSeeder');
        $this->command->info('Website Contents table seeded!');

        $this->call('FeedbackGradeSeeder');
        $this->command->info('Feedback Grade table seeded!');

        $this->call('AdminSeeder');
        $this->command->info('Admin seeded!');
    }
}
