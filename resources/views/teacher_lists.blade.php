@extends('layouts.app')

@section('title', '老師履歷列表')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/teacher_lists.css') }}">
@endpush

@section('content')
    <h1>老師履歷列表</h1>

    <div class="teacher_lists_container">

        <div class="t_search">
            <h2>尋找老師</h2>
            <div class="t_search_subject">
                <p>請選擇想學的科目：</p>
                <select name="subject" id="subject">
                    <option value="0">請選擇</option>
                    @foreach($subjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="t_search_money"> 
                <p>請選擇上課預算(小時)：</p>
                <div class="price-input"> 
                    <div class="price-field"> 
                        <span>最低預算</span> 
                        <input type="number" class="min-input" value="100"> 
                    </div> 
                    <div class="price-field"> 
                        <span>最高預算</span> 
                        <input type="number" class="max-input" value="100000"> 
                    </div>
                    <!-- 要在加判斷，不可以低於 100 不可以高於 100000，min 不可以大於等於 max  -->
                </div>
            </div>

            <div class="t_search_place">
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

            <div class="t_search_time">
                <p>請選擇預期上課時間：</p>
                <select name="time" id="time">
                    <option value="0">請選擇上課時間</option>
                    <option value="1">上午</option>
                    <option value="2">下午</option>
                    <option value="3">晚上</option>
                </select>
            </div>

            <button id="searchTeachers">送出</button>

        </div>
        
        <div class="t_lists">
            <!-- 這裡會動態生成符合條件的老師列表 -->
        </div>

    </div>

@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/search_teachers.js') }}"></script>
@endpush