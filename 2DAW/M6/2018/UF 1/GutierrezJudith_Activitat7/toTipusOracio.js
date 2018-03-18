//Pedimos que escriba algo
var cadena=prompt("Escriu una paraula o una cadena de text").toLowerCase();
//Guardamos la longitud de la cadena
var llargaria= cadena.length;
var guardarPalabra = "";
var x=false;

/*
Bucle que recorre la cadena.Entrará en el if y ejecutará la comparación. Si x es falsa y no hay espacio entonces guardara la primera letra en mayúscula.
Una vez ejecutado ponemos x a true.
*/
for(var i=0;i<llargaria;i++){
   if(x==false && cadena.charAt(i)!=" "){
       guardarPalabra+=cadena.charAt(i).toUpperCase();
       x=true;
   } else {
       guardarPalabra+=cadena.charAt(i);
   } 
/*
Si x es false y el caracter es igual a . devuelve x a false.
*/
    if(cadena.charAt(i)=="."){
        x=false;
    }
    
}
document.write("Cadena original: " +cadena +"<br>");
document.write("Cadena modificada: " +guardarPalabra);