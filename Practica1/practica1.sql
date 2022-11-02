CREATE TABLE cliente (
     dni VARCHAR PRIMARY KEY NOT NULL,
     nombre VARCHAR,
     cuenta_bancaria VARCHAR);

CREATE TABLE flores (
     idflor INT PRIMARY KEY NOT NULL,
     precio INT,
     cantidad INT NOT NULL);

CREATE TABLE compras (
     dni VARCHAR,
     idflor INT,
     fecha DATE,
     cantidad INT, 
     PRIMARY KEY (dni, idflor), 
     FOREIGN KEY (dni) REFERENCES cliente(dni), 
     FOREIGN KEY (idflor) REFERENCES flores(idflor));
