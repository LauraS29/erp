CREATE DATABASE IF NOT EXISTS trabajo;
USE trabajo;

CREATE TABLE Proveedores (
    Cod_proveedor INT AUTOINCREMENT,
    Nom_proveedor VARCHAR(25),
    Email_proveedor VARCHAR(25),
    Fecha_envio DATE
    FOREIGN KEY (Cod_producto) REFERENCES Producto(Cod_producto)
);

CREATE TABLE Cliente (
    Cod_cliente INT AUTOINCREMENT,
    DNI_cliente VARCHAR(10),
    Nom_cliente VARCHAR(25),
    Ap_cliente VARCHAR(25),
    Cod_postal VARCHAR(25),
    Localidad VARCHAR(25),
    Provincia VARCHAR(25),
    Email_cliente VARCHAR(25),
    Tlf_cliente VARCHAR(25),
    Observaciones VARCHAR(25),
);

CREATE TABLE Producto (
    Cod_producto INT PRIMARY KEY,
    Precio DECIMAL(10, 2),
    Cantidad INT
);

CREATE TABLE Tienda (
    N_Stock INT,
    FOREIGN KEY (Cod_cliente) REFERENCES Cliente(Cod_cliente),
    FOREIGN KEY (Cod_producto) REFERENCES Producto(Cod_producto),
    FOREIGN KEY (Cod_Empleado) REFERENCES Empleados(Cod_Empleado),
    PRIMARY KEY (Cod_Cliente, Cod_Producto, Cod_Empleado)
);

CREATE TABLE Almacén (
    Cod_almacén INT PRIMARY KEY,
    FOREIGN KEY (Cod_producto) REFERENCES Producto(Cod_producto)
);

CREATE TABLE Empleados (
    Cod_Empleado INT AUTOINCREMENT PRIMARY KEY,
    Nom_empleado VARCHAR(25),
    Ape_Empleado VARCHAR(25),
    DNI_Empleado VARCHAR(10),
    Tlf_empleado INT,
    Clave_acceso VARCHAR(25)
);
