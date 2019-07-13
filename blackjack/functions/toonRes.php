<?php

function toonResultaat(){
    
    $connection = mysqli_connect("localhost", "phpgebruiker", "php", "blackjack");
    
    $n = '"'.$_SESSION['user'].'"';
    
    
    $queryID = "SELECT id FROM gebruikers WHERE gebruikersnaam = $n ";
    $resultID = mysqli_query($connection, $queryID);
    while($resID = mysqli_fetch_assoc($resultID)){
        $m =  $resID['id'];
    }
    
    
    $zoekResus = "SELECT win,gelijk, verlies FROM score WHERE gebruikersid = '$m' ";
    $queryResus = mysqli_query($connection, $zoekResus);
    while($intResus = mysqli_fetch_assoc($queryResus)){
        $w =  $intResus['win'];
        $v = $intResus['verlies'];
        $g = $intResus['gelijk'];
        }
    
    echo "U hebt " . $w . " keer gewonnen," ." ". $v . " " . "maal verloren en speelde " . $g . " maal gelijk.";
}
?>