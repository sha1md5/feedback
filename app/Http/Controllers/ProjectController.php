<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Repository\EmployeeRepository;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * @var EmployeeRepository
     */
    private $employeeRepository;

    /**
     * EmployeeController constructor.
     *
     * @param EmployeeRepository $employeeRepository
     */
    public function __construct(
        EmployeeRepository $employeeRepository
    ) {
        $this->employeeRepository = $employeeRepository;
    }

    /**
     * @param Project $project
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createEmployeeAndRedirect(Project $project)
    {
        $employee = $this->employeeRepository->create([
            'id' => Str::uuid()->toString(),
            'project_id' => $project->id,
        ]);

        return $this->redirectTo("/{$project->id}/{$employee->id}");
    }
}
