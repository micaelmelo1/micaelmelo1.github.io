
//PAGINA HOME

$(document).ready(function () {
    $('#btn_tweet').click(function () {
        if ($('#text_tweet').val().length > 0) {
            $.ajax({
                url: 'inclui_tweet.php',
                method: 'POST',
                data: $('#form_tweet').serialize(),
                success: function (data) {
                    $('#text_tweet').val('');
                    atualizaTweet();
                }
            });
        }
    });

    function atualizaTweet() {

        $.ajax({
            url: 'get_tweet.php',
            success: function (data) {
                $('#tweets').html(data);
            }
        });
    }
    atualizaTweet();
});

//PAGINA PROUCURAR USUARIOS

$(document).ready(function () {

    $('#btn_buscar_pessoa').click(function () {

        if ($('#nome_pessoa').val().length > 0) {

            $.ajax({
                url: 'get_pessoas.php',
                method: 'POST',
                data: $('#form_proucurar_pessoas').serialize(),
                success: function (data) {
                    $('#pessoas').html(data);

                    $('.btn_seguir').click(function () {
                        var id_usuario = $(this).data('id_usuario');

                        $('#btn_seguir_' + id_usuario).hide();
                        $('#btn_deixar_seguir_' + id_usuario).show();

                        $.ajax({
                            url: 'seguir.php',
                            method: 'POST',
                            data: { seguir_id_usuario: id_usuario },
                            success: function (data) {
                                alert('seguindo');

                            }
                        });
                    });
                    $('.btn_deixar_seguir').click(function () {
                        var id_usuario = $(this).data('id_usuario');

                        $('#btn_seguir_' + id_usuario).show();
                        $('#btn_deixar_seguir_' + id_usuario).hide();

                        $.ajax({
                            url: 'deixar_seguir.php',
                            method: 'POST',
                            data: { deixar_seguir_id_usuario: id_usuario },
                            success: function (data) {
                                alert('deixou de seguir!!!');
                            }
                        });
                    });
                }
            });
        }
    });
});


// código javascrip INDEX.PHP
$(document).ready(function () {
    //verifica se os campos soram devidadente preenchidos
    $('#btn_login').click(function () {

        var campo_vazio = false;

        if ($('#campo_usuario').val() == '') {
            $('#campo_usuario').css({ 'border-color': '#A94442' });
            campo_vazio = true;
        } else {
            $('#campo_usuario').css({ 'border-color': '#CCC' });
        }

        if ($('#campo_senha').val() == '') {
            $('#campo_senha').css({ 'border-color': '#A94442' });
            campo_vazio = true;
        } else {
            $('#campo_senha').css({ 'border-color': '#CCC' });
        }

        if (campo_vazio) return false;
    })
});	