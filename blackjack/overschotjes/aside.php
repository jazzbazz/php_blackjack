<?php 
session_start();
//$gebruikteKaarten = array();
$totaal;
$_SESSION['playerOne'] = $totaal;
$_SESSION['kaartengebruikt'] = array();
//begin functie trek kaart
$randomS = mt_rand(0,3);
$randomW = mt_rand(0,12);

$soort = array("harten", "klaveren", "ruiten", "schoppen");
$waarde = array("1","2","3","4","5","6","7","8","9","10","boer", "dame", "heer");
//kaart is samenstelling uit 2 arrays
$kaart = $soort[$randomS].$waarde[$randomW];
 //if(count($_SESSION['kaartengebruikt']) < 1){
     //echo (count($_SESSION['kaartengebruikt']));}
array_push($_SESSION['kaartengebruikt'],$kaart);
echo "<hr>";
//$_SESSION[]


        //}else{
       
           //echo count($_SESSION['kaartengebruikt']);
           //controleer of bestaat
           //for ($i=0;$i<count($_SESSION['kaartengebruikt']);$i++){
               //if ($kaart == $_SESSION['kaartengebruikt'].[$i]){
                   //break;
               
          //array_push($_SESSION['kaartengebruikt'],$kaart);
            //   }
           //}
      
  

//link om kaart te tonen
$imgLink = "img/" . $kaart . "." . "png";

            
  ?><html><body><img src="<?php echo $imgLink ?>"></body></html>  
<?php
           //array aanvullen met kaart
            
            //waarde berekenen
            //if ($waarde == "boer" || $waarde== "dame" || $waarde="heer"){
            //    $getalwaarde= 10;
            //} else {
            //    $getalwaarde=intval($waarde);
            //}
            //$_SESSION['playerOne'] = $totaal + $getalwaarde;
              //       echo $getalwaarde;
        
    

echo $imgLink;
echo "<hr>";
//echo $kaart;
echo "hello World";
echo "<hr>";
echo $kaart;
//kaart pushen in array
echo "<hr>";
//aanmaken lege array 
print_r($_SESSION['kaartengebruikt']);
                     echo count($_SESSION['kaartengebruikt']);


//eerst sessie openen





?>