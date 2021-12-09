<?php
require_once 'conectare/conectare.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM categori WHERE id = '$id'";
    $result = mysqli_query($conectare,$sql);
    header("Location: admin_categori.php");
}
if(isset($_POST['adaugare']) && !empty($_POST['adaugare'])){
    $adugare = $_POST['adaugare'];
    $bool = true;
    $sql = "SELECT * FROM categori";
    $result = mysqli_query($conectare,$sql);
    while($row = $result -> fetch_assoc()){
       if(strtolower($row['nume']) == strtolower($adugare)){
           $bool = false;
           header("Location: admin_categori.php");
       }
    }
    if($bool){
    $sql = "INSERT INTO categori (nume) VALUES ('$adugare')";
    $result = mysqli_query($conectare,$sql);
    header("Location: admin_categori.php");
    }
}
if(isset($_POST['eliminare']) && !empty($_POST['eliminare'])){
    $eliminare = $_POST['eliminare'];
    $sql = "SELECT * FROM categori";
    $result = mysqli_query($conectare,$sql);
    while($row = $result -> fetch_assoc()){
        if($row['id'] == $eliminare){
            $sql = "DELETE FROM categori WHERE id = '$eliminare'";
            $result = mysqli_query($conectare,$sql);
            header("Location: admin_categori.php");
        }
        if($row['nume'] == $eliminare){
            $sql = "DELETE FROM categori WHERE nume = '$eliminare'";
            $result = mysqli_query($conectare,$sql);
            header("Location: admin_categori.php");
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_categori.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Categori</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><span style="font-weight: 600">Categori<span></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      </ul>
      <form action="admin_categori.php" method="post" class="d-flex">
        <input class="form-control me-2" type="text" name="adaugare" placeholder="Introduce o noua categorie" aria-label="Search">
        <input class="form-control me-2" type="text" name="eliminare" placeholder="Elimina o noua categorie" aria-label="Search">
        <button class="btn btn-outline-success">Trimite</button>
      </form>
    </div>
  </div>
</nav>
<?php
$sql = "SELECT * FROM categori";
$result = mysqli_query($conectare,$sql);
while($row = $result -> fetch_assoc()){
    echo '<div class="admin_categori">';
    echo '<h1>Id: '.$row['id'].'</h1>';
    echo '<h1>Nume: '.$row['nume'].'</h1>';
    echo '<a class="delete_button" href="admin_categori.php?id='.$row['id'].'"><i class="fas fa-times"></i></a>';
    echo '</div>';
}
?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>