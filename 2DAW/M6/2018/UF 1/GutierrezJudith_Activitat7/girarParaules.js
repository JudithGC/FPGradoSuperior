var cadena=prompt("Escriu una paraula o una cadena de text");
var llargaria= cadena.length;
var guardarPalabra = "";
var x= llargaria-1;

//Bucle que recorre cada letra desde la última,cuando encuentre un espacio guardará la cadena.

while(cadena.lastIndexOf(" ",x)>-1){
   guardarPalabra+=cadena.substring(cadena.lastIndexOf(" ",x),x+1)+ " ";
    x=cadena.lastIndexOf(" ",x)-1;

}
guardarPalabra+=cadena.substring(0,x+1);


document.write(guardarPalabra + "<br>");

