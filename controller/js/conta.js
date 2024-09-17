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

document.addEventListener('click', function(event) {
    const accountBox = document.getElementById('accountBox');
    if (!accountBox.contains(event.target) && !event.target.closest('.dashboard-navbar-menu-item2')) {
        accountBox.style.display = 'none';
    }
});
