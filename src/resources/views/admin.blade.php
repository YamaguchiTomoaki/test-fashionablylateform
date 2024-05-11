@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
@endsection

@section('button')
<form class="admin-form__logout" action="/logout" method="post">
    @csrf
    <button class="header-nav__button">logout</button>
</form>
@endsection

@section('content')
<div class="admin-form__content">
    <div class="admin-form__heading">
        <h2>Admin</h2>
    </div>

    <form class="search-form" action="/admin/search" method="get">
        @csrf
        <div class="search-form__item">
            <div class="search-form__item-input">
                <input type="text" name="keyword" placeholder="名前やメールアドレスを入力してください" />
            </div>
            <div class="search-form__item-gender">
                <div class="select__pointer">
                    <select name="gender">
                        <option value="null" hidden>性別</option>
                        <option value="1">男性</option>
                        <option value="2">女性</option>
                        <option value="3">その他</option>
                        <option value="4">全て</option>
                    </select>
                </div>
            </div>
            <div class="search-form__item-category">
                <div class="select__pointer">
                    <select name="category_id">
                        <option value="null" hidden>お問い合わせの種類</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category['id'] }}">{{ $category['content'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="search-form__item-date">
                <input type="date" name="date">
            </div>
            <div class="search-form__button">
                <button class="search-form__button-submit" type="submit">検索</button>
            </div>
            <div class="search-form__button-reset">
                <input type="reset" value="リセット">
            </div>
        </div>

        <div class="admin__content">
            <div class="content__header">
                <button class="export__button" type="submit">エクスポート</button>
                <!--ページ切り替え時にクエリ文字列を維持-->
                {{ $contacts->withQueryString()->links() }}
            </div>
            <div class="content-table">
                <table class="content-table__inner">
                    <tr class="content-table__row">
                        <th class="content-table__header">
                            お名前
                        </th>
                        <th class="content-table__header">
                            性別
                        </th>
                        <th class="content-table__header">
                            メールアドレス
                        </th>
                        <th class="content-table__header">
                            お問い合わせの種類
                        </th>
                        <th class="content-table__header"></th>
                    </tr>
                    @foreach ($contacts as $contact)
                    <tr class="content-table__row">
                        <td class="content-table__item">
                            {{ $contact['last_name'] . "　" . $contact['first_name']}}
                        </td>
                        <td class="content-table__item">
                            @if ($contact['gender'] == 1)
                            男性
                            @elseif ($contact['gender'] == 2)
                            女性
                            @elseif ($contact['gender'] == 3)
                            その他
                            @endif
                        </td>
                        <td class="content-table__item">
                            {{ $contact['email'] }}
                        </td>
                        <td class="content-table__item">
                            @switch ($contact['category_id'])
                            @case(1)
                            {{ $categories[0]->content }}
                            @break
                            @case(2)
                            {{ $categories[1]->content }}
                            @break
                            @case(3)
                            {{ $categories[2]->content }}
                            @break
                            @case(4)
                            {{ $categories[3]->content }}
                            @break
                            @case(5)
                            {{ $categories[4]->content }}
                            @endswitch
                        </td>
                        <td class="content-table__item">
                            <div class="detail__button">
                                <button class="content-table__button-detail" type="submit">詳細</button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </form>
</div>
@endsection