@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}" />
@endsection

@section('button')
<a class="register__button" href="/register">register</a>
@endsection

@section('content')
<div class="Login-form__content">
    <div class="Login-form__heading">
        <h2>Login</h2>
    </div>

    <form class="Login-form" action="/login" method="post">
        @csrf
        <div class="Login-form__group">
            <div class="Login-form__group-title">
                メールアドレス
            </div>
            <div class="Login-form__group-content">
                <input type="email" name="email" placeholder="例:test@example.com" value="{{ old('email') }}">
            </div>
            <div class="Login-form__error">
                @error('email')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class="Login-form__group">
            <div class="Login-form__group-title">
                パスワード
            </div>
            <div class="Login-form__group-content">
                <input type="password" name="password" placeholder="例:coachtech1106" value="{{ old('password') }}">
            </div>
            <div class="Login-form__errot">
                @error('password')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class="Login-form__button">
            <button class="Login-form__button-submit" type="submit">ログイン</button>
        </div>
    </form>
</div>
@endsection