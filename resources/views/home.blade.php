@extends('layouts.app')

@section('title', '首頁')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/home.css') }}">
@endpush

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script>
    $(document).ready(function() {
        // 獲取縣市列表
        $.ajax({
            url: '/demo_project_v1/public/cities',
            type: 'GET',
            success: function(data) {
                $('#city').empty();
                $('#city').append('<option value="">請選擇縣市</option>');
                $.each(data, function(index, city) {
                    $('#city').append('<option value="' + city.id + '">' + city.city + '</option>');
                });
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });

        // Get the selected city ID from the dropdown
        var cityId = $('#city').val();

        // 當選擇縣市後，獲取對應的區域列表
        $('#city').change(function() {
            var selectedCityId = $(this).val();
            if (selectedCityId) {
                // Define the cityId variable here
                var cityId = selectedCityId;

                $.ajax({
                    url: '/demo_project_v1/public/districts/' + cityId,
                    type: 'GET',
                    success: function(data) {
                        $('#district').empty();
                        $('#district').append('<option value="">請選擇區域</option>');
                        $.each(data, function(index, district) {
                            $('#district').append('<option value="' + district.district_name + '">' + district.district_name + '</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            } else {
                $('#district').empty();
            }
        });
    });
</script>
@endpush

@section('content')
    <div class="home-container">
        <h1>歡迎來到首頁</h1>
        <p>這是一個簡單的示範頁面，展示了如何使用頁面特定的樣式。</p>
        <div class="special-offer">
            <p>特別優惠：限時折扣，馬上行動！</p>
        </div>
    </div>

    <div>
        <label for="city">選擇縣市：</label>
        <select name="city" id="city">
            <option value="">請選擇縣市</option>
        </select>

        <label for="district">選擇區域：</label>
        <select name="district" id="district">
            <!-- 這裡會動態填充選項 -->
        </select>
    </div>
@endsection
