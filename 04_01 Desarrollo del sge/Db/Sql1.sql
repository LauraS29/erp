CREATE TABLE Proveedores (
    Nombre VARCHAR(25),
    Apellido VARCHAR(25),
    Fecha DATE
);


CREATE TABLE Empresa (
    FOREIGN KEY (Cód_Producto) REFERENCES Proveedores(CP),
    FOREIGN KEY (Cód_Cliente) REFERENCES Cliente(CP)
);


CREATE TABLE Tienda (
    Cód_Cliente INT,
    Cód_Producto INT,
    Cód_Empleado INT,
    N_Stock INT,
    FOREIGN KEY (Cód_Cliente) REFERENCES Cliente(CP),
    FOREIGN KEY (Cód_Producto) REFERENCES Producto(CP),
    FOREIGN KEY (Cód_Empleado) REFERENCES Empleados(Cód_Empleado)
);


CREATE TABLE Almacén (
    Cod_almacén INT,
    FOREIGN KEY (Cód_Producto) REFERENCES Producto(CP)
);


CREATE TABLE Producto (
    CP INT PRIMARY KEY,
    Precio DECIMAL(10, 2)
);


CREATE TABLE Cliente (
    CP INT PRIMARY KEY,
    DNI VARCHAR(10),
    Nombre VARCHAR(25),
    Apellido VARCHAR(25)
);


CREATE TABLE Empleados (
    Nombre VARCHAR(25),
    Apellido VARCHAR(25),
    DNI VARCHAR(10) PRIMARY KEY,
    Cód_Empleado INT,
    Telefono INT
);
