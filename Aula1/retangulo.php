<?php


function area($b, $h){
    $area = $b * $h;
    return $area;
}


$ret1 = array('Base' => 10,
              'Altura' => 20);

$ret2 = array('Base' => 9,
              'Altura' => 16);
            
$ret3 = array('Base' => 3,
              'Altura' => 4);

$rets = array($ret1, $ret2, $ret3);

foreach ($rets as $i => $r) {
    $i++;
    $retArea = area($r['Base'], $r['Altura']);
    echo ("A área do retângulo $i é $retArea <br>");
}
