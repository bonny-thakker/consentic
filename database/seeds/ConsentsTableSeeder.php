<?php

use Illuminate\Database\Seeder;

class ConsentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $inserts = [
            [
                'name' => 'Metatarsophalangeal Joint Fusion - Left',
                'info_link' => 'http://legacy.aofas.org/footcaremd/treatments/Pages/First-MTP-Joint-Fusion.aspx',
                'video_url' => 'https://www.youtube.com/watch?v=hT1l9a7jncM',
                'patient_questions' => 1,
                'consent_type_id' => 1,
                'consent_speciality_id' => 2,
                'parse_id' => 'dTwhoxquC1'
            ],
            [
                'name' => 'Metatarsophalangeal Joint Fusion - Right',
                'info_link' => 'http://legacy.aofas.org/footcaremd/treatments/Pages/First-MTP-Joint-Fusion.aspx',
                'video_url' => 'https://www.youtube.com/watch?v=hT1l9a7jncM',
                'patient_questions' => 1,
                'consent_type_id' => 1,
                'consent_speciality_id' => 2,
                'parse_id' => 'Z9IRpAAPKS'
            ],
            [
                'name' => 'Total Hip Replacement - Left',
                'info_link' => 'https://orthoinfo.aaos.org/en/treatment/total-hip-replacement/',
                'video_url' => 'https://www.youtube.com/watch?v=qbi4B30S1LA',
                'patient_questions' => 1,
                'consent_type_id' => 1,
                'consent_speciality_id' => 2,
                'parse_id' => 'MURzfM4Mvo'
            ],
            [
                'name' => 'Total Hip Replacement - Right',
                'info_link' => 'https://orthoinfo.aaos.org/en/treatment/total-hip-replacement/',
                'video_url' => 'https://www.youtube.com/watch?v=qbi4B30S1LA',
                'patient_questions' => 1,
                'consent_type_id' => 1,
                'consent_speciality_id' => 2,
                'parse_id' => 'T6Wuk2mqxh'
            ],
            [
                'name' => 'Cataract Procedure - Left',
                'info_link' => 'https://ranzco.edu/find-out-more-about/cataracts',
                'video_url' => 'https://www.youtube.com/watch?v=fR5aFIWexDc',
                'patient_questions' => 1,
                'consent_type_id' => 1,
                'consent_speciality_id' => 5,
                'parse_id' => 'R43uSxJkOl'
            ],
            [
                'name' => 'Cataract Procedure - Right',
                'info_link' => 'https://ranzco.edu/find-out-more-about/cataracts',
                'video_url' => 'https://www.youtube.com/watch?v=fR5aFIWexDc',
                'patient_questions' => 1,
                'consent_type_id' => 1,
                'consent_speciality_id' => 5,
                'parse_id' => 'JdaaGWTRPq'
            ],
            [
                'name' => 'Ankle Arthroscopy - Left',
                'info_link' => 'https://orthoinfo.aaos.org/en/treatment/arthroscopy/',
                'video_url' => 'https://www.youtube.com/watch?v=rp3UiCk5ZAY',
                'patient_questions' => 1,
                'consent_type_id' => 1,
                'consent_speciality_id' => 2,
                'parse_id' => 'PexsqBrkGt'
            ],
            [
                'name' => 'Ankle Arthroscopy - Right',
                'info_link' => 'https://orthoinfo.aaos.org/en/treatment/arthroscopy/',
                'video_url' => 'https://www.youtube.com/watch?v=rp3UiCk5ZAY',
                'patient_questions' => 1,
                'consent_type_id' => 1,
                'consent_speciality_id' => 2,
                'parse_id' => 'l2jgnawmrU'
            ],
            [
                'name' => 'Knee Arthroscopy - Left',
                'info_link' => 'https://orthoinfo.aaos.org/en/treatment/knee-arthroscopy/',
                'video_url' => 'https://www.youtube.com/watch?v=EhyW8QvaFy0',
                'patient_questions' => 1,
                'consent_type_id' => 1,
                'consent_speciality_id' => 2,
                'parse_id' => 'ZOCjpIl2GY'
            ],
            [
                'name' => 'Knee Arthroscopy - Right',
                'info_link' => 'https://orthoinfo.aaos.org/en/treatment/knee-arthroscopy/',
                'video_url' => 'https://www.youtube.com/watch?v=EhyW8QvaFy0',
                'patient_questions' => 1,
                'consent_type_id' => 1,
                'consent_speciality_id' => 2,
                'parse_id' => 'DPv2UK7aoo'
            ],
            [
                'name' => 'Knee Replacement - Left',
                'info_link' => 'https://orthoinfo.aaos.org/en/treatment/total-knee-replacement/',
                'video_url' => 'https://www.youtube.com/watch?v=2spU3KM82S4',
                'patient_questions' => 1,
                'consent_type_id' => 1,
                'consent_speciality_id' => 2,
                'parse_id' => 'd2DFINGLbp'
            ],
            [
                'name' => 'Knee Replacement - Right',
                'info_link' => 'https://orthoinfo.aaos.org/en/treatment/total-knee-replacement/',
                'video_url' => 'https://www.youtube.com/watch?v=2spU3KM82S4',
                'patient_questions' => 1,
                'consent_type_id' => 1,
                'consent_speciality_id' => 2,
                'parse_id' => 'MaInJFcz16'
            ],
            [
                'name' => 'Total Hip Replacement - Bilateral',
                'info_link' => 'https://orthoinfo.aaos.org/en/treatment/total-hip-replacement/',
                'video_url' => 'https://www.youtube.com/watch?v=qbi4B30S1LA',
                'patient_questions' => 1,
                'consent_type_id' => 1,
                'consent_speciality_id' => 2,
                'parse_id' => 'rGP19MtzW7'
            ],
            [
                'name' => 'Knee Replacement - Bilateral',
                'info_link' => 'https://orthoinfo.aaos.org/en/treatment/total-knee-replacement/',
                'video_url' => 'https://www.youtube.com/watch?v=2spU3KM82S4',
                'patient_questions' => 1,
                'consent_type_id' => 1,
                'consent_speciality_id' => 2,
                'parse_id' => 'VMvsjDuqmi'
            ],
            [
                'name' => 'Ankle Arthroscopy - Bilateral',
                'info_link' => 'https://orthoinfo.aaos.org/en/treatment/arthroscopy/',
                'video_url' => 'https://www.youtube.com/watch?v=rp3UiCk5ZAY',
                'patient_questions' => 1,
                'consent_type_id' => 1,
                'consent_speciality_id' => 2,
                'parse_id' => 'C1ZGYQ0tBD'
            ],
            [
                'name' => 'Metatarsophalangeal Joint Fusion - Bilateral',
                'info_link' => 'http://legacy.aofas.org/footcaremd/treatments/Pages/First-MTP-Joint-Fusion.aspx',
                'video_url' => 'https://www.youtube.com/watch?v=hT1l9a7jncM',
                'patient_questions' => 1,
                'consent_type_id' => 1,
                'consent_speciality_id' => 2,
                'parse_id' => 'QQ0gJYdl5w'
            ],
            [
                'name' => 'Angiogram',
                'info_link' => 'https://www.heartfoundation.org.au/images/uploads/main/Your_heart/Angiography.pdf',
                'video_url' => 'https://www.youtube.com/watch?v=SfO__fFSC1w',
                'patient_questions' => 1,
                'consent_type_id' => 1,
                'consent_speciality_id' => 6,
                'parse_id' => 'nDjxBZnyZJ'
            ],
            [
                'name' => 'Gastroscopy',
                'info_link' => 'http://cart.gesa.org.au/membes/files/Consumer%20Information/Gastroscopy_A4.pdf',
                'video_url' => 'https://www.youtube.com/watch?v=AshGXPVtNOU',
                'patient_questions' => 1,
                'consent_type_id' => 1,
                'consent_speciality_id' => 3,
                'parse_id' => 'k0fHbGAoxm'
            ],
            [
                'name' => 'Colonoscopy',
                'info_link' => 'http://www.gesa.org.au/resources/patients/colonoscopy/',
                'video_url' => 'https://www.youtube.com/watch?v=PgWvYyQe_pY',
                'patient_questions' => 1,
                'consent_type_id' => 1,
                'consent_speciality_id' => 3,
                'parse_id' => 'jCoI7XA8nT'
            ],
            [
                'name' => 'Skin Excision',
                'info_link' => 'https://www.dermnetnz.org/topics/excision-of-skin-lesions/',
                'video_url' => 'https://www.youtube.com/watch?v=JP4oaHS7sYs',
                'patient_questions' => 1,
                'consent_type_id' => 1,
                'consent_speciality_id' => 4,
                'parse_id' => '9eGFKGU5Zc'
            ],
            [
                'name' => 'Cataract Procedure - Bilateral',
                'info_link' => 'https://ranzco.edu/find-out-more-about/cataracts',
                'video_url' => 'https://www.youtube.com/watch?v=fR5aFIWexDc',
                'patient_questions' => 1,
                'consent_type_id' => 1,
                'consent_speciality_id' => 5,
                'parse_id' => 'CvqltmxbIo'
            ],
            [
                'name' => 'Knee Arthroscopy - Bilateral',
                'info_link' => 'https://orthoinfo.aaos.org/en/treatment/knee-arthroscopy/',
                'video_url' => 'https://www.youtube.com/watch?v=EhyW8QvaFy0',
                'patient_questions' => 1,
                'consent_type_id' => 1,
                'consent_speciality_id' => 2,
                'parse_id' => '9v2OTY51eU'
            ],
            [
                'name' => 'Mohs Micrographic Surgery',
                'info_link' => 'hhttps://www.dermcoll.edu.au/atoz/mohs-micrographic-surgery/',
                'video_url' => 'https://www.youtube.com/watch?v=0e6dyYZ_7Gg',
                'patient_questions' => 1,
                'consent_type_id' => 1,
                'consent_speciality_id' => 4,
                'parse_id' => '3TYNo2KA1L'
            ],

        ];

        foreach($inserts as $insert){
            \App\Consent::firstOrCreate($insert);
        }

    }
}
