<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Server\Pricingplane;

class pricingPlaneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          $package = [
            ['id' => 1, 'title' => 'standard package', 'price' => 100, 'details' => "this is our pricing plane"],
        ];

        PricingPlane::insert($package);
    }
}
