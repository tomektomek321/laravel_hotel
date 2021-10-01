<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(ObjectsTableSeeder::class);
        $this->call(AddressesTableSeeder::class);
        $this->call(NotificationsTableSeeder::class);
        $this->call(ArticlesTableSeeder::class);
        $this->call(CommentssTableSeeder::class);
    }
}
