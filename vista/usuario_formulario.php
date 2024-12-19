<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>

<body>

    <form action="index.php?controlador=usuario&accion=guardar" method="post">
        <div style="display:none;">
            <label for="id">id</label>
            <input type="hidden" name="id" value="<?php echo $usuario->id?>">
        </div>

        <div>
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" value="<?php echo $usuario->nombre?>">
        </div>
        <div>
            <label for="apellido">Apellido</label>
            <input type="text" name="apellido" value="<?php echo $usuario->apellido?>">
        </div>
        <div>
            <label for="usuario">Usuario</label>
            <input type="text" name="usuario" value="<?php echo $usuario->usuario?>">
        </div>
        
        <div>
            <label for="clave">Clave</label>
            <input type="text" name="clave" value="<?php echo $usuario->clave?>">
        </div>
        <div>
            <input type="submit" name="enviar" value="Enviar">
        </div>
    </form>

</body>

</html>
