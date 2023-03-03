@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <h1>{{ $course->title }}</h1>
        <div class="row">
            <div class="col-md-6">
                @php($count = 1)
                @foreach($modules as $module)
                    <div>
                        <h3>Уровень {{ $count }}. {{ $module->title }}</h3>
                        @foreach($module->occupation as $relation)
                            <p>{{ $relation->occupation->title }}</p>
                        @endforeach
                    </div>
                    @php($count++)
                @endforeach
            </div>
            <div class="col-md-6">
                @yield('content')
            </div>
        </div>
    </div>
@endsection
