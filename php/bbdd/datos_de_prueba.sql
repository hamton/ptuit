use ptuit;

/* TABLA DE USUARIOS */
delete from usuario;

INSERT INTO `usuario` (id,password,nombre,correo)
VALUES ("1",password("clave"),"maria","maria@maria.com");

INSERT INTO `usuario` (id,password,nombre,correo)
VALUES ("2",password("clave"),"jose","jose@jose.com");

INSERT INTO `usuario` (id,password,nombre,correo)
VALUES ("3",password("clave"),"jesus","jesus@jesus.com");

INSERT INTO `usuario` (id,password,nombre,correo)
VALUES ("4",password("clave"),"felix","felix@felix.com");

INSERT INTO `usuario` (id,password,nombre,correo)
VALUES ("5",password("clave"),"ana","ana@ana.com");

INSERT INTO `usuario` (id,password,nombre,correo)
VALUES ("6",password("clave"),"manu","manu@manu.com");

/* TABLA DE MENSAJES */
delete from mensaje;

INSERT INTO `mensaje` (id,mensaje,fecha,usuario,tipo)
VALUES ("1","Mensaje 1","20110209","1","2");

INSERT INTO `mensaje` (id,mensaje,fecha,usuario,tipo)
VALUES ("2","Mensaje 2","20110209","2","");

INSERT INTO `mensaje` (id,mensaje,fecha,usuario,tipo)
VALUES ("3","Mensaje 3","20110209","3","3");

INSERT INTO `mensaje` (id,mensaje,fecha,usuario,tipo)
VALUES ("4","Mensaje 4","20110209","4","");

INSERT INTO `mensaje` (id,mensaje,fecha,usuario,tipo)
VALUES ("5","Mensaje 5","20110209","5","5");

INSERT INTO `mensaje` (id,mensaje,fecha,usuario,tipo)
VALUES ("6","Mensaje 6","20110209","6","");


select * from usuario;
select * from mensaje;