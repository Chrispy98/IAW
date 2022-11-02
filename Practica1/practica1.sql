CREATE TABLE cliente (
     dni VARCHAR PRIMARY KEY NOT NULL,
     nombre VARCHAR,
     cuenta_bancaria VARCHAR);

CREATE TABLE flores (
     idflor NUMBER PRIMARY KEY NOT NULL,
     precio NUMBER,
     cantidad NUMBER NOT NULL);

CREATE TABLE compras (
     dni VARCHAR,
     idflor NUMBER,
     fecha DATE,
     cantidad NUMBER, 
     PRIMARY KEY (dni, idflor), 
     FOREIGN KEY (dni) REFERENCES cliente(dni), 
     FOREIGN KEY (idflor) REFERENCES flores(idflor));
