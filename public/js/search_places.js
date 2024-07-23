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