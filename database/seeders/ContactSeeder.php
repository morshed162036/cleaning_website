<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contact = [
            [
                'id' => 1, 'name' => 'alamin','email' => 'alamin017514@gmail.com', 'phone' => '01751492367',
                 'message' => 'this is message', 'map' => 'this is map'

            ]
            ];
            contact::insert($contact);
    }
}
