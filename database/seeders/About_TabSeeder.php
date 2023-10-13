<?php

namespace Database\Seeders;

use App\Models\Server\About_tab;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class About_TabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $about_tab = [
            ['id' => 1, 'title' => 'How we work', 'description' => 'Here is my company details', 'order' => 1],
            ['id' => 2, 'title' => 'With Us', 'description' => 'Here is my company details ', 'order' => 2],
        ];

        About_tab::insert($about_tab);
    }
}
