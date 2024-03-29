CREATE DATABASE IF NOT EXISTS SAMADI;
USE SAMADI;
-- ALTER DATABASE SAMADI DEFAULT CHARACTER SET utf8;

CREATE TABLE IF NOT EXISTS PERSONAS(
ID INT AUTO_INCREMENT NOT NULL,
CEDULA VARCHAR (13) NOT NULL,
APELLIDOS VARCHAR (50) NOT NULL,
NOMBRES VARCHAR (50) NOT NULL,
CORREO VARCHAR (50) NOT NULL,
FOTO VARCHAR (25),
PRIMARY KEY (ID),
UNIQUE (CEDULA),
UNIQUE (CORREO)
)ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS CATEDRAS (
ID INT AUTO_INCREMENT NOT NULL,
COD_CATEDRA VARCHAR (10) NOT NULL,
NOMBRE_CATEDRA VARCHAR (150) NOT NULL,
PRIMARY KEY (ID),
UNIQUE (COD_CATEDRA)
)ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS CARRERAS (
ID INT AUTO_INCREMENT NOT NULL,
COD_CARRERA VARCHAR (10) NOT NULL,
NOMBRE_CARRERA VARCHAR (150) NOT NULL,
PRIMARY KEY (ID),
UNIQUE (COD_CARRERA)
)ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS NIVELES (
ID INT AUTO_INCREMENT NOT NULL,
COD_NIVEL VARCHAR (10) NOT NULL,
NOMBRE_NIVEL VARCHAR (30) NOT NULL,
PRIMARY KEY (ID),
UNIQUE (COD_NIVEL)
)ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS PARALELOS (
ID INT AUTO_INCREMENT NOT NULL,
COD_PARALELO VARCHAR (10) NOT NULL,
NOMBRE_PARALELO VARCHAR (30) NOT NULL,
PRIMARY KEY (ID),
UNIQUE (COD_PARALELO)
)ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS JORNADAS (
ID INT AUTO_INCREMENT NOT NULL,
COD_JORNADA VARCHAR (10) NOT NULL,
NOMBRE_JORNADA VARCHAR (30) NOT NULL,
PRIMARY KEY(ID),
UNIQUE (COD_JORNADA)
)ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS ALUMNOS(
ID INT AUTO_INCREMENT NOT NULL,
CEDULA VARCHAR (13) NOT NULL,
COD_CARRERA VARCHAR (10) NOT NULL,
COD_NIVEL VARCHAR (10) NOT NULL,
COD_PARALELO VARCHAR (10) NOT NULL,
COD_JORNADA VARCHAR (10) NOT NULL,
PRIMARY KEY (ID),
CONSTRAINT CEDULA_ALUMNOSYPERSONAS FOREIGN KEY (CEDULA) REFERENCES PERSONAS (CEDULA),
CONSTRAINT CARRERA_ALUMNOSYCARRERAS FOREIGN KEY (COD_CARRERA) REFERENCES CARRERAS (COD_CARRERA),
CONSTRAINT NIVEL_ALUMNOSYNIVELES FOREIGN KEY (COD_NIVEL) REFERENCES NIVELES (COD_NIVEL),
CONSTRAINT PARALELO_ALUMNOSYPARALELOS FOREIGN KEY (COD_PARALELO) REFERENCES PARALELOS (COD_PARALELO),
CONSTRAINT JORNADA_ALUMNOSYJORNADA FOREIGN KEY (COD_JORNADA) REFERENCES JORNADAS (COD_JORNADA),
UNIQUE (CEDULA)
)ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS DOCENTES(
ID INT AUTO_INCREMENT NOT NULL,
CEDULA VARCHAR (13) NOT NULL,
COD_CARRERA VARCHAR (10) NOT NULL,
COD_NIVEL VARCHAR (10) NOT NULL,
COD_PARALELO VARCHAR (10) NOT NULL,
COD_JORNADA VARCHAR (10) NOT NULL,
COD_CATEDRA VARCHAR (10) NOT NULL,
PRIMARY KEY (ID),
CONSTRAINT CEDULA_DOCENTESYPERSONAS FOREIGN KEY (CEDULA) REFERENCES PERSONAS (CEDULA),
CONSTRAINT CARRERA_DOCENTESYCARRERAS FOREIGN KEY (COD_CARRERA) REFERENCES CARRERAS (COD_CARRERA),
CONSTRAINT NIVEL_DOCENTESYNIVELES FOREIGN KEY (COD_NIVEL) REFERENCES NIVELES (COD_NIVEL),
CONSTRAINT PARALELO_DOCENTESYPARALELOS FOREIGN KEY (COD_PARALELO) REFERENCES PARALELOS (COD_PARALELO),
CONSTRAINT JORNADA_DOCENTESYJORNADA FOREIGN KEY (COD_JORNADA) REFERENCES JORNADAS (COD_JORNADA),
CONSTRAINT CATEDRA_DOCENTESYCATEDRAS FOREIGN KEY (COD_CATEDRA) REFERENCES CATEDRAS (COD_CATEDRA),
UNIQUE (CEDULA)
)ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS USUARIOS(
ID INT AUTO_INCREMENT NOT NULL,
USER VARCHAR (50) NOT NULL,
PASSWORD VARCHAR (200) NOT NULL,
TYPE INT NOT NULL,
PRIMARY KEY (ID),
UNIQUE (USER),
CONSTRAINT USER_USUARIOSYPERSONAS FOREIGN KEY (USER) REFERENCES PERSONAS (CORREO)
)ENGINE = InnoDB;

