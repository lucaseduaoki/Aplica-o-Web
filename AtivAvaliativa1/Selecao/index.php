<?php
function tabela($num, $nome, $cor){
    echo "<tr style='background-color: $cor;'>";
    echo "<td>$num</td>";
    echo "<td>$nome</td>";
    echo "</tr>";
}

echo "<table border>";

echo "<tr>";
echo "<td>Número</td>";
echo "<td>Nome</td>";
echo "</tr>";

$jogadores = [
            [1, "Tafarel", "yellow"],
            [2, "Jorginho", "green"],
            [13, "Aldair", "yellow"],
            [15, "Márcio Santos", "green"],
            [6, "Branco", "yellow"],
            [5, "Mauro Silva", "green"],
            [8, "Dunga", "yellow"],
            [17, "Mazinho", "green"],
            [9, "Zinho", "yellow"],
            [11, "Romário", "green"],
            [7, "Bebeto", "yellow"]
        ];

foreach($jogadores as $j){
    echo tabela($j[0], $j[1], $j[2]);
}
