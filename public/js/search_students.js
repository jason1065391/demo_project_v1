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

    // 當選擇縣市後，獲取對應的區域列表
    $('#city').change(function() {
        var selectedCityId = $(this).val();
        if (selectedCityId) {
            $.ajax({
                url: '/demo_project_v1/public/districts/' + selectedCityId,
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


    // 當按鈕被點擊時觸發事件
    $('#submitBtn').click(function() {
        var subjectId = $('#subject').val();
        var minPrice = $('.min-input').val();
        var maxPrice = $('.max-input').val();
        var cityId = $('#city').val();
        var district = $('#district').val();
        var time = $('#time').val();

        // 使用 AJAX 向後端發送請求，根據以上選擇條件獲取符合的學生案件列表
        $.ajax({
            url: '/search_student_cases',  // 替換成後端處理路徑
            type: 'GET',
            data: {
                subject_id: subjectId,
                min_price: minPrice,
                max_price: maxPrice,
                city_id: cityId,
                district: district,
                time: time
            },
            success: function(data) {
                // 清空 s_cases 區塊內容
                $('.s_cases').empty();

                // 將返回的 data 進行遍歷，每一條符合條件的學生案件都添加到 s_cases 區塊中
                $.each(data, function(index, studentCase) {
                    var html = `
                        <div class="s_cases_block">
                            <h2>${studentCase.title}</h2>
                            <div>收藏</div><!-- 使用icon 可以點選互動 -->
                            <div>教學的科目：${studentCase.subject}</div>
                            <div>姓名：${studentCase.name}</div>
                            <div>性別：${studentCase.gender}</div>
                            <div>上課預期地點：${studentCase.location}</div>
                            <div>上課預期時間：${studentCase.time}</div>
                            <div>上課預期時薪：${studentCase.min_price} - ${studentCase.max_price}</div>
                            <div>關於學生的詳細描述：${studentCase.description}</div>
                            <div class="button-container">
                                <button class="button">聯絡我</button><!-- 點選後跳出聊天室暫定 -->
                            </div>
                        </div>
                    `;
                    $('.s_cases').append(html);
                });
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
});