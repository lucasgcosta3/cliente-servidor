function verSenha(id) {
  const passwordInput = document.getElementById(id);
  const toggleIcon = passwordInput.nextElementSibling;
  
  if (passwordInput.type === 'password') {
    passwordInput.type = 'text';
    toggleIcon.classList.remove('fa-eye');
    toggleIcon.classList.add('fa-eye-slash'); // "olho fechado"
  } else {
    passwordInput.type = 'password';
    toggleIcon.classList.remove('fa-eye-slash');
    toggleIcon.classList.add('fa-eye'); // "olho aberto"
  }
}
