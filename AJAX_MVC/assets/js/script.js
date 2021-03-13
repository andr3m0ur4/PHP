$(() => {

    $('button').click(() => {
        let nome = $('#nome').val()

        $.ajax({
            type: 'POST',
            url: '/ajax',
            data: { nome },
            dataType: 'json',
            success: result => {
                $('.borda').html(result.frase)
            }
        })
    })

})