<?php
require '../conectare/conectare.php';
session_start();
$bool_admin = false;
if(isset($_SESSION['id'])){
    try{
    $sql = "SELECT * FROM users";
    $result = mysqli_query($conectare,$sql);
    while($row = $result -> fetch_assoc()){
        if($row['id'] == $_SESSION['id']){
            if($row['admin']){
               $bool_admin = true;
            }
        }
    }
    }catch(Exception $e){
    die("Ne pare rau nu s-a putut conecta la baza de date");
    }
}
if(!$bool_admin){
   header("Location: /");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <title>Vizualizare melodi</title>
    <style>
        .melodi{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: start;
           
        }
        .cover_melodi{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
    </style>
</head>
<body>
    <div class="cover_melodi">
    <?php
    $sql = "SELECT * FROM melodi";
    $result = mysqli_query($conectare,$sql);
    while($row = $result -> fetch_assoc()){
        echo "<div class='melodi'>";
        echo '<h1>'.$row['nume'].'</h1>';
        echo 'Autorul: <input type="text" name="autor" value='.$row['autor'].' disabled>';
        echo 'Nume: <input type="text" name="nume" value='.$row['nume'].' disabled>';
        echo 'Track: <input type="text" name="track" value='.$row['track'].' disabled>';
        echo 'Categorie: <input type="text" name="categorie" value='.$row['categorie'].' disabled>';
        echo '<a href='.$row['id'].'><button><i class="fas fa-edit"></i>Editeaza</button></a>';
        echo "</div>";
    }
    ?>
    </div>
</body>
</html>