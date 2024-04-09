@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection


@section('content')

<div class="contact-form__content">
    <div class="contact-form__heading">
        <h2>contact</h2>
    </div>
    <form class="contact-form__form" action="/confirm" method="post">
        @csrf
        <table class="contact-form__table">
            <tr class="form__error">
                <th></th>
                <td>@error('last_name')
                    {{ $message }}
                    @enderror
                    @error('first_name')
                    {{ $message }}
                    @enderror
                </td>
            </tr>
            <tr class="contact-form__table-row">
                <th class="contact-form__table-label">
                    お名前 <span>※</span>
                </th>
                <td class="contact-form__table-item">
                    <input type="text" name="last_name" placeholder="例：山田" value="{{ old('last_name') }}">
                    <input type="text" name="first_name" placeholder="例：太郎" value="{{ old('first_name') }}">
                </td>
            </tr>
            <tr class="form__error">
                <th></th>
                <td>@error('gender')
                    {{ $message }}
                    @enderror
                </td>
            </tr>
            <tr class="contact-form__table-row">
                <th class="contact-form__table-label">
                    性別 <span>※</span>
                </th>
                <td class="contact-form__table-item">
                    <input type="radio" name="gender" value="1" checked>
                    <label for="1">男性</label><br>
                    <input type="radio" name="gender" value="2">
                    <label for="2">女性</label><br>
                    <input type="radio" name="gender" value="3">
                    <label for="3">その他</label>
                </td>
            </tr>
            <tr class="form__error">
                <th></th>
                <td>@error('email')
                    {{ $message }}
                    @enderror
                </td>
            </tr>
            <tr class="contact-form__table-row">
                <th class="contact-form__table-label">
                    メールアドレス <span>※</span>
                </th>
                <td class="contact-form__table-item">
                    <input type="email" name="email" placeholder="例：test@example.com" value="{{ old('email') }}">
                </td>
            </tr>
            <tr class="form__error">
                <th></th>
                <td>@error('tell')
                    {{ $message }}
                    @enderror
                </td>
            </tr>
            <tr class="contact-form__table-row">
                <th class="contact-form__table-label">
                    電話番号 <span>※</span>
                </th>
                <td class="contact-form__table-item">
                    <input type="tel" name="tell" placeholder="例：08012345678" value="{{ old('tell') }}">
                </td>
            </tr>
            <tr class="form__error">
                <th></th>
                <td>@error('address')
                    {{ $message }}
                    @enderror
                </td>
            </tr>
            <tr class="contact-form__table-row">
                <th class="contact-form__table-label">
                    住所 <span>※</span>
                </th>
                <td class="contact-form__table-item">
                    <input type="text" name="address" placeholder="例：東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}">
                </td>
            </tr>
            <tr class="contact-form__table-row">
                <th class="contact-form__table-label">
                    建物
                </th>
                <td class="contact-form__table-item">
                    <input type="text" name="building" placeholder="例：千駄ヶ谷マンション101" value="{{ old('building') }}">
                </td>
            </tr>
            <tr class="form__error">
                <th></th>
                <td>@error('category_id')
                    {{ $message }}
                    @enderror
                </td>
            </tr>
            <tr class="contact-form__table-row">
                <th class="contact-form__table-label">
                    お問い合わせの種類<span>※</span>
                </th>
                <td class="contact-form__table-item">
                    <select name="category_id">
                        <option value="">選択してください</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category['id'] }}">{{ $category['content'] }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr class="form__error">
                <th></th>
                <td>@error('detail')
                    {{ $message }}
                    @enderror
                </td>
            </tr>
            <tr class="contact-form__table-row">
                <th class="contact-form__table-label">
                    お問い合わせの内容<span>※</span>
                </th>
                <td class="contact-form__table-item">
                    <textarea name="detail" cols="50" rows="20" placeholder="お問い合わせ内容をご記載ください"></textarea>
                </td>
            </tr>
        </table>
        <div class="contact-form__button">
            <button class="contact-form__button-submit" type="submit">確認画面</button>
        </div>
    </form>
</div>

@endsection