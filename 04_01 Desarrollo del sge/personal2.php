<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal</title>
    <script src="./Assets/js/motor.js"></script>
    <link rel="stylesheet" href="./Assets/css/estilos.css">
</head>
<body>
    <header>
        <div class="navegacion">
            <a href="clientes1.php">Clientes</a><br>
            <a href="proveedores1.php">Proveedores</a><br>
            <a class="negrita" href="personal1.php">Personal</a><br>
            <a href="productos1.php">Productos</a><br>
            <a href="ventas.php">Ventas</a><br>
            <a href="compra1.php">Compra</a><br>
            <a href="pedido1.php">Pedidos</a><br>
        </div>
    </header>
    <section class="fondo_section">
        <div class="flex div1">
            <img src="Assets/img/personal.png" alt="">
            <p>Personal</p>
        </div>
        <div class="fondo_div">
            <div>
                <h2>Datos del personal</h2>
            </div>
            <form class="flex fondo_form" action="proveedores2.php" method="post">
                <div class="primer_div">
                    <div class="flex">
                        <div class="pr">
                            <p>Código:</p>
                            <input type="text" name="codigo">
                        </div>
                        <div class="pr1">
                            <p>Tlf:</p>
                            <input type="text" name="telefono">
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Nombre:</p>
                            <input type="text" name="nombre">
                        </div>
                        <div class="pr1">
                            <p>Email:</p>
                            <input type="text" name="email">
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Apellidos:</p>
                            <input type="text" name="apellidos">
                        </div>
                        <div class="pr1">
                            <p>DNI:</p>
                            <input type="text" name="dni">
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Localidad:</p>
                            <input type="text" name="localidad">
                        </div>
                        <div class="pr1">
                            <p>Código Postal:</p>
                            <input type="text" name="codigoPostal">
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Provincia/Pais:</p>
                            <input type="text" name="pais">
                        </div>
                        <div class="pr1">
                            <p>Observaciones:</p>
                            <textarea name="observaciones" id="" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                </div>
                <div class="segundo_div imagen-botones">
                    <img src="Assets/img/usuario.png" alt="">
                    <div class="buttons">
                        <div>
                            <input type="submit" value="Guardar">
                        </div>
                        <div>
                            <input type="button" value="Actualizar">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>
</html>