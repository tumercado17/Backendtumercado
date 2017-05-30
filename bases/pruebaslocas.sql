-- ------------------------ INSERT -----------------------------------------------

 -- insert into persona (ci,nombre,apellido,email,pais,contrasena,calle,numero,tarjeta,calificacion) 
 -- values (52185428,"ignacio","gallardo","ignaciogallardo@hotmail.com","Uruguay","pass","calera de las huerfanas",4345,1223423,"");

-- insert into telefonopersona (cipersona,telefono) values (52185428,23091329);
-- insert into administrador (idadministrador,ciadministrador,grado) values (1,52185428,"Administrador del sistema");
-- insert into usuario (idusuario,ciusuario,fecha,precio) values (1,52185428,CURDATE(),100);
-- insert into nombreusuario (idusuario,nombreusu) values (1,"GRATIS");

-- insert into publicacion (id,cipersona,nombrepubli,precio,descripcion,categoria,stock,fecha,tipo) values (1,52185428,"Cajones lindos",100,"publicacion muestra 1","Hogar",1,CURDATE(),"permuta");
-- insert into permuta (idpublicacion,calificacion,fecha) values (1,"no califica",CURDATE());


-- insert into persona (ci,nombre,apellido,email,pais,contrasena,calle,numero,tarjeta,calificacion) 
-- values (52212360,"matias","gallardo","matiasgallardo@gmail.com","Uruguay","matias","calera de las huerfas",4345,999999,"Mal vendedor");

-- insert into telefonopersona (cipersona,telefono) values (52212360,094697192);

-- insert into usuario (idusuario,ciusuario,fecha,precio) values (2,52212360,"2017-05-28",100);

-- insert into nombreusuario (idusuario,nombreusu) values (2,"PREMIUM 3");

-- insert into publicacion (id,cipersona,nombrepubli,precio,descripcion,categoria,stock,fecha,tipo) values (2,52212360,"Vendo todo soy pobre",3400,"Es todo lo que vendo porque soy pobre y necesito fasito coso","Varios",23,"2017-05-29","Permuta");

-- insert into bajasuspencion (cibajaadministrador,idbajapublicacion,estado,fecha) values (52185428,2,"Sin suspencion",CURDATE());

-- insert into permuta (idpublicacion,calificacion,fecha) values (2,"no calificada aun","2017-05-29");


-- insert into persona (ci,nombre,apellido,email,pais,contrasena,calle,numero,tarjeta,calificacion) 
-- values (52212361,"Lucas","Gonzalez","LucasGonzalez@gmail.com","Colombia","contra","calle colombia",523,822828,"Vendedor Recomendado");

-- insert into telefonopersona (cipersona,telefono) values (52212361,094695192);

-- insert into usuario (idusuario,ciusuario,fecha,precio) values (3,52212361,"2017-06-12",300);

-- insert into nombreusuario (idusuario,nombreusu) values (3,"PREMIUM 1");

-- insert into publicacion (id,cipersona,nombrepubli,precio,descripcion,categoria,stock,fecha,tipo) 
-- values (3,52212361,"OFERTON COLOMBIA HELADERA SIN USO!!",320,"Esta heladera esta completamente sin uso !NO SE LO PIERDA!","COCINA",1,"2017-06-12","Permuta");

-- insert into permuta (idpublicacion,calificacion,fecha) values (3,"no calificada aun","2017-06-12"); 

-- insert into sansiona (ciadministradorsan,ciusuariosan,estado,fecha) values (52185428,52212360,"Prohibir realizar transacciones",CURDATE());

-- insert into sancionadmin (ciadministradorsanadmin,idadministradorsan1,idadministradorsan2,estado,fecha) values (52185428,1,2,"suspendido por gil",CURDATE());

-- ---------------------------------- UPDATE y DELETE -----------------------------------------------

-- UPDATE publicacion SET nombrepubli="HELADERA FEITA",precio=1000,descripcion="esto es una publicacion alterada",categoria="jueguitos",stock=3 WHERE id=3;
-- update bajasuspencion set estado="cambio estado" where idbajapublicacion=1;
-- update persona set nombre="nom1",apellido="appe",email="email1",pais="pais1",contrasena="cont",calle="calle1",numero=123,calificacion="cali"
-- where ci=52185428;
-- update administrador set grado where ciadministrador=123123;

-- update sancionadmin set estado="" where idadministradorsan2=2;

-- update sansiona set estado="quitar sancion", fecha=CURDATE() where ciusuariosan=52212360;

-- delete from usuario where idusuario=2;

-- delete from sansiona where ciusuariosan=;

-- -------------- Todas estas para poder eliminar la publicacion correctamente ------------------------------- 
-- delete from permuta where idpublicacion=3;
-- delete from bajasuspencion where idbajapublicacion=3;
-- delete from publicacion where id=3;

-- --------------- Todas para borrar persona -------------------
-- delete from telefonopersona where cipersona=52212361;
-- delete from nombreusuario where idusuario=3;
-- delete from usuario where ciusuario=52212361;
-- delete from persona where ci=52212361;
-- ------------------------ SELECT ----------------------------------------------

-- select ci,nombre,apellido,email,contrasena,calle,numero,calificacion,cipersona,telefono,grado from persona,telefonopersona,administrador where (persona.ci=telefonopersona.cipersona) and (persona.ci=administrador.ciadministrador);

-- select * from usuario;

-- select ci,persona.nombre,apellido,email,contrasena,calle,numero,calificacion,telefono from persona,telefonopersona,usuario,nombreusuario where (persona.ci=telefonopersona.cipersona) and (persona.ci=usuario.ciusuario) and (nombreusuario.idusuario=usuario.idusuario);

-- select usuario.idusuario,ciusuario,nombre,apellido,email,calle,numero,calificacion,nombreusu from usuario,nombreusuario,persona where (usuario.idusuario=nombreusuario.idusuario)  and (persona.ci=usuario.ciusuario);
-- select id,cipersona,nombre,apellido,email,nombrepubli,precio,descripcion,categoria,stock,tipo from publicacion,persona,permuta where cipersona=ci and id=idpublicacion;

-- select * from bajasuspencion;

-- select * from bajasuspencion where idbajapublicacion=2;

-- select usuario.idusuario,ciusuario,nombre,apellido,email,calle,numero,calificacion,nombreusu from
-- usuario,nombreusuario,persona where ((usuario.idusuario=nombreusuario.idusuario) and (persona.ci=usuario.ciusuario)) and usuario.idusuario=3;

-- select usuario.idusuario,ciusuario,nombre,apellido,ci,email,calle,numero,calificacion,nombreusu,estado,sansiona.fecha from
-- usuario,nombreusuario,persona,sansiona where (usuario.idusuario=nombreusuario.idusuario)
-- and (persona.ci=usuario.ciusuario) and usuario.idusuario=2;
              
-- select * from sansiona where ciusuariosan=52185428;

-- select nombre,apellido,email,grado from administrador,persona where idadministrador=2 and ci=52185420;