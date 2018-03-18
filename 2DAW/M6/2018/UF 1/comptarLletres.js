//Pedimos que se introduzca algo
var cadena = prompt("Escriu una cadena de text : ");
//Le asignamos a otra variable el resultado
//Remplazamos los espacios en blanco para que no los cuente como letras
var cuentaLetras = cadena.replace(/\s+/gi,'').length;

document.write(cadena+"<br>");
document.write(cuentaLetras);