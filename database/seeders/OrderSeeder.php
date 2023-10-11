<?php

namespace Database\Seeders;

use App\Models\Server\Order;
use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $order = [
            [
                'id' => 1,
                "service_id" => 1,
                'name' => 'mehejabul',
                'email' => 'mehejabul@gmail.com',
                'phone' => '01714294499',
                'address' => 'mirpur',
                'description' => 'This is my website',
                'date' => '2023-12-10',
                'start_time'=> '10:30:00',
                'end_time' => '15:30:00',
            ],
        ];
        Order::insert($order);

    }
}
