@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('content')
<div class="contact-form__content">
    <div class="contact-form__heading">
        <h2>Contact</h2>
    </div>

    <form class="contact-form" action="/confirm" method="post">
        @csrf
        <div class="contact-form__group">
            <div class="contact-form__group-title">
                <span class="contact-form__label--item">お名前</span>
                <span class="contact-form__label--required">※</span>
            </div>
            <div class="contact-form__group-content">
                <div class="contact-form__input-text--name">
                    <input type="text" name="last_name" placeholder="例:山田" value="{{ old('last_name') }}" />
                    <input type="text" name="first_name" placeholder="例:太郎" value="{{ old('first_name') }}" />
                </div>
                <div class="contact-form__error">
                    @error('last_name')
                    {{ $message }}
                    @enderror
                    @error('first_name')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="contact-form__group">
            <div class="contact-form__group-title">
                <span class="contact-form__label--item">性別</span>
                <span class="contact-form__label--required">※</span>
            </div>
            <div class="contact-form__group-content">
                <div class="contact-form__input-radio">
                    <input type="radio" name="gender" id="male" value="男性" {{old('gender') == '男性' ? 'cheked' : ''}} checked>
                    <label for="male" class="radio__label">男性</label>
                    <input type="radio" name="gender" id="woman" value="女性" {{old('gender') == '女性' ? 'checked' : ''}}>
                    <label for="woman" class="radio__label">女性</label>
                    <input type="radio" name="gender" id="others" value="その他" {{old('gender') == 'その他' ? 'checked' : ''}}>
                    <label for="others" class="radio__label">その他</label>
                </div>
                <div class="contact-form__error">
                    @error('gender')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="contact-form__group">
            <div class="contact-form__group-title">
                <span class="contact-form__label--item">メールアドレス</span>
                <span class="contact-form__label--required">※</span>
            </div>
            <div class="contact-form__group-content">
                <div class="contact-form__input-text--email">
                    <input type="email" name="email" placeholder="例:test@example.com" value="{{ old('email') }}" />
                </div>
                <div class="contact-form__error">
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="contact-form__group">
            <div class="contact-form__group-title">
                <span class="contact-form__label--item">電話番号</span>
                <span class="contact-form__label--required">※</span>
            </div>
            <div class="contact-form__group-content">
                <div class="contact-form__input-text--tel">
                    <input type="tel" name="toptel" placeholder="080" value="{{ old('toptel') }}" />
                    <p class="tel-hyphen">-</p>
                    <input type="tel" name="middletel" placeholder="1234" value="{{ old('middletel') }}" />
                    <p class="tel-hyphen">-</p>
                    <input type="tel" name="bottomtel" placeholder="5678" value="{{ old('bottomtel') }}" />
                </div>
                <div class="contact-form__error">
                    @if ($errors->has('toptel'))
                    {{$errors->first('toptel')}}
                    @elseif ($errors->has('middletel'))
                    {{$errors->first('middletel')}}
                    @elseif ($errors->has('bottomtel'))
                    {{$errors->first('bottomtel')}}
                    @endif
                </div>
            </div>
        </div>
        <div class="contact-form__group">
            <div class="contact-form__group-title">
                <span class="contact-form__label--item">住所</span>
                <span class="contact-form__label--required">※</span>
            </div>
            <div class="contact-form__group-content">
                <div class="contact-form__input-text--address">
                    <input type="text" name="address" placeholder="例:東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}" />
                </div>
                <div class="contact-form__error">
                    @error('address')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="contact-form__group">
            <div class="contact-form__group-title">
                <span class="contact-form__label--item">建物名</span>
            </div>
            <div class="contact-form__group-content">
                <div class="contact-form__input-text--building">
                    <input type="text" name="building" placeholder="例:千駄ヶ谷マンション101" value="{{ old('building') }}" />
                </div>
                <div class="contact-form__error">
                    @error('building')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="contact-form__group">
            <div class="contact-form__group-title">
                <span class="contact-form__label--item">お問い合わせの種類</span>
                <span class="contact-form__label--required">※</span>
            </div>
            <div class="contact-form__group-content">
                <div class="contact-form__input--select">
                    <div class="select__pointer">
                        <select name="category_id">
                            <option value="null" hidden>選択してください</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category['id'] }}" @if(old('category_id')==$category['id']) selected @endif>{{ $category['content'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="contact-form__error">
                    @error('category_id')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="contact-form__group">
            <div class="contact-form__group-title">
                <span class="contact-form__label--item">お問い合わせ内容</span>
                <span class="contact-form__label--required">※</span>
            </div>
            <div class="contact-form__group-content">
                <div class="contact-form__input--textarea">
                    <textarea name="detail" placeholder="お問い合わせ内容をご記載ください"></textarea>
                </div>
                <div class="contact-form__error">
                    @error('detail')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="contact-form__button">
            <button class="contact-form__button-submit" type="submit">確認画面</button>
        </div>
    </form>
</div>
@endsection