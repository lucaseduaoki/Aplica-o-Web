<?php 

$cores = array(1 => 'yellow',
            2 => 'blue',
            3 => 'black',
            4 => 'green',
            5 => 'red',
            6 => 'purple',
            7 => 'grey',
            8 => 'brown',);

foreach ($cores as $key => $c) {
    print '<div style="background-color: ' . $c . '; width: 100px; height: 100px;"></div>';
}

