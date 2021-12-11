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
try{
  $nume = $_POST['nume'];
  $autor = $_POST['autor'];
  $categorie = $_POST['categorie'];
  $pret = $_POST['pret'];
  if(isset($_FILES['melodie']['name']) && !empty($_FILES['melodie']['name'])){
      $track = $_FILES['melodie']['name'];
      $tmp_name = $_FILES['melodie']['tmp_name'];
      $encode = base64_encode($tmp_name);
      $sql = "SELECT * FROM melodi";
      $bool_track = true;
      $result = mysqli_query($conectare,$sql);
      while($row = $result -> fetch_assoc()){
          if($row['track'] == $track){
            $bool_track = false;
          }
      }
      if($bool_track){
        if(move_uploaded_file($tmp_name,'../muzica/'.$track)){
            $sql = "INSERT INTO melodi(nume , categorie , autor , track) VALUES('$nume', '$categorie' , '$autor' , '$track')";
            echo $sql;
            $result = mysqli_query($conectare,$sql);
        }
      }
      else{
          $extension = pathinfo($track,PATHINFO_EXTENSION);
          $name = pathinfo($track,PATHINFO_FILENAME);
          $name = $name.rand(0,10000000).'.'.$extension;
          if(move_uploaded_file($tmp_name,'muzica/'.$name)){
            $sql = "INSERT INTO melodi(nume , categorie , autor , track, pret) VALUES('$nume', '$categorie' , '$autor' , '$name' , '$pret')";
            echo $sql;
            $result = mysqli_query($conectare,$sql);
            header("Location: /");
        }
      }

    }
}
catch(Exception $e){
     echo "Ne pare rau , evenimentul nu s-a putut intampla va rugam sa ne contactati pentru a rezolva aceasta problema";
    if($e == 1){
        echo "Nu a reusit incarcarea fiserului";
    }
}
?>