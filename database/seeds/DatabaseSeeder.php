<?php

use Illuminate\Database\Seeder;
use App\Member;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(MembersSeeder::class);
        $this->call(MemberActivitiesSeeder::class);
    }
}
