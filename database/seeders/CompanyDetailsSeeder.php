<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Server\Company_detail;
class CompanyDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $details = [
            ['id'=>'1','name'=>'Zaqiq Ltd','logo'=>'logo.png','favicon'=>'zariq.ico','address'=>'3261 Anmoore Road Brooklyn, NY 11230','phone'=>'800-123-4567','email'=>'officeone@youremail.com','fax'=>'718-724-3312','operation_hour_1'=>'Mon-Fri: 9:00 am – 5:00 pm','operation_hour_2'=>'Sat-Sun: 11:00 am – 16:00 pm','facebook'=>'facebook.com','twitter'=>'twitter.com','instagram'=>'instagram.com','google_location'=>'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3649.502632496308!2d90.36887467597413!3d23.83627908547274!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c1c04f0fa3e1%3A0x5c6ce6e4c2a632e1!2sZariq%20Ltd!5e0!3m2!1sen!2sbd!4v1696528965423!5m2!1sen!2sbd']
        ];
        Company_detail::insert($details);
    }
}
