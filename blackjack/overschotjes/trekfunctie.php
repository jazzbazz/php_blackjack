<?php 
kaartentrekkerij($kaart,$waarde);
echo $kaart;
echo "<hr>";
echo $waarde;

function kaartentrekkerij(&$n,&$m){
    //randomwaarde voor geïndexeerde array
    $randomS = mt_rand(0,3);
    $randomW = mt_rand(0,12);
    //array met soorten en array met waardes
    $soort = array("harten", "klaveren", "ruiten", "schoppen");
    $waarde = array("1","2","3","4","5","6","7","8","9","10","boer", "dame", "heer");
    //kaart wordt samengesteld ah randoms
    $n = $soort[$randomS].$waarde[$randomW];
    //bepalen of kaart reeds getrokken is ah lid van array getrokken kaarten
    while(in_array($n,$_SESSION['kaartengebruikt'], true)){
        $randomS = mt_rand(0,3);
        $randomW = mt_rand(0,12);
        $n = $soort[$randomS].$waarde[$randomW];}
    //toevoegen aan array
        array_push($_SESSION['kaartengebruikt'], $n);
       if ($randomW > 9){
           $m =10;  
       } else {
           $m = ("$randomW" + 1);
       }
    $_SESSION[playerOne] = $_SESSION[playerOne] + $m;
    
    
}

function kaartentrekkerijtst(&$a,&$b){
    //randomwaarde voor geïndexeerde array
    $randomS = mt_rand(0,3);
    $randomW = mt_rand(0,12);
    //array met soorten en array met waardes
    $soort = array("harten", "klaveren", "ruiten", "schoppen");
    $waarde = array("1","2","3","4","5","6","7","8","9","10","boer", "dame", "heer");
    //kaart wordt samengesteld ah randoms
    $a = $soort[$randomS].$waarde[$randomW];
    //bepalen of kaart reeds getrokken is ah lid van array getrokken kaarten
    while(in_array($n,$_SESSION['kaartengebruikt'], true)){
        $randomS = mt_rand(0,3);
        $randomW = mt_rand(0,12);
        $n = $soort[$randomS].$waarde[$randomW];}
    //toevoegen aan array
        array_push($_SESSION['kaartengebruikt'], $a);
       if ($randomW > 9){
           $b =10;  
       } else {
           $b = ("$randomW" + 1);
       }
    $_SESSION[playerTwo] = $_SESSION[playerTwo] + $b;
    
    
}

?>