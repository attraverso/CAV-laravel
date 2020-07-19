<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use faker\Generator;
use App\Member;

class MembersSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $faker = Faker\Factory::create('it_IT');
    for ($i=0; $i < 10; $i++) { 
      $newRecord = new Member();
      $newRecord->first_name = $faker->firstName;
      $newRecord->last_name = $faker->lastName;
      $newRecord->social_sec_nr = $faker->taxId;
      $newRecord->date_of_birth = $faker->dateTime('now', 'Europe/Rome');
      $newRecord->city_of_birth = $faker->city;
      $newRecord->province_of_birth = $faker->lexify('??');
      $newRecord->address = $faker->address;
      $newRecord->city = $faker->city;
      $newRecord->postal_code = $faker->postcode;
      $newRecord->province = $faker->lexify('??');
      $newRecord->phone_nr = $faker->e164PhoneNumber;
      $newRecord->email = $faker->safeEmail;
      $newRecord->notes = $faker->sentence(5);
      $newRecord->save();
    }
  }
}