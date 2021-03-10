$(document).ready(function() {

    var height = $(window).height() - $('#footer-wp').outerHeight(true) - $('#header-wp').outerHeight(true);
    $('#content').css('min-height', height);

    //  CHECK ALL
    $('input[name="checkAll"]').click(function() {
        var status = $(this).prop('checked');
        $('.list-table-wp tbody tr td input[type="checkbox"]').prop("checked", status);
    });

    // EVENT SIDEBAR MENU
    $('#sidebar-menu .nav-item .nav-link .title').after('<span class="fa fa-angle-right arrow"></span>');
    var sidebar_menu = $('#sidebar-menu > .nav-item > .nav-link');
    sidebar_menu.on('click', function() {
        if (!$(this).parent('li').hasClass('active')) {
            $('.sub-menu').slideUp();
            $(this).parent('li').find('.sub-menu').slideDown();
            $('#sidebar-menu > .nav-item').removeClass('active');
            $(this).parent('li').addClass('active');
            return false;
        } else {
            $('.sub-menu').slideUp();
            $('#sidebar-menu > .nav-item').removeClass('active');
            return false;
        }
    });

    $(function() {
        var inputFile = $('#file');
        $('#upload_single_bt').click(function(event) {
            var URI_single = $('#file').attr('data-uri');
            var fileToUpload = inputFile[0].files[0];
            var formData = new FormData();
            formData.append('file', fileToUpload);
            $.ajax({
                url: URI_single,
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    if (status == 'ok') {

                        showThumbUpload(data);
                        $('#thumbnail_url').val(data);
                    }

                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
            return false;
        });

        function showThumbUpload(data) {
            var items;
            items = '<img src="' + data.file_path + '"/>';
            $('#show_list_file').html(items);
        }

    });
});
//file js để đâu
//cái custom.js đó hả anh
//file ajax ý//ajax