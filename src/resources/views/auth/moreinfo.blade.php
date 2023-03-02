@extends('layouts.app')

@section('content')
    <div class="gradient h-100 py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img class="w-100"
                         src="https://media.istockphoto.com/id/1190230801/photo/gecon.jpg?s=612x612&w=is&k=20&c=kLEVQhOo_csLHBTj2eitiZfo_m_yNUrL_J3tOERvpfg="
                         alt="">
                </div>
                <div class="col-md-6">
                    <div class="align-items-center d-flex h-100">
                        <div class="ms-md-5 w-100">
                            <h1>Регистрация</h1>

                            <div class="card-body ">
                                <form method="POST" action="{{ route('register.adventure') }}">
                                    @csrf

                                    <div class="row mb-3">
                                        <label for="name" class="form-label ">Фамилия</label>

                                        <div class="col-md-6">
                                            <input id="lastname" type="text"
                                                   class="form-control @error('lastname') is-invalid @enderror"
                                                   name="lastname"
                                                   value="{{ old('lastname') }}" required autocomplete="name" autofocus>

                                            @error('lastname')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="name" class="form-label ">Имя</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text"
                                                   class="form-control @error('name') is-invalid @enderror" name="name"
                                                   value="{{ old('name') }}" required autocomplete="name">

                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="patronymic" class="form-label ">Отчество</label>

                                        <div class="col-md-6">
                                            <input id="patronymic" type="text"
                                                   class="form-control @error('patronymic') is-invalid @enderror" name="patronymic"
                                                   value="{{ old('patronymic') }}" required autocomplete="patronymic">

                                            @error('patronymic')
                                            <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="birthday" class="form-label ">Дата рождения</label>

                                        <div class="col-md-6">
                                            <input id="birthday" type="date"
                                                   class="form-control @error('birthday') is-invalid @enderror" name="birthday"
                                                   value="{{ old('birthday') }}" required autocomplete="birthday">

                                            @error('birthday')
                                            <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-0">
                                        <div class="col-md-6 ">
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-success">
                                                     Продолжить
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
