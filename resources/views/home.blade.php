@extends('layouts.app')

@section('title', '首頁')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/home.css') }}">
@endpush

@section('content')
    <div class="home-container">
        <h1>歡迎來到首頁</h1>
        <p>這是一個簡單的示範頁面，展示了如何使用頁面特定的樣式。</p>
        <div class="special-offer">
            <p>特別優惠：限時折扣，馬上行動！</p>
        </div>
        <img src="/images/home-banner.jpg" alt="首頁橫幅">
    </div>
@endsection