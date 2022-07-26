<?php
namespace Database\Seeders;

/*
|--------------------------------------------------------------------------
| database/seeds/CitiesTableSeeder.php *** Copyright netprogs.pl | available only at Udemy.com | further distribution is prohibited  ***
|--------------------------------------------------------------------------
*/

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesTableSeeder extends Seeder
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

        /* Lecture 10 */
        for ($i = 1; $i <= 10; $i++)
        {

            DB::table('cities')->insert([
                'name' => $faker->unique()->city,
            ]);
        }
    }
}

