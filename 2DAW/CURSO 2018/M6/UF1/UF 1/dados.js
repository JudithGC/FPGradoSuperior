//Hacemos las preguntas e inicializamos las variables
var pregunta =prompt("Quants llançaments vols realitzar?");
var desequilibrado =prompt("Quin numero vols que sigui el desequilibrat?");
var dado = new Array(0,0,0,0,0,0);
//Hay que hacer un bucle para que se repita las veces que se le ha dicho en la variable pregunta
for (i=0;i<pregunta;i++){
    var num=Math.random()*7;
    if (num<2){
    dado[0]++;
    } else if (num<3){
    dado[1]++;    
    } else if(num<4){
    dado[2]++;    
    } else if(num<5){
    dado[3]++;    
    } else if(num<6){
    dado[4]++;    
    } else{
    dado[5]++;    
    }
    
}
//Guardamos el numero desequilibrado!!!!
var guardanum = dado[0];
//Hay que guardar en la primera posición del array la posición que ocupa el num desequilibrado 
dado[0]= dado[desequilibrado-1];
//Guardamos en la posición del num desequilibrado,el num que tenemos guardado en la primera posición
dado[desequilibrado-1]=guardanum;

//Mostramos por pantalla el resultado obtenido
document.write("1 ha sortit:"+dado[0]+" cops <br>");
document.write("2 ha sortit:"+dado[1]+" cops <br>");
document.write("3 ha sortit:"+dado[2]+" cops <br>");
document.write("4 ha sortit:"+dado[3]+" cops <br>");
document.write("5 ha sortit:"+dado[4]+" cops <br>");
document.write("6 ha sortit:"+dado[5] +" cops");