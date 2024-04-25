@if(Session::has('message'))
    <div class="alert alert-info" role="alert">
        <div class="text-muted">{{Session('message')}}</div>
    </div>
{{-- @elseif(Session::has('success'))
    <div class="alert alert-success" role="alert">
        <div class="text-muted">{{Session('success')}}</div>
    </div> --}}
@elseif(Session('error'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
 Swal.fire({
    icon: 'error',
    title: 'Error',
    text: '{{session('error')}}',
    confirmButtonText: 'Aceptar'
 })

</script>

    @elseif (session('success'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Muestra el mensaje de éxito utilizando SweetAlert2
    Swal.fire({
        icon: 'success',
        title: 'Éxito',
        text: '{{ session('success') }}',
        confirmButtonText: 'Aceptar',
       
       // cancelButtonText: 'Ver usuario', // Texto del botón de cancelar
       
        reverseButtons: true // Invierte el orden de los botones (Aceptar y Cancelar)
    })
    
</script>
@endif


