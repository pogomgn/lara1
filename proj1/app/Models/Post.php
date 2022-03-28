<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Post
 * @package App\Models
 * @mixin Builder
 */

class Post extends Model
{
    protected $fillable = [
        'title',
        'url',
        'content',
        'author_id',
    ];
    use HasFactory;
}
