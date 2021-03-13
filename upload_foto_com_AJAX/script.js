$(() => {

    /* $('#form').submit(e => {
        e.preventDefault()

        let form = e.target
        let data = new FormData(form)

        $.ajax({
            type: 'POST',
            url: 'recebedor.php',
            data: data,
            contentType: false,
            processData: false,
            success: msg => {
                alert(msg)
            }
        })
    }) */

    $('button').click(() => {
        let data = new FormData()

        let arquivos = $('#foto')[0].files

        if (arquivos.length > 0) {
            data.append('nome', $('#nome').val())
            data.append('foto', arquivos[0])

            $.ajax({
                type: 'POST',
                url: 'recebedor.php',
                data: data,
                contentType: false,
                processData: false,
                success: msg => {
                    alert(msg)
                }
            })
        }
    })

})