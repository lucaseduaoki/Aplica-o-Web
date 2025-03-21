<?php

$presidentes = [
    [ "nome" => "Eurico Gaspar Dutra", "inicio" => 1946, "fim" => 1951 ],
    [ "nome" => "Getúlio Vargas", "inicio" => 1951, "fim" => 1954 ],
    [ "nome" => "Café Filho", "inicio" => 1954, "fim" => 1955 ],
    [ "nome" => "Carlos Luz", "inicio" => 1955, "fim" => 1955 ],
    [ "nome" => "Nereu Ramos", "inicio" => 1955, "fim" => 1956 ],
    [ "nome" => "Juscelino Kubitschek", "inicio" => 1956, "fim" => 1961 ]
];

echo "<table border>";

echo "<tr>";
echo "<td>Número</td>";
echo "<td>Nome</td>";
echo "<td>Ínicio</td>";
echo "<td>Fim</td>";
echo "</tr>";

foreach($presidentes as $key => $p){
    echo "<tr>";
    echo "<td>" . $key+16 . "</td>";
    echo "<td>" . $p['nome']. "</td>";
    echo "<td>" . $p['inicio']. "</td>";
    echo "<td>" . $p['fim']. "</td>";
    echo "</tr>";
}
