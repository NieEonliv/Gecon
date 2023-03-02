@extends('layouts.app')

@section('content')
    <div class="gradient h-100">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-6">
                    <img class="w-100"
                         src="https://media.istockphoto.com/id/1190230801/photo/gecon.jpg?s=612x612&w=is&k=20&c=kLEVQhOo_csLHBTj2eitiZfo_m_yNUrL_J3tOERvpfg="
                         alt="">
                </div>
                <div class="col-md-6">
                    <div class=" justify-content-center align-items-center h-100 d-flex">
                        <div class="card-body ms-md-5">
                                <h1 class=" mb-3">Вход</h1>
                            <form method="POST" class="" action="{{ route('login') }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="email" class="form-label ">Логин</label>

                                    <div class="col-md-6">
                                        <input id="email" placeholder="Введите логин" type="email"
                                               class="form-control @error('email') is-invalid @enderror" name="email"
                                               value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="d-flex justify-content-between col-md-6">
                                        <label for="password" class="form-label">Пароль</label>
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                Забыли пароль?
                                            </a>
                                        @endif
                                    </div>
                                    <div class="col-md-12"> </div>
                                    <div class="col-md-6">
                                        <input id="password" placeholder="Введите пароль" type="password"
                                               class="form-control @error('password') is-invalid @enderror" name="password"
                                               required autocomplete="current-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="row mb-0">
                                    <div class="col-md-6 ">
                                        <div class="text-center">
                                            <button type="submit" class="btn  btn-success">
                                                Войти
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
@endsection
