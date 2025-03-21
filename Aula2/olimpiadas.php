<?php

$paises = [
    ["bandeira" => "https://img.icons8.com/?size=100&id=15532&format=png&color=000000", "sigla" => "USA", "nome" => "Estados Unidos", "ouro" => 46 , "prata" => 37, "bronze" => 38, "total" => 121],
    ["bandeira" => 'https://img.icons8.com/?size=100&id=15534&format=png&color=000000',"sigla" => "GBR", "nome" => "Grã-Bretanha", "ouro" => 27, "prata" => 23, "bronze" => 17, "total" => 67],
    ["bandeira" => 'https://img.icons8.com/?size=100&id=17962&format=png&color=000000',"sigla" => "CHN", "nome" => "China", "ouro" => 26, "prata" => 18, "bronze" => 26, "total" => 70],
    ["bandeira" => 'https://img.icons8.com/?size=100&id=15528&format=png&color=000000',"sigla" => "RUS", "nome" => "Rússia", "ouro" => 19, "prata" => 17, "bronze" => 20, "total" => 56],
    ["bandeira" => 'https://img.icons8.com/?size=100&id=15502&format=png&color=000000',"sigla" => "GER", "nome" => "Alemanha", "ouro" => 17, "prata" => 10, "bronze" => 15, "total" => 42]
];


echo "<table border>";

echo "<tr>";
echo "<td>Ordem</td>";
echo "<td style='text-align:center';>País</td>";
echo "<td style='text-align:center; background-color:yellow; '><img src='https://img.icons8.com/?size=100&id=33486&format=png&color=000000' width='30' height='30'></td>";
echo "<td style='text-align:center; background-color:silver; '><img src='https://img.icons8.com/?size=100&id=23876&format=png&color=000000' width='30' height='30'></td>";
echo "<td style='text-align:center; background-color:#cd7f32; '><img src='https://img.icons8.com/?size=100&id=23875&format=png&color=000000' width='30' height='30'></td>";
echo "<td>Total</td>";
echo "</tr>";

foreach($paises as $key => $p){
    echo "<tr>";
    echo "<td style='text-align:center;'>" .$key+=1 ."</td>";
    echo "<td><img src='" . $p["bandeira"] . "' width='30' height='30' style='vertical-align: middle;'>" . $p["sigla"]. "   " . $p["nome"]. "</td>";
    echo "<td style='background-color:yellow; text-align:center; ' >" .$p['ouro']. "</td>";
    echo "<td style='background-color:silver; text-align:center; ' >" .$p['prata']. "</td>";
    echo "<td style='background-color:#cd7f32; text-align:center;'>" .$p['bronze']. "</td>";
    echo "<td style='text-align:center;'>" .$p['total']. "</td>";
