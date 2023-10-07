<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Server\Banner;
class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $banners = [
            ['id'=>'1','image'=>'marbel_polish-1.jpg','first_text'=>'Welcome to','second_text'=>'ProClena Marble crystallization & Polishing'],
            ['id'=>'2','image'=>'marbel_polish-2.jpg','first_text'=>'We are a Group of Professionals','second_text'=>'We are dedicatedly engaged in this field'],
            ['id'=>'3','image'=>'marbel_polish-3.jpg','first_text'=>'So Fresh & So Clean...','second_text'=>'We Promise!'],
        ];
        Banner::insert($banners);
    }
}
