CREATE DATABASE IF NOT EXISTS trabajo;
USE trabajo;

CREATE TABLE Proveedores (
    CP INT PRIMARY KEY,
    Nombre VARCHAR(25),
    Apellido VARCHAR(25),
    Fecha DATE
);

CREATE TABLE Cliente (
    CP INT PRIMARY KEY,
    DNI VARCHAR(10),
    Nombre VARCHAR(25),
    Apellido VARCHAR(25)
);

CREATE TABLE Producto (
    CP INT PRIMARY KEY,
    Precio DECIMAL(10, 2)
);

CREATE TABLE Empresa (
    CP_Proveedor INT,
    CP_Cliente INT,
    FOREIGN KEY (CP_Proveedor) REFERENCES Proveedores(CP),
    FOREIGN KEY (CP_Cliente) REFERENCES Cliente(CP),
    PRIMARY KEY (CP_Proveedor, CP_Cliente)
);

CREATE TABLE Tienda (
    CP_Cliente INT,
    CP_Producto INT,
    CP_Empleado INT,
    N_Stock INT,
    FOREIGN KEY (CP_Cliente) REFERENCES Cliente(CP),
    FOREIGN KEY (CP_Producto) REFERENCES Producto(CP),
    FOREIGN KEY (CP_Empleado) REFERENCES Empleados(CP),
    PRIMARY KEY (CP_Cliente, CP_Producto, CP_Empleado)
);

CREATE TABLE Almacén (
    Cod_almacén INT PRIMARY KEY,
    CP_Producto INT,
    FOREIGN KEY (CP_Producto) REFERENCES Producto(CP)
);

CREATE TABLE Empleados (
    CP INT PRIMARY KEY,
    Nombre VARCHAR(25),
    Apellido VARCHAR(25),
    DNI VARCHAR(10),
    Telefono INT
);
