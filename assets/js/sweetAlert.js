document.addEventListener('DOMContentLoaded', function() {
  if (successMessage) {
    let swalOptions = {
      position: "top",
      icon: 'success',
      title: 'Sucesso!',
      text: successMessage,
      showConfirmButton: false,
      timer: 2000
    };
    Swal.fire(swalOptions).then(() => {
      if (window.location.href.includes('register.php')) {
        window.location.href = 'login.php';
      } else {
        window.location.href = 'home.php';
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
