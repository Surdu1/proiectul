<?php
require_once "../conectare/conectare.php";
?>
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="stylesheet" href="more.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Categori</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="../icon/logo.png" style="width: 25px;"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <form class="d-flex mx-auto">
        <input class="form-control me-2 f-con"  type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="#" style="font-size:18px;font-weight: 700;color:#0d6efd;"><i class="fas fa-home"></i> Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="font-size:18px;font-weight: 700" href="#"><i class="fas fa-shopping-cart"></i> Cart</a>
        </li>
        <div class="coategory-desktop">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <span style="font-size: 18px;font-weight: 700"> <i class='bx bxs-category-alt'></i> Category</span>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </li>
        </div>
        <li class="nav-item">
          <?php
          if(isset($_SESSION['username'])){
            echo '<a class="nav-link" style="font-size:23px;" href="../login.php"><i class="fas fa-user-circle"><span style="font-size: 18px; font-weight: 500" >'.$_SESSION['username'].'</span></i></a>';
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
<div class="slider">
<div id="carouselExampleIndicators" style="width: 97%; margin:auto;" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner" >
    <div class="carousel-item active">  
         <img class="d-block w-100 img-style" src="song.jpg" style="height: 30vmax; border-radius: 50px" alt="First slide">
         <div class="carousel-caption d-md-block">
         <div class="logo_img">
          <img src="undraw_imagination_re_i0xi.svg" alt="imagina nu s-a gasit">
         </div>
         <div class="text">
         <h5>NegativeMusicale</h5>
         <p>Locul in care incepi caiera ta muzicala</p>
         </div>
        </div>
     </div>
    <div class="carousel-item">
      <img class="d-block w-100 img-style" src="img.jpg" style="height: 30vmax;  border-radius: 50px" alt="Second slide">
      <div class="carousel-caption  d-md-block">
      <div class="logo_img">
          <img src="undraw_playlist_re_1oed.svg" alt="imagina nu s-a gasit">
      </div>
        <div class="text">
         <h5>NegativeMusicale</h5>
         <p>O multitudine de negative diferite</p>
         </div>
        </div>
    </div>
    <div class="carousel-item" stype>
      <img class="d-block w-100 img-style" src="music.jpg" style="height: 30vmax; border-radius: 50px" alt="Third slide">
      <div class="carousel-caption  d-md-block">
      <div class="logo_img">
          <img src="muzica.svg" alt="imagina nu s-a gasit">
      </div>
      <div class="text">
         <h5>NegativeMusicale</h5>
         <p>Negative de toate tipurile</p>
      </div>
        </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
<div class="cover_more">
  <?php
    $sql = "SELECT * FROM categori";
    $reslut = mysqli_query($conectare,$sql);
    while($row = $reslut -> fetch_assoc()){
        echo '<a style="text-decoration: none;" href = "./categoria.php?id='.$row['id'].'">';
        echo '<div class="more_categori">';
        echo $row["nume"];
        echo '</div>';
        echo '</a>';
    }
  ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>