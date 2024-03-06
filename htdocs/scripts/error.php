<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .error-container {
            text-align: center;
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out, background-color 0.3s, color 0.3s;
            cursor: pointer;
            display: inline-block;
        }

        h1 {
            color: #e44d26;
        }

        p {
            color: #333;
        }

        a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="error-container" onmouseover="handleMouseOver()" onmouseout="handleMouseOut()">
        <h1>Error</h1>
        <p>
            <?php
            // Recuperar el mensaje de error de la URL
            $mensaje_error = isset($_GET['mensaje']) ? $_GET['mensaje'] : 'Ocurrió un error.';

            // Mostrar el mensaje de error
            echo htmlspecialchars($mensaje_error);
            ?>
        </p>
        <p>
            <a href="../index.php">Volver al inicio</a>
        </p>
    </div>

    <script>
        function handleMouseOver() {
            document.querySelector('.error-container').style.transform = 'translateY(-10px)';
        }

        function handleMouseOut() {
            document.querySelector('.error-container').style.transform = 'translateY(0)';
        }
    </script>
</body>
</html>
