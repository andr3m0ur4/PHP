window.onload = () => {

    let contexto = document.getElementById('grafico').getContext('2d')
    let vendas = document.getElementById('vendas').innerHTML
    let custos = document.getElementById('custos').innerHTML
    vendas = vendas.split(',')
    custos = custos.split(',')
    
    let grafico = new Chart(contexto, {
        type: 'line',
        data: {
            labels: [
                'Janeiro',
                'Fevereiro',
                'Março',
                'Abril',
                'Maio'
            ],
            datasets: [{
                label: 'Vendas',
                backgroundColor: '#ff0000',
                borderColor: '#ff0000',
                data: vendas,
                fill: false
            }, {
                label: 'Custos',
                backgroundColor: '#00ff00',
                borderColor: '#00ff00',
                data: custos,
                fill: false
            }]
        }
    })

}