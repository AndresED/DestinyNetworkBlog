<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'user_login' => 'nickaguilarh',
            'password' => bcrypt('delcarmen7'),
            'user_nicename' => '\'Only.-',
            'user_avatar' => 'https://avatars0.githubusercontent.com/u/7452380?v=3&u=f1d13af3af09e98c989ae82f3546db50ab882b64&s=400',
            'user_email' => 'nickaguilarh@gmail.com',
            'user_confirmed' => '1',
            'user_country' => 'Peru',
            'user_rol' => 'admin',
            'user_slug' => 'nickaguilarh',
            'user_gender' => 'Masculino',
            'user_birth' => '1997-03-06',
            'user_about' => 'Me gusta la programación y aprender por mi cuenta!',
            'user_think' => 'WHEN I UNDERSTAND MY ENEMY WELL ENOUGH TO DEFEAT HIM THEN IN THAT MOMENT I ALSO LOVE HIM.  A. E. WIGGIN',
        ]);
    }
}
