@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}" />
@endsection

@section('button')
<a class="login__button" href="/login">login</a>
@endsection

@section('content')
<div class="Register-form__content">
    <div class="Register-form__heading">
        <h2>Register</h2>
    </div>

    <form class="Register-form">
        <div class="Register-form__group">
            <div class="Register-form__group-title">
                お名前
            </div>
            <div class="Register-form__group-content">
                <input type="text" name="name" placeholder="例:山田　太郎" value="{{ old('name') }}">
            </div>
        </div>
        <div class="Register-form__group">
            <div class="Register-form__group-title">
                メールアドレス
            </div>
            <div class="Register-form__group-content">
                <input type="email" name="email" placeholder="例:test@example.com" value="{{ old('email') }}">
            </div>
        </div>
        <div class="Register-form__group">
            <div class="Register-form__group-title">
                パスワード
            </div>
            <div class="Register-form__group-content">
                <input type="password" name="password" placeholder="例:coachtech1106" value="{{ old('password') }}">
            </div>
        </div>
        <div class="Register-form__button">
            <button class="Register-form__button-submit" type="submit">登録</button>
        </div>
    </form>
</div>
@endsection