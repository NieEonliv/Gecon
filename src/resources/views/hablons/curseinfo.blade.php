@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <div class="row justify-content-between">
            <div class="col-md-6">
                <h1>{{ $course->title }}</h1>
                <div>
                    <h4>О курсе</h4>
                    <p>{{ $course->description }}</p>
                </div>
                <div>
                    <h4>Модули курса</h4>
                    <ol style="padding-left: 20px">
                        @foreach($course->module as $relation)
                            <li> {{ $relation->module->title }}</li>
                        @endforeach
                    </ol>
                </div>
                <div>
                    <h4>Заключение</h4>
                    <p>Сертификат</p>
                </div>
            </div>
            <div class="col-md-2 ms-auto">
                @guest()
                    <form action="{{ route('login') }}" method="get">
                        <button class="btn btn-primary w-100">Перейти к курсу</button>
                    </form>
                @else
                    @foreach(\Illuminate\Support\Facades\Auth::user()->course as $enroll)
                        @if($enroll->course->id == $course->id )
                            @php($bool = true)
                            <form action="{{ route('course.show', $course->id) }}" method="get">
                                <button class="btn btn-primary w-100">Перейти к курсу</button>
                            </form>
                            @break
                        @endif
                    @endforeach
                    @if(!isset($bool))
                        <form action="{{ route('course.enroll', $course->id) }}" method="post">
                            @csrf
                            <button class="btn btn-primary w-100">Поступить на курс</button>
                        </form>
                    @endif
                @endguest
                <div class="mt-3 p-2" style="border: 3px solid green; border-radius: 10px">
                    <h4>В курс входят:</h4>
                        <?php
                        $lecture = 0;
                        $practical = 0;
                        foreach ($course->module as $relation) {
                            $occupations = $relation->module->occupation;
                            foreach ($occupations as $occupation) {
                                if ($occupation->occupation->type === 'lecture') {
                                    $lecture++;
                                } else {
                                    $practical++;
                                }
                            }
                        }
                        ?>
                    <p>{{ $lecture }} уроков</p>
                    <p>{{ $practical }} заданий</p>
                </div>
            </div>
        </div>
    </div>
@endsection
