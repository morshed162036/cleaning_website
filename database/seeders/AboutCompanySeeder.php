<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Server\About_company;
class AboutCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $about_company = [
            ['id'=>'1','title'=>'More than 10 years of cleaning experience','pera_1'=>'Proclena is one of the best marble polishing services and crystallization providers in Dubai. We clean marbles and remove all dust to make them look as good as new. We use cut and polish technique to remove the scratches on the marble surface and get back its shine.','pera_2'=>'Proclena has high reputation as one of the leading and professional marble polishing Company in Dubai. Deeply stained spots are removed by Grinding, re-polishing, and crystallization of marble. We at Primo offer you various AMC packages depending on the customer’s need. Commercial property such as a hotel might require marble polishing every week as it has a high proportion of footfall a day. A residential property may only need marble polishing to be carried out annually as there may be only a few members of the household. Be it quarterly, monthly, or annually, we customize the package as per the client’s need and budget.','our_mission'=>'At [Your Company Name], our mission is to elevate the quality of living and working spaces through expert cleaning and maintenance services. We are dedicated to delivering excellence in every aspect of our work, from restoring the luster of marble surfaces to ensuring the efficient operation of HVAC systems. We take pride in enhancing indoor air quality, promoting hygiene, and contributing to the overall well-being of our clients. Our commitment to professionalism, reliability, and environmental responsibility drives us to consistently exceed customer expectations, making every space we touch cleaner, safer, and more comfortable.','our_vision'=>'Our vision at [Your Company Name] is to be the leading provider of cleaning and maintenance solutions, setting the industry standard for quality and innovation. We envision a future where every home, office, and commercial space enjoys the benefits of a pristine environment. To realize this vision, we continuously invest in cutting-edge technology, sustainable practices, and a skilled workforce. We aspire to expand our reach and offer our services to a global clientele while remaining firmly rooted in our commitment to personalized customer care. By adhering to our core values of excellence, integrity, and environmental stewardship, we aim to create a world where cleanliness is synonymous with well-being.']
        ];
        About_company::insert($about_company);
    }
}
