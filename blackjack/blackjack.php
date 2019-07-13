<?php
//start van een sessie
session_start();

$totaalPl1 = array_sum($_SESSION['playerOne']);
$totaalPl2 = array_sum($_SESSION['playerTwo']);
?>
<!DOCTYPE html>
<html>
<head>
    <title>The Black Jackpage</title>
    <meta charset="utf-8">
    </head>
<body>
<h1>Welkom <?php echo $_SESSION['user']; ?></h1>
<div id="scorebord">
    <p><?php include 'functions/toonRes.php'; toonResultaat(); ?></p>
    <div> </div>
    
    </div>
    <form method = "post" action="verwerking.php">
    <table width="100%">
        <tr>
            <td width="50%"></td>
            <td width="50%"></td>
        </tr>
        <tr>
            <td>Uw score bedraagt <? echo $totaalPl1;?></td>
            <td>Uw score bedraagt <? echo $totaalPl2;?></td></tr>
        <tr>
        <td><?php if($totaalPl1 > 21){echo "Helaas, u bent dood.";}?></td>
        <td><?php if($totaalPl2 > 21){echo "Helaas, u bent dood.";}?></td>
        </tr>
        <tr>
        <td>Your game</td>
        <td>Tegenstander</td>
        </tr>
        <tr>
        <td width="50%"> <?php for($i=0;$i<count($_SESSION['kaartenOne']);$i++){
            
            echo "<img src='img/" . $_SESSION['kaartenOne'][$i] . ".png'"  . " &nbsp;" . "alt='' >";}?></td>
       <td width="50%"><?php for($i=0;$i < count($_SESSION['kaartenTwo']);$i++){
            echo "<img src='img/" . $_SESSION['kaartenTwo'][$i] . ".png'" . "&nbsp;" . "alt=''>";}?>    
                </td> 
        </tr>
        <tr>
        <td>Het totaal bedraagt <?php echo $totaalPl1; ?></td>
        <td>Het totaal bedraagt <?php echo $totaalPl2; ?></td>
        </tr>
        <tr>
            <td>Maak je keuze</td>
            <td></td>
        </tr>
        <tr>
        <td><input type="radio" value="Trek extra kaart" name="extrakaart" 
         <?php if ((count($_SESSION['playerOne']) == 2) || (($plOne > 21) && (count($_SESSION['playerTwo']) == 1)))

{echo "checked ";}?>  > 
        Trek extra kaart</td>
        <td></td>
        </tr>
        <tr>
        <td><input type ="radio" value="Stoppen" name="stoppen">Stoppen</td>
        <td></td>
        </tr>
        <tr>
        <td><input type="submit" name="volgende" value="Volgende stap"></td>
        <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        
        </tr>
    
    
    </table>
    </form>
    
    </body>

</html>