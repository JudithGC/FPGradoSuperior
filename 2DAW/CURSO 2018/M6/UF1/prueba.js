//Comentario de una linea
/*Comentario hermoso de varias lineas
porque el lo vale ;p */


/*Per a declarar una variable utilitzarem la paraula var + nom de la variable */
var i=0, j=0;

/*També és possible iniciar les variables fent referència a una variable j , és a dir, podem crear una variable nova amb el valor de una altre */
j=10;
var nova_v =j;

/*Document.write per imprimir contingut, + operador de concatenació.*/
document.write("valor i= " + i + "valor j= " + j + "valor nova_v = " + nova_v + "<br>");

/*Javascript permet mostrar finestres emergents per a poder demanar dades al usuari */
var pregunta = prompt("dame algo");
document.write("<br> he demanat algo " + pregunta);