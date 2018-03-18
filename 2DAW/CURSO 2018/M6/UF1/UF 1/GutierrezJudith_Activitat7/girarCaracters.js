var cadena = prompt("Escriu una cadena de text: ");
var llargaria= cadena.length;
var cadenaInversa="";
/*
Con el bucle y charAt conseguimos que vaya cogiendo cada caracter del String.Cuando no haya más texto parará.
En la variable cadenaInversa se guarda la información.
*/

while(llargaria>=0){
   cadenaInversa= cadenaInversa+cadena.charAt(llargaria);
    llargaria--;
}

document.write(cadenaInversa);