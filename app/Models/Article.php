<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;
    protected $table = 'article';

    public function category(){
        return $this->hasOne(Category::class,'id','categoryid');
    }

}
