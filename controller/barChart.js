const ctxBar = document.getElementById('barChart').getContext('2d');
const barChart = new Chart(ctxBar, {
    type: 'bar',
    data: {
        labels: ['Conta A', 'Conta B', 'Conta C', 'Conta D', 'Conta E'],
        datasets: [{
            label: '',  // Removido o rótulo do dataset
            data: [20, 35, 50, 75, 100],
            backgroundColor: 'rgba(0, 0, 255, 0.6)',  // Alterado para azul
            borderColor: 'rgba(0, 0, 255, 1)',  // Alterado para azul
            borderWidth: 2
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: false  // Oculta o retângulo e o rótulo "Acessos Mensais"
            }
        },
        scales: {
            x: {
                title: {
                    display: false  // Oculta a palavra "Contas"
                }
            },
            y: {
                title: {
                    display: false  // Oculta a frase "Número de Acessos"
                }
            }
        }
    }
});
