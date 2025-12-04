<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Minified version -->
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
    <!-- Poner el style - está en los tpl -->

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

        form {
            background: #2a2a2a;
            padding: 20px;
            border-radius: 6px;
        }

        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 5px;
            font-weight: 500;
        }

        input[type="text"],
        input[type="password"]{
            width: 100%;
            padding: 10px;
            background: #1f1f1f;
            border: 1px solid #3a3a3a;
            border-radius: 4px;
            color: #e5e5e5;
        }

        input::placeholder {
            color: #888;
        }

        input[type="submit"] {
            margin-top: 20px;
            width: 100%;
            padding: 12px;
            background: #3a6f47;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.2s;
        }

        input[type="submit"]:hover {
            background: #457a52;
        }

        a {
            padding: 6px 10px;
            text-decoration: none;
            border-radius: 4px;
            font-size: 14px;
            color: #eaeaea;
            background: #444;
            transition: 0.2s;
        }

        a:hover {
            background: #555;
        }

        p {
            margin-top: 20px;
        }
    </style>
    <title>Login</title>
</head>
<body>
    <h1>Login Usuario</h1>
    <form action="login.php" method="post">
    <label for="nombre">Usuario:</label>
        <input id="nombre" type="text" placeholder="Nombre de Usuario" name="nombre">
    <label for="psw">Contraseña:</label>
        <input id="psw" type="password" placeholder="Contraseña" name="psw">
        <input type="submit" value="login" name="login">

    </form>
</body>
</html>