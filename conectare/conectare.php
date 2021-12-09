<?php
   $conectare = mysqli_connect("localhost","root","","mp3-magazin");
   if(!$conectare){
       header("Location: eroare_baza_de_date.php");
       die();
   }
?>