create or replace type Usuari as object(
  login varchar(30),
  nom varchar(30),
  cognoms varchar(40),
  data_ingres date,
  credit number,
  order member function ordenUsuari(u Usuari) return int
);
/
create or replace type Jugador as object(
  nif varchar2
);
create table UsuarisObj of Usuari
/
create table Jugadors of Usuari
/
declare
  datetime datetime := date;
  u1 Usuari;
  u2 Usuari;
begin
  u1 := new Usuari('juu2', 'juu' , 'fgsf' , '24/10/2007' ,50);
  u2 := new Usuari('hrgh', 'lucas' , 'h', '25/10/2007' ,100);
  insert into UsuarisObj Values (u1);
  insert into UsuarisObj Values (u2);
  insert into Jugadors Values ('23T',u1,8);
  insert into Jugadors Values ('11Y',u2,6);
  
  SELECT VALUE(u) INTO u1 FROM UsuarisObj u WHERE u.login = 'lluhom57';

  dbms_output.put_line(u1.nom);

  u2 := u1;

  dbms_output.put_line(u2.nom);
  
  COMMIT;
END;
/
INSERT INTO Jugadors VALUES('10B',Usuari('h1','grhttr','rger','14/01/2009',50),15);
INSERT INTO UsuarisObj VALUES (Usuari('hi' ,'hola','hola2','15/02/2008',50));
SELECT * FROM UsuarisObj;
UPDATE UsuarisObj SET UsuarisObj.credit = 0 WHERE UsuarisObj = 'juu2';
UPDATE UsuarisObj u SET u.credit = 0 WHERE u.login= 'juu2';
UPDATE UsuarisObj u SET u= Usuari('fer1','fernando','alonso','10/02/1999',0) WHERE u.login= 'carai33';
UPDATE Jugadors J SET J.unUsuari.credit = 0 WHERE J.unUsuari.login='juu2';
UPDATE Jugadors J SET J.unUsuari = Usuari('fer1','fernando','alonso','10/02/1999',0) WHERE J.unUsuari.login='carai33';
DELETE FROM UsuarisObj u WHERE u.credit = 0;
DELETE FROM Jugadors J WHERE J.unUsuari.credit = 0;