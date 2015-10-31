<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        DB::table('users')->truncate();
        App\Models\Users::create(array(
            'ugroup'=>1,
            'FirstName'=>$faker->firstName,
            'LastName'=>$faker->lastName,
            'UserName'=>$faker->userName,
            'email'=>'admin@mail.com',
            'Password'=>Hash::make('admin'),
            'Active'=>1,
            'RegData'=>time()
        ));
    }
}
