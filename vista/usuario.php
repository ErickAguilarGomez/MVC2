<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="d-flex justify-content-around w-100">
        <?php require_once("core/constantes.php");
        foreach (usuarioCol as $value): ?>
            <div><?php echo $value; ?></div>
        <?php endforeach; ?>
    </div>

    <div class="d-flex justify-content-around w-100 flex-wrap">
        <?php foreach ($this->consultaUsuarios() as $usuario) : ?>
            <div class="d-flex justify-content-around w-100">
                <p><?php echo $usuario->id ?></p>
                <p><?php echo $usuario->nombre ?></p>
                <p><?php echo $usuario->apellido ?></p>
                <p><?php echo $usuario->usuario ?></p>
                <p><?php echo $usuario->clave ?></p>
                <a href="index.php?controlador=usuario&accion=mostrarUsuario&id=<?php echo $usuario->id ?>">Editar</a>
                <a href="index.php?controlador=usuario&accion=eliminarUser&id=<?php echo $usuario->id ?>">Eliminar</a>
            </div>
        <?php endforeach; ?>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>