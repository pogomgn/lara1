<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Article
 * @package App\Models
 * @mixin Builder
 */
class Article extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function intro(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Intro::class);
    }

    public function attachments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Attachment::class);
    }

    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }

    public function getTitleAttribute($value)
    {
        /** Accessor test ! */
        return $value . '!';
    }

    public function setTitleAttribute($value)
    {
        /**
         * Mutator test !
         * manipulate data before sending to DB
         */
        return $value;
    }

    public static function scopeTestiiing($query)
    {
        /**
         * scope test
         */
        return $query->orderBy('id', 'desc')->get();
    }
}
