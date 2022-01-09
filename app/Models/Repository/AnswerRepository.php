<?php

namespace App\Models\Repository;

use App\Models\Answer;
use Illuminate\Support\Facades\DB;

class AnswerRepository
{
    /**
     * @var QuestionRepository
     */
    private $questionRepository;

    public function __construct(QuestionRepository $questionRepository)
    {
        $this->questionRepository = $questionRepository;
    }

    public function storeAnswers($project_id, $employee_id, array $answeredQuestions)
    {
        $answeredQuestions = $this->questionRepository->getQuestionsByIds(array_keys($answeredQuestions))->get();
        $answers = [];
        foreach ($answeredQuestions as $answeredQuestion) {
            if (!empty(request()->get($answeredQuestion->id)) || is_numeric(request()->get($answeredQuestion->id))) {
                $answers[] = [
                    'project_id'  => $project_id,
                    'employee_id' => $employee_id,
                    'question_id' => $answeredQuestion->id,
                    'answer'      => request()->get($answeredQuestion->id),
                ];
            }

        }
        Answer::upsert($answers, ['project_id', 'employee_id', 'question_id'], ['answer']);
    }

    public function getByProjectIdAndEmployeeId($project_id, $employee_id)
    {
        return Answer::where('project_id', $project_id)->where('employee_id', $employee_id);
    }

    public function getTextAnswers()
    {
        return Answer::select(
            'client.id as client_id',
            'client.name as client_name',
            'project.name as project_name',
            'question.name as question_name',
            'question.type',
            'answer.*'
        )
            ->join('question', 'question.id', '=', 'answer.question_id')
            ->join('project', 'project.id', '=', 'answer.project_id')
            ->join('employee', 'employee.id', '=', 'answer.employee_id')
            ->join('client', 'client.id', '=', 'project.client_id')
            ->whereIn('question.type', ['text', 'input'])
            ->orderByDesc('client.created_at')
            ->orderBy('client.name')
            ->orderByDesc('employee.created_at')
            ->orderBy('answer.employee_id')
            ->orderBy('question.order');
    }

    public function getAvgRangeAnswers()
    {
        return Answer::select(
            'question.id as question_id',
            'question.name as question_name',
            DB::raw("avg(answer.answer) as avg")
        )
            ->join('question', 'question.id', '=', 'answer.question_id')
            ->whereIn('question.type', ['range'])
            ->groupBy('question.id')
            ->orderBy('question.order');
    }

    public function getAvgRangeAnswersByClient()
    {
        return Answer::select(
            'client.id as client_id',
            'client.name as client_name',
            'question.id as question_id',
            'question.name as question_name',
            DB::raw("avg(answer.answer) as avg")
        )
            ->join('question', 'question.id', '=', 'answer.question_id')
            ->join('project', 'project.id', '=', 'answer.project_id')
            ->join('client', 'client.id', '=', 'project.client_id')
            ->whereIn('question.type', ['range'])
            ->groupBy('client.id', 'question.id')
            ->orderByDesc('client.created_at')
            ->orderBy('client.name')
            ->orderBy('question.order');
    }
}
