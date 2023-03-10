@extends('layout.main')
@section('page-title')
    Регистрация
@endsection
@section('content')
    <h1>Регистрация</h1>

    <form method="POST" action="/register" class="form-controller" style="width: 40%">
        @csrf
        <label for="name">Имя</label>
        <input id="name" type="text" name="name" value="{{ old('name') }}">
        @error('name')
            <div class="error-mess">
                {{ $message }}
            </div>
        @enderror

        <label for="email" >Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}">
        @error('email')
            <div class="error-mess">
                {{ $message }}
            </div>
        @enderror

        <label for="password" >Пароль</label>
        <input id="password" type="password" name="password" value="{{ old('password') }}">
        @error('password')
            <div class="error-mess">
                {{ $message }}
            </div>
        @enderror
        <label for="password-confirm" >Повторите пароль</label>
        <input id="password-confirm" type="password" name="password_confirmation" value="{{ old('password_confirmation') }}">


        <button type="submit" class="main-btn">Зарегестрироваться</button>
    </form>

@endsection
