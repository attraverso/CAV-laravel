<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberActivity extends Model
{
  protected $guarded = ['membership_end'];

  public function member() {
    return $this->belongsTo('App\Member');
  }
}
