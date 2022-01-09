<?php

namespace App\Models\Repository;

use App\Models\Employee;

class EmployeeRepository
{
    public function getByProjectIdAndEmployeeId($project_id, $employee_id)
    {
        return Employee::where('project_id', $project_id)
            ->where('id', $employee_id);
    }

    public function create(array $employeeParams)
    {
        return Employee::create($employeeParams);
    }
}
