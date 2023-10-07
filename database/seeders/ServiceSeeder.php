<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Server\Service\Service;
class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            ['id'=>'1','title'=>'Marble crystallization & Polishing','image'=>'marbel-polish-home.jpg','status'=>'Attach'],
            ['id'=>'2','title'=>'AC installation and maintenance','image'=>'ac repair.jpg','status'=>'Empty'],
            ['id'=>'3','title'=>'Sofa and carpet shampooing','image'=>'sofa&carpet.jfif','status'=>'Empty'],
            ['id'=>'4','title'=>'kitchen hood cleaning','image'=>'kitchen-hood-cleaning.jpg','status'=>'Empty'],
            ['id'=>'5','title'=>'Plumber work','image'=>'plumbing.jpg','status'=>'Empty'],
            ['id'=>'6','title'=>'Water tank & grease trap cleaning','image'=>'water-tank cleaning.jpg','status'=>'Empty']
        ];

        Service::insert($services);
    }
}
