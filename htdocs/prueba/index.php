<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$password = 'mi contraseña';
echo "<h1>" . password_hash($password, PASSWORD_DEFAULT) . "</h1>\n";
echo "<h1>" . password_hash($password, PASSWORD_DEFAULT) . "</h1>";
?>
</body>
</html>