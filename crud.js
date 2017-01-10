$(document).ready(function() {

    /* Post Insert */
    $(document).on('submit', '#diary-SaveForm', function() {
        $.post('create.php', $(this).serialize())
            .done(function(data) {
                $('#dis').fadeOut();
                $('#dis').fadeIn('slow', function() {
                    $('#dis').html('<div class="alert alert-info">' + data + '</div>');
                    $('#diary-SaveForm')[0].reset();
                    $('body').fadeOut('slow', function() {
                        $(document).off();
                        $('body').load('.');
                        $('body').fadeIn('slow');
                    });
                });
            });
        return false;
    });

    /* Post Delete */
    $('.delete-link').click(function() {
        var time = $(this).data('date');
        var del_time = time;
        var parent = $(this).parent('td').parent('tr');
        if (confirm('真的要刪除 ' + del_time + ' 嗎？')) {
            $.post('delete.php', {
                'del_time': del_time
            }, function(data) {
                parent.fadeOut('slow');
            });
        }
        return false;
    });

    /* Get Edit Time  */
    $('.edit-link').click(function() {
        var time = $(this).data('date');
        var edit_time = time;
        $('.content-loader').fadeOut('slow', function() {
            $('.content-loader').fadeIn('slow');
            $('.content-loader').load('edit_form.php?edit_time=' + encodeURI(edit_time));
            $('#btn-add').hide();
            $('#btn-view').show();
        });
        return false;
    });

    /* Post Update */
    $(document).on('submit', '#diary-UpdateForm', function() {
        $.post('update.php', $(this).serialize())
            .done(function(data) {
                $('#dis').fadeOut();
                $('#dis').fadeIn('slow', function() {
                    $('#dis').html('<div class="alert alert-info">' + data + '</div>');
                    $('#diary-UpdateForm')[0].reset();
                    $('body').fadeOut('slow', function() {
                        $(document).off();
                        $('body').load('.');
                        $('body').fadeIn('slow');
                    });
                });
            });
        return false;
    });

    /* Password Update */
    $(document).on('submit', '#diary-PasswordForm', function() {
        $.post('password.php', $(this).serialize())
            .done(function(data) {
                $('#dis').fadeOut();
                $('#dis').fadeIn('slow', function() {
                    $('#dis').html('<div class="alert alert-info">' + data + '</div>');
                    $('#diary-PasswordForm')[0].reset();
                });
            });
        return false;
    });
});
