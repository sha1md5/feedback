<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Project;
use App\Models\Repository\AnswerRepository;
use App\Models\Repository\EmployeeRepository;
use App\Models\Repository\QuestionRepository;

class EmployeeController extends Controller
{
    /**
     * @var QuestionRepository
     */
    private $questionRepository;

    /**
     * @var AnswerRepository
     */
    private $answerRepository;

    /**
     * @var EmployeeRepository
     */
    private $employeeRepository;

    /**
     * EmployeeController constructor.
     *
     * @param QuestionRepository $questionRepository
     * @param AnswerRepository   $answerRepository
     * @param EmployeeRepository $employeeRepository
     */
    public function __construct(
        QuestionRepository $questionRepository,
        AnswerRepository $answerRepository,
        EmployeeRepository $employeeRepository
    ) {
        $this->questionRepository = $questionRepository;
        $this->answerRepository = $answerRepository;
        $this->employeeRepository = $employeeRepository;
    }

    /**
     * @param Project  $project
     * @param Employee $employee
     */
    protected function checkAccess(Project $project, Employee $employee)
    {
        if ($this->employeeRepository->getByProjectIdAndEmployeeId($project->id, $employee->id)->count() === 0) {
            abort(404);
        }
    }

    /**
     * @param Project  $project
     * @param Employee $employee
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getQuestionsAndAnswers(Project $project, Employee $employee)
    {
        $this->checkAccess($project, $employee);
        $questions = $this->questionRepository->getOrdered()->get();
        $answers = $this->answerRepository->getByProjectIdAndEmployeeId($project->id, $employee->id)->get()
            ->pluck('answer', 'question_id')->all();

        return view('questions.form', [
            'questions' => $questions,
            'answers'   => $answers,
        ]);
    }

    /**
     * @param Project  $project
     * @param Employee $employee
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeAnswers(Project $project, Employee $employee)
    {
        $this->checkAccess($project, $employee);

        $validators = $this->questionRepository->getAll()->pluck('validator', 'id')->all();
        request()->validate($validators);

        $this->answerRepository->storeAnswers($project->id, $employee->id, request()->all());

        return $this->redirectTo("/{$project->id}/{$employee->id}/thankyou");
    }

    /**
     * @param Project  $project
     * @param Employee $employee
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function thankyou(Project $project, Employee $employee)
    {
        $this->checkAccess($project, $employee);

        return view('questions.thankyou', [
            'url' => "/{$project->id}/{$employee->id}",
        ]);
    }
}

