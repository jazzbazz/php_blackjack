<?php
session_start();
$_SESSION['kaartengebruikt'] = array();


function trekeenkaart() {
    //randomwaarde voor geïndexeerde array
    $randomS = mt_rand(0,3);
    $randomW = mt_rand(0,12);
    //array met soorten en array met waardes
    $soort = array("harten", "klaveren", "ruiten", "schoppen");
    $waarde = array("1","2","3","4","5","6","7","8","9","10","boer", "dame", "heer");
    //kaart wordt samengesteld ah randoms
    $kaart = $soort[$randomS].$waarde[$randomW];
    //voorwaarde om kaart toe te voegen aan array van gebruikte kaarten
    /*if (count($_SESSION['kaartengebruikt']) == 0) {
        continue;
        } else {*/
        /*if (in_array($kaart, $_SESSION['kaartengebruikt'])){
            echo "foutje"; //na te kijken, hij moet overslaan en opnieuw 
        } else {
          continue;
        }*/
         
    array_push($_SESSION['kaartengebruikt'],$kaart);  
    
//return $kaart;
echo $kaart;
echo "einde functie";
}
?>  

