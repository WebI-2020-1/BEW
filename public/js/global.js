// método para os ícones
feather.replace()

// Mostrar/Esconder menu lareral
document.querySelectorAll('.menu-toggle').forEach(menu => {
  menu.addEventListener('click', () => {
    document.querySelector('.sidebar-menu').classList.toggle("disabled");
    document.querySelector('main').classList.toggle('wide');
    document.querySelectorAll('.menu-toggle')[0].classList.toggle('disabled');
    document.querySelectorAll('.menu-toggle')[1].classList.toggle('disabled');
  });
});

// Adicionar rota ao clicar no logo do bew, redirecionando pro dashboard
document.querySelector('.logo-container .logo').addEventListener('click', () => {
  window.location.replace("/dashboard");
})
