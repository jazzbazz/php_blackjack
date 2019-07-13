<?php  
session_start();
$_SESSION['kaartengebruikt'];
trekKaartOne();
function trekKaartOne(){

$randomS = mt_rand(0,3);
$randomW = mt_rand(0,12);
    //array met soorten en array met waardes
    $soort = array("harten", "klaveren", "ruiten", "schoppen");
    $waarde = array("1","2","3","4","5","6","7","8","9","10","boer", "dame", "heer");
    //kaart wordt samengesteld ah randoms
    $n = $soort[$randomS].$waarde[$randomW];
    
  while(in_array($n, $_SESSION['kaartengebruikt'])):
    $randomS = mt_rand(0,3);
    $randomW = mt_rand(0,12);
    $n = $soort[$randomS].$waarde[$randomW]; 
    endwhile;
         
    //toevoegen aan array
    array_push($_SESSION['kaartengebruikt'], $n);
    array_push($_SESSION['kaartenOne'],$n);
               }
        //bepalen waarde
    if ($randomW > 9){
        $m =10;
        array_push($_SESSION['playerOne'], $m) ;
        continue;
    } elseif($m == 0) {
       // aas berekenen adhand van playerOne
        if((array_sum(playerOne) + $randomW) < 22){
            $m = 11;
            array_push($_SESSION['playerOne'], $m) ;
        }else {
            $m = 1;
            array_push($_SESSION['playerOne'], $m) ;
        }
    }else {
        $m = ("$randomW" + 1);
        array_push($_SESSION['playerOne'], $m) ;
        continue;
            
    }
            //array_push($_SESSION[playerOne], $m) ;
    
    echo "<hr>" . "kaart is  ". $n . " en waarde is ". $m;        //array_push($_SESSION['kaartenOne'],$n);
    continue;

}   
    
}
?>