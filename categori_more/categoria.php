<?php
require_once "../conectare/conectare.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Negative Muzicale Categorie:<?php     if(isset($_GET["id"])){
        $id = $_GET["id"];
        $sql = "SELECT * FROM categori";
        $result = mysqli_query($conectare,$sql);
        while($row = $result -> fetch_assoc()){
            if($row['id'] == $id){
                echo $row['nume'];
            }
        }
    }?></title>
</head>
<body>
    
    <?php
    if(isset($_GET["id"])){
        $id = $_GET["id"];
        $sql = "SELECT * FROM melodi";
        $result = mysqli_query($conectare,$sql);
        while($row = $result -> fetch_assoc()){
            if($row['categorie'] == $id){
                echo $row['nume'];
            }
        }
    }
    ?>
</body>
</html>