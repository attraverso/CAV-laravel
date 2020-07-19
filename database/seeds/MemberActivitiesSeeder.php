<?php

use Illuminate\Database\Seeder;
use faker\Generator;
use App\MemberActivity;

class MemberActivitiesSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run(Faker\Generator $faker)
  {
    for ($i=0; $i < 10; $i++) { 
      $newRecord = new MemberActivity();
      $newRecord->membership_for_year = $faker->year;
      $newRecord->date_of_request = $faker->dateTime('now', 'Europe/Rome');
      $newRecord->membership_type = $faker->randomDigit;
      $newRecord->class = $faker->boolean;
      $newRecord->save();
    }
  }
}
