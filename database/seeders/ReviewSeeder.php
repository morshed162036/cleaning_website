<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Server\Review;
class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reviews = [
            ['id'=>'1','name'=>'Shirley R. Sanchez.','review'=>'They are very professional and do a great job cleaning the house!! I locked myself out of my house the other day and they were the only ones with a key. They were kind
            enough to drive over to unlock the door. That speaks volumes!!! They really care
            about their clients.','image'=>'author-2.png','position'=>'Evanston, Illinois'],
            ['id'=>'2','name'=>'Jesse Hudson.','review'=>'As a handyman with some of the same clients, I see not only the incredible job Cleaning Company do, but how much her clients appreciate the attention to detail,
            care, and products used. When they leave a job the place is not only expertly clean
            but it always feels and smells that way when you walk in the door!','image'=>'author-1.png','position'=>'Dothan, Alabama']
            
        ];
        Review::insert($reviews);
    }
}
