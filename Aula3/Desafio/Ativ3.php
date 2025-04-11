<?php

if (isset($_GET['n1']) && isset($_GET['n2'])) {
    
    $n1 = $_GET['n1'];
    $n2 = $_GET['n2'];

    $soma = $n1 + $n2;
    $subtracao = $n1 - $n2;
    $multiplicacao = $n1 * $n2;
    
    if ($n2 != 0) {
        $divisao = $n1 / $n2;
        $resto = $n1 % $n2;
    } else {
        $divisao = "Erro: Divisão por zero!";
        $resto = "Erro: Divisão por zero!";
    }

    echo "<h2>Resultados das Operações Matemáticas:</h2>";
    echo "Soma: $n1 + $n2 = $soma <br>";
    echo "Subtração: $n1 - $n2 = $subtracao <br>";
    echo "Multiplicação: $n1 * $n2 = $multiplicacao <br>";
    echo "Divisão: $n1 / $n2 = $divisao <br>";
    echo "Resto da divisão: $n1 % $n2 = $resto <br>";

} else {
   
    echo "Por favor, forneça dois valores numéricos na URL como parâmetros.";
}
?>
