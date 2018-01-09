/*Exercici 1*/

create or replace type CircuitObj as object(
  codi int,
  nom varchar2(30),
  ciutat varchar2(30),
  pais varchar2(30),
  longitud number
);
/
create or replace type CursaObj as object(
  temporada int,
  numCursa int,
  circuit int,
  data date
);
/
create or replace type PilotObj as object(
  nom varchar2(30),
  cognom varchar2(30),
  dataNaix date,
  nacionalitat varchar2(20),
  numero int,
  member procedure getEdat (SELF IN OUT NOCOPY PilotObj),
  member function potParticipar return boolean
);
/
CREATE OR REPLACE TYPE BODY PilotObj AS

 MEMBER PROCEDURE getEdat (SELF IN OUT NOCOPY PilotObj) IS
  BEGIN
  /*Calcular la fecha de nacimiento.Calcula cuanto a pasado des de tu nacimiento*/
    DBMS_OUTPUT.PUT_LINE(trunc((to_number(to_char(sysdate,'yyyymmdd'))-to_number(to_char(self.dataNaix,'yyyymmdd')))/10000));
    
  END;
  MEMBER FUNCTION potParticipar RETURN boolean IS
    BEGIN
     if(self.categoria = 1) || (self.getEdat <18 ) then
      Return 'Pot Participar';
     else if ( self.categoria = 2) || (self.getEdat <18 ) then
     Return 'Pot Participar';
     else if ( self.categoria = 3) || (self.getEdat >=18 ) then
     Return 'Pot Participar';
     else
     Return 'No pot participar';
     end if;
     end if;
     end if;
END;
END;

/
create Table CircuitObjTb of CircuitObj(PRIMARY KEY(codi));
create Table PilotEscuderiaTbl (
  codi int,
  pilot PilotObj,
  escuderia varchar2(20),
  categoria int
);

SELECT * FROM CircuitObjTb;

delete from CircuitObjTb ciutat;

/*Exercici 2*/

create or replace TYPE Categoria AS OBJECT(
  idCat number(2),
  nom VARCHAR2(9),
  cubicatge number(4),
  minEdat number(2)
);
/
create table Categories of Categoria;
alter table Categories add constraint pk_Categories primary key (idCat);

create or replace TYPE Pilot AS OBJECT(
  nom VARCHAR2(20),
  cognom VARCHAR2(20),
  anyNaix number(4),
  nacionalitat VARCHAR2(3),
  numero number(2),
  categoria number(2)
);
/
create table Pilots of Pilot;
alter table Pilots add constraint pk_Pilots primary key (nom,cognom);

create or replace TYPE Escuderia AS OBJECT(
  nom VARCHAR2(40),
  motor VARCHAR2(20),
  categoria number(2)
);
/
create table Escuderies of Escuderia;
alter table Escuderies add constraint pk_Escuderia primary key (nom);


create table PilotEscuderia(
  temporada number(4),
  pilot Pilot,
  escuderia Escuderia,
  constraint chk_Escudieria check (escuderia.categoria = pilot.categoria)
);
/
INSERT INTO Categories VALUES (Categoria(1,'Moto3',250,16));
INSERT INTO Categories VALUES (Categoria(2,'Moto2',600,16));
INSERT INTO Categories VALUES (Categoria(3,'MotoGP',1000,18));
INSERT INTO Pilots VALUES (Pilot('Andrea','Dovicioso','1986','ITA',4,'MotoGP'));
INSERT INTO Pilots VALUES (Pilot('Marc','Marquez','1993','ESP',93,'MotoGP'));
INSERT INTO Pilots VALUES (Pilot('Isaac','Viñales','1993','ESP',32,'Moto2'));
INSERT INTO Pilots VALUES (Pilot('Tatsuki','Suzuki','1997','JPN',24,'Moto3'));
INSERT INTO Escuderies VALUES (Escuderia('Ducati Team','Ducati','MotoGP'));
INSERT INTO Escuderies VALUES (Escuderia('Repsol Honda Team','Honda','MotoGP'));
INSERT INTO Escuderies VALUES (Escuderia('SAG Team','Kalex','Moto2'));
INSERT INTO Escuderies VALUES (Escuderia('SIC58 Squadra Corse','Honda','Moto3'));
SELECT nom FROM Pilots Where categoria = 'MotoGP';
SELECT nom FROM Pilots Where categoria = 'Moto2';
INSERT INTO PilotEscuderia (SELECT nom.Pilots,cognoms.Pilots,categoria.Pilots FROM Pilots);
