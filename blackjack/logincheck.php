<?php 
//controle op rechtstreekse toegang ?
//2e controle na required
  /* if(!IsSet($_POST["gebruikersnaam"])){
        
       die("onbevoegde toegang unlimited access");
   } else {
   */
session_start();
//todo trim & sanitize en deftige universele namen
    $veiligeUser = filter_var(trim ($_POST['gebruikersnaam']), FILTER_SANITIZE_STRING);
    $eigenaar ='"'. $veiligeUser .'"'; 
    $_SESSION['user'] = $veiligeUser;
    $veiligPw = filter_var(trim ($_POST['paswoord']), FILTER_SANITIZE_STRING);
    $_SESSION['pw'] = $veiligPw;

//connectie maken
$connection = mysqli_connect("localhost", "phpgebruiker", "php", "blackjack");
//query eigenaar vergelijken met db
$naald = "SELECT gebruikersnaam FROM gebruikers WHERE gebruikersnaam =  $eigenaar ";
//query op db
$resultaatUser = mysqli_query($connection, $naald);
// aantal resultaten tellen
$resultcnt = mysqli_num_rows($resultaatUser);


//scenario 1 : usernaam onbekend
    
if ($resultcnt < 1){ 
    
    $_SESSION['bepaling'] = 0;
         ?>
<html>
<body>
<h1>Welkom <?php echo $_SESSION['user'] ; ?></h1>
<p>Je gebruikersnaam bestaat nog niet. Je kan een account aanmaken voor deze gebruikersnaam door een wachtwoord op te geven.</p> 
<form method="POST" name="wachtwoord" action="controlewerkendfun.php">
    <table width="50%">
    <tr>
        <td>Wachtwoord</td>
        <td><input type="password" name="paswoord" size="15" required value="verplicht"></td>
    </tr>
    <tr>
        <td>Wachtwoord controle</td>
        <td><input type="password" name="paswoordCtrl" size="15" required></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" value="Login"></td>
        </tr>    
    </table>
</form>    
</body>
    

</html>
 <?php }else {?>
<html>
<body>
    <h1>Welkom <?php echo $_SESSION['user']; ?></h1>
    <p>Je gebruikersnaam is reeds gekend in ons systeem. Als dit jouw account is, geef dan je wachtwoord in. Als dit niet jouw account is, kan je terugkeren naar de openingspagina om een andere gebruikersnaam te kiezen.</p>
    
    <form method="post" action="controlewerkendfun.php">
    <table width="50%">
        <tr>
        <td>Wachtwoord</td>
        <td><input type="password" size="15" name="paswoord" required></td>
        </tr>
        <tr>
        <td>paswoordcontrole</td>
        <td><input type="password" size="15" name="paswoordCtrl" required></td>
        </tr>
        <tr>
        <td></td>
            <td><input  type="submit" value="Login"></td>
        </tr>
        </table>
    </form>
    <a href="inlog.php">Kies een andere gebruikersnaam  </a>
    </body>
</html>
<?php $_SESSION['bepaling'] = 1;
             }
?>

