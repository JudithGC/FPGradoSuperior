<?php
// Generar un nombre  aleatori
srand((double)microtime()*1000000);
$aleatori = rand(0, 10);

// Simular un fals retard per la xarxa i el servidor (entre 0 y 3 segons)
sleep($aleatori % 3);

// L'script retorna aleatòriament 'si' o 'no' per tal que l'aplicació
// client puqui comprovar els dos casos
echo ($aleatori % 2 == 0)? "si" : "no";
?>