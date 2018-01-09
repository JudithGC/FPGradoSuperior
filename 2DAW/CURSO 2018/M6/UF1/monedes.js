
//Práctica 4
var cara=0;
var creu=0;
var repeticions=50;
var aleatorio= Math.random() * 1;
var redondear = aleatorio.toFixed(1);

document.write("Resultat random:" + redondear + "<br>");
document.write("Resultat random sense Fixed: " + aleatorio + "<br>");



for(i=0;i<repeticions;i++){
    if(redondear < 0.5){
    //Aqui damos más peso a las caras
        if(Math.random() < redondear){
            creu++;
        }else{
            cara++;
        }
    }else{
    //Aqui damos más peso a las cruces
        if(Math.random() > redondear){
            cara++;
        }else{
            creu++;
        }
    }
}

document.write("No equilibrat: Han sortit " + cara + " cares i " + creu + " creus en " +repeticions + " repeticions ");