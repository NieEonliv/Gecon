@extends('hablons.teaching')

@section('content_o')
    <h3>Курсы <span>по запросу {{ $data }}</span></h3>
    <form action="{{ route('teaching.course.search') }}" method="post"
          class="position-relative mb-3">
        @csrf
        <button style="background: none; border: none; margin: 0"
                class="position-absolute top-0 start-0 ms-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                 fill="currentColor"
                 class="bi bi-search" viewBox="0 0 16 16">
                <path
                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
        </button>
        <input name="search_param" type="search" style="max-width: 230px; display: inline-block"
               class="form-control form-control-sm ps-5"
               placeholder="Ведите название курса">
        <button class="btn btn-primary ms-3 btn-sm">Найти</button>
    </form>
    @foreach($courses as $course)
        <a style="text-decoration: none" href="{{ route('course.lowshow.teacher', $course->id) }}">
            <div class="card mb-3" style="max-height: 200px">
                <div class="row g-0" style="min-height: 170px">
                    <div class="col-md-3 d-flex" style="max-height: 200px">
                        <img src="{{$course->image}}" style="max-height: 200px" class="img-fluid p-4 my-auto" alt="...">
                    </div>
                    <div class="col-md-9 d-flex flex-column justify-content-between">
                        <div style="color: #000; padding-bottom: 0" class="card-body">
                            <h5 class="card-title">{{ $course->title }}</h5>
                            <p class="card-text"> {{ $course->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        @php($bool = true)
    @endforeach
    @if(!isset($bool))
        <h1>Курсов не найденно!</h1>
    @endif

@endsection
