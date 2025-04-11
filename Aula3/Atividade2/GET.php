<?php

if (isset($_GET['n1']) && isset($_GET['n2']) && isset($_GET['n3'])) {
   
    $n1 = $_GET['n1'];
    $n2 = $_GET['n2'];
    $n3 = $_GET['n3'];


    if (is_numeric($n1) && is_numeric($n2) && is_numeric($n3)) {
   
        $media = ($n1 + $n2 + $n3) / 3;
        echo "A média aritmética é: " . $media;
    } else {
        echo "Por favor, insira valores numéricos válidos.";
    }
} else {
    echo "Por favor, forneça os três números via URL. Exemplo: media_get.php?n1=10&n2=20&n3=30";
}
?>
