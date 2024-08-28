const ctxLine = document.getElementById('lineChart').getContext('2d');
const lineChart = new Chart(ctxLine, {
    type: 'line',
    data: {
        labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul'],
        datasets: [{
            label: '',  // Removido o rótulo do dataset
            data: [50, 75, 150, 200, 250, 300, 400],
            borderColor: 'rgba(0, 0, 255, 1)', // Alterado para azul
            borderWidth: 2,
            fill: false
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: false  // Oculta o retângulo com a legenda "Contas Ativas"
            }
        },
        scales: {
            x: {
                title: {
                    display: false  // Oculta a palavra "Mês"
                },
                ticks: {
                    display: true  // Mantém os rótulos dos meses
                }
            },
            y: {
                title: {
                    display: false  // Oculta a frase "Número de Contas Ativas"
                }
            }
        }
    }
});
