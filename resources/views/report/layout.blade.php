@extends('layout')

@section('header')
    @php
        $links = [
            'dashboard' => 'Projetos',
            'range' => 'Questões de 1 a 10',
            'text' => 'Questões de campo aberto',
        ]
    @endphp
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            @foreach ($links as $route => $text)
                <li><a href="{{route($route)}}" class="nav-link px-2 link-dark">{{$text}}</a></li>
            @endforeach
        </ul>

        <div class="col-md-3 text-end">
            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li>
                    Olá {{ auth()->user()->name }} <a href="{{route('logout')}}" class="nav-link px-2 link-secondary">Sair</a>
                </li>
            </ul>
        </div>
    </header>
@endsection
