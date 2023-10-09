<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(SuperAdminSeeder::class);
        $this->call(BannerSeeder::class);
        $this->call([ServiceSeeder::class,ServiceDetailsSeeder::class]);
        $this->call([ReviewSeeder::class]);
        $this->call([CounterSeeder::class]);
        $this->call([CompanyDetailsSeeder::class]);
        $this->call([AboutCompanySeeder::class]);
        $this->call([TeamMemberSeeder::class]);
        $this->call([GallerySeeder::class]);
        $this->call([ContactSeeder::class]);
        $this->call([About_TabSeeder::class]);
        $this->call([pricingPlaneSeeder::class]);
        $this->call([BlogCategorySeeder::class]);
        $this->call([BlogPostSeeder::class]);

    }
}
