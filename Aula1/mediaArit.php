<?php

function mediaArit($n1, $n2, $n3){
    $soma = $n1 + $n2 + $n3;
    $media = $soma / 3;

    return $media;
}

$n1 = 10;
$n2 = 7;
$n3 = 5;

$media1 = mediaArit($n1, $n2, $n3);

echo ("A média das notas é $media1");
