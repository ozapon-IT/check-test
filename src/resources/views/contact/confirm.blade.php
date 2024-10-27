@extends('layouts.app')

@section('title', 'Confirm - FashionablyLate')

@section('css')
<link rel="stylesheet" href="{{ asset('css/contact/confirm.css') }}">
@endsection

@section('header')
<header class="header">
    <div class="header__container">
        <h1 class="header__title">FashionablyLate</h1>
    </div>
</header>
@endsection

@section('content')
<div class="confirm">
    <h2 class="confirm__title">Confirm</h2>

    <form class="confirm__form" action="{{ route('contact.store') }}" method="POST">
        @csrf
        <table class="confirm__table">
            <tr class="confirm__row">
                <th class="confirm__label">お名前</th>
                <td class="confirm__value">{{ $inputs['last_name'] }} {{ $inputs['first_name'] }}</td>
            </tr>
            <tr class="confirm__row">
                <th class="confirm__label">性別</th>
                <td class="confirm__value">
                    @if ($inputs['gender'] === 'male') 男性
                    @elseif ($inputs['gender'] === 'female') 女性
                    @else その他
                    @endif
                </td>
            </tr>
            <tr class="confirm__row">
                <th class="confirm__label">メールアドレス</th>
                <td class="confirm__value">{{ $inputs['email'] }}</td>
            </tr>
            <tr class="confirm__row">
                <th class="confirm__label">電話番号</th>
                <td class="confirm__value">{{ $inputs['phone1'] }}-{{ $inputs['phone2'] }}-{{ $inputs['phone3'] }}</td>
            </tr>
            <tr class="confirm__row">
                <th class="confirm__label">住所</th>
                <td class="confirm__value">{{ $inputs['address'] }}</td>
            </tr>
            <tr class="confirm__row">
                <th class="confirm__label">建物名</th>
                <td class="confirm__value">{{ $inputs['building'] ?? 'なし'}}</td>
            </tr>
            <tr class="confirm__row">
                <th class="confirm__label">お問い合わせの種類</th>
                <td class="confirm__value">
                    {{ App\Models\Category::find($inputs['content'])->content }}
                </td>
            </tr>
            <tr class="confirm__row">
                <th class="confirm__label">お問い合わせ内容</th>
                <td class="confirm__value">{!! nl2br(e($inputs['detail'])) !!}</td>
            </tr>
        </table>

        <div class="confirm__buttons">
            <button class="confirm__button" type="submit">送信</button>
            <a class="confirm__link" href="/?back=1">修正</a>
        </div>
    </form>
</div>
@endsection