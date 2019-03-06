<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        $this->call(RolesAndPermissionsSeeder::class);
        $this->call(ConsentTypesTableSeeder::class);
        $this->call(ConsentSpecialitiesTableSeeder::class);
        $this->call(ConsentsTableSeeder::class);
        $this->call(UserQuestionsTableSeeder::class);
        $this->call(PatientQuestionsTableSeeder::class);

        if(in_array(config('app.env'), ['local','staging'])) {

            // Remove the patients.index
            Storage::delete(storage_path('patients.index'));

            $team = \App\Team::firstOrCreate([
                'id' => 1,
            ], [
                'owner_id' => 1,
                'name' => 'Demo Clinic',
            ]);

            $user = \App\User::firstOrCreate([
                'email' => 'cto@consentic.com',
            ], [
                'name' => 'Andrew Drake',
                'email_verified_at' => now(),
                'password' => bcrypt('dev'), // secret
                'remember_token' => str_random(10),
                'email_verified_at' => now(),
                'current_team_id' => 1
            ]);

            $user = \App\User::firstOrCreate([
                'email' => 'rebecca.saunderson@consentic.com',
            ], [
                'name' => 'Rebecca Saunderson',
                'email_verified_at' => now(),
                'password' => bcrypt('demo2468'), // secret
                'remember_token' => str_random(10),
                'email_verified_at' => now(),
                'current_team_id' => 1
            ]);

            $user = \App\User::firstOrCreate([
                'email' => 'julia.rhodes@consentic.com',
            ], [
                'name' => 'Julia Rhodes',
                'email_verified_at' => now(),
                'password' => bcrypt('demo2468'), // secret
                'remember_token' => str_random(10),
                'email_verified_at' => now(),
                'current_team_id' => 1
            ]);

            DB::table('team_users')->insert([
                [
                    'team_id' => 1,
                    'user_id' => 1,
                    'role' => 'owner'
                ],
                [
                    'team_id' => 1,
                    'user_id' => 2,
                    'role' => 'member'
                ],
                [
                    'team_id' => 1,
                    'user_id' => 3,
                    'role' => 'member'
                ],
            ]);

            factory(App\User::class, 25)->create();
            factory(App\Patient::class, 50)->create();
            factory(App\ConsentRequest::class, 100)->create();

            $faker = Faker::create(config('app.faker_locale'));

            foreach(\App\Patient::all() as $patient){

                $email = \App\Email::create([
                    'address' => $faker->safeEmail
                ]);

                $patient->email()->save($email);

                $phoneNumber = \App\PhoneNumber::create([
                    'number' => $faker->mobileNumber
                ]);

                $patient->phoneNumber()->save($phoneNumber);

                $address = \App\Address::create([
                    'line_1' => $faker->streetAddress,
                    'postcode' =>  $faker->postcode,
                    'suburb' =>  $faker->city,
                    'state' =>  $faker->stateAbbr,
                ]);

                $patient->address()->save($address);

            }

        }

    }
}
