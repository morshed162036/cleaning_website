<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Server\Service\Service_detail;
class ServiceDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $details = [
            ['id'=>'1','service_id'=>'1','image'=>'<p>We provide best marble polish services, Call us now at: 0337-7558080 Unsurprisingly, retail marble has its own charm and uniqueness, but replacing marble flooring every now and then is not possible. At Saaf.pk, we are bringing floor marble polishing services to bring back your floor’s shine. It is far more cost-effective than updating the floorings with the new one, helping you save a few bucks. As for our services, we use comprehensive systems that blend advanced technology and incredible products to provide our customers with the best marble floor polishing and cleaning services. We rely on proven techniques to help the old marble shine. Most importantly, we clean, polish and refinish your marble to give it a fresh and modern look. Whether you have an antique stone or an exclusive one – don’t worry. Our professional marble restoration experts know how to make them look like new ones again. We offer our restoration, refinishing, and maintenance services for:</p><ul><li><strong>Marble floor care.</strong></li><li><strong>Marble tiles maintenance.</strong></li><li><strong>Stain removal.</strong></li><li><strong>Grout cleaning.</strong></li><li><strong>Tile repair services.</strong></li><li><strong>Marble polishing.</strong></li></ul>
                ','our_plan'=>'<p>At Saaf.pk, customer satisfaction comes before anything else. We promise to bring new life to your old-fashioned and outdated marble floors by giving them a fresh coat of polish.</p><p>Our marble cleaning and polishing team is well-trained, providing high-quality and professional services across Karachi. We have a comprehensive range of chemical cleaning and polishing measures to make sure there is no dirt or debris left around any corners of the floor. Likewise, our team will remove all kinds of damage such as scratches, stains, fading colors, and deep-rooted stains. We will resurface the marble to remove all the oil and grime while eradicating the deep scratches into the surface. Thus, all your marble floors will come out as polished and new-looking tiles.</p><p>So, are you ready to unleash the charm of old floorings? Get in touch with your marble polishing team and make your home shine again.</p>']
        ];
        Service_detail::insert($details);
    }
}
