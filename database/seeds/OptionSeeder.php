<?php

use Illuminate\Database\Seeder;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            array('option_name' => 'site_title', 'option_value' => 'Destiny Networks'),
            array('option_name' => 'site_description', 'option_value' => 'Discover the best free to play MMO games like MU Origin, MU Legend, Rappelz, C9, MU Online, FlyFF and Age of Wulin. Join millions of MMORPG players.'),
            array('option_name' => 'site_canonical', 'option_value' => 'https://www.destiny-networks.com'),
            array('option_name' => 'site_author', 'option_value' => 'Destiny Networks, Inc.'),
            array('option_name' => 'site_forum', 'option_value' => 'https://forum.destiny-networks.com'),
            array('option_name' => 'site_about', 'option_value' => 'Destiny Networks will provide players around the globe with fun and value by offering network-based entertainment contents. Accordingly, Destiny Networks is preparing a variety of innovative game portfolios to offer new experience which go beyond cultural/regional difference, and doing its best to materialize future online entertainment we all dream about into reality.'),
            array('option_name' => 'site_facebook', 'option_value' => 'https://www.facebook.com/destinynetworksofficial/'),
            array('option_name' => 'site_twitter', 'option_value' => 'https://www.facebook.com/destinynetworksofficial/'),
            array('option_name' => 'site_google', 'option_value' => 'https://www.facebook.com/destinynetworksofficial/'),
            array('option_name' => 'site_youtube', 'option_value' => 'https://www.facebook.com/destinynetworksofficial/'),
            //array('option_name' => '', 'option_value' => ''),
        );

        DB::table('options')->insert($data);
    }
}
