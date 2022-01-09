<?php

namespace App\Models;

use App\Models\AbstractModel\UUID;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends UUID
{
    use HasFactory, HasTimestamps, SoftDeletes;

    protected $table = 'client';

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
