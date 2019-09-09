CREATE PROCEDURE `SET_ADMINISTRADOR` (IN _CEDULA VARCHAR (13),IN _APELLIDOS VARCHAR (50), IN _NOMBRES VARCHAR (50), IN _CORREO VARCHAR (50))
BEGIN
DECLARE _PERSONA VARCHAR (13);
DECLARE _USUARIO VARCHAR (50);

DECLARE _PERSONA_ INT;
DECLARE _USUARIO_ INT;
set autocommit = 0;
START TRANSACTION;
SELECT CEDULA INTO _PERSONA FROM SAMADI.PERSONAS WHERE CEDULA  = _CEDULA;
SELECT USER INTO _USUARIO FROM SAMADI.USUARIOS WHERE USER = _CORREO;

IF _PERSONA <=> _CEDULA THEN
SET _PERSONA_ =  2;
ELSE 
SET _PERSONA = NULL;
SELECT SAMADI.INSERT_PERSONAS(_CEDULA,_APELLIDOS,_NOMBRES,_CORREO) INTO _PERSONA_;
END IF;

IF _USUARIO <=> _CORREO THEN
SET _USUARIO_ = 2;
ELSE
SELECT SAMADI.INSERT_USUARIOS(_CORREO,_CEDULA) INTO _USUARIO_;
END IF;

IF (_PERSONA = 1 OR _PERSONA = 2)  AND (_USUARIO = 1 OR _USUARIO = 2) THEN
COMMIT;
SET autocommit = 1;
ELSEIF (_PERSONA = 0  OR _USUARIO = 0) THEN
ROLLBACK;
END IF;
-- JOSUE ZAMBRANO REYES
END