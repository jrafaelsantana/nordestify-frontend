$(document).ready(function()
{
    var userId = $('#idUser').val()

    //Usuários semelhantes
    $.ajax({
        url: "http://localhost:8000/userNeighbors/" + userId,
        type: "GET",
        crossDomain: true,
        dataType:"json",
        beforeSend: function() {
            $("#carregandoUsuarios").show();
        },
        success: function (response)
        {
            var trHTML = '';

            if(response.length > 0) {
                $.each(response, function (key, value) {
                    trHTML +=
                        '<div class="col">\n' +
                        '    <img class="card-img-top" src="uploads/avatars/' + value.avatar + '" alt="Card image cap">\n' +
                        '    <div class="card-body">\n' +
                        '        <h5 class="card-title align-center">'+value.name+'</h5>\n' +
                        '    </div>\n' +
                        '</div>';
                });
            }
            $('#resultadosUsuarios').html(trHTML);
            $("#carregandoUsuarios").hide();
        }
    });

    //Musicas Semelhantes
    $.ajax({
        url: "http://localhost:8000/musicsRecommendation/" + userId,
        type: "GET",
        crossDomain: true,
        dataType:"json",
        beforeSend: function() {
            $("#carregandoMusicas").show();
        },
        success: function (response)
        {
            var trHTML = '';

            if(response.length > 0) {
                $.each(response, function (key, value) {
                    trHTML +=
                        '<div class="col">\n' +
                        '    <img class="card-img-top" src="img/albuns/' + value.capa + '" alt="Card image cap">\n' +
                        '    <div class="card-body">\n' +
                        '        <h5 class="card-title align-center">' + value.name + '</h5>\n' +
                        '        <p class="card-text align-center">' + value.artist + '</p>\n' +
                        '    </div>\n' +
                        '</div>'
                });
            }
            $('#resultadosMusicas').html(trHTML);
            $("#carregandoMusicas").hide();
        }
    });
});

