<?php

namespace App\Models\Repository;

use App\Models\Project;

class ProjectRepository
{
    public function getProjectsCount()
    {
        return Project::count();
    }
}
