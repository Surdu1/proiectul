<?php
require_once "../conectare/conectare.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="categorie.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
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
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="../icon/logo.png" style="width: 25px;"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <form class="d-flex mx-auto" action="../search/search.php">
        <input class="form-control me-2 f-con" style="border-radius: 30px;" name="input" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success b-con" style="border-radius: 30px;" type="submit">Search</button>
    </form>
      <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="#" style="font-size:18px;font-weight: 700;color:#0d6efd;"><i class="fas fa-home"></i> Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="font-size:18px;font-weight: 700" href="#"><i class="fas fa-shopping-cart"></i> Cart</a>
        </li>

        <li class="nav-item">
          <?php
          if(isset($_SESSION['username'])){
            echo '<a class="nav-link" style="font-size:23px;" href="../login.php"><i class="fas fa-user-circle"><span style="font-size: 18px; font-weight: 500" >'.$_SESSION['username'].'</span></i></a>';
          }
          ?>
        </li>
        <li class="nav-item">
          <?php
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
         if($bool_admin){
           echo '<a class="nav-link" style="font-size:23px;" href="../admin/admin.php"><i class="fas fa-screwdriver"></i></a>';
         }
          ?>
        </li>
        <li class="nav-item">
          <?php
          if(!isset($_SESSION['username'])){
          echo '<a class="nav-link" style="font-size:23px;" href="../login.php"><i class="fas fa-user-circle"></i></a>';
          }
          else{
          echo '<a class="nav-link" style="font-size:23px;" href="../logout.php"><i class="fas fa-sign-out-alt"></i></a>';
          }
          ?>
        </li>
        
      </ul>
    </div>
  </div>
</nav>
    <?php
    if(isset($_GET["id"])){
        $id = $_GET["id"];
        $sql = "SELECT * FROM melodi";
        $result = mysqli_query($conectare,$sql);
        $il = 0;
    while($row = $result -> fetch_assoc()){
     if($row['categorie'] == $id){
       $il++;
echo '
<div class="melodie">
<audio id = "audio'.$il.'" src="../muzica/'.$row["track"].'">
</audio> 
<h4><i class="fas fa-play" id="click'.$il.'"></i></h4>
<script>
     var isPlaying = false;
     var audio'.$il.' = document.getElementById("audio'.$il.'");
     var click'.$il.' = document.getElementById("click'.$il.'");
     click'.$il.'.addEventListener("click", function() {
     if(!isPlaying){
     isPlaying = true;
     audio'.$il.'.play();
     click'.$il.'.classList.remove("fa-play");
     click'.$il.'.classList.add("fa-pause");
     }
     else{
      isPlaying = false;
      audio'.$il.'.pause();
      click'.$il.'.classList.add("fa-play");
      click'.$il.'.classList.remove("fa-pause");
     }
     })
</script>
';
echo "<h4>".$row['nume']."</h4>";
$sll = "SELECT * FROM categori WHERE id = ".$row['categorie']."";
$rest = mysqli_query($conectare,$sll);
$res = $rest ->fetch_assoc();
echo "<h4>".$res['nume']."</h4>";
echo '<div class="pret-melodie">';
echo "<h4>Pret: ".$row['pret']."</h4>";
echo '<a href="cart/cart.php"><h4><i class="bx bx-cart"></i></h4></a>';
echo '</div>';
echo '</div>';
}
}  
}
    ?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>