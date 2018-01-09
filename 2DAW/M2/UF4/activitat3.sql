create or replace type ADRESSA as object (
  carrer VARCHAR2(50),
  cp VARCHAR2(10),
  poblacio VARCHAR2(40),
  provincia VARCHAR2(40)
);
/
create or replace type PERSONA as object (
  id NUMBER,
  nif VARCHAR2(20),
  nom VARCHAR2(20),
  cognom1 VARCHAR2(20),
  cognom2 VARCHAR2(20),
  data_naixement DATE,
  MEMBER PROCEDURE mostrarNomSencer (SELF IN OUT NOCOPY PERSONA) ,
  MEMBER PROCEDURE mostrarEdat (SELF IN OUT NOCOPY PERSONA)
);
/
CREATE OR REPLACE TYPE BODY PERSONA AS
 MEMBER PROCEDURE mostrarNomSencer (SELF IN OUT NOCOPY PERSONA) IS
 BEGIN
   DBMS_OUTPUT.PUT_LINE(SELF.nom || ' ' || SELF.cognom1 || ' ' || SELF.cognom2) ;
   END;
  
 MEMBER PROCEDURE mostrarEdat (SELF IN OUT NOCOPY PERSONA) IS
  BEGIN
  /*Calcular la fecha de nacimiento.Calcula cuanto a pasado des de tu nacimiento*/
    DBMS_OUTPUT.PUT_LINE(trunc((to_number(to_char(sysdate,'yyyymmdd'))-to_number(to_char(self.data_naixement,'yyyymmdd')))/10000));
  END;
  END;
/


SET SERVEROUTPUT ON
DECLARE
  PERSONA2 PERSONA;
  ADRESSA2 ADRESSA; 
BEGIN 
  PERSONA2 := NEW PERSONA(1,'876543t','juu', 'gut','camp',TO_DATE ('28-11-1992','dd-mm-yyyy'));
  PERSONA2.mostrarNomSencer();
  PERSONA2.mostrarEdat();
  ADRESSA2 := NEW ADRESSA('Carrer dels pins','08570','Torello','Barcelona');
  DBMS_OUTPUT.PUT_LINE('Carrer:' || ADRESSA2.carrer);
  DBMS_OUTPUT.PUT_LINE('CP:' || ADRESSA2.cp);
  DBMS_OUTPUT.PUT_LINE('Poblacio:' || ADRESSA2.poblacio);
  DBMS_OUTPUT.PUT_LINE('Provicncia:' || ADRESSA2.provincia);
END;
/
