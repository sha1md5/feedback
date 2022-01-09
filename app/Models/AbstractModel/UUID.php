<?php

namespace App\Models\AbstractModel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

abstract class UUID extends Model
{
    public $incrementing = false;

    protected $keyType = 'string';

    public static function boot(){
        parent::boot();

        static::creating(function ($model) {
            $model->id = Str::uuid();
        });
    }
}
