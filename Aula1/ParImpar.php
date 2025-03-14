<?php

$somaPar = 0;
$somaImpar = 0;

for($i=20; $i<71; $i++){
    if($i%2 == 0){
        $somaPar += $i;
    }
    else{
        $somaImpar += $i;
    }
}

echo("O valor da soma dos números pares é $somaPar <br>");
echo("O valor da soma dos números ímpares é $somaImpar <br>");

// http//localhost//
