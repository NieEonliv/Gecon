@extends('layouts.app')

@section('content')
   <div class="container">
       <div class="row">
           <div class="col-md-8">
               <h1 class="my-3">Результат поиска по: {{ $data }}</h1>
           </div>
           <form action="{{ route('home') }}" method="get" class="col-md-4 d-flex justify-content-end align-items-center">
               <button class="btn btn-primary">Назад</button>
           </form>
       </div>
       @if(count($response) > 0)
           <div class="d-flex flex-wrap justify-content-center justify-content-lg-between">
               @foreach($response as $course)
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
       @else
           <h2>Нет результатов</h2>
       @endif
   </div>
@endsection
