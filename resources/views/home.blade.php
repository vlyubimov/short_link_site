@extends('layout.main')
@section('page-title')
    Кабинет пользователя
@endsection

@section('content')

    <h1>Кабинет пользователя</h1>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <p>Вы авторизованы</p>
    <form  action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
        <a href="#"><button type="submit" class="main-btn" style="margin: 10px 0">Выйти</button></a>
    </form>

@endsection