ALTER TABLE SAMADI.ALUMNOS ADD COLUMN TIPO_DISCAPACIDAD TEXT NOT NULL AFTER COD_JORNADA;
ALTER TABLE SAMADI.ALUMNOS ADD COLUMN PORCENTAJE_DISCAPACIDAD FLOAT (3,2) NOT NULL AFTER TIPO_DISCAPACIDAD;

INSERT INTO `SAMADI`.`CARRERAS` (`COD_CARRERA`, `NOMBRE_CARRERA`) VALUES ('TDG', 'DISEÑO GRÁFRICO');
INSERT INTO `SAMADI`.`CARRERAS` (`COD_CARRERA`, `NOMBRE_CARRERA`) VALUES ('TDS', 'DESARROLLO DE SOFTWARE');
INSERT INTO `SAMADI`.`CARRERAS` (`COD_CARRERA`, `NOMBRE_CARRERA`) VALUES ('TIOA', 'IMPRESION EN OFFSET Y ACABADOS');
INSERT INTO `SAMADI`.`CARRERAS` (`COD_CARRERA`, `NOMBRE_CARRERA`) VALUES ('TM', 'MARKETING');

INSERT INTO `SAMADI`.`NIVELES` (`COD_NIVEL`, `NOMBRE_NIVEL`) VALUES ('5TO', 'QUINTO NIVEL');

INSERT INTO `SAMADI`.`PARALELOS` (`COD_PARALELO`, `NOMBRE_PARALELO`) VALUES ('A', 'PARALELO A');
INSERT INTO `SAMADI`.`PARALELOS` (`COD_PARALELO`, `NOMBRE_PARALELO`) VALUES ('B', 'PARALELO B');
INSERT INTO `SAMADI`.`PARALELOS` (`COD_PARALELO`, `NOMBRE_PARALELO`) VALUES ('C', 'PARALELO C');

INSERT INTO `SAMADI`.`JORNADAS` (`COD_JORNADA`, `NOMBRE_JORNADA`) VALUES ('JM', 'MATUTINA');
INSERT INTO `SAMADI`.`JORNADAS` (`COD_JORNADA`, `NOMBRE_JORNADA`) VALUES ('JV', 'VESPERTINA');
INSERT INTO `SAMADI`.`JORNADAS` (`COD_JORNADA`, `NOMBRE_JORNADA`) VALUES ('JN', 'NOCTURNA');


CREATE TABLE IF NOT EXISTS TIPO_USER (
ID INT AUTO_INCREMENT NOT NULL,
TYPE INT NOT NULL,
NAME VARCHAR (30) NOT NULL,
PRIMARY KEY (ID),
UNIQUE (TYPE)
)ENGINE = InnoDB;

ALTER TABLE SAMADI.USUARIOS ADD CONSTRAINT USUARIOSYTIPOS FOREIGN KEY (TYPE) REFERENCES TIPO_USER (TYPE);

INSERT INTO `SAMADI`.`TIPO_USER` (`TYPE`, `NAME`) VALUES ('1', 'ADMINISTRADOR');
INSERT INTO `SAMADI`.`TIPO_USER` (`TYPE`, `NAME`) VALUES ('2', 'DOCENTE');
INSERT INTO `SAMADI`.`TIPO_USER` (`TYPE`, `NAME`) VALUES ('3', 'ESTUDIANTE');

ROLLBACK;

ALTER TABLE SAMADI.DOCENTES DROP FOREIGN KEY CARRERA_DOCENTESYCARRERAS;
ALTER TABLE SAMADI.DOCENTES DROP COLUMN COD_CARRERA;

CREATE TABLE IF NOT EXISTS ALUMNOS_CATEDRA(
ID INT AUTO_INCREMENT NOT NULL,
CEDULA VARCHAR (13) NOT NULL,
COD_CATEDRA VARCHAR (10) NOT NULL,
PRIMARY KEY (ID),
CONSTRAINT AC_ALUMNOS FOREIGN KEY (CEDULA) REFERENCES ALUMNOS (CEDULA)
)ENGINE = InnoDB;
ALTER TABLE ALUMNOS_CATEDRA ADD CONSTRAINT AC_CATEDRAS FOREIGN KEY (COD_CATEDRA) REFERENCES CATEDRAS (COD_CATEDRA);

USE SAMADI;
CREATE TABLE IF NOT EXISTS ACTIVIDADES (
ID INT AUTO_INCREMENT NOT NULL,
COD_ACTIVIDAD VARCHAR (10) NOT NULL,
COD_CATEDRA VARCHAR (10) NOT NULL,
NOMBRE_ACTIVIDAD VARCHAR (150) NOT NULL,
PRIMARY KEY (ID),
UNIQUE (COD_ACTIVIDAD),
CONSTRAINT ACTIVIADES_CATEDRAS FOREIGN KEY (COD_CATEDRA) REFERENCES CATEDRAS (COD_CATEDRA)
)ENGINE = InnoDB;
ALTER TABLE ACTIVIDADES ADD COLUMN RUTA VARCHAR (50) NOT NULL;
ALTER TABLE ACTIVIDADES ADD COLUMN DESCRIPCION TEXT NOT NULL AFTER NOMBRE_ACTIVIDAD;