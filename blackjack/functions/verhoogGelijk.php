<?php 

function verhoogGelijk(){
    $connection = mysqli_connect("localhost", "phpgebruiker", "php", "blackjack");
    
    $a = '"'. $_SESSION['user'].'"' ;
    $zoekID = "SELECT id FROM gebruikers WHERE gebruikersnaam = $a ";
    $queryID = mysqli_query($connection, $zoekID);
    while($resID = mysqli_fetch_assoc($queryID)){
        $m =  $resID['id'];
        }
    //echo "<hr>".$m ."<hr>";
    
    
    $zoekGelijk = "SELECT gelijk FROM score WHERE gebruikersid = '$m' ";
    $queryGelijk =mysqli_query($connection, $zoekGelijk);
    while($intGelijk = mysqli_fetch_assoc($queryGelijk)){
        $w =  $intGelijk['gelijk'];
        }
    //echo "is dit een waarde ? antwoord ->" . $w;
    
    $upGelijk = $w + 1;
    
    $updateGel ="UPDATE score SET gelijk = '$upGelijk' WHERE gebruikersid = '$m' ";
    $queryupdGel = mysqli_query($connection, $updateGel);
    
    //echo "<hr>" . $upGelijk . " dit is upgelijk."    
}

////// verhoogWinst ////////
function verhoogWinst(){
    $connection = mysqli_connect("localhost", "phpgebruiker", "php", "blackjack");
    
    $a = '"'. $_SESSION['user'].'"' ;
    $zoekID = "SELECT id FROM gebruikers WHERE gebruikersnaam = $a ";
    $queryID = mysqli_query($connection, $zoekID);
    while($resID = mysqli_fetch_assoc($queryID)){
        $m =  $resID['id'];
        }
    //echo "<hr>".$m ."<hr>";
    
    
    $zoekWinst = "SELECT win FROM score WHERE gebruikersid = '$m' ";
    $queryWinst = mysqli_query($connection, $zoekWinst);
    while($intWinst = mysqli_fetch_assoc($queryWinst)){
        $w =  $intWinst['win'];
        }
    //echo "is dit een waarde ? antwoord ->" . $w;
    
    $upWin = $w + 1;
    
    $updateWin ="UPDATE score SET win = '$upWin' WHERE gebruikersid = '$m' ";
    $queryupdWin = mysqli_query($connection, $updateWin);
    
    //echo "<hr>" . $upGelijk . " dit is upgelijk."    
}

/////// verhoogVerlies //////

function verhoogVerlies(){
    $connection = mysqli_connect("localhost", "phpgebruiker", "php", "blackjack");
    
    $a = '"'. $_SESSION['user'].'"' ;
    $zoekID = "SELECT id FROM gebruikers WHERE gebruikersnaam = $a ";
    $queryID = mysqli_query($connection, $zoekID);
    while($resID = mysqli_fetch_assoc($queryID)){
        $m =  $resID['id'];
        }
    //echo "<hr>".$m ."<hr>";
    
    
    $zoekVer = "SELECT verlies FROM score WHERE gebruikersid = '$m' ";
    $queryVer =mysqli_query($connection, $zoekVer);
    while($intVer = mysqli_fetch_assoc($queryVer)){
        $w =  $intVer['verlies'];
        }
    //echo "is dit een waarde ? antwoord ->" . $w;
    
    $upVer = "$w" + 1;
    
    $updateVer ="UPDATE score SET verlies = '$upVer' WHERE gebruikersid = '$m' ";
    $queryupdVer = mysqli_query($connection, $updateVer);
    
    //echo "<hr>" . $upGelijk . " dit is upgelijk."    
}




?>