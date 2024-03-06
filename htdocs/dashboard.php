<?php
include ("./scripts/autentificado.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="node_modules/atropos/atropos.min.js"></script>
    <link rel="stylesheet" href="node_modules/atropos/atropos.css" />
    <title>Document</title>
    <style>
       body {
        background-image: url('/img/fondo.png'); /* Ruta a tu imagen de fondo */
        background-size: cover; /* Ajusta la imagen para cubrir todo el fondo */
        background-repeat: no-repeat; /* Evita que la imagen se repita */
        background-attachment: fixed; /* Fija la imagen de fondo al desplazarse por la página */
      }
      .boton{
        padding: 5px;
        border: none;
        background: none;
      }
      .boton a{
        text-decoration: none;
        transition: 1s;
      }
      .boton a:hover{
        color: #605555;
        font-size: 20px;
      }
      .fichaje{
        padding: 5px;
        margin-right: 10px;
      }
      .atroposes1 {
        margin-top: 145px; /* Ajusta el valor según sea necesario */
        margin-left: 30px;
    }
    .atroposes2 {
        margin-top: 145px; /* Ajusta el valor según sea necesario */
    }
    .atroposes3 {
        margin-top: 145px; /* Ajusta el valor según sea necesario */
        margin-right: 30px;
    }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <h2 class="fichaje">Fichajes</h2>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="./horarios/index.php">Horarios</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="./empleados/index.php">Empleados</a>
                </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="./avisos/index.php">Avisos</a>
                </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="./departamentos/index.php">Departamentos</a>
                </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="./turnospublicados/index.php">Turnos Publicados</a>
                </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="./categorias/index.php">Categorias</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" aria-current="page" href="./ejemplo/index.php">Ejemplo</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
              <button class="boton" type="submit"><a href="./scripts/cerrar.php">Cerrar Sesion</a></button>
            </form>
          </div>
        </div>
      </nav>
      <div class="d-flex justify-content-between">
      <div class="atroposes1">
        <div class="atropos my-atropos">
            <div class="atropos-scale">
                <div class="atropos-rotate">
                    <div class="atropos-inner">
                        <img src="/img/iaw.png" style="width: 400px;
                                                          height: 250px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
      <div class="atroposes2">
        <div class="atropos my-atropos2">
            <div class="atropos-scale">
                <div class="atropos-rotate">
                    <div class="atropos-inner">
                        <img src="/img/bosco.png" style="width: 400px;
                                                          height: 250px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="atroposes3">
        <div class="atropos my-atropos3">
            <div class="atropos-scale">
                <div class="atropos-rotate">
                    <div class="atropos-inner">
                        <img src="/img/asir.png" style="width: 400px;
                                                          height: 250px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
      <script>
  const myAtropos = Atropos({
        el: '.my-atropos',
        duration: 1.2,
        scale: 1.5,
        rotate: { x: 0.2, y: 0.2 },
        easing: 'cubic-bezier(0.68, -0.55, 0.27, 1.55)', // Efecto de aceleración
        touch: { direction: 'vertical' }, // Movimiento vertical en dispositivos táctiles
        reset: true // Resetea la posición al hacer clic fuera del contenedor
      });
      const myAtropos2 = Atropos({
        el: '.my-atropos2',
        duration: 1.2,
        scale: 1.5,
        rotate: { x: 0.2, y: 0.2 },
        easing: 'cubic-bezier(0.68, -0.55, 0.27, 1.55)', // Efecto de aceleración
        touch: { direction: 'vertical' }, // Movimiento vertical en dispositivos táctiles
        reset: true // Resetea la posición al hacer clic fuera del contenedor
      });
      const myAtropos3 = Atropos({
        el: '.my-atropos3',
        duration: 1.2,
        scale: 1.5,
        rotate: { x: 0.2, y: 0.2 },
        easing: 'cubic-bezier(0.68, -0.55, 0.27, 1.55)', // Efecto de aceleración
        touch: { direction: 'vertical' }, // Movimiento vertical en dispositivos táctiles
        reset: true // Resetea la posición al hacer clic fuera del contenedor
      });
</script>
</body>
</html>