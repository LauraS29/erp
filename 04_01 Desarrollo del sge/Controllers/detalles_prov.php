<?php
// get_detalle_proveedor.php

// Conexión a la base de datos (ajusta los valores según tu configuración)
$servername = "localhost";
$username = "david";
$password = "madrid";
$dbname = "trabajo";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el ID del proveedor desde la solicitud GET
$idProveedor = $_GET['id'];

// Obtener los detalles del proveedor
$result = $conn->query("SELECT * FROM proveedores WHERE id = $idProveedor");

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "<p><strong>Detalles del proveedor:</strong></p>";
    echo "<p><strong>Código:</strong> {$row['codigo']}</p>";
    echo "<p><strong>Nombre:</strong> {$row['nombreProveedor']}</p>";
    echo "<p><strong>Teléfono:</strong> {$row['telefono']}</p>";
    // Agrega más campos según sea necesario
} else {
    echo "Proveedor no encontrado";
}

// Cerrar la conexión
$conn->close();
?>
