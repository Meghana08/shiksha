<?php

use Illuminate\Database\Seeder;
use App\WebsiteContent;
use App\FileType;

class WebsiteContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('website_contents')->delete();
        
        // if( env('APP_ENV') == 'development') {
                WebsiteContent::create([
                    'title' => 'About Us', 
                    'content' => 'Content Here....',
                    'file_type' => FileType::where('type','text')->value('id')
                ]);
                WebsiteContent::create([
                    'title' => 'Contact Numbers', 
                    'content' => '9990158844, 9990158847',
                    'file_type' => FileType::where('type','text')->value('id')
                ]);
                WebsiteContent::create([
                    'title' => 'Email ID', 
                    'content' => 'shiksha@gmail.com',
                    'file_type' => FileType::where('type','text')->value('id')
                ]);
                WebsiteContent::create([
                    'title' => 'Team Member 1 Name', 
                    'content' => 'Kapil Sahdev',
                    'file_type' => FileType::where('type','text')->value('id')
                ]);
                WebsiteContent::create([
                    'title' => 'Team Member 2 Name', 
                    'content' => 'Shanky Sahdev',
                    'file_type' => FileType::where('type','text')->value('id')
                ]);
                WebsiteContent::create([
                    'title' => 'Team Member 3 Name', 
                    'content' => 'Content Here',
                    'file_type' => FileType::where('type','text')->value('id')
                ]);
                WebsiteContent::create([
                    'title' => 'About Team Member 1', 
                    'content' => 'Content Here',
                    'file_type' => FileType::where('type','text')->value('id')
                ]);
                WebsiteContent::create([
                    'title' => 'About Team Member 2', 
                    'content' => 'Content Here',
                    'file_type' => FileType::where('type','text')->value('id')
                ]);
                WebsiteContent::create([
                    'title' => 'About Team Member 3', 
                    'content' => 'Content Here',
                    'file_type' => FileType::where('type','text')->value('id')
                ]);
                WebsiteContent::create([
                    'title' => 'Image Team Member 1', 
                    'content' => 'teamMember1.PNG',
                    'file_type' => FileType::where('type','image')->value('id')
                ]);
                WebsiteContent::create([
                    'title' => 'Image Team Member 2', 
                    'content' => 'teamMember2.PNG',
                    'file_type' => FileType::where('type','image')->value('id')
                ]);
                WebsiteContent::create([
                    'title' => 'Image Team Member 3', 
                    'content' => 'teamMember3.PNG',
                    'file_type' => FileType::where('type','image')->value('id')
                ]);
            // }
        $this->command->info('Web Content data made!');
    }
}
