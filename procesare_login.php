<?php
session_start();
require_once 'conectare/conectare.php';
$email = $_POST['email'];
$password = $_POST['password'];
$sql = "SELECT * FROM users";
$result = mysqli_query($conectare,$sql);
$bool_password = true;
$bool_email = true;
while($row = $result -> fetch_assoc()){
    if($email == $row['email']){
        $bool_email = false;
        if(password_verify($password, $row['password'])){
          $_SESSION['username'] = $row['username'];
          $_SESSION['id'] = $row['id'];
          $bool_password = false;
          header("Location: index.php");
        }
    }
}
if($bool_email){
    header('Location: login.php?error_email=Adresa de email nu se geseste in baza de date');
}
else if($bool_password){
    header('Location: login.php?error_password=Email-ul nu se potriveste cu parola');
}
?>