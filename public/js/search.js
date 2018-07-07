function millisToMinutesAndSeconds(millis) {
    var minutes = Math.floor(millis / 60000);
    var seconds = ((millis % 60000) / 1000).toFixed(0);

    if(seconds == 60){
        minutes = minutes+1;
        seconds = 0;
    }

    return minutes + ":" + (seconds < 10 ? '0' : '') + seconds;
}

$(document).ready(function()
{
    var msgPadrao = '<div class="alert alert-info" role="alert">\n' +
        '    <div class="container">\n' +
        '    <div class="alert-icon">\n' +
        '    <i class="now-ui-icons travel_info"></i>\n' +
        '    </div>\n' +
        '    <strong>Ei!</strong> Pesquise alguma música digitando os termos de busca no campo acima!\n' +
        '    </div>\n' +
        '    </div>';
    var msgErro = '<div class="alert alert-danger" role="alert">\n' +
        '    <div class="container">\n' +
        '    <div class="alert-icon">\n' +
        '    <i class="now-ui-icons objects_support-17"></i>\n' +
        '    </div>\n' +
        '    <strong>Eita!</strong> Nenhuma música foi encontrada!\n' +
        '    </div>\n' +
        '    </div>';

    $('#countResult').addClass("invisivel");
    $('#resultadoTabela').html(msgPadrao);
    $('#pesquisaMusica').keyup(function(e) {
        var termo = $('#pesquisaMusica').val().replace(' ', '-');
        if(e.keyCode == 0 || e.keyCode == 32){
            // Usuário pressionou o espaço
            $.ajax({
                url: "api/musics/search/"+termo,
                type: "GET",
                dataType:"json",
                success: function (response)
                {
                    var trHTML = '';
                    $('#resultadoTabela').html(msgPadrao);
                    $('#countResult').addClass("invisivel");

                    if(response.length > 0) {
                        $.each(response, function (key, value) {
                            trHTML +=
                                '<tr>' +
                                '<th scope="row">' +
                                '<img src="img/albuns/' + value.artist.photo + '" class="capaPesquisa">' +
                                '</th>' +
                                '<td>' + value.name + '</td>' +
                                '<td>' + value.artist.name + '</td>' +
                                '<td>' + millisToMinutesAndSeconds(value.duration_ms) + '</td>' +
                                '<td><a href="#" class="btnLike"><i class="fa fa-thumbs-o-up fa-2x"></i></a><a href="#" class="btnDislike"><i class="fa fa-thumbs-o-down fa-2x"></i></a></td>' +
                                '</tr>';
                        });

                        $('#resultadoTabela').html(trHTML);
                        $('#countResult').html(response.length);
                        $('#countResult').removeClass("invisivel");
                    }else{
                        $('#resultadoTabela').html(msgErro);
                    }
                }
            });
        }

        if(termo.length == 0){
            $('#resultadoTabela').html(msgPadrao);
            $('#countResult').addClass("invisivel");
        }
    });
});
