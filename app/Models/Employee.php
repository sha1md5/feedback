<?php

namespace App\Models;

use App\Models\AbstractModel\UUID;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends UUID
{
    use HasFactory, HasTimestamps, SoftDeletes;

    protected $table = 'employee';

    protected $fillable = [
        'id',
        'project_id',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
