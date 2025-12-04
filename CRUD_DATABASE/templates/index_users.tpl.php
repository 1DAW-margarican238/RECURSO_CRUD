<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Lista de usuarios</title>

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

        table {
            width: 100%;
            border-collapse: collapse;
            background: #2a2a2a;
            border-radius: 6px;
            overflow: hidden;
        }

        th, td {
            padding: 14px 12px;
            border-bottom: 1px solid #3a3a3a;
        }

        th {
            background: #333333;
            text-align: left;
            font-weight: 600;
            color: #f1f1f1;
        }

        tr:hover {
            background: #383838;
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

        p a {
            background: #3a6f47;
        }

        p a:hover {
            background: #457a52;
        }
    </style>

</head>

<body>
    <h1>Usuarios en sistema</h1>

    <table>
        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Rol</th>
            <th>Acciones</th>
        </tr>

        <?php foreach ($usuarios as $usuario): ?>
        <tr>
            <td><?php echo htmlspecialchars($usuario['nombre']); ?></td>
            <td><?php echo htmlspecialchars($usuario['email']); ?></td>
            <td><?php echo htmlspecialchars(ucfirst($usuario['rol'])); ?></td>
            <td>
                
                <a href="show_user.php?id=<?php echo $usuario['id']; ?>">Ver</a>
                <?php if($_SESSION['rol']== 'admin' || $_SESSION['rol']== 'editor'):?>
                <a href="edit_user.php?id=<?php echo $usuario['id']; ?>">Editar</a>
                <?php endif ?>
                <?php if($_SESSION['rol']== 'admin'):?>
                <a href="delete_user.php?id=<?php echo $usuario['id']; ?>">Eliminar</a>
                <?php endif ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?php if($_SESSION['rol']== 'admin'):?>
    <p>
        <a href="create_user.php">NUEVO USUARIO</a>
    </p>
    <?php endif ?>
    <p>
        <a href="logout.php">Logout</a>
    </p>
</body>
</html>
