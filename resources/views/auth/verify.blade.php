// resources/views/auth/verify.blade.php

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Подтвердите свой email</h1>
        @if (session('resent'))
            <div class="alert alert-success">
                Мы отправили вам письмо для подтверждения email.
            </div>
        @endif

        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="btn btn-primary">Отправить подтверждение снова</button>
        </form>
    </div>
@endsection
