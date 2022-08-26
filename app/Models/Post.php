<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Scopes\SortScope;
use App\Models\Tag;
use App\Models\Image;
use Kyslik\ColumnSortable\Sortable;

class Post extends Model
{    
    use Sortable;
    protected $fillable = ['user_id','title','content'];
     public $sortable = ['id','title','content','created_at','updated-at','user_id'];
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
        
        public function image(){
            return $this->morphOne(Image::class,'imageable');
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
