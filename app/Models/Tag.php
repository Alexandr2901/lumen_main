<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Tag extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $guarded = [];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
    ];

    public function news()
    {
        return $this->belongsToMany(News::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::created(function () {
            Cache::tags('tags')->flush();
        });
        static::updated(function () {
            Cache::tags('tags')->flush();
        });
        static::deleted(function () {
            Cache::tags('tags')->flush();
        });
    }
}
