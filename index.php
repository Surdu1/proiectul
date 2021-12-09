<?php
   require 'conectare/conectare.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "shortcut icon" type = "image/icon" href = "icon/logo.ico">
    <link rel = "stylesheet" href="style.css">
    <link rel="stylesheet" href="/navbar/navbar.css">
    <title>Document</title>
</head>
<body>

  <?php
     require 'navbar/navbar.php';
  ?>
<div class="background-all">
<div class="full-slider">
  <div class="categori">
    <div class="categori-titlu">
    <i class='bx bxs-category-alt'></i> Category
    </div>
    <div class="categori-tipuri">
    <a href="#" style="color: #fff;"><li><i class="fas fa-money-bill-wave"></i> Trap</li></a>
    <a href="#" style="color: #fff;"><li><i class="fas fa-fire"></i> Pop</li></a>
    <a href="#" style="color: #fff;"><li><i class="far fa-hand-peace"></i> Hip-Hop</li></a>
    <a href="#" style="color: #fff;"><li><i class="fas fa-microphone"></i> Rap</li></a>
    <a href="categori_more/more.php" style="color: #fff;"><li><i class="fas fa-angle-double-right"></i> More</li></a>
    </div>
  </div>
<div class="slider">
<div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active mx-auto" data-bs-interval="10000">
      <img src="icon/img-principal.jfif"  class="d-block w-100"  alt="Imaginea nu a fost gasita">
      <div class="carousel-caption d-none d-md-block" style="top:28%;bottom:40%;">
        <h3 style="font-weight: 800;color:#fff;font-size: 3.4vmax">Search your beat future</h3>
       <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
      </form>
        <p style="font-weight: 700;">Here are the new talents</p>
      </div>
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="icon/img2.jpg" class="d-block w-100"  alt="Imaginea nu a fost gasita">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="icon/img1.jpg" class="d-block w-100"  alt="Imaginea nu a fost gasita">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</div>
</div>
<div class="muzica_recenta">
  <div class="container">
    <div class="titlu_melodie">
      <h1>Cele mai recente</h1>
    </div>
<?php
try{
$sql = "SELECT * FROM melodi ORDER BY id DESC";
$result = mysqli_query($conectare, $sql);   
$il = 0;  
while($row = $result -> fetch_assoc()){
$il++;
echo '
<div class="melodie">
<audio id = "audio'.$il.'" src="muzica/'.$row["track"].'">
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
echo '<div class="pret-melodie">';
echo "<h4>Pret: ".$row['pret']."</h4>";
echo '<a href="cart/cart.php"><h4><i class="bx bx-cart"></i></h4></a>';
echo '</div>';
echo '</div>';
}

}catch(Exception $e){
echo "Nu s-a putut conecta la baza de date";
echo $e;
}
?>
               </div>
                  </div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>