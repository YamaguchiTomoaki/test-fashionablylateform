@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
@endsection

@section('content')
<div class="confirm-content">
    <div class="confirm__heading">
        <h2>Confirm</h2>
    </div>
    <form class="confirm-form" action="/thanks" method="post">
        @csrf
        <div class="confirm-table">
            <table class="confirm-table__inner">
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お名前</th>
                    <td class="confirm-table__text">
                        <div class="confirm-table__text--name">
                            <input type="text" name="last_name" value="{{ $contact['last_name'] }}" readonly />
                            <p class="name__space">　</p>
                            <input type="text" name="first_name" value="{{ $contact['first_name'] }}" readonly />
                        </div>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">性別</th>
                    <td class="confirm-table__text">
                        <input type="text" name="gender" value="{{ $contact['gender'] }}" readonly />
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">メールアドレス</th>
                    <td class="confirm-table__text">
                        <input type="email" name="email" value="{{ $contact['email'] }}" readonly />
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">電話番号</th>
                    <td class="confirm-table__text">
                        <input type="tel" name="tell" value="{{ $contact['toptel'] . $contact['middletel'] . $contact['bottomtel'] }}" readonly />
                        <!--修正ボタンリダイレクト処理で必要の為、hiddenで送信-->
                        <input type="hidden" name="toptel" value="{{ $contact['toptel'] }}" />
                        <input type="hidden" name="middletel" value="{{ $contact['middletel'] }}" />
                        <input type="hidden" name="bottomtel" value="{{ $contact['bottomtel'] }}" />
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">住所</th>
                    <td class="confirm-table__text">
                        <input type="text" name="address" value="{{ $contact['address'] }}" readonly />
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">建物名</th>
                    <td class="confirm-table__text">
                        <input type="text" name="building" value="{{ $contact['building'] }}" readonly />
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせの種類</th>
                    <td class="confirm-table__text">
                        <select name="category_id" readonly>
                            <option value="{{ $category['id'] }}">{{ $category['content'] }}</option>
                        </select>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせ内容</th>
                    <td class="confirm-table__text">
                        <textarea name="detail" readonly>{{ $contact['detail'] }}</textarea>
                    </td>
                </tr>
            </table>
        </div>
        <div class="confirm-form__button">
            <button class="confirm-form__button-submit" type="submit">送信</button>
            <button class="correction__button" type="submit" name="correction" value="back">修正</button>
            <!--<a class="correction" href="/">修正</a>-->
        </div>

</div>
</form>
</div>
@endsection