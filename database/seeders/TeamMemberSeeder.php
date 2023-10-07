<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Server\Team_member;
class TeamMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $members = [
            ['id'=>'1','name'=>'Alan Yarbrough','designation'=>'Managing Director','image'=>'team_person_1.jpg','facebook'=>'facebook.com','twitter'=>'twitter.com','instagram'=>'instagram.com','description'=>'Alan started in 1985 and provides the leadership needed to maintain our reputation and goodwill in the community.'],
            ['id'=>'2','name'=>'Wilford Wood','designation'=>'Customer Service Manager','image'=>'team_person_2.jpg','facebook'=>'facebook.com','twitter'=>'twitter.com','instagram'=>'instagram.com','description'=>'He is the direct “pipeline” to our customers to ensure they are being heard and their special needs are being met.'],
            ['id'=>'3','name'=>'Teresa Phillips','designation'=>'Office Administrator','image'=>'team_person_3.jpg','facebook'=>'facebook.com','twitter'=>'twitter.com','instagram'=>'instagram.com','description'=>'Teresa joined our team in 2009. She brings a wealth of knowledge and experience in the accounting field.'],
        ];
        Team_member::insert($members);
    }
}
