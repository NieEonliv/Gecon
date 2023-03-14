@extends('teacher.course_controller.edit')

@section('content_o')
    <form action="{{ route('module.update', $module->id) }}" method="POST">
        @csrf
        @method('patch')
        <div class="d-flex w-50 mb-3">
            <h2 class="">Уровень  </h2>
            <input name="number" type="number" value="{{ $module->number }}" style="font-size: 20px" class="ms-2 form-control form-control-sm w-25">
        </div>
        <p>Название уровня</p>
        <input name="title" value="{{ $module->title }}" type="text" class="mb-3 form-control w-25 form-control-sm" placeholder="Введите название уровня">
        <div class="w-25 d-flex justify-content-between align-items-center">
            <p class="m-0">Exp за уровень </p>
            <input name="experience" type="number" max="15" min="10" value="@if(isset($module->occupation[0]->occupation->experience)){{$module->occupation[0]->occupation->experience}}@endif" class="form-control form-control-sm w-25">
        </div>
        <div style="position: absolute; bottom: 40px; right: 40px">
            <button class="btn btn-primary">Сохранить</button>
            <a onclick="location.reload()" class="btn btn-primary">Отменить</a>
        </div>
    </form>
@endsection
