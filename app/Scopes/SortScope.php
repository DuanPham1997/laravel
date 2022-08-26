<?php

namespace App\Scopes;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class SortScope implements Scope {
   public function apply(Builder $builder,Model $model){
        $builder->orderBy('created_at','DESC');
   }

}