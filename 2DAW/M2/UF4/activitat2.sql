create or replace type VEHICLE as object (
  marca VARCHAR2(20),
  model VARCHAR2(50),
  color VARCHAR2(20),
  cilindrada NUMBER,
  motor VARCHAR2(10)
);
SET SERVEROUTPUT ON
DECLARE
  vehicle2 VEHICLE;
  BEGIN
  vehicle2:= NEW VEHICLE('hola','jaja','azul',135,'no se');
  DBMS_OUTPUT.PUT_LINE('Marca:' || vehicle2.marca);
  DBMS_OUTPUT.PUT_LINE('Model:' || vehicle2.model);
  DBMS_OUTPUT.PUT_LINE('Color:' || vehicle2.color);
  DBMS_OUTPUT.PUT_LINE('Cilindrada:' || vehicle2.cilindrada);
  DBMS_OUTPUT.PUT_LINE('Motor:' || vehicle2.motor);
  END;
  /