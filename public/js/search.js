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

function millisToMinutesAndSeconds(millis) {
    var minutes = Math.floor(millis / 60000);
    var seconds = ((millis % 60000) / 1000).toFixed(0);

    if(seconds == 60){
        minutes = minutes+1;
        seconds = 0;
    }

    return minutes + ":" + (seconds < 10 ? '0' : '') + seconds;
}

function searchMusic () {
    var termo = $('#pesquisaMusica').val().replace(' ', '-');
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

                    var reviewBtns = '';
                    if(value.review == null){
                        reviewBtns = '<td id="btnReview'+value.id+'" width="20%"><button class="btnReview btnLike" data-action="like" data-id="'+value.id+'"><i class="fa fa-thumbs-o-up fa-2x"></i></button>' +
                            '<button class="btnReview btnDislike" data-action="dislike" data-id="'+value.id+'"><i class="fa fa-thumbs-o-down fa-2x"></i></button>' +
                            '</td>';
                    }else if(value.review == 1){
                        reviewBtns = '<td width="20%"><i class="fa fa-thumbs-up fa-2x btnLike"></i></td>';
                    }else if(value.review == -1){
                        reviewBtns = '<td width="20%"><i class="fa fa-thumbs-down fa-2x btnDislike"></i></td>';
                    }

                    trHTML +=
                        '<tr>' +
                        '<th scope="row">' +
                        '<img src="img/albuns/' + value.artist.photo + '" class="capaPesquisa">' +
                        '</th>' +
                        '<td>' + value.name + '</td>' +
                        '<td>' + value.artist.name + '</td>' +
                        '<td>' + millisToMinutesAndSeconds(value.duration_ms) + '</td>' +
                        reviewBtns +
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

$(document).ready(function()
{
    $('#countResult').addClass("invisivel");
    $('#resultadoTabela').html(msgPadrao);

    var typingTimer;
    var doneTypingInterval = 500;
    var $input = $('#pesquisaMusica');

    $input.on('keyup', function () {
        clearTimeout(typingTimer);
        typingTimer = setTimeout(searchMusic, doneTypingInterval);
    });

    $input.on('keydown', function () {
        clearTimeout(typingTimer);
    });

    $('#pesquisaMusica').keyup(function(e) {
        if ($input.val().length == 0) {
            $('#resultadoTabela').html(msgPadrao);
            $('#countResult').addClass("invisivel");
        }
    });

    $(document).on("click", ".btnReview", function (evt) {
        evt.preventDefault();
        var id = $(this).data("id");
        var review = $(this).data("action");

        $.ajax({
            url: "api/musics/reviews/"+review+"/"+id,
            type: "GET",
            dataType:"json",
            success: function (response)
            {
                //TODO: Previnir caso o usuário já tenha feito o review de uma música (Desabilitar os botões)
                var td = $('#btnReview'+id);
                if(review == "like"){
                    td.html("<i class=\"fa fa-thumbs-up fa-2x btnLike\"></i>");
                }else{
                    td.html("<i class=\"fa fa-thumbs-down fa-2x btnDislike\"></i>")
                }
            }
        });

    });

});

