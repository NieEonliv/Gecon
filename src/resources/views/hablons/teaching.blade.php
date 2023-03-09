@extends('layouts.app')

@section('content')
   <div class="container mt-3">
      <div class="row">
          <div class="col-md-3">
              <a href="{{ route('home') }}" class="btn btn-primary">+ Новый курс</a>
              <a href="{{ route('course.teacher') }}" class="d-block mt-3 black">Курсы</a>
              <a href="{{ route('student.teacher') }}" class="d-block mt-3 black">Учащиеся</a>
          </div>
          <div class="col-md-9">
              @yield('content_o')
          </div>
      </div>
   </div>
@endsection
