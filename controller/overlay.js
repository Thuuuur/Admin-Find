document.querySelectorAll('.nav-buttons').forEach(function(link) {
    link.onclick = function(event) {
        event.preventDefault(); // Evita o comportamento padrão do link

        // Remove a classe 'active' de todos os links
        document.querySelectorAll('.nav-buttons').forEach(function(link) {
            link.classList.remove('active');
        });

        // Adiciona a classe 'active' ao link clicado
        this.classList.add('active');

        // Esconde todos os overlays
        document.querySelectorAll('.overlay').forEach(function(overlay) {
            overlay.style.display = 'none';
        });

        // Mostra o overlay correspondente
        var targetOverlay = this.getAttribute('data-target');
        document.getElementById(targetOverlay).style.display = 'block';
    }
});

// Exibe o primeiro overlay por padrão e deixa o primeiro link ativo
document.getElementById('overlay1').style.display = 'block';
document.querySelector('.nav-buttons[data-target="overlay1"]').classList.add('active');
