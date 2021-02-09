// método para os ícones
feather.replace()

document.querySelectorAll('.menu-toggle').forEach(menu => {
  menu.addEventListener('click', () => {
    document.querySelector('.sidebar-menu').classList.toggle("disabled");
    document.querySelector('main').classList.toggle('wide');
    document.querySelectorAll('.menu-toggle')[0].classList.toggle('disabled');
    document.querySelectorAll('.menu-toggle')[1].classList.toggle('disabled');
  });
});
