<?php

use App\Models\UserGroups;
use Illuminate\Database\Seeder;

class GroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usergroups')->truncate();
        UserGroups::create(array(
            'GroupName'=>'Admin',
            'Permissions'=>'all'
        ));
    }
}
