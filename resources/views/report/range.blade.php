@extends('report.layout')

@section('content')
    <div class="py-5 text-center">
        <h2>Média geral (questões de 1 a 10, separado por questão)</h2>
    </div>

    @include('components.table', ['items' => $avgAnswers, 'columns' => ['question_name' => 'Questão', 'avg' => 'Média']])

    <div class="py-5 text-center">
        <h2>Média por cliente (questões de 1 a 10, separado por questão)</h2>
    </div>

    @include('components.table', ['items' => $avgAnswersByClient, 'columns' => ['client_name' => 'Cliente', 'question_name' => 'Questão', 'avg' => 'Média']])

@endsection
