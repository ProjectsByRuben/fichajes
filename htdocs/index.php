<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title></head>
    <link rel="stylesheet" href="/scripts/estilos.css?v=1">
<body>
    <div class="login-box">
        <h2>Login</h2>
        <form method="post" action="/scripts/login.php">
          <div class="user-box">
          <input type="text" name="usuario" size="7" required="">
            <label for="usuario">usuario</label>
          </div>
          <div class="user-box">
          <input type="password" name="pass" size="30" required="">
            <label for="pass">Contraseña</label>
          </div>
          <a href="/scripts/login.php">
          <button type="submit" value="Añadir" class="boton"><span></span>Enviar</button>
          </a>
        </form>
      </div>
</body>
</html>