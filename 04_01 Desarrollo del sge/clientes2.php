<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <script src="./Assets/js/motor.js"></script>
    <link rel="stylesheet" href="./Assets/css/estilos.css">
</head>
<body class = "flex">
<header class = "header2">
        <div class="navegacion" id="p1">
            <a class="negrita" href="clientes1.php">Clientes</a><br>
            <a href="proveedores1.php">Proveedores</a><br>
            <a href="personal1.php">Personal</a><br>
            <a href="productos1.php">Productos</a><br>
            <a href="ventas.php">Ventas</a><br>
            <a href="compra1.php">Compra</a><br>
            <a href="pedido1.php">Pedidos</a><br>
        </div>
    </header>
    <section class="fondo_section">
        <div class="flex div1">
            <img src="Assets/img/clientes.png" alt="">
            <p>Clientes</p>
        </div>
        <div class="fondo_div">
            <div>
                <h2>Datos de clientes</h2>
            </div>
            <form class="flex fondo_form" action="clientes2.php" method="post">
                <div class="primer_div">
                    <div class="flex">
                        <div class="pr">
                            <p>Código:</p>
                            <input type="text" id="textoInsercion1" name="codigo">
                        </div>
                        <div class="pr1">
                            <p>Teléfono:</p>
                            <input type="text" id="textoInsercion2" name="telefono">
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Nombre:</p>
                            <input type="text" id="textoInsercion3" name="nombre">
                        </div>
                        <div class="pr1">
                            <p>Email:</p>
                            <input type="text" id="textoInsercion4" name="email">
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Apellidos:</p>
                            <input type="text" id="textoInsercion5" name="apellidos">
                        </div>
                        <div class="pr1">
                            <p>DNI:</p>
                            <input type="text" id="textoInsercion6" name="dni">
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Localidad:</p>
                            <input type="text" id="textoInsercion7" name="localidad">
                        </div>
                        <div class="pr1">
                            <p>Código Postal:</p>
                            <input type="text" id="textoInsercion8" name="codigoPostal">
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Dirección:</p>
                            <input type="text" id="textoInsercion9" name="pais">
                        </div> 
                        <div class="pr1">
                            <p>Observaciones:</p>
                            <textarea name="observaciones" id="textoInsercion10" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                </div>
                <div class="segundo_div imagen-botones">
                    <img src="Assets/img/usuario.png" alt="">
                </div>
            </form>
        </div>
    </section>
</body>
</html>
