<?php  

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
               
        //bepalen waarde
    if ($randomW > 9){
        $m =10;
        array_push($_SESSION['playerOne'], $m) ;
        //continue;
       
    } else if(($randomW == 0)&&((array_sum($_SESSION['playerOne']) + $randomW)<21)){
        $m = 11;
        array_push($_SESSION['playerOne'], $m) ;
    
    }else if($randomW == 0){
        $m = 1;
        array_push($_SESSION['playerOne'], $m) ;
        
        
    }else {
        $m = ($randomW + 1);
        array_push($_SESSION['playerOne'], $m) ;
       
            
    }
            
    
 //echo $n;
//echo $m;
}
/////////////////////////kaart twee functie ///////////

function trekKaartTwo(){

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
    array_push($_SESSION['kaartenTwo'],$n);
               
        //bepalen waarde
    if ($randomW > 9){
        $m =10;
        array_push($_SESSION['playerTwo'], $m) ;
        //continue;
       
    } else if(($randomW == 0)&&((array_sum($_SESSION['playerTwo']) + $randomW)<21)){
        $m = 11;
        array_push($_SESSION['playerTwo'], $m) ;
    
    }else if($randomW == 0){
        $m = 1;
        array_push($_SESSION['playerTwo'], $m) ;
        
        
    }else {
        $m = ($randomW + 1);
        array_push($_SESSION['playerTwo'], $m) ;
       
            
    }
            
    
    //echo $m . "is de waarde en " .$n . " is de kaart van functie 2";
}

?>