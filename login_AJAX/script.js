$(() => {

    $('form').submit(e => {
        e.preventDefault()

        let email = $('input[name=email]').val()
        let senha = $('input[name=senha]').val()

        $.ajax({
            type: 'POST',
            url: 'login.php',
            data: {
                email,
                senha
            },
            success: msg => {
                alert(msg)
            }
        })
    })

})