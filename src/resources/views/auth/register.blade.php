@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="register">
    <div class="login__link">
        <button class="login__button">
            <a class="login__button-submit" href="/login">login</a>
        </button>
    </div>

    <div class="register__content">
        <div class="register-form__heading">
            <h2>Register</h2>
        </div>
        <div class="register-form">
            <form class="register-form_form" action="/register" method="post">
                @csrf
                <div class="register-form__group">
                    <div class="register-form__group-title">
                        <span class="register-form__label--item">お名前</span>
                    </div>
                    <div class="register-form__group-content">
                        <div class="register-form__input--text">
                            <input type="text" placeholder="例：山田 太郎" name="name" value="{{ old('name') }}" />
                        </div>
                        <div class="form__error">
                            @error('name')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="register-form__group">
                    <div class="register-form__group-title">
                        <span class="register-form__label--item">メールアドレス</span>
                    </div>
                    <div class="register-form__group-content">
                        <div class="register-form__input--text">
                            <input type="email" placeholder="例: test@example.com" name="email" value="{{ old('email') }}" />
                        </div>
                        <div class="form__error">
                            @error('email')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="register-form__group">
                    <div class="register-form__group-title">
                        <span class="register-form__label--item">パスワード</span>
                    </div>
                    <div class="register-form__group-content">
                        <div class="register-form__input--text">
                            <input type="password" placeholder="例: coachtech1106" name="password" />
                            <input type="password" placeholder="例: coachtech1106" name="password_confirmation" />
                        </div>
                        <div class="form__error">
                            @error('password')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="register-form__button">
                    <button class="register-form__button-submit" type="submit">登録</button>
                </div>
            </form>
        </div>
    </div>
    @endsection