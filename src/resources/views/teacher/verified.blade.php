@extends('layouts.app')

@section('content')
    <div class="container h-100">
        <div class="d-flex justify-content-center align-items-center flex-column h-100">
            <h1 class="text-center">Вы хотите стать преподавателем <br>
                и добавить свой первый курс?</h1>
            <div class="row w-100">
                <div class="col-6 text-end mt-3">
                    <a class="btn btn-primary" href="{{ route('verified.teacher') }}">Да, хочу!</a>
                </div>
                <div class="col-6 text-start mt-3">
                    <a class="btn btn-primary" href="{{ route('home') }}">Нет, не хочу!</a>
                </div>
            </div>
        </div>
    </div>
@endsection
