@extends('layout.main')
@section('page-title')
    {{ $header }}
@endsection
@section('content')
    <div class="main-about">
        <div class="">
            <p><span class="logo">Short Link</span> - это максимально удобный сервис по сокращению ссылкой</p>
            <p>Короткая ссылка — мощный маркетинговый инструмент, если использовать ее осторожно.
                Это не просто связь, а средство связи между вашим клиентом и пунктом назначения.
                Короткая ссылка позволяет вам собрать так много данных о ваших клиентах и их поведении.</p>
        </div>
        <div class="">
            <img src="/img/img-about.webp" alt="">
        </div>
    </div>
@endsection
