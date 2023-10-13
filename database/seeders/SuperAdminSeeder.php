<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdmin = [
            ['id'=>'1','name'=>'Super Admin','email'=>'superadmin@gmail.com','password'=>'$2a$12$uEsIvaaCh6FHn7vQad0ntu4Psd6ORf6QiCw.ZYUgvZsxDOXbz1qB.'],
            ['id'=>'2','name'=>'Admin','email'=>'admin@gmail.com','password'=>'$2a$12$FFjNQJDOeTRnG6Mx07XA7eTtoxBnbpOyggtdHP7Tl4CmryIG7IHui'],
        ];
        User::insert($superAdmin);
    }
}
