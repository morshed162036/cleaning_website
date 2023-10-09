<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Server\Blog\Blog_post;
class BlogPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            ['id'=>'1','category_id'=>'1','title'=>'Hiring A Great Housekeeper','image'=>'blog-post-img-4.jpg','created_at'=>'2023-09-10','post'=>'<p>Hiring just the right housekeeper can be life-altering for the busy family. Now this may seem to be a little over-the-top, but I am serious. Think about your life-whether single, a couple or a family-you have no time. No time to keep your home as organized or clean as you would like. No time to do the smaller tidying jobs that would make a huge difference.</p><blockquote><p><i>Maybe you struggle to fold laundry, clean ovens and counter tops, or scrub bathrooms. Maybe you need to clean your house fast for a party, need a hotel maid to help scrub motel rooms, or are looking for a professional to help with hospital housekeeping.</i></p><p><i>It seems cliched to say it, but often we let things slip through the cracks. We spend too much time thinking about them, too much energy worrying about them. You deserve a house cleaner or home maker to make your life easier. You deserve professional house cleaning, or a dedicated housekeeper.</i></p></blockquote><p>And here enters great housekeeping. Now to be realistic, all relationships whether working or personal, have a starting point, and with the right match, can grow into something much more. It is certainly so with a new housekeeper. You look for certain qualities in a person, offer them a job and hope that it was a good choice.</p><p>went to the opinions of my friends. I asked each of them the same question. "What is the one quality that you would have to have to see when hiring a new housekeeper?" Below, I have distilled down their answers.</p>'],
        ];
        Blog_post::insert($posts);
    }
}
