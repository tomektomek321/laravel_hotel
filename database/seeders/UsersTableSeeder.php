<?php

namespace Database\Seeders;

/*
|--------------------------------------------------------------------------
| database/seeds/UsersTableSeeder.php *** Copyright netprogs.pl | available only at Udemy.com | further distribution is prohibited  ***
|--------------------------------------------------------------------------
*/

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Lecture 10 */
        $faker = \Faker\Factory::create();
        //$faker = Faker\Factory::create('pl_PL');

        /* Lecture 10 */
        for($i=1;$i<=10;$i++)
        {
            DB::table('users')->insert([
                'name' => $faker->firstName,
                'surname' => $faker->lastName,
                'email' => $faker->email,
                'password' => bcrypt('passw'),
            ]);
        }
    }
}

