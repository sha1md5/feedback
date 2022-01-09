@extends('layout')

@section('content')
    <div class="row g-5">
        <form method="post">
            @csrf
            <div class="row g-3">
                <div class="col-12">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control"
                           id="username" name="username"
                           required
                    >
                </div>
                <div class="col-12">
                    <label for="password" class="form-label">Username</label>
                    <input type="password" class="form-control"
                           id="password" name="password"
                           required
                    >
                </div>
            </div>
            @if($errors->count()>0)
                <div class="alert alert-danger" role="alert">
                    {{$errors->first()}}
                </div>
            @endif
            <hr class="my-4">
            <button class="w-100 btn btn-primary btn-lg" type="submit">Log in</button>
        </form>
    </div>
@endsection
