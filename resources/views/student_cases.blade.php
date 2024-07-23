@extends('layouts.app')

@section('title', '學生案件列表')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/student_cases.css') }}">
@endpush

@push('scripts')
    <!-- 加載 jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- 加載你的 search_places.js 腳本 -->
    <script src="{{ asset('js/search_places.js') }}"></script>
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
                    <!-- 要在加判斷，不可以低於 100 不可以高於 100000，min 不可以大於等於 max  -->
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
                </select>
            </div>

        </div>
        
        <div class="s_cases">

            <div class="s_cases_block">
                
                <div id="t_lists_title"><h2>國小三年級數學</h2></div>
                <div>收藏</div><!-- 使用icon 可以點選互動 -->
                <div id="t_lists_subject">教學的科目：數學</div>
                <div id="t_lists_name">姓名：王XX</div>
                <div id="t_lists_gender">性別：女</div>
                <div id="t_lists_place">上課預期地點：台中北屯區</div>
                <div id="t_lists_time">上課預期時間：上午</div>
                <div id="t_lists_price">上課預期時薪：300 - 400</div><!-- 抓資料庫 min - max -->
                <div id="t_lists_describe">關於學生的詳細描述：1. 需要多點耐心 2. 主要以輔導學校數學作業為主</div>
                <div class="button-container">
                    <button class="button">聯絡我</button><!-- 點選後跳出聊天室暫定 -->
                </div>
            </div>


        </div>



    
    </div>
@endsection