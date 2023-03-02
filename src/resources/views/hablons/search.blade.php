@extends('layouts.app')

@section('content')
   <div class="container">
       <div class="row">
           <div class="col-md-8">
               <h1 class="my-3">Результат поиска по: {{ $data }}</h1>
           </div>
           <form action="{{ route('home') }}" method="get" class="col-md-4 d-flex justify-content-center align-items-center">
               <button class="btn btn-success">Назад</button>
           </form>
       </div>
       @if(count($response) > 0)
           <div class="d-flex flex-wrap justify-content-center ">
               @foreach($response as $course)
                   <a style="text-decoration: none" href="{{ route('curse.index', $course->id) }}">
                       <div class="card mb-3" style="max-width: 400px;">
                           <div class="row g-0">
                               <div class="col-md-8">
                                   <div style="color: #000;" class="card-body">
                                       <h5 class="card-title">{{ $course->title }}</h5>
                                       <p class="card-text">{{ $course->author->firstname }} {{ $course->author->lastname }}</p>
                                       <p class="card-text"><small class="text-muted">{{ $course->price }} руб</small></p>
                                   </div>
                               </div>
                               <div class="col-md-4 d-flex">
                                   <img src="{{$course->image}}" class="img-fluid rounded-start my-auto" alt="...">
                               </div>
                           </div>
                       </div>
                   </a>
               @endforeach
           </div>
       @else
           <h2>Нет результатов</h2>
       @endif
   </div>
@endsection
