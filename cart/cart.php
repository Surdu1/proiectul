<?php
require_once '../conectare/conectare.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="stylesheet" href="cart.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Cart</title>
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
<div class="box">
    
</div>
</body>
</html>