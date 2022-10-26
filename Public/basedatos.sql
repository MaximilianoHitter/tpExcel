CREATE DATABASE tpexcel;
use tpexcel;

CREATE TABLE profesor (
    usuario varchar(20) NOT NULL,
    contrasenia varchar(255) NOT NULL,
    mailInstitucional varchar(50) NOT NULL,
    materia varchar(255) NOT NULL,
    PRIMARY KEY (usuario)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE notas (
    id int AUTO_INCREMENT NOT NULL,
    legajo varchar(20),
    apellidoNombre varchar(50) NOT NULL,
    materia varchar(255) NOT NULL,
    nota decimal(4.2) NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;