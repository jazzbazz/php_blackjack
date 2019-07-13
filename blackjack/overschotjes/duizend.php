<?php
$a = 50;
$j = 1;
for ($i = 0; $i < 10000 ; $i++){
    echo "modulo *";
    $j++;
    if (($j%$a) == 0){
        echo "<br>";
        $a--;
        if ($a < 2){
        echo "boem";
        $a = $a+40;
       }else {
            if(($j%2)==0){
            echo "bam";} }
    }
    }


?>