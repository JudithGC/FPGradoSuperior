var nombre=prompt("dona el valor máxim");
//var comptador=1;

//Escriure tots els parells entre 1 i el valor que demana l'usuari

/*  WHILE       */

/*while(comptador<=nombre){
    if(comptador%2==0) {
        document.write("<br>" + comptador);
        
    }
    comptador++;
}*/
/*  DO WHILE    */

/*El mateix bucle pro amb do while
var comptador2=1;
do{
    if(comptador2%2==0){
        document.write("<br>" +comptador2);
        
    }
    comptador2++;
} while(comptador2<=nombre)*/

/*  FOR         */
var comptador3=0;
/*for(comptador3=2;comptador3<=nombre;comptador3++){
    if(comptador3%2==0){
        document.write("<br>" +comptador3);
    }
}*/
for(comptador3=2;comptador3<=nombre;comptador3+=2){
    document.write("<br>" + comptador3);
}