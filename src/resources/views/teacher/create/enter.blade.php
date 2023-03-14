@extends('layouts.app')

@section('content')
    <div class="container h-100">
        <form action="{{  route('teaching.create.course')  }}" method="POST"
              class="d-flex justify-content-center align-items-center flex-column h-100 text-center">
            @csrf
            <h1>Название курса</h1>
            <div class="col-md-4 mb-3">
                <input name="title" value="" type="text" class="form-control col-md-6" required
                       placeholder="Введите название курса">
            </div>
            <h2>Описание курса</h2>
            <div class="col-md-4">
                <textarea name="description" required rows="10"
                          class="mb-3 form-control "></textarea>
            </div>
            <h2>Стоимость</h2>
            <div class="col-md-4">
                <input name="price" value="" type="text" class="form-control col-md-6" required
                       placeholder="Введите цену">
            </div>
            <div class="row w-100">
                <div class="col-6 text-end mt-3">
                    <button class="btn btn-primary">Создать</button>
                </div>
                <div class="col-6 text-start mt-3">

                    <button onclick="
                            event.preventDefault();
                            document.getElementById('deleteform').submit();
                        " class="btn btn-danger">Назад
                    </button>
                </div>
            </div>
        </form>
        <form style="display: none" id="deleteform" action="{{  route('index.teacher')  }}" method="get">
        </form>
    </div>
@endsection
