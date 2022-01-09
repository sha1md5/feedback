<?php

namespace App\Models\Repository;

use App\Models\Question;

class QuestionRepository
{
    public function getAll()
    {
        return Question::all();
    }

    public function getOrdered()
    {
        return Question::orderBy('order');
    }

    public function getQuestionsByIds(array $ids)
    {
        return Question::whereIn('id', $ids);
    }
}
