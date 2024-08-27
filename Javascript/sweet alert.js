export function showError(){
    Swal.fire({
        title: 'Error!',
        text: 'Oopps! Something went wrong while processing your data, please try again.',
        icon: 'error',
        confirmButtonText: 'Okay'
      });
}
