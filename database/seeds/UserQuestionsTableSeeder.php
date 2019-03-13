<?php

use Illuminate\Database\Seeder;

class UserQuestionsTableSeeder extends Seeder
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
                'text' => 'I am of the opinion that the patient has adequately understood the information provided, has the capacity to give consent, and is providing consent voluntarily.',
                'type' => 'boolean',
            ],
            [
                'text' => 'I have given the patient the opportunity to discuss the proposed procedure, and to ask questions.',
                'type' => 'boolean',
            ],
            [
                'text' => 'Any uncertainty regarding the diagnosis and/or expected outcome has been discussed with the patient.',
                'type' => 'boolean'
            ],
            [
                'text' => 'I have discussed the risks and consequences of not undergoing this procedure, and of undergoing no procedure at all.',
                'type' => 'boolean'
            ],
            [
                'text' => 'I have informed the patient of alternative investigative, diagnostic and/or treatment options available.',
                'type' => 'boolean'
            ],
            [
                'text' => 'I have recommended the procedure noted on this form, and I have explained this procedure to the patient, including the expected benefits and possible complications, including material risks.',
                'type' => 'boolean'
            ],
            [
                'text' => 'I have discussed with the patient the nature of their condition.',
                'type' => 'boolean'
            ]
        ];

        foreach($inserts as $insert){

            $userQuestion = \App\UserQuestion::firstOrCreate($insert);

            \App\Answer::create([
                'answerable_id' => $userQuestion->id,
                'answerable_type' => 'App\UserQuestion',
                'text' => 'Yes',
                'correct' => 1
            ]);

            \App\Answer::create([
                'answerable_id' => $userQuestion->id,
                'answerable_type' => 'App\UserQuestion',
                'text' => 'No',
                'correct' => 0
            ]);

        }

    }
}
