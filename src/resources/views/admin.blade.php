@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
@endsection


@section('content')
<div class="logout">
    @if (Auth::check())
    <div class="logout__button">
        <form class="logout__button-form" action="/logout" method="post">
            @csrf
            <button class="logout__button-submit">logout</button>
        </form>
    </div>
    @endif
</div>

<div class="admin__content">
    <div class="admin__heading">
        <h2>Admin</h2>
    </div>

    <div class="admin__search">
        <form class="admin__search-form" action="/admin/search" method="get">
            @csrf
            <input class="admin__search-form_name" type="text" placeholder="名前やメールアドレスを入力してください" name="keyword">
            <select class="admin__search-form_gender" name="gender">
                <option value="">性別</option>
                <option value="1">男性</option>
                <option value="2">女性</option>
                <option value="3">その他</option>
                <option value="4">全て</option>
            </select>
            <select class="admin__search-form_category" name="category_id">
                <option value="">お問い合わせの種類</option>
                @foreach ($categories as $category)
                <option value="{{ $category['id'] }}">{{ $category['content'] }}</option>
                @endforeach
            </select>
            <input class="admin__search-form_date" type="date" placeholder="年/月/日" name="date">
            <button>検索</button>
        </form>
        <div class="admin__search-reset">
            <button><a href="/admin">リセット</a></button>
        </div>
    </div>

    <div class="admin__function">
        <div class="admin__function-export">
            <button class="admin__function-export_button">エクスポート</button>
        </div>
        <div class="admin__function-pagenation">
            {{ $contacts->links() }}
        </div>
    </div>

    <div class="admin__table">
        <form class="admin__form" action="/confirm" method="post">
            @csrf
            <table class="admin__table_inner">
                <tr class="admin__table-header-row">
                    <th class="admin__table-header">お名前</th>
                    <th class="admin__table-header">性別</th>
                    <th class="admin__table-header">メールアドレス</th>
                    <th class="admin__table-header">お問い合わせの種類</th>
                    <th></th>
                </tr>
                @foreach ($contacts as $contact)
                <tr class="admin__table-row">
                    <td class="admin__table-item">{{ $contact['last_name']."　".$contact['first_name'] }}</td>
                    <td class="admin__table-item">
                        @if ($contact['gender'] === 1)
                        男性
                        @elseif ($contact['gender'] === 2)
                        女性
                        @else
                        その他
                        @endif
                    </td>
                    <td class="admin__table-item">{{ $contact['email'] }}</td>
                    <td class="admin__table-item">{{ $contact->category->content }}</td>
                    <td><button class="admin__table-detail">詳細</button></td>
                </tr>
                @endforeach
            </table>
        </form>

    </div>
</div>
@endsection