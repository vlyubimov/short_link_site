@extends('layout.main')
@section('page-title')
    Авторизация
@endsection
@section('content')
    <h1>Авторизация</h1>

    <form method="POST" action="/login" class="form-controller" style="width: 40%">
        @csrf
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

        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        <label  for="remember">Запомнить меня</label><br>
        <button type="submit" class="main-btn">Войти</button>
    </form>

@endsection
