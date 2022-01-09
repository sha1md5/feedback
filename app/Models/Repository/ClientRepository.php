<?php

namespace App\Models\Repository;

use App\Models\Client;
use Illuminate\Support\Facades\DB;

class ClientRepository
{
    public function getProjectsCountByClient()
    {
        return Client::select(
            'client.id as client_id',
            'client.name as client_name',
            DB::raw("count(project.id) as projects")
        )
            ->join('project', 'client.id', '=', 'project.client_id')
            ->groupBy('client.id')
            ->orderByDesc('projects');
    }
}
