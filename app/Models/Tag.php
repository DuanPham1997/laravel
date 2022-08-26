<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use Kyslik\ColumnSortable\Sortable;

class Tag extends Model
{    
    use Sortable;
    protected $fillable = ['name'];
    use HasFactory;

    public function posts(){
        return $this->belongsToMany(Post::class);
    }
}
