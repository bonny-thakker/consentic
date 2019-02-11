<?php

use Illuminate\Database\Seeder;

class ConsentSpecialitiesTableSeeder extends Seeder
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
                'id' => 1,
                'name' => 'Admin',
                'description' => 'Admin',
            ],
            [
                'id' => 2,
                'name' => 'Orthopaedic Surgery',
                'description' => 'Orthopedic surgery or orthopedics, also spelled orthopaedics, is the branch of surgery concerned with conditions involving the musculoskeletal system',
            ],
            [
                'id' => 3,
                'name' => 'Gastroenterology',
                'description' => 'Gastroenterology is the branch of medicine focused on the digestive system and its disorders. Diseases affecting the gastrointestinal tract, which include the organs from mouth into anus, along the alimentary canal, are the focus of this speciality.',
            ],
            [
                'id' => 4,
                'name' => 'Dermatology',
                'description' => 'Dermatology is the branch of medicine dealing with the skin, nails, hair and its diseases. It is a specialty with both medical and surgical aspects.',
            ],
            [
                'id' => 5,
                'name' => 'Ophthalmology',
                'description' => 'Ophthalmology is a branch of medicine and surgery that deals with the anatomy, physiology and diseases of the eyeball and orbit. An ophthalmologist is a specialist in medical and surgical eye disease.',
            ],
            [
                'id' => 6,
                'name' => 'Cardiology',
                'description' => 'The field includes medical diagnosis and treatment of congenital heart defects, coronary artery disease, heart failure, valvular heart disease and electrophysiology. Physicians who specialize in this field of medicine are called cardiologists, a specialty of internal medicine.',
            ],
            [
                'id' => 7,
                'name' => 'Dentistry',
                'description' => 'Dentistry is a branch of medicine that consists of the study, diagnosis, prevention, and treatment of diseases, disorders, and conditions of the oral cavity, commonly in the dentition but also the oral mucosa, and of adjacent and related structures and tissues, particularly in the maxillofacial (jaw and facial) area.',
            ],
        ];

        foreach($inserts as $insert){
            \App\ConsentSpeciality::firstOrCreate($insert);
        }

    }
}
