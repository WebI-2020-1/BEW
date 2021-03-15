let icones = document.querySelectorAll('.inputIcon')

for (const i of icones) {
  i.style.height =
  `${document.querySelector('.input').clientHeight}px`;
}

