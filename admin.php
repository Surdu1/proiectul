<?php
session_start();
require_once 'conectare/conectare.php';
$bool_admin = true;
if(isset($_SESSION['id'])){
    try{
    $sql = "SELECT * FROM users";
    $result = mysqli_query($conectare,$sql);
    while($row = $result -> fetch_assoc()){
        if($row['id'] == $_SESSION['id']){
            if(!$row['admin']){
               header("Location: index.php");
               $bool_admin = false;
            }
        }
    }
    }catch(Exception $e){
    die("Ne pare rau nu s-a putut conecta la baza de date");
    }
}
if($bool_admin){

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="stylesheet" href="admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Admin</title>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <form class="form_class" method="post" action="admin_procesare.php" enctype="multipart/form-data">
        <h1 style="padding: 10px;font-weight: 700">Administrare</h1>
        <div class="nume_input">
        <i class="fas fa-file-signature"></i><input type="text" placeholder="Numele melodiei" name="nume">
        </div>
        <div class="nume_input">
        <i class="fas fa-user"></i><input type="text" placeholder="Numele Autor" name="autor">
        </div>
        <div class="nume_input">
        <i class='bx bxs-category'></i><input type="text" placeholder="Catgorie" name="categorie">
        </div>
        <div class="mb-3">
            <label for="formFileMultiple" class="form-label">Introduce melodia</label>
            <input style="border-radius: 20px; max-width: 400px;" class="form-control" type="file" id="formFileMultiple" name="melodie" multiple>
        </div>
        <button type="submit" class="button_submit">Trimite</button>
        <div class="button_under">
        <a href="admin_vmelodi.php"><button type="button">Vizualizare Melodie</button></a>
        <a href="admin_categori.php"><button type="button">Categori</button></a>
        <a href="admin_vcategori.php"><button type="button">Vizualizare Categori</button></a>
        </div>
    </form>
</body>
</html>