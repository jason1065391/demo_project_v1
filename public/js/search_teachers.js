// public/js/search_teachers.js

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

    // 搜尋老師功能
    $('#searchTeachers').on('click', function() {
        var subjectId = $('#subject').val();
        var minBudget = $('.min-input').val();
        var maxBudget = $('.max-input').val();
        var cityId = $('#city').val();
        var district = $('#district').val();
        var timeId = $('#time').val();

        $.ajax({
            url: '{{ route("search.teachers") }}',
            type: 'GET',
            data: {
                subject_id: subjectId,
                min_budget: minBudget,
                max_budget: maxBudget,
                city_id: cityId,
                district: district,
                time_id: timeId
            },
            success: function(data) {
                $('.t_lists').empty();
                $.each(data.teachers, function(index, teacher) {
                    var html = '<div class="t_lists_block">';
                    html += '<div id="t_lists_title"><h2>' + teacher.title + '</h2></div>';
                    html += '<div>收藏</div>';
                    html += '<div id="t_lists_subject">教學的科目：' + teacher.subject + '</div>';
                    html += '<div id="t_lists_name">姓名：' + teacher.name + '</div>';
                    html += '<div id="t_lists_gender">性別：' + teacher.gender + '</div>';
                    html += '<div id="t_lists_place">上課預期地點：' + teacher.location + '</div>';
                    html += '<div id="t_lists_time">上課預期時間：' + teacher.time + '</div>';
                    html += '<div id="t_lists_price">上課預期時薪：' + teacher.min_price + ' - ' + teacher.max_price + '</div>';
                    html += '<div id="t_lists_picture">大頭貼</div>';
                    html += '<div id="t_lists_score">評分</div>';
                    html += '<div id="t_lists_describe">關於老師的詳細描述：' + teacher.description + '</div>';
                    html += '<div class="t_lists_buttons">';
                    html += '<button class="button">老師履歷</button>';
                    html += '<button class="button">聯絡老師</button>';
                    html += '</div>';
                    html += '</div>';
                    $('.t_lists').append(html);
                });
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
});