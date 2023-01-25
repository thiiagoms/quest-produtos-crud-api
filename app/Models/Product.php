<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Builder, Model};

class Product extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * Mass assign
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'price', 'img_path'];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('name', 'asc');
        });
    }
}
