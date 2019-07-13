<?php

//sessie openen
session_start();

$schudder = count($_SESSION['kaartengebruikt']);

    if($schudder > 32){
    
    $_SESSION['kaartengebruikt'] = array();

    }

//variabelen declareren

    $randomS = mt_rand(0,3);
    $randomW = mt_rand(0,12);
    //array met soorten en array met waardes
    $soort = array("harten", "klaveren", "ruiten", "schoppen");
    $waarde = array("1","2","3","4","5","6","7","8","9","10","boer", "dame", "heer");
    //kaart wordt samengesteld ah randoms
    $n = $soort[$randomS].$waarde[$randomW];
   
    while(in_array($n, $_SESSION['kaartengebruikt'])):
        $randomW = mt_rand(0,3);
        $randomW = mt_rand(0,12);
        $n = $soort[$randomS].$waarde[$randomW];
    endwhile;
        //toevoegen aan array
        array_push($_SESSION['kaartengebruikt'], $n);
      
               
        //bepalen waarde
    
        if ($randomW > 9){
        $m =10;
        //array_push($_SESSION['playerOne'], $m) ;
        //continue;
        } else {
        $m = ($randomW + 1);
        //array_push($_SESSION['playerOne'], $m) ;
        //continue;
            
        }

//controlevariabelen stopper,trekker,totaal pl1 en 2

    if (isset($_POST['stoppen'])){
        $stopper = 1;
    $_SESSION['stopteller']++;
    //$stopteller++;
      $sSesstopper++;
        //array_push($_SESSION['stopteller'], $sSesstopper);
    }else{
        $stopper = 0;
    }
    if (isset($_POST['extrakaart'])){
    $trekker = 1;
    }else {
    $trekker = 0;
    }
    if(isset($_POST['volgende'])){
    $volger = 1;
    } else {
    $volger = 0;
    }



// totalen berekenen spelers
$totaalPl1 = array_sum($_SESSION['playerOne']);
$totaalPl2 = array_sum($_SESSION['playerTwo']);

    //conditie totaal player one
if ($totaalPl1 < 21) {
        //alive
        $plOne = 1;
    }else if ($totaalPl1 == 21)  {
        $plOne = 2;
    }
    else {
        $plOne = 0;
        $sSesstopper = 1;
        
    }


   //conditie totaal player two
if ($totaalPl2 < 21){
        //alive
        $plTwo = 1;
    }else if ($totaalPl2 == 21) {
        $plTwo = 2;
    }
    else {
        $plTwo = 0;
        
    }



//controle of toegang via bj komt !!aanpas voor werking
if ($volger != 1){
    //die werkt in testfile
    die ("access denied !");}else{
/// speler een wil verder spelen en is nog levend
if(!isset($_SESSION['stopteller'])){
        
        array_push($_SESSION['kaartenOne'], $n);
        array_push($_SESSION['playerOne'], $m);
 // to do speler een blijft verder kaarten krijgen bij > 21
 /// speler een is er mee gestopt, speler twee leeft nog en stopt niet       
}else{ 
        if(($_SESSION['stopteller'] < 2) && ($plTwo != 0)){
        array_push($_SESSION['kaartenTwo'], $n);
        array_push($_SESSION['playerTwo'], $m);
            //die("speler twee wil verder spelen");
        
        }else{ 
            include 'functions/verhoogGelijk.php';
            //bereken de resultaten hier /////
            
            
            if (($totaalPl1 == $totaalPl2) || (($plOne == 0) && ($plTwo == 0))){
                
                verhoogGelijk();
                
                header ("location: nieuwspel.php");
                exit(0);         
            }
            elseif (($plOne == 0) && ($plTwo != 0)){
                
                
                verhoogVerlies();
                
                header ("location: nieuwspel.php");
                exit(0);         
                
            }
            elseif (($plOne != 0) && ($plTwo == 0)){
                
               
                verhoogWinst();
                 
                header ("location: nieuwspel.php");
                exit(0);         
            }
            elseif ($totaalPl1 > $totaalPl2){
                
                
                verhoogWinst();
                
                header ("location: nieuwspel.php");
                exit(0);         
            }
            elseif ($totaalPl2 > $totaalPl1){
               
                
                verhoogVerlies();
                
                header ("location: nieuwspel.php");
                exit(0);         
                } 
 
            //sluithaak speler twee gestopt    
        }
    //sluithaak speler twee spelend of niet
}
  
}
header ("location: blackjack.php");
exit(0);         
//sluithaak stopteller gezet of niet


?>