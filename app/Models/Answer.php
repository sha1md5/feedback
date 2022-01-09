<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Answer extends Model
{
    use HasFactory, HasTimestamps, SoftDeletes;

    protected $table = 'answer';

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
