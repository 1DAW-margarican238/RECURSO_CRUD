<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
    <title>Eliminar usuario</title>
     <style>
        body {
            font-family: "Inter", Arial, sans-serif;
            max-width: 900px;
            margin: 30px auto;
            padding: 20px;
            background: #1e1e1e;
            color: #e5e5e5;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #fafafa;
            letter-spacing: 1px;
            font-weight: 500;
        }

        p {
            font-size: 18px;
            margin-bottom: 25px;
            text-align: center;
        }

        form {
            background: #2a2a2a;
            padding: 20px;
            border-radius: 6px;
            display: flex;
            gap: 10px;
            justify-content: center;
        }

        button {
            padding: 10px 18px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            color: #fff;
            font-size: 15px;
            transition: 0.2s;
        }

        button[name="confirmar"] {
            background: #b33939;
        }

        button[name="confirmar"]:hover {
            background: #c84646;
        }

        button[name="volver"] {
            background: #444;
        }

        button[name="volver"]:hover {
            background: #555;
        }
    </style>
</head>
<body>

<h1>Eliminar usuario</h1>

<p>¿Quieres eliminar a <?php echo htmlspecialchars($usuario['nombre']); ?>?</p>

<form method="post">
    <button type="submit" name="confirmar">Sí, eliminar</button>
    <button type="submit" name="volver">No, volver</button>
</form>

</body>
</html>
