@extends('layouts.app')

@section('content')
    <div class="container h-100">
        <form action="{{  route('update.low.course', $course->id)  }}" method="POST"
              class="d-flex justify-content-center align-items-center flex-column h-100 text-center">
            @csrf
            @method('PATCH')
            <h1>Название курса</h1>
            <div class="col-md-4 mb-3">
                <input name="title" value="{{ $course->title }}" type="text" class="form-control col-md-6" required
                       placeholder="Введите название курса">
            </div>
            <h2>Описание курса</h2>
            <div class="col-md-4">
                <textarea name="description" required rows="10"
                          class=" form-control ">{{ $course->description }}</textarea>
            </div>
            <div class="row w-100">
                <div class="col-6 text-end mt-3">
                    <button class="btn btn-primary">Продолжить</button>
                </div>
                <div class="col-6 text-start mt-3">

                    <button onclick="
                            event.preventDefault();
                            document.getElementById('deleteform').submit();
                        " class="btn btn-danger">Удалить курс
                    </button>
                </div>
            </div>
        </form>
        <form style="display: none" id="deleteform" action="{{  route('destroy.course', $course->id)  }}" method="POST"> @csrf @method('delete')
        </form>
    </div>
@endsection
