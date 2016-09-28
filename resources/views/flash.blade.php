@if(session()->has('flash_message'))
   <script>
    swal({
      title: "Error!",
      text: "Here's my error message!",
      type: "info",
      timer: 3000,
      showConfirmationButton: false
    });
  </script>
@else
  
@endif