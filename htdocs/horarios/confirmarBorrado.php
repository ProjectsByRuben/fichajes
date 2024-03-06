<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar Borrado</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
</head>
<body>

<div class="container mt-5">
    <?php
        echo "<h1>Horario: </h1><h2>".$_REQUEST["nombre"]."</h2>";
        echo "<h1>ID: </h1><h2>".$_REQUEST["horario"]."</h2><br>";
    ?>
    <button class="btn btn-danger" onclick="confirmarBorrado()">Confirmar Borrado</button>
</div>

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
    function confirmarBorrado() {
        var horario = "<?php echo $_REQUEST['horario']; ?>";
        
        Swal.fire({
            title: '¿Estás seguro de dar de baja el horario?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Confirmar',
            cancelButtonText: 'Volver'
        }).then((result) => {
            if (result.isConfirmed) {
                // Acción a realizar si el usuario confirma (por ejemplo, redirigir a borraHorario.php con el horario como parámetro)
                Swal.fire(
                    'Horario dado de baja correctamente.',
                    '',
                    'success'
                ).then(() => {
                    window.location.href = 'borraHorario.php?id=' + encodeURIComponent(horario);
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                // Acción a realizar si el usuario deniega (por ejemplo, mostrar un mensaje de cancelación)
                Swal.fire(
                    'Acción cancelada',
                    'El horario no ha sido dado de baja.',
                    'info'
                );
            }
        });
    }
</script>



<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
