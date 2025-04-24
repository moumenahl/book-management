<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use SoftDeletes;
    protected $fillable = ['title' 
    , 'author'
    , 'description'
    , ' category_id'];
    public function category() {
        return $this->belongsTo(Category::class);
    }
}
