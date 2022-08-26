<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Scopes\SortScope;
use App\Models\Tag;

class Post extends Model
{  
    protected $fillable = ['user_id','title','content'];

    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
        }
    
        public function comments(){
            return $this->hasMany(Comment::class);
        }
        
        public function tags(){
            return $this->belongsToMany(Tag::class);
        }

        public function add($request){
          $post = Post::create([
            'user_id'=>Auth::user()->id,
            'title'=>$request->title,
            'content'=>$request->content
           ]);

           return $post;
        }
     
        public static function booted(){
            static::addGlobalScope(new SortScope);
        }

       public function scopeMostComment($query){
           return $query->withCount('comments')->orderBy('comments_count','DESC')->get()->pluck('comments_count')->take(5);
       }
}
