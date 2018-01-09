//Pedir por parámetro el largo del string

var llargaria= prompt("Posar num de llargaria");


//3 variables, una que contiene el número por el cual se empieza (num1=1)
//Otra variable que usamos para guardar la posición anterior/número anterior
//Y la última variable es la que guarda el resultado de la suma.
var num1=1;
var num2=0;
var suma;

//Bucle que se va recorriendo hasta que llega al número que le hemos pedido en 'llargaria'
for(var i=0;i<=llargaria;i++){
    //Le asignamos a la variable suma el valor de num1 más el valor de num2.
    suma= num1 + num2;
    //Guardamos en num2 el valor de num1
    num1= num2;
    //Usamos num2 para cambiar el valor cada vez que se ejecute el bucle
    num2 =suma;
   
    document.write(suma);
}

