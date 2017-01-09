$('document').ready(function() {
    /* validation */
    $('#login-form').validate({
        rules: {
            password: {
                required: true
            },
        },
        messages: {
            password: {
                required: '請輸入密碼'
            },
        },
        submitHandler: submitForm
    });

    /* login submit */
    function submitForm() {
        var data = $('#login-form').serialize();

        $.ajax({
            type: 'POST',
            url: 'login_process.php',
            data: data,
            beforeSend: function() {
                $('#error').fadeOut();
                $('#btn-login').html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; 驗證中……');
            },
            success: function(response) {
                if (response === 'ok') {
                    $('#btn-login').html('<img src="btn-ajax-loader.gif" /> &nbsp; 登入中……');
                    setTimeout('window.location.href = ".";', 4000);
                } else {
                    $('#error').fadeIn(1000, function() {
                        $('#error').html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; ' + response + '</div>');
                        $('#btn-login').html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; 登入');
                    });
                }
            }
        });
        return false;
    }
});
