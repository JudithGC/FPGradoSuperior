//Pedimos que se introduzca algo
var cadena = prompt("Escriu una cadena de text : ");
//Creamos una variable donde se almacenará el resultado
//Usamos trim para quitar los espacios en blanco y los reemplazamos por comillas simples
//Con Split se divide la cadena en sub cadenas y con length conseguimos las palabras que hay

var cuentaPalabras = cadena.trim().replace(/\s+/gi, ' ').split(' ').length;

//Imprimimos resultados
document.write(cadena+ "<br>");
document.write(cuentaPalabras);