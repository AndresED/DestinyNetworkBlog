<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
*/
    public function run()
    {
        Model::unguard();

        factory('DestinyH\User', 3)->create();
        factory('DestinyH\Game', 4)->create();
        factory('DestinyH\Post', 6)->create();
        factory('DestinyH\Comment', 500)->create();

        Model::reguard();
		
        $this->call(UserSeeder::class);
        $this->call(OptionSeeder::class);

    }
}
