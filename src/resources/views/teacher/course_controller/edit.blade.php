@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-3">
                @php($array = [])
                @foreach($course->module as $relation)
                    @php($array[] = $relation->module)
                @endforeach
                @php(usort($array,function ($x, $y) {return strcmp((int) $x['number'], (int) $y['number']);}))

                @foreach($array as $module)
                    <a style="color: black; text-decoration: none" href="{{ route('module.get', ['idcourse' => $course->id, 'idmodule' => $module->id]) }}">
                        <h2>{{ $module->title }}</h2>
                    </a>
                    @foreach($module->occupation as $relation)
                        <div class="d-flex ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-arrow-90deg-up"
                                 viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                      d="M4.854 1.146a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L4 2.707V12.5A2.5 2.5 0 0 0 6.5 15h8a.5.5 0 0 0 0-1h-8A1.5 1.5 0 0 1 5 12.5V2.707l3.146 3.147a.5.5 0 1 0 .708-.708l-4-4z"/>
                            </svg>
                            <h5 class="ms-1">
                                <a style="text-decoration: none; color: black"
                                   href="{{ route('occupation.get', ['idcourse' => $course->id, 'idoccupation' => $relation->occupation->id]) }}">{{ $relation->occupation->title }}</a>
                            </h5>
                        </div>
                    @endforeach
                    <button class="btn btn-primary btn-sm mb-3">Добавить подуровень</button>

                @endforeach
                <form action="{{ route('module.create',  $course->id ) }}" method="POST">
                    @csrf
                    <input name="count" class="d-none" value="{{ count($array) + 1 }}">
                    <button class="btn btn-primary mt-3">Добавить уровень</button>
                </form>
            </div>
            <div class="col-md-9">
                @yield('content_o')
            </div>
        </div>
    </div>
@endsection
