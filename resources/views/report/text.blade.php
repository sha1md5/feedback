@extends('report.layout')

@section('content')
    <div class="py-5 text-center">
        <h2>Compilação de respostas de campo aberto</h2>
    </div>

    @php
        $columns = [
            'client_name' => 'Cliente',
            'project_name' => 'Projeto',
            'question_name' => 'Questão',
            'answer' => 'Resposta'
        ]
    @endphp

    @include('components.table', ['items' => $textAnswers, 'columns' => $columns])

@endsection

