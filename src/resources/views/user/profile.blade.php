@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-7">
                        <h1>Обо мне:</h1>
                        <p>Я  {{ \Illuminate\Support\Facades\Auth::user()->class }} {{ \Illuminate\Support\Facades\Auth::user()->lastname }} {{ \Illuminate\Support\Facades\Auth::user()->firstname }}</p>
                        <p>Мой текущий уровень: 1</p>
                        <p>Пройденные курсы: </p>
                        <ul class="list-group">
                            @php($cont = 0)
                            @foreach(\Illuminate\Support\Facades\Auth::user()->course as $relation)
                                @if($relation->status == 'finished')
                                    <li class="list-group-item">
                                        Курс: {{ $relation->course->title }}
                                    </li>
                                    @php($cont++)
                                @endif
                            @endforeach
                            @if($cont == 0)
                                <p class="m-0">К сожалению вы не прошли ни одного курса</p>
                            @endif
                        </ul>
                        <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                            Редактировать профиль
                        </button>
                    </div>
                    <div class="col-md-5">
                        <img src="{{ \Illuminate\Support\Facades\Auth::user()->photo }}" class="w-75 " alt="">
                        <div>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#example" class="btn btn-primary mt-3 w-75">Изменить фото профиля</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <h2 class="text-center">Мой персонаж</h2>
                <img class="w-100" src="{{ \App\Service\ConstantService::FIGHT_IMAGES[\Illuminate\Support\Facades\Auth::user()->class] }}" alt="">
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="{{ route('profile.update', \Illuminate\Support\Facades\Auth::user()->id) }}" method="POST" class="modal-content">
                @csrf
                @method('patch')
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Редактирование профиля</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div  class="modal-body">
                    <div class="mb-3 row">
                        <label for="staticEmail1" class="col-sm-2 col-form-label">Фамилия</label>
                        <div class="col-sm-10">
                            <input required type="text" value="{{ \Illuminate\Support\Facades\Auth::user()->lastname }}"
                                   name="lastname" class="form-control" id="staticEmail1">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="staticEmail11" class="col-sm-2 col-form-label">Имя</label>
                        <div class="col-sm-10">
                            <input required type="text" value="{{ \Illuminate\Support\Facades\Auth::user()->firstname }}"
                                   name="firstname" class="form-control" id="staticEmail11">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="staticEmail111" class="col-sm-2 col-form-label">Отчество</label>
                        <div class="col-sm-10">
                            <input required type="text" value="{{ \Illuminate\Support\Facades\Auth::user()->patronymic }}"
                                   name="patronymic" class="form-control" id="staticEmail111">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="staticEmail111" class="col-sm-3 col-form-label">Боевой класс</label>
                        <div class="col-sm-9">
                           <select required name="class" class="ms-auto form-select w-50">
                                @foreach(\App\Service\ConstantService::FIGHT_CLASSES as $class)
                                   <option  {{ $class == \Illuminate\Support\Facades\Auth::user()->class ? 'selected' : '' }} >{{ $class }}</option>
                                @endforeach
                           </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="staticEmail1111" class="col-sm-3 col-form-label">Дата рождения</label>
                        <div class="col-sm-9">
                            <input type="date" required value="{{ \Illuminate\Support\Facades\Auth::user()->birthday }}"
                                   name="birthday" class="form-control ms-auto w-50" id="staticEmail1111">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary">Сохранить</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отменить</button>
                </div>
            </form>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="example" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 mx-auto" id="exampleModalLabel">Загрузить фото</h1>
                </div>
                <div class="modal-body">
                    <div class="d-flex align-items-center justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-card-image" viewBox="0 0 16 16">
                            <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                            <path d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13zm13 1a.5.5 0 0 1 .5.5v6l-3.775-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12v.54A.505.505 0 0 1 1 12.5v-9a.5.5 0 0 1 .5-.5h13z"/>
                        </svg>
                        <p class="text-center m-0 ms-2"> Выберете файл на компьютере</p>
                    </div>
                </div>
                <form method="POST" enctype="multipart/form-data" action="{{ route('profile.photo.update', \Illuminate\Support\Facades\Auth::user()->id ) }}" class="modal-footer">
                    @csrf
                    @method('patch')
                    <input name="photo" type="file"  class="form-control">
                    <button class="btn btn-primary" data-bs-dismiss="modal">Применить</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отменить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
