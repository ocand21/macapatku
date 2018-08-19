<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Hashids\Hashids;

class Draft extends Model
{

  public function users(){
    return $this->belongsTo(User::class, 'user_id');
  }


}
