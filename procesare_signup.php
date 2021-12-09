<?php
session_start();
require_once 'conectare/conectare.php';
$nume = $_POST['nume'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_hash = password_hash($password,PASSWORD_DEFAULT);
$bool = true;
$sql = "SELECT email FROM users";
$result = mysqli_query($conectare,$sql);
while($row = $result -> fetch_assoc()){
if($row['email'] == $email){
    $bool = false;
    break;
}
}
if($bool){
    $sql = "INSERT users(username,email,password) VALUES('$nume','$email','$password_hash')";
    $result = mysqli_query($conectare,$sql);
    header('Location: index.php');
    $sql = "SELECT * FROM users";
    $result = mysqli_query($conectare,$sql);
    while($row = $result -> fetch_assoc()){
        if($row['email'] == $email){
            $_SESSION['username'] = $row['username'];
            $_SESSION['id'] = $row['id'];
        }
    }
}
else{
    header("Location: signup.php?eroare=Email-ul se afla deja in baza de date");
}

?>