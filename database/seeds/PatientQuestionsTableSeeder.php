<?php

use Illuminate\Database\Seeder;

class PatientQuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $inserts = [

        ];

        foreach(\App\Consent::all() as $consent){

            if(!in_array($consent->id, [20,23,24])){

                $inserts[] = [
                    'text' => 'I do / do not consent to a blood transfusion',
                    'type' => 'multiple',
                    'answers' => [
                        [
                            'text' => 'I do consent to a blood transfusion, if required',
                            'correct' => 1
                        ],
                        [
                            'text' => 'I do not consent to a blood transfusion, if required'
                        ]
                    ],
                    'consent_id' => $consent->id,
                ];

            }

            $inserts[] = [
                'text' => 'I consent to undergo the procedure documented above and I give my consent voluntarily.',
                'type' => 'boolean',
                'consent_id' => $consent->id,
            ];

            if(in_array($consent->id, [24])){

                $inserts[] = [
                    'text' => 'My doctor has explained the treatment options that are available to me and the associated risks, including the risks of not having any treatment. 	I understand that there may be risks particular to my circumstances, and I have had the opportunity to ask my doctor about this. I understand that the expected outcome of this procedure cannot be guaranteed. I understand that a failure to comply with post-operative instructions is at my own risk and against medical advice. My doctor has explained my medical condition and outlook to me. I understand that I have the right to withdraw my consent at any time before the procedure is undertaken, including after signing this form. I understand that I must inform my doctor if this occurs. I have understood the information presented to me, and I have had the opportunity to ask questions and am satisfied that all of my questions and concerns have been addressed. The risks of this procedure have been explained to me, including risks that are specific to me, and the likely outcome should a complication occur. I agree to my medical record being accessed by staff involved in my clinical care. I understand that if an unexpected and/or life-threatening event occurs during the procedure I may require additional treatment, and I agree to this.',
                    'type' => 'boolean',
                    'consent_id' => $consent->id,
                ];

            }else{

                $inserts[] = [
                    'text' => 'My doctor has explained the treatment options that are available to me and the associated risks, including the risks of not having any treatment. 	I understand that there may be risks particular to my circumstances, and I have had the opportunity to ask my doctor about this. I understand that the expected outcome of this procedure cannot be guaranteed. I understand that a failure to comply with post-operative instructions is at my own risk and against medical advice. My doctor has explained my medical condition and outlook to me. I understand that I have the right to withdraw my consent at any time before the procedure is undertaken, including after signing this form. I understand that I must inform my doctor if this occurs. I have understood the information presented to me, and I have had the opportunity to ask questions and am satisfied that all of my questions and concerns have been addressed. The risks of this procedure have been explained to me, including risks that are specific to me, and the likely outcome should a complication occur. I agree to my medical record being accessed by staff involved in my clinical care. I understand that if an unexpected and/or life-threatening event occurs during the procedure I may require additional treatment, and I agree to this. I understand there are risks associated with the anaesthetic.',
                    'type' => 'boolean',
                    'consent_id' => $consent->id,
                ];

            }


        }

        foreach($inserts as $insert){

            if(isset($insert['answers'])){
                $answers = $insert['answers'];
                unset($insert['answers']);
            }else{
                unset($answers);
            }

            $patientQuestion = \App\PatientQuestion::firstOrCreate($insert);

            if($insert['type'] == 'multiple' && isset($answers)){
                foreach($answers as $answer){

                    \App\Answer::create([
                        'answerable_id' => $patientQuestion->id,
                        'answerable_type' => 'App\PatientQuestion',
                        'text' => $answer['text'],
                        'correct' => $answer['correct'] ?? 0
                    ]);

                }
            }elseif($insert['type'] == 'boolean'){

                \App\Answer::create([
                    'answerable_id' => $patientQuestion->id,
                    'answerable_type' => 'App\PatientQuestion',
                    'text' => 'Yes',
                    'correct' => 1
                ]);

                \App\Answer::create([
                    'answerable_id' => $patientQuestion->id,
                    'answerable_type' => 'App\PatientQuestion',
                    'text' => 'No',
                    'correct' => 0
                ]);

            }

        }

    }
}
