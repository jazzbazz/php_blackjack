<?php  
session_start();
include 'kaartrekkerOne.php';
$a = trekKaartOne();
echo $a;
$b = trekKaartTwo();
echo "<hr>";
$b = trekKaartTwo();

echo $b;

?>