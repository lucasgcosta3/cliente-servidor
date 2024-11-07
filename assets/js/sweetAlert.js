document.addEventListener('DOMContentLoaded', function() {
  const successMessage = document.getElementById('success-message').value;
  const errorMessage = document.getElementById('error-message').value;

  if (successMessage) {
    Swal.fire({
      position: "top",
      icon: 'success',
      title: 'Sucesso!',
      text: successMessage,
      showConfirmButton: false,
      timer: 2000
    }).then(() => {
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

// Swal.fire({
//   title: "Are you sure?",
//   text: "You won't be able to revert this!",
//   icon: "warning",
//   showCancelButton: true,
//   confirmButtonColor: "#3085d6",
//   cancelButtonColor: "#d33",
//   confirmButtonText: "Yes, delete it!"
// }).then((result) => {
//   if (result.isConfirmed) {
//     Swal.fire({
//       title: "Deleted!",
//       text: "Your file has been deleted.",
//       icon: "success"
//     });
//   }
// });
  
