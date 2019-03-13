<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        if (($handle = fopen(database_path().'/data/parse_questions.csv', 'r')) !== false) {

            $questions = [];

            while (($data = fgetcsv($handle, 1000, ',')) !== false) {
                if ($data[0] != '_id') {
                    $questions[] = [
                        'id' => $data[0],
                        'question' => $data[1],
                        'question_type' => $data[2],
                        'consent' => $data[3],
                        'order' => $data[6],
                    ];
                }
            }

            foreach($questions as $question){

                $consentParseId = substr($question['consent'], strpos($question['consent'], "Consents$") + 9);

                $consent = \App\Consent::where([
                    'parse_id' => $consentParseId
                ])->first();

                if($consent){

                    $question = \App\Question::firstOrCreate(
                        [
                            'parse_id' => $question['id'],
                        ],
                        [
                            'text' =>  $question['question'],
                            'type' => 'boolean',
                            'consent_id' => $consent->id,
                            'order' => (int) $question['order'] ?? null
                        ]
                    );

                    \App\Answer::create([
                        'answerable_id' => $question->id,
                        'answerable_type' => 'App\Question',
                        'text' => 'Yes',
                        'correct' => 1
                    ]);

                    \App\Answer::create([
                        'answerable_id' => $question->id,
                        'answerable_type' => 'App\Question',
                        'text' => 'No',
                        'correct' => 0
                    ]);

                }

            }

        }

    }

}
