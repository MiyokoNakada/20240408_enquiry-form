@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<div class="login">
    <div class="register__link">
        <button class="register__button">
            <a class=" register__button-submit" href="/register">register</a>
        </button>
    </div>
    <div class="login__content">
        <div class="login-form__heading">
            <h2>Login</h2>
        </div>
        <div class="login-form">
            <form class="login-form_form" action="/login" method="post">
                @csrf
                <div class="login-form__group">
                    <div class="login-form__group-title">
                        <span class="login-form__label--item">メールアドレス</span>
                    </div>
                    <div class="login-form__group-content">
                        <div class="login-form__input--text">
                            <input type="email" placeholder="例: test@example.com" name="email" value="{{ old('email') }}" />
                        </div>
                        <div class="form__error">
                            @error('email')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="login-form__group">
                    <div class="login-form__group-title">
                        <span class="login-form__label--item">パスワード</span>
                    </div>
                    <div class="login-form__group-content">
                        <div class="login-form__input--text">
                            <input type="password" placeholder="例: coachtech1106" name="password" />
                        </div>
                        <div class="form__error">
                            @error('password')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="login-form__button">
                    <button class="login-form__button-submit" type="submit">ログイン</button>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection