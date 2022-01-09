@extends('layout')

@section('content')
    <div class="py-5 text-center">
        <h2>Questionário de satisfação</h2>
        <p class="lead">A sua opinião é importante para nós!</p>
    </div>

    <div class="row g-5">
        <form method="post">
            @csrf
            <div class="row g-3">
                @foreach ($questions as $question)
                    @include('components.form.'.$question->type)
                @endforeach
            </div>
            <hr class="my-4">
            <button class="w-100 btn btn-primary btn-lg" type="submit">Submit</button>
        </form>
    </div>
@endsection
