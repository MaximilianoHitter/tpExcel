CREATE DATABASE tpexcel;
use tpexcel;

CREATE TABLE profesor (
    usuario varchar(20) NOT NULL,
    contraseña varchar(255) NOT NULL,
    mailInstitucional varchar(50) NOT NULL,
    materia varchar(255) NOT NULL,
    /* El listar solo le muestra las materias que tiene el profesor
    Para que pueda modificar solo los archivos que le corresponden solo a su materia */
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