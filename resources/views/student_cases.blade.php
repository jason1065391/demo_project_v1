@extends('layouts.app')

@section('title', '學生案件列表')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/student_cases.css') }}">
@endpush

@push('scripts')
    <!-- 加載 jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- 加載你的 search_students.js 腳本 -->
    <script src="{{ asset('js/search_students.js') }}"></script>
@endpush

@section('content')
    <h1>學生案件列表</h1>

    <div class="student_cases_container">

        <div class="s_search">
        <h2>尋找學生</h2>
        <div class="s_search_subject">
            <p>請選擇教學的科目：</p>
            <select name="subject" id="subject">
                <option value="0">請選擇</option>
                @foreach($subjects as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="s_search_money"> 
            <p>請選擇上課預期薪資(時薪)：</p>
            <div class="price-input"> 
                <div class="price-field"> 
                    <span>最低預期</span> 
                    <input type="number" class="min-input" value="100"> 
                </div> 
                <div class="price-field"> 
                    <span>最高預期</span> 
                    <input type="number" class="max-input" value="100000"> 
                </div>
                <!-- 需要加入判斷，不能低於 100 不能高於 100000，而且 min 不可以大於等於 max  -->
            </div>
        </div>

        <div class="s_search_place">
            <p>請選擇上課地點：</p>
            <label for="city">選擇縣市：</label>
            <select name="city" id="city">
                <option value="">請選擇縣市</option>
            </select>

            <label for="district">選擇區域：</label>
            <select name="district" id="district">
                <!-- 這裡會動態填充選項 -->
            </select>
        </div>

        <div class="s_search_time">
            <p>請選擇預期上課時間：</p>
            <select name="time" id="time">
                <option value="0">請選擇上課時間</option>
                <option value="1">上午</option>
                <option value="2">下午</option>
                <option value="3">晚上</option>
            </select>
        </div>

        <button id="submitBtn">送出</button>
    </div>

    <div class="s_cases">
        <!-- 這裡將會動態添加符合條件的 s_cases_block -->
    </div>

@endsection