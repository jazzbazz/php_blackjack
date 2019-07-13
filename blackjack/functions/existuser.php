<?php

function existUserCtrl ($n){
    $connection = mysqli_connect("localhost", "phpgebruiker", "php", "blackjack");
    $n =  '"'. $_SESSION['user'].'"';
    $pas = '"'. $_SESSION['paswoord'].'"';
    
    $naald = "SELECT gebruikersnaam FROM gebruikers WHERE gebruikersnaam =  $n AND wachtwoord = $pas ";
    $userControle = mysqli_query($connection, $naald);
    $resControle = mysqli_num_rows($userControle);
    //echo "<hr>". "dit is het resultaatnummer :". $resControle;
    
    if($resControle == 0){
        die ("probleem met uw paswoord");
    }else {
        //echo "De user : ". $_SESSION['user'] . " bestaat reeds.";
        //die ("controle gelukt");
    }
    
}
?>