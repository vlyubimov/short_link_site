@extends('layout.main')
@section('page-title')
    Главная страница
@endsection
@section('content')
    <div class="main-index">
        <h1 class="logo">Short Link</h1>

        @guest
            <p>Вам нужно сократить ссылку? Прежде чем это сделать зарегестрируйтесь на сайте</p>
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
            <p>Есть аккаунт? Тогда вы можете <a href="/login">авторизоваться</a></p>
        @else



            <p>Вам нужно сократить ссылку? Сейчас всё сделаем!</p>



            {!! Form::open(['class' => 'form-controller']) !!}
                {{ Form::text('fullLink', '', ['placeholder' => 'Введите ссылку']) }}<br>
                {{ Form::text('shortLink', '', ['placeholder' => 'Новая ссылка']) }}
            @include('blocks.messages')
                {{ Form::button('Сократить', ['class' => 'main-btn', 'type' => 'submit']) }}<br>
            {!! Form::close() !!}
        </div>

        @if( count($links)>0)
            <div class="all-links">
                <h2>Сокращённые ссылки</h2><br>
                @foreach($links as $link)
                    <div class="link">
                        <p><b>Длинная:</b> {{ $link->fullLink }}</p>
                        <p><b>Короткая:</b> <a href="{{ $link->shortLink }}">{{ $link->shortLink }}</a></p>
                        {!! Form::open(['method'=>'DELETE','class' => 'form-controller', 'action' => ['LinkController@destroy', $link->id]]) !!}
                        {{ Form::button('Удалить', ['class' => 'main-btn', 'type' => 'submit']) }}<br>
                        {!! Form::close() !!}
                    </div>


                @endforeach
            </div>
        @endif

    @endguest
@endsection
