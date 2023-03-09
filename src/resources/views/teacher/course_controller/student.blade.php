@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-8">
                <p>Фамилия: {{ $user->lastname }}</p>
                <p>Имя: {{ $user->firstname }}</p>
                <p>Отчество: {{ $user->patronymic }}</p>

                @foreach(\App\Models\Course::query()->where(['author_id' => \Illuminate\Support\Facades\Auth::user()->id])->get() as $course)
                    @foreach(\App\Models\UserCourse::query()->where(['user_id' => $user->id, 'course_id' => $course->id])->get() as $course_info)
                        <div class="mt-3">
                            <hr class="w-50">
                            <p>Изучает курс: {{ $course_info->course->title }}</p>
                            <p>Находится на уровне: {{ $course_info->current_level }}</p>
                            <p>Получено Exp за этот курс: {{ $course_info->exp }}</p>
                        </div>
                    @endforeach
                @endforeach
            </div>
            <div class="col-md-4">
                <p style="font-size: 20px" class="text-center mb-1">Фото профиля</p>
                <img class="w-100" src="{{ $user->photo }}" alt="">
            </div>
        </div>
        <?php
            $bool = false;
            foreach($user->course as $relation){
                if ($relation->course->author_id == \Illuminate\Support\Facades\Auth::user()->id){
                    $bool = true;
                }
            }
        ?>
        @if($bool)
            <div class="text-end mt-3">
                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Удалить с курсов
                </button>
            </div>
        @endif
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header ">
                    <h1 class="modal-title fs-5 w-100 text-center" id="exampleModalLabel">Удалить ученика</h1>
                </div>
                <div class="modal-body">
                    <div class="d-flex align-items-center justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                             class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
                            <path
                                d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"/>
                            <path
                                d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"/>
                        </svg>
                        <p class="m-0 ms-3"> Вы уверены, что хотите удалить ученика с курсов?</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('student.teacher.delete', $user->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">Удалить</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                </div>
            </div>
        </div>
    </div>
@endsection
