CREATE DATABASE IF NOT EXISTS trabajo;
USE trabajo;

CREATE TABLE Proveedores (
    Cod_producto INT PRIMARY KEY,
    Cod_proveedor INT,
   
    Nom_proveedor VARCHAR(25),
    Email_proveedor VARCHAR(25),
    Fecha_envio DATE
);

CREATE TABLE Cliente (
    CP INT PRIMARY KEY,
    Cod_cliente INT,
    DNI_cliente VARCHAR(10),
    Nom_cliente VARCHAR(25),
    Ap_cliente VARCHAR(25),
    Localidad VARCHAR(25),
    Provicia VARCHAR(25),
    Email_cliente VARCHAR(25),
    Tlf_cliente VARCHAR(25),
    Observaciones VARCHAR(25),
);

CREATE TABLE Producto (
    CP INT PRIMARY KEY,
    Precio DECIMAL(10, 2),

);

CREATE TABLE Empresa (
    CP_Proveedor INT, 
    Nom_empresa VARCHAR(25),
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
    Nom_empleado VARCHAR(25),
    Ape_Empleado VARCHAR(25),
    DNI_Empleado VARCHAR(10),
    Tlf_empleado INT
);
