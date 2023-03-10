@extends('layout.main')
@section('page-title')
    Контакты
@endsection
@section('content')
    <h1>Обратная связь</h1>
    <p>Напишите нам, если у вас есть вопросы</p>

    <form method="POST" action="/contact" class="form-controller" style="width: 40%">
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

        <label for="text" >Ваше сообщение</label><br>
        <textarea name="text">{{ old('text') }}</textarea><br>
        @error('text')
        <div class="error-mess">
            {{ $message }}
        </div>
        @enderror

        <button type="submit" class="main-btn">Отправить</button>
    </form>

@endsection
