@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row my-3">
            <form action="{{ route('search.post') }}" method="post" class="col-md-3 position-relative ">
                @csrf
                <button style="background: none; border: none; margin: 0" class="position-absolute top-0 start-0 ms-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-search" viewBox="0 0 16 16">
                        <path
                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </button>
                <input name="search_param" type="search" class="form-control form-control-sm  ps-4"
                       placeholder="Название курса, автор или предмет">
            </form>
        </div>
        <div class="d-flex flex-wrap justify-content-center justify-content-lg-between">
            @foreach(\App\Models\Course::all() as $course)
                <a style="text-decoration: none" href="{{ route('curse.index', $course->id) }}">
                    <div class="card mb-3" style="max-width: 400px;">
                        <div class="row g-0" style="min-height: 170px">
                            <div class="col-md-6 d-flex flex-column justify-content-between">
                                <div style="color: #000; padding-bottom: 0" class="card-body">
                                    <h5 class="card-title">{{ $course->title }}</h5>
                                    <p class="card-text">{{ $course->author->firstname }} {{ $course->author->lastname }}</p>
                                </div>
                                <div style="padding-top: 0" class="card-body d-flex flex-column justify-content-end" >
                                    <p class="card-text"><small class="text-muted">{{ $course->price }} руб</small></p>
                                </div>
                            </div>
                            <div class="col-md-6 d-flex">
                                <img src="{{$course->image}}" class="img-fluid p-4 my-auto" alt="...">
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection

