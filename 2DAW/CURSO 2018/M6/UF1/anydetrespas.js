//Demanem l'any (Ha de ser múltiple de 4)

var any = prompt("any");
if(any%4==0){
    //En cas de ser múltiple de 100 ha de ser també múltiple de 400
    if(any%100==0 && any%400 !=0){
        document.write("<br> doncs,no aquest any " + any + "no es de traspas");
    }else{
        document.write("<br> el valor que has donat " +any + " es un any de traspas");
    }
}else{
    document.write("<br> doncs no,aquest any " +any + " no es de traspas");
}

//Amb un Switch case

switch(any%4){
    case 0:
        document.write("<br> És múltiple de 4");
        break;
    case 1: 
        document.write("<br> Si residu 1 a l'any obtinc un múltiple de 4");
        break;
    case 2:
        document.write("<br> Si residu 2 a l'any obtinc un múltiple de 4");
        brak;
    default:
        document.write("<br> És anterior a un multiple de 4");
}