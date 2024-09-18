// Função para mostrar/ocultar o box de conta
document.querySelector('.dashboard-navbar-menu-item2').addEventListener('click', function(event) {
    event.preventDefault(); 
    event.stopPropagation();
    const accountBox = document.getElementById('accountBox');
    if (accountBox.style.display === 'none' || accountBox.style.display === '') {
        accountBox.style.display = 'block';
    } else {
        accountBox.style.display = 'none';
    }
});

// Fecha o box de conta ao clicar fora
document.addEventListener('click', function(event) {
    const accountBox = document.getElementById('accountBox');
    if (!accountBox.contains(event.target) && !event.target.closest('.dashboard-navbar-menu-item2')) {
        accountBox.style.display = 'none';
    }
});

// Alterna entre as tabelas ao mudar a seleção
document.getElementById('table-select').addEventListener('change', function() {
    const selectedTable = this.value;

    // Esconder todas as tabelas
    document.querySelectorAll('.table-container > div').forEach(table => {
        table.style.display = 'none';
    });

    // Mostrar a tabela selecionada
    document.getElementById(selectedTable).style.display = 'block';
});
