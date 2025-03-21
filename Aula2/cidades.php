<?php

$cidades = [
    ["nome" => "Foz do Iguaçu", "habitantes" => "250.000", "area" => "500km²", "altitude" => "145m", "estado" => "Paraná-PR"],
    ["nome" => "Cascavel", "habitantes" => "300.000", "area" => "420km²", "altitude" => "320m", "estado" => "Paraná-PR"],
    ["nome" => "Chapecó", "habitantes" => "240.000", "area" => "120km²", "altitude" => "620m", "estado" => "Santa Catarina-SC"],
    ["nome" => "Blumenau", "habitantes" => "330.000", "area" => "200km²", "altitude" => "85m", "estado" => "Santa Catarina-SC"],
    ["nome" => "Curitiba", "habitantes" => "1.500.000", "area" => "300km²", "altitude" => "850m", "estado" => "Paraná-PR"]
];

echo "<table border=1>";

echo "<tr>";
echo "<td>Nome</td>";
echo "<td>Habitantes</td>";
echo "<td>Área</td>";
echo "<td>Altitude</td>";
echo "<td>Estados</td>";

//Linha de dados

foreach($cidades as $c){
    echo "<tr>";
    echo "<td>" .$c["nome"]. "</td>";
    echo "<td>" .$c["habitantes"]. "</td>";
    echo "<td>" .$c["area"]. "</td>";
    echo "<td>" .$c["altitude"]. "</td>";
    echo "<td>" .$c[""]. "</td>";
}
