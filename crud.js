$(document).ready(function() {

    /* Post Insert */
    $(document).on('submit', '#diary-SaveForm', function() {
        $.post('create.php', $(this).serialize())
            .done(function(data) {
                $('#diary-SaveForm').wrap('<fieldset disabled></fieldset>');
                $('#dis').fadeOut('slow', function() {
                    $('#dis').html('<div class="alert alert-info">' + data + '</div>');
                });
                $('#dis').fadeIn('slow', function() {
                    setTimeout(function() {
                        $('body').fadeOut('slow', function() {
                            $(document).off();
                            $('body').load('.');
                            $('body').fadeIn('slow');
                        });
                    }, 5000);
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

    /* Post Edit */
    $('.edit-link').click(function() {
        var edit_time = $(this).data('date');
        $('.content-loader').fadeOut('slow', function() {
            $('.content-loader').fadeIn('slow');
            $('.content-loader').load('edit_form.php?edit_time=' + encodeURI(edit_time), function() {
                $('#diary-UpdateForm input:first').focus();
            });
            $('#btn-add').hide();
            $('#btn-view').show();
        });
        return false;
    });

    /* Post Update */
    $(document).on('submit', '#diary-UpdateForm', function() {
        $.post('update.php', $(this).serialize())
            .done(function(data) {
                $('#diary-UpdateForm').wrap('<fieldset disabled></fieldset>');
                $('#dis').fadeOut('slow', function() {
                    $('#dis').html('<div class="alert alert-info">' + data + '</div>');
                });
                $('#dis').fadeIn('slow', function() {
                    setTimeout(function() {
                        $('body').fadeOut('slow', function() {
                            $(document).off();
                            $('body').load('.');
                            $('body').fadeIn('slow');
                        });
                    }, 5000);
                });
            });
        return false;
    });

    /* Password Update */
    $(document).on('submit', '#diary-PasswordForm', function() {
        $.post('password.php', $(this).serialize())
            .done(function(data) {
                $('#diary-PasswordForm').trigger('reset');
                $('#diary-PasswordForm input:first').focus();
                $('#dis').fadeOut('slow', function() {
                    $('#dis').html('<div class="alert alert-info">' + data + '</div>');
                });
                $('#dis').fadeIn();
            });
        return false;
    });
});
