<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Server\Blog\Blog_category;
class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $blog_categories = [
            ['id'=>'1','title'=>'Audios'],
            ['id'=>'2','title'=>'Daily Inspiration'],
            ['id'=>'3','title'=>'Freelance'],
            ['id'=>'4','title'=>'Links'],
            ['id'=>'5','title'=>'Mobile']
        ];
        Blog_category::insert($blog_categories);
    }
}
