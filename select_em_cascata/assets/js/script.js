let pegarAulas = obj => {
    let item = obj.value
    
    $.ajax({
        url: '/home/pegar-aulas',
        type: 'POST',
        data: { modulo: item },
        dataType: 'json',
        success: json => {
            let html = json.map(aula => {
                let option = $('<option>')
                option.attr('value', aula.id)
                option.html(aula.titulo)
                return option
            })

            $('#aulas').html(html)
        }
    })
}

$(() => {

    $('#modulos').change(e => {
        pegarAulas(e.target)
    })

})