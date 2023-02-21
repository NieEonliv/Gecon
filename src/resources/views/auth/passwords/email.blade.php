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
                <div class="col-md-6 ">
                    <div class=" justify-content-center align-items-center h-100 d-flex">

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf

                                <div class="row mb-3">
                                    <div class="ms-5">
                                        <label class="form-label">Введите адрес эл. почты</label>
                                        <div class="col-6 ">
                                            <input id="email" type="email"
                                                   class="form-control mx-auto  @error('email') is-invalid @enderror"
                                                   placeholder="Адрес эл. почты" name="email" value="{{ old('email') }}"
                                                   required autocomplete="email" autofocus>

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="mx-auto offset-md-4 ms-5">
                                        <button type="submit" class="btn btn-primary">
                                            Отправить
                                        </button>
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
