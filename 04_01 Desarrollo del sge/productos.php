<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <script src="./Assets/js/motor.js"></script>
    <link rel="stylesheet" href="./Assets/css/estilos.css">
</head>
<body>
    <header>
        <div class="navegacion">
            <a href="clientes.php">Clientes</a><br>
            <a href="proveedores1.php">Proveedores</a><br>
            <a href="personal.php">Personal</a><br>
            <a class="negrita" href="productos.php">Productos</a><br>
            <a href="ventas.php">Ventas</a><br>
            <a href="compra1.php">Compra</a><br>
            <a href="pedido.php">Pedidos</a><br>
        </div>
    </header>
    <section>
        <div class="b1">
            <div class="center">
                <img src="Assets/img/personas.png" alt="">
                <p>Clientes</p>
            </div>
        </div>
        <div class="b2">
            <div>
                <h2>Datos productos</h2>
            </div>
            <form class="form" action="clientes.php" method="post">
                <div class="flex">
                    <div class="pr">
                        <p>Código:</p>
                        <input type="text" name="correo">
                    </div>
                    <div>
                        <p>Teléfono:</p>
                        <input type="text" name="correo">
                    </div>
                </div>
                <div class="flex">
                    <div class="pr">
                        <p>Nombre:</p>
                        <input type="text" name="correo">
                    </div>
                    <div>
                        <p>Email:</p>
                        <input type="text" name="correo">
                    </div>
                </div>
                <div class="flex">
                    <div class="pr">
                        <p>Apellidos:</p>
                        <input type="text" name="correo">
                    </div>
                    <div>
                        <p>DNI:</p>
                        <input type="text" name="correo">
                    </div>
                </div>
                <div class="flex">
                    <div class="pr">
                        <p>Localidad:</p>
                        <input type="text" name="correo">
                    </div>
                    <div>
                        <p>Código Postal:</p>
                        <input type="text" name="correo">
                    </div>
                </div>
                <div class="flex">
                    <div class="pr">
                        <p>Provincia/Pais:</p>
                        <input type="text" name="correo">
                    </div>
                    <div>
                        <p>Observaciones:</p>
                        <textarea name="" id="" cols="30" rows="10"></textarea>
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>
</html>