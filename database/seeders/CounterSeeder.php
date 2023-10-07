<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Server\Counter;
class CounterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $counter = [
            ['id'=>'1','customers'=>'1500','service_guarantee'=>'100','services'=>'30','seevices_completed'=>'1000']
        ];
        Counter::insert($counter);
    }
}
