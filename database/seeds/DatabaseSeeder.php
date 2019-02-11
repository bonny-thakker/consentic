<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

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

        if(config('app.env') == 'local') {

            $user = \App\User::firstOrCreate([
                'email' => 'cto@consentic.com',
            ], [
                'name' => 'Andrew Drake',
                'email_verified_at' => now(),
                'password' => bcrypt('dev'), // secret
                'remember_token' => str_random(10),
            ]);

        }

    }
}
