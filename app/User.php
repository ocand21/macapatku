<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\ResetPassword;

use App\Article;
use App\Draft;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'address', 'birth_date', 'gender', 'job', 'aboutme', 'password','slug','provider','provider_id',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'birth_date'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    public function articles(){
      return $this->hasMany(Article::class, 'user_id');
    }

    public function drafts(){
      return $this->hasMany(Draft::class, 'user_id');
    }
}
