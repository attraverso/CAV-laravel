<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
  protected $fillable = ['first_name', 'last_name',	'social_sec_nr', 'date_of_birth',	'city_of_birth', 'province_of_birth',	'address', 'city', 'postal_code',	'province', 'phone_nr',	'email', 'notes'];
}
