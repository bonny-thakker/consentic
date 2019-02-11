<?php

use Illuminate\Database\Seeder;

class ConsentTypesTableSeeder extends Seeder
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
                'name' => 'Medical Consent',
            ],
            [
                'id' => 2,
                'name' => 'Financial Consent',
            ],

        ];

        foreach($inserts as $insert){
            \App\ConsentType::firstOrCreate($insert);
        }

    }
}
