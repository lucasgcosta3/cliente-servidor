document.addEventListener('DOMContentLoaded', function() {
  if (successMessage) {
    Swal.fire({
      position: "top",
      icon: 'success',
      title: 'Recuperação de Senha',
      text: successMessage,
      showConfirmButton: true,
      confirmButtonText: "OK"
    }).then(() => {
      if (redirectUrl) {
        window.location.href = redirectUrl;
      }
    });
  } else if (errorMessage) {
    Swal.fire({
      position: "top",
      icon: 'error',
      title: 'Erro!',
      text: errorMessage,
      showConfirmButton: false,
      timer: 2000
    });
  }
});
