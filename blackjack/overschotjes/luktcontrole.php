<?php 

if ($_POST['paswoord'] != $_POST['paswoordCtrl']){
    header ("Location: foutpagina.php");
    exit(0);
    
}else {
    
    ////////// begin van het echte werk /////
    $connection = mysqli_connect("localhost", "phpgebruiker", "php", "blackjack");
    //start sessie en aanmaken sessievariabelen
    session_start();
    //gebruiker wordt opgeslagen in sessie
    $_SESSION['naam'] = $_POST['gebruiker'];
    $_SESSION['kaartengebruikt'] = array();
    $_SESSION['kaartenOne'] = array();
    $_SESSION['kaartenTwo'] = array();
    $_SESSION['playerOne'] = array();
    $_SESSION['playerTwo'] = array();
    $gebruik = $_SESSION['user'];
    $pas = $_POST['paswoord'];
    
    //eerste test met isset
    if(!isset($_SESSION['bepaling'])){
        die ("bepaling is niet gezet");
    }else {
        
   
    
    //redirect doet het nog steeds, bestaande of onbestaande user
    if($_SESSION['bepaling'] == 0){
        //count columns users
        $zoek ="SELECT gebruikersnaam FROM gebruikers";
        $resultaat = mysqli_query($connection,$zoek);
        $row_cnt = mysqli_num_rows($resultaat);
         //toevoegen nieuwe user
        $toevoeg = "INSERT INTO gebruikers (gebruikersnaam, wachtwoord) VALUES ('$gebruik','$pas')";
        $restoevoeg = mysqli_query($connection,$toevoeg);
        $resultaat2 = mysqli_query($connection,$zoek);
        $row_cnt2 = mysqli_num_rows($resultaat2);
        
            if ($row_cnt2 == ($row_cnt + 1)){
                
            }else{
                die ("probleem bij rowcountverificatie");
            }
    } else {
        //todo : user bestaat reeds verificatie paswoord
    
    
    

    }
        
    
    //werkte bij toevoeg hierboven maar moet in deze haak
        
    for($i = 0 ; $i < 2 ; $i++){
    
    $randomS = mt_rand(0,3);
    $randomW = mt_rand(0,12);
    //array met soorten en array met waardes
    $soort = array("harten", "klaveren", "ruiten", "schoppen");
    $waarde = array("1","2","3","4","5","6","7","8","9","10","boer", "dame", "heer");
    //kaart wordt samengesteld ah randoms
    $n = $soort[$randomS].$waarde[$randomW];
    
  if(in_array($n, $_SESSION['kaartengebruikt'])){
        continue;
        } else { 
        //toevoegen aan array
        array_push($_SESSION['kaartengebruikt'], $n);
               }
        //bepalen waarde
    if ($randomW > 9){
        $m =10;
        continue;
    } else {
        $m = ("$randomW" + 1);
        continue;
            
    }
            $_SESSION[playerOne] = $_SESSION[playerOne] + $m;
    
            array_push($_SESSION['kaartenOne'],$n);
    continue;

}   

        ////tweede kaartspeler
  for($i = 0 ; $i < 1 ; $i++){
    
    $randomSb = mt_rand(0,3);
    $randomWb = mt_rand(0,12);
    //array met soorten en array met waardes
    $soort = array("harten", "klaveren", "ruiten", "schoppen");
    $waarde = array("1","2","3","4","5","6","7","8","9","10","boer", "dame", "heer");
    //kaart wordt samengesteld ah randoms
    $nb = $soort[$randomSb].$waarde[$randomWb];
    
  if(in_array($nb, $_SESSION['kaartengebruikt'])){
        continue;
        } else { 
        //toevoegen aan array
        array_push($_SESSION['kaartengebruikt'], $nb);
        array_push($_SESSION['kaartenTwo'],$nb);
            if ($randomW > 9){
            $m =10;
            continue;
            } else {
            $m = ("$randomW" + 1);
            continue;
            
            } 
      //toevoegen waarde aan
      $_SESSION[playerTwo] = $_SESSION[playerTwo] + $m;
  }
        
    
            
    
            
    continue;

}      
    
    
    header ("location: blackjack2.php");
    exit(0);
}
 }
?>