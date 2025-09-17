const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

// Evento para abrir o formulário de registro
signUpButton.addEventListener('click', () => {
  container.classList.add('right-panel-active');
});

// Evento para voltar ao formulário de login
signInButton.addEventListener('click', () => {
  container.classList.remove('right-panel-active');
});