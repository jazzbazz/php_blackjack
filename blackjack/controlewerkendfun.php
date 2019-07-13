<?php 

if ($_POST['paswoord'] != $_POST['paswoordCtrl']){
    //header ("Location: foutpagina.php");
    //exit(0);
    die("Het wachtwoord klopte niet.");
    
}else {
    
    ////////// begin van het echte werk /////
    //start sessie en aanmaken sessievariabelen
    session_start();
    unset($_SESSION['stopteller']);
    
    //eerste array is totaal aantal gebruikte kaarten
    //wordt vergeleken om geen dubbels te hebben
    $_SESSION['kaartengebruikt'] = array();
    // arrays gebruikt om kaarten user te tonen
    $_SESSION['kaartenOne'] = array();
    $_SESSION['kaartenTwo'] = array();
    //arrays gebruikt om totalen/score te berekenen
    $_SESSION['playerOne'] = array();
    $_SESSION['playerTwo'] = array();
    
    $_SESSION['paswoord'] =$_POST['paswoord'];
   
    
    //eerste test met isset beveiliging externe toegang ?
    if(!isset($_SESSION['bepaling'])){
        die ("bepaling is niet gezet");
    }else {
    //redirect doet het nog steeds, bestaande of onbestaande user
        if($_SESSION['bepaling'] == 0){
       
        //include de functions file
        include 'functions/voeguser.php';
        voegUserToe();
          
        } else { 
            
        include 'functions/existuser.php';
        existUserCtrl($_SESSION['user']);
    
        }
                   
    //include trekkeronefunctie
    include 'functions/kaartrekkerOne.php';   
    for($i = 0 ; $i < 2 ; $i++){
        trekKaartOne();
        }   

        ////tweede kaartspeler
  for($i = 0 ; $i < 1 ; $i++){
        trekKaartTwo();
        }   
                       
    header ("location: blackjack.php");
    exit(0); 
//sluithaak bepalingzet    
}
//sluithaak paswoordcontrole = 01
}
?>