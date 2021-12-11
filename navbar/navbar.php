<?php
session_start();
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="icon/logo.png" style="width: 25px;"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
    <div class="coategory-modile">
        <li class="nav-item dropdown" style=" background: linear-gradient(120deg,#3297dbb2,#8d44adbe); border-radius: 10px">
              <a class="nav-link dropdown-toggle" href="/categori_more/more.php"  aria-expanded="false">
              <span style="font-size: 20px;font-weight: 600;"> <i class='bx bxs-category-alt'></i> Category</span>
              </a>
        </li>
    </div>
    </ul>
    <form class="d-flex mx-auto" action="search/search.php">
        <input class="form-control me-2 f-con" name = "input" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success b-con" type="submit">Search</button>
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
              <a class="nav-link dropdown-toggle" href="/categori_more/more.php"    aria-expanded="false">
              <span style="font-size: 18px;font-weight: 700"> <i class='bx bxs-category-alt'></i> Category</span>
              </a>
            </li>
        </div>
        <li class="nav-item">
          <?php
          if(isset($_SESSION['username'])){
            echo '<a class="nav-link" style="font-size:23px;" href="login.php"><i class="fas fa-user-circle"><span style="font-size: 18px; font-weight: 500" >'.$_SESSION['username'].'</span></i></a>';
          }
          ?>
        </li>
        <li class="nav-item">
          <?php
          if(!isset($_SESSION['username'])){
          echo '<a class="nav-link" style="font-size:23px;" href="login.php"><i class="fas fa-user-circle"></i></a>';
          }
          else{
          echo '<a class="nav-link" style="font-size:23px;" href="logout.php"><i class="fas fa-sign-out-alt"></i></a>';
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
           echo '<a class="nav-link" style="font-size:23px;" href="admin/admin.php"><i class="fas fa-screwdriver"></i></a>';
         }
          ?>
        </li>
      </ul>
    </div>
  </div>
</nav>
  

<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasExampleLabel"><i class='bx bxs-category-alt'></i>Category</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <div>
      Some text as placeholder. In real life you can have the elements you have chosen. Like, text, images, lists, etc.
    </div>
    <div class="dropdown mt-3">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
        Dropdown button
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <li><a class="dropdown-item" href="#">Action</a></li>
        <li><a class="dropdown-item" href="#">Another action</a></li>
        <li><a class="dropdown-item" href="#">Something else here</a></li>
      </ul>
    </div>
  </div>
</div>
