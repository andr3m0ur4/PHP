$(() => {

    $('.modal-ajax').click(e => {
        e.preventDefault()

        $('.modal-content').html('Carregando...')
        $('#modal').modal()

        let link = $(e.target).attr('href')

        $.ajax({
            url: link,
            type: 'GET',
            success: html => {
                $('.modal-content').html(html)

                $('#btn').on('click', () => {
                    $('form').submit()
                })
            }
        })
    })

})