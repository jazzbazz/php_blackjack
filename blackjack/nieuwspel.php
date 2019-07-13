<?php 
session_start();
//unset($_SESSION['playerOne']);


$_SESSION['playerOne'] = array();

//unset($_SESSION['playerTwo']);
$_SESSION['playerTwo'] = array();
//unset($_SESSION['kaartenOne']);
$_SESSION['kaartenOne'] = array();
//unset($_SESSION['kaartenTwo']);
$_SESSION['kaartenTwo'] = array(); 

$_SESSION['stopteller']= null;
include 'functions/kaartrekkerOne.php';
for ($i=0;$i<2;$i++){
   trekKaartOne(); 
    
}
for($i=0;$i<1;$i++){
    trekKaartTwo();
    
}

header ("location: blackjack.php");
exit(0);      
?>