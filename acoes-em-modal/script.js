const editar = (id) => {
    
    $.ajax({
        url: 'editar.php',
        type: 'POST',
        data: {id },
        dataType: 'json',
        beforeSend: () => {
            $('#modal').find('.modal-body').html('Carregando...')
            $('#modal').modal('show')
        },
        success: json => {

            let form = $('<form>')
            form.attr('method', 'POST')

            criarCampo('Nome:', 'nome', json.nome, form)
            criarCampo('E-mail:', 'email', json.email, form)
            criarCampo('Domínio:', 'dominio', json.dominio, form)

            let input = $('<input>')
            input.attr({
                'type': 'hidden',
                'name': 'id',
                'value': json.id
            })
            form.append(input)

            let button = $('<button>')
            button.html('Salvar')
            form.append(button)

            $('#modal').find('.modal-body').html(form)
            $('#modal').find('.modal-body').find('form').submit(salvar)
        }
    })
}

const salvar = e => {
    e.preventDefault()

    let nome = $(e.target).find('input[name=nome]').val()
    let email = $(e.target).find('input[name=email]').val()
    let dominio = $(e.target).find('input[name=dominio]').val()
    let id = $(e.target).find('input[name=id]').val()

    $.ajax({
        url: 'salvar.php',
        type: 'POST',
        data: {
            nome, email, dominio, id
        },
        success: () => {
            alert('Dados alterados com sucesso!')
            window.location.href = window.location.href
        }
    })
}

const criarCampo = (labelContent, name, value, form) => {
    let label = $('<label>')
    label.html(labelContent)
    let input = $('<input>')
    input.attr({
        'type': 'text',
        'name': name
    })
    input.val(value)
    form.append(label)
    form.append('<br>')
    form.append(input)
    form.append('<br>')
    form.append('<br>')
}

const excluir = id => {
    $('#modal').find('.modal-body').html('Tem certeza que deseja excluir?')
    
    $('#modal').find('.modal-footer').remove()
    let div = $('<div>')
    div.addClass('modal-footer')

    let button = $('<button>')
    button.html('Sim')
    button.click(id, excluirUsuario)
    div.append(button)

    button = $('<button>')
    button.html('Não')
    button.attr('data-dismiss', 'modal')
    div.append(button)

    $('#modal').find('.modal-body').after(div)
    $('#modal').modal('show')
}

const excluirUsuario = e => {
    let id = e.data
    $.ajax({
        url: 'excluir.php',
        type: 'POST',
        data: { id },
        success: () => {
            alert('Usuário excluído com sucesso!')
            window.location.href = window.location.href
        }
    })
}

$(() => {

    $('.editar').click(e => {
        e.preventDefault()
        editar($(e.target).data('id'))
    })

    $('.excluir').click(e => {
        e.preventDefault()
        excluir($(e.target).data('id'))
    })

})