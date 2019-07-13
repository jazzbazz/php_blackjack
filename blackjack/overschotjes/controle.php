<?php

if ($_POST['paswoord'] != $_POST['paswoordCtrl']){
    die ("paswoordverificatie werkt ! ");
    } else {

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
    

  
    
   
        echo "<hr>";
        echo "sessie geopend variabelen aangemaakt";

        echo "<hr>";

if(isset($_SESSION['bepaling'])){
    
                echo "bepaling is gezet";
  
                } else { 
                //die ("probleem bij isset sessionbepaling");}
                echo "wat is hier het probleem weer ?";}
//controle nieuwe of reeds bestaande user
if ($_SESSION['bepaling'] == 0){
        echo "dit is een nieuwe user";
        //count columns users
        $zoek ="SELECT gebruikersnaam FROM gebruikers";
        $resultaat = mysqli_query($connection,$zoek);
        $row_cnt = mysqli_num_rows($resultaat);
         //toevoegen nieuwe user
        $toevoeg = "INSERT INTO gebruikers (gebruikersnaam, wachtwoord) VALUES ('$gebruik','$pas')";
        $restoevoeg = mysqli_query($connection,$toevoeg);
        $resultaat2 = mysqli_query($connection,$zoek);
        $row_cnt2 = mysqli_num_rows($resultaat2);
        
                echo "<hr>";
                if ($row_cnt2 == ($row_cnt + 1)){
                echo "<hr>";
                echo "toevoeging gelukt en gecontroleerd";
    
                    }else{
                echo "er is ergens nog een probleem";}

    
    
            }else {
        echo "user bestaat reeds in db";
        }


}




//controle ma15:44 bug zit in de while loops ed

for($i = 0 ; $i < 2 ; $i++){
    echo "<hr>";
    $randomS = mt_rand(0,3);
    $randomW = mt_rand(0,12);
    //array met soorten en array met waardes
    $soort = array("harten", "klaveren", "ruiten", "schoppen");
    $waarde = array("1","2","3","4","5","6","7","8","9","10","boer", "dame", "heer");
    //kaart wordt samengesteld ah randoms
    $n = $soort[$randomS].$waarde[$randomW];
    echo $n;
    echo"<hr>";
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
//tweede speler bedienen van kaart

for($i = 0 ; $i < 1 ; $i++){
    echo "<hr>";
    $randomSb = mt_rand(0,3);
    $randomWb = mt_rand(0,12);
    //array met soorten en array met waardes
    $soort = array("harten", "klaveren", "ruiten", "schoppen");
    $waarde = array("1","2","3","4","5","6","7","8","9","10","boer", "dame", "heer");
    //kaart wordt samengesteld ah randoms
    $nb = $soort[$randomSb].$waarde[$randomWb];
    echo "kaartentegenstand :" . $nb;
    echo"<hr>";
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
        //bepalen waarde
    
            
    
            
    continue;

}




    //bepalen of kaart reeds getrokken is ah lid van array getrokken kaarten
    /*while(in_array($n,$_SESSION['kaartengebruikt'])){
        $randomS = mt_rand(0,3);
        $randomW = mt_rand(0,12);
        $n = $soort[$randomS].$waarde[$randomW];}*/
    //toevoegen aan array
       /* array_push($_SESSION['kaartengebruikt'], $n);
       if ($randomW > 9){
           $m =10;  
       } else {
           $m = ("$randomW" + 1);
       }
    $_SESSION[playerOne] = $_SESSION[playerOne] + $m;
    
    array_push($_SESSION['kaartenOne'],$n);
    }*/
//for($j=0;(count($_SESSION['kaartenTwo'])<1);$j++){
  //
    //kaartentrekkerijtst($kaartb,$waardeb);
    //array_push($_SESSION['kaartenTwo'],$kaartb);
    
echo "hallowereld";
kaartentrekkerij($kaart);
echo $kaart;
echo "<hr>";
echo $kaart;

function kaartentrekkerij(&$n){
    //randomwaarde voor geïndexeerde array
    $randomS = mt_rand(0,3);
    $randomW = mt_rand(0,12);
    //array met soorten en array met waardes
    $soort = array("harten", "klaveren", "ruiten", "schoppen");
    $waarde = array("1","2","3","4","5","6","7","8","9","10","boer", "dame", "heer");
    //kaart wordt samengesteld ah randoms
    $n = $soort[$randomS].$waarde[$randomW];
    //bepalen of kaart reeds getrokken is ah lid van array getrokken kaarten
    while(in_array($n,$_SESSION['kaartengebruikt'], true)){
        $randomS = mt_rand(0,3);
        $randomW = mt_rand(0,12);
        $n = $soort[$randomS].$waarde[$randomW];}
    //toevoegen aan array
        array_push($_SESSION['kaartengebruikt'], $n);
       if ($randomW > 9){
           $m =10;  
       } else {
           $m = ("$randomW" + 1);
       }
    $_SESSION[playerOne] = $_SESSION[playerOne] + $m;
    
    
}


//header ('Location: blackjack2.php');
//exit(0);
?>
