@extends('teacher.course_controller.edit')

@section('content_o')
    <div class="d-flex w-50 mb-3">
        <h2 class="">Название подуровня</h2>
        <input name="number" type="text" value="{{ $occupation->title }}" style="font-size: 20px" class="ms-2 form-control form-control-sm w-25">
    </div>
@endsection
