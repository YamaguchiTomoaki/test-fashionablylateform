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

    <form class="search-form">
        @csrf
        <div class="search-form__item">
            <div class="search-form__item-input">
                <input type="text" name="keyword" placeholder="名前やメールアドレスを入力してください" value="{{ old('keyword') }}" />
            </div>
            <div class="search-form__item-select">
                <div class="select__pointer">
                    <select name="gender">
                        <option value="null" hidden>性別</option>
                        <option value="1" @if(old('gender')==1) selected @endif>男性</option>
                        <option value="2" @if(old('gender')==2) selected @endif>女性</option>
                        <option value="3" @if(old('gender')==3) selected @endif>その他</option>
                    </select>
                </div>
            </div>
            <select class="search-form__item-select" name="category_id">
                <option value="null" hidden>お問い合わせの種類</option>
                @foreach ($categories as $category)
                <option value="{{ $category['id'] }}" @if(old('category_id')==$category['id']) selected @endif>{{ $category['content'] }}</option>
                @endforeach
            </select>
            <input class="search-form__item-date" type="date" name="date" value="{{ old('date') }}">
            <button class="search-form__button" type="submit">検索</button>
            <button class="search-form__button-reset" type="submit">リセット</button>
        </div>

        <div class="admin__content">
            <div class="content__header">
                <button class="export__button" type="submit">エクスポート</button>
                <!--ページネーション書く-->
                {{ $contacts->links() }}
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
                    </tr>
                    @foreach ($contacts as $contact)
                    <tr class="content-table__row">
                        <td class="content-table__item">
                            {{ $contact['last_name'] . $contact['first_name']}}
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
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </form>
</div>
@endsection