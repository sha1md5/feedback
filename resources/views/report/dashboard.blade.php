@extends('report.layout')

@section('content')
    <div class="py-5 text-center">
        <h2>Total Projectos</h2>
        <h3>{{$projectsCount}}</h3>
    </div>

    <div class="py-5 text-center">
        <h2>Total Projectos por Cliente</h2>
    </div>

    @include('components.table', ['items' => $projectsCountByClient, 'columns' => ['client_name' => 'Cliente', 'projects' => 'Projetos']])

@endsection
