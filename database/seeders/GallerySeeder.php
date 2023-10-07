<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Server\Gallery;
class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $galleries = [
            ['id'=>'1','service_id'=>'3','before'=>'1.jpg','after'=>'1_1.jpg'],
            ['id'=>'2','service_id'=>'3','before'=>'2.jpg','after'=>'2_1.jpg'],
            ['id'=>'3','service_id'=>'6','before'=>'8.jpg','after'=>'8_1.jpg'],
        ];
        Gallery::insert($galleries);
    }
}
