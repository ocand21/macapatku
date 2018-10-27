<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Comment;
use Vinkla\Hashids\Facades\Hashids;
use App\Http\Traits\Hashidable;

class Article extends Model
{

    use Hashidable;

    protected $fillable = ['user_id', 'title', 'image', 'caption', 'slug', 'body', 'category_id', 'acceptable', 'view_count'];

    public function users(){
      return $this->belongsTo(User::class, 'user_id');
    }

    public function comments(){
      return $this->hasMany(Comment::class, 'article_id');
    }

    public function category(){
      return $this->belongsTo(Category::class);
    }

}
