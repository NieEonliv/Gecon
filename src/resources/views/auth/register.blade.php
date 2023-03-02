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
                    <div class="align-items-center d-flex  h-100">
                        <div class="ms-md-5 w-100">
                            <h1>Регистрация</h1>

                            <div class="card-body ">
                                <form method="POST" action="{{ route('register') }} ">
                                    @csrf

                                    <div class="row mb-3">
                                        <label for="name" class="form-label ">Логин</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text"
                                                   class="form-control @error('name') is-invalid @enderror" name="name"
                                                   value="{{ old('name') }}" required autocomplete="name" autofocus>

                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="name" class="form-label ">Электронная почта</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email"
                                                   class="form-control @error('email') is-invalid @enderror" name="email"
                                                   value="{{ old('email') }}" required autocomplete="email">

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="name" class="form-label ">Пароль</label>


                                        <div class="col-md-6">
                                            <input id="password" type="password"
                                                   class="form-control @error('password') is-invalid @enderror" name="password"
                                                   required autocomplete="new-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="name" class="form-label ">Повторите пароль</label>

                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control"
                                                   name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>

                                    <div class="row mb-0">
                                        <div class="col-md-6 ">
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-success">
                                                    Зарегистироваться
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
