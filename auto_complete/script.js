$(() => {

    $('#busca').keyup(e => {
        let texto = $(e.target).val()

        $.ajax({
            type: 'POST',
            url: 'busca.php',
            data: { texto },
            dataType: 'json',
            success: json => {
                let html = []
                
                /* for (let i in json) {
                    let p = $('<p>')
                    let a = $('<a>')
                    a.html(json[i].nome)
                    a.attr('href', `pessoa.php/?id=${json[i].id}`)
                    p.append(a)
                    html.push(p)
                } */

                html = json.map(pessoa => {
                    let p = $('<p>')
                    let a = $('<a>')
                    a.html(pessoa.nome)
                    a.attr('href', `pessoa.php/?id=${pessoa.id}`)
                    p.append(a)
                    return p
                })

                $('#resultado').html(html)
                
            }
        })
    })

})