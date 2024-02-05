CREATE DATABASE IF NOT EXISTS trabajo;
USE trabajo;

CREATE TABLE IF NOT EXISTS Usuarios (
    Cod_usuario INT AUTO_INCREMENT PRIMARY KEY,
    Nom_usuario VARCHAR(50),
    Email_usuario VARCHAR(100),
    Contraseña_usuario VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS Productos (
    Cod_producto INT AUTO_INCREMENT PRIMARY KEY,
    Nom_producto VARCHAR(100),
    Pre_producto DECIMAL(10, 2),
    Cantidad_producto INT
);

CREATE TABLE IF NOT EXISTS Empresa (
    Cod_empresa INT PRIMARY KEY,
    Nom_empresa VARCHAR(50),
    Tlf_empresa VARCHAR(15),
    Email_empresa VARCHAR(50),
    Cod_postal_empresa VARCHAR(10),
    Localidad_empresa VARCHAR(50),
    Provincia_empresa VARCHAR(50),
    Direccion_empresa VARCHAR(100)
);

CREATE TABLE IF NOT EXISTS Proveedores (
    Cod_proveedor INT AUTO_INCREMENT PRIMARY KEY,
    Nom_proveedor VARCHAR(50),
    Tlf_proveedor VARCHAR(15),
    Email_proveedor VARCHAR(50),
    Cod_postal_proveedor VARCHAR(10),
    Provincia_proveedor VARCHAR(50),
    Localidad_proveedor VARCHAR(50),
    Cod_empresa INT,
    Nom_empresa VARCHAR(50),
    FOREIGN KEY (Cod_empresa) REFERENCES Empresa(Cod_empresa)
);


CREATE TABLE IF NOT EXISTS Cliente (
    Cod_cliente INT AUTO_INCREMENT PRIMARY KEY,
    DNI_cliente VARCHAR(10),
    Nom_cliente VARCHAR(25),
    Ape_cliente VARCHAR(25),
    Cod_postal_cliente VARCHAR(25),
    Localidad_cliente VARCHAR(25),
    Provincia_cliente VARCHAR(25),
    Email_cliente VARCHAR(25),
    Tlf_cliente VARCHAR(25),
    Observaciones VARCHAR(25)
);

CREATE TABLE IF NOT EXISTS Empleados (
    Cod_empleado INT AUTO_INCREMENT PRIMARY KEY,
    Nom_empleado VARCHAR(25),
    Ape_empleado VARCHAR(25),
    DNI_empleado VARCHAR(10),
    Tlf_empleado INT,
    Clave_acceso VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS Tienda (
    Cod_tienda INT AUTO_INCREMENT,
    Cod_cliente INT,
    Cod_producto INT,
    Cod_Empleado INT,
    FOREIGN KEY (Cod_cliente) REFERENCES Cliente(Cod_cliente),
    FOREIGN KEY (Cod_producto) REFERENCES Productos(Cod_producto),
    FOREIGN KEY (Cod_Empleado) REFERENCES Empleados(Cod_empleado),
    PRIMARY KEY (Cod_tienda)
);

CREATE TABLE IF NOT EXISTS Almacén (
    Cod_almacén INT AUTO_INCREMENT PRIMARY KEY,
    Cod_producto INT,
    FOREIGN KEY (Cod_producto) REFERENCES Productos(Cod_producto)
);

CREATE TABLE IF NOT EXISTS Pedidos (
    Cod_pedido INT AUTO_INCREMENT PRIMARY KEY,
    Cod_cliente INT,
    Fecha_pedido DATE,
    TotalPedido DECIMAL(10, 2),
    FOREIGN KEY (Cod_cliente) REFERENCES Cliente(Cod_cliente)
);

CREATE TABLE IF NOT EXISTS Ventas (
    Cod_ventas INT AUTO_INCREMENT PRIMARY KEY,
    Cod_cliente INT,
    Fecha_venta DATE,
    Total_venta DECIMAL(10, 2),
    FOREIGN KEY (Cod_cliente) REFERENCES Cliente(Cod_cliente)
);

CREATE TABLE IF NOT EXISTS Compras (
    Cod_compra INT AUTO_INCREMENT PRIMARY KEY,
    Cod_proveedor INT,
    Fecha_compra DATE,
    Total_compra DECIMAL(10, 2),
    FOREIGN KEY (Cod_proveedor) REFERENCES Proveedores(Cod_proveedor)
);
