<?php 
session_start();
$_SESSION['kaartengebruikt'] = array();
$playerOne = $_SESSION['playerOne'];
$playerTwo = $_SESSION['playerTwo'];

trekeenkaart($kaartje);
echo $kaartje;
function trekeenkaart(&$n) {
    //randomwaarde voor geïndexeerde array
    $randomS = mt_rand(0,3);
    $randomW = mt_rand(0,12);
    //array met soorten en array met waardes
    $soort = array("harten", "klaveren", "ruiten", "schoppen");
    $waarde = array("1","2","3","4","5","6","7","8","9","10","boer", "dame", "heer");
    //kaart wordt samengesteld ah randoms
    $n = $soort[$randomS].$waarde[$randomW];
    //voorwaarde bestaan
    while(in_array($n,$_SESSION['kaartengebruikt'], true)){
        $randomS = mt_rand(0,3);
        $randomW = mt_rand(0,12);
        $n = $soort[$randomS].$waarde[$randomW];}
     //waarde variabele maken
    $kaartwaarde = $waarde[$randomW];
    echo $kaartwaarde;
    //kaart toevoegen aan array
     array_push($_SESSION['kaartengebruikt'],$n); 
    //if(in_array($n,$_SESSION['kaartengebruikt'])){
        //echo "opnieuw";
        //trekeenkaart(n);
   if (($kaartwaarde == "boer") || ($kaartwaarde == "dame") || ($kaartwaarde == "heer")){
        $kaartwaarde = 10;
    }  else {
$kaartwaarde = $kaartwaarde;
  }
    if(($_SESSION[playerOne]< 22) || (!isset($_POST['stoppen']))){
        $_SESSION[playerOne] = $_SESSION[playerOne] + $kaartwaarde;
    } else {
    $_SESSION['playerTwo'] = $_SESSION['playerTwo'] + $kaartwaarde;
}
echo "de kaartwaarde is : "." ".$kaartwaarde;
    
echo $n . "dit is var n";

echo "einde functie";
}
echo "<hr>";
echo $kaartje . " " . " buiten de functie is kaartje!";
echo "<hr>";
controleerbestaan($kaartje);
function controleerbestaan($ding) {
    if (in_array($ding, $_SESSION['kaartengebruikt'], true)){
        echo "sorry bezet";
        
    }else {
          echo "er is nog plaats";
          array_push($_SESSION['kaartengebruikt'],$ding);}
    echo "einde functie controleer";
    echo "<hr>";
}
controleerbestaan($kaartje);
echo "<hr>";







?>