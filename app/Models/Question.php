<?php

namespace App\Models;

use App\Models\AbstractModel\UUID;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends UUID
{
    use HasFactory, HasTimestamps, SoftDeletes;

    protected $table = 'question';

    public function getValidatorArrayAttribute()
    {
        $rules = explode('|', $this->validator);
        $validators = [];
        foreach ($rules as $rule) {
            $rule = explode(':', $rule);
            $validators[$rule[0]] = ($rule[1] ?? true);
        }

        return $validators;
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
