<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article_comment extends Model
{
    //
    protected $fillable = ['article_id', 'name', 'comment'];
}
