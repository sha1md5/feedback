<?php

namespace App\Models;

use App\Models\AbstractModel\UUID;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends UUID
{
    use HasFactory, HasTimestamps, SoftDeletes;

    protected $table = 'project';

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
