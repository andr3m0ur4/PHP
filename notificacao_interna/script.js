let verificarNotificacao = () => {

    $.ajax({
        url: 'verificar.php',
        type: 'POST',
        dataType: 'json',
        success: json => {

            if (json.qtd > 0) {
                $('.notificacoes').addClass('tem-notificacao')
                $('.notificacoes').html(json.qtd)
            } else {
                $('.notificacoes').removeClass('tem-notificacao')
                $('.notificacoes').html('0')
            }
        }
    })
}

$(() => {

    setInterval(verificarNotificacao, 5000)
    verificarNotificacao()

    $('.notificacoes').click(() => {
        $.ajax({
            url: 'ler.php',
            dataType: 'json',
            success: json => {
                let div = $('<div>')
                div.attr('id', 'msg-notificacao')
                $('#msg-notificacao').html('')

                json.forEach(item => {
                    let p = $('<p>')
                    p.html(`TIPO: ${item.notificacao_tipo}`)
                    div.append(p)
                    let propriedades = JSON.parse(item.propriedades)

                    if (item.notificacao_tipo == 'msg') {
                        let p = $('<p>')
                        p.html(propriedades.msg)
                        div.append(p)
                    } else if (item.notificacao_tipo == 'CURTIDA') {
                        let p = $('<p>')
                        p.html(`Usuário ${propriedades.curtidor} curtiu a foto ${propriedades.id_foto}`)
                        div.append(p)
                    }

                    div.append('<hr>')
                })

                $('.notificacoes').after(div)
            }
        })
        
    })

    $('.add-notificacao').click(() => {
        $.ajax({
            url: 'add.php'
        })
    })

})