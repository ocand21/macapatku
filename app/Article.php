<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Vinkla\Hashids\Facades\Hashids;
use App\Http\Traits\Hashidable;

class Article extends Model
{

    use Hashidable;

    public function users(){
      return $this->belongsTo(User::class, 'user_id');
    }
}
