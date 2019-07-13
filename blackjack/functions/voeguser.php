<?php 

function voegUserToe() {
   //variabele declaratie
    $connection = mysqli_connect("localhost", "phpgebruiker", "php", "blackjack");
    $x = 0;
    $a = $_SESSION['user'];
    $b = $_SESSION['paswoord'];
    //echo $a;
    //echo "<br>";
    //echo $b;
    //echo "<hr>";
 
//toevoegen nieuwe user
    $toevoegquer = "INSERT INTO gebruikers (gebruikersnaam, wachtwoord) VALUES ('$a','$b')";
    $toevoeg =mysqli_query($connection, $toevoegquer);
    
//na toevoeging id zoeken
    $naaldid = "SELECT id FROM gebruikers WHERE gebruikersnaam = '$a'"; 
    $zoekid = mysqli_query($connection, $naaldid);
        while($res = mysqli_fetch_assoc($zoekid)){
        $m =  $res['id'];
        }
    //endwhile;
    //echo "<hr>" . "dit is M :" . $m;
   
 //andere tabel score vullen ah id, basiswaardes 0
    
    $toevoegScore = "INSERT INTO score (gebruikersid, win, gelijk, verlies) VALUES ('$m','$x','$x','$x') ";
        $restoevoeg = mysqli_query($connection,$toevoegScore);
        
       $row_cnt2 = mysqli_num_rows($restoevoeg);
    
        
            if (!$restoevoeg){
             die ("probleem bij rowcountverificatie");   
           
            }
    
}


?>