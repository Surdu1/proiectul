<?php
session_start();
if(isset($_SESSION['access_token']) || isset($_SESSION['user_id'])){
    header("Location: index.php");
}
require_once('conectare/conectare.php');
  include 'config_login.php';
  $login_button = '';
  if(isset($_GET["code"])){
      $token = $google_client->fetchAccessTokenWithAuthCode($_GET['code']);
      if(!isset($token['error'])){
          $google_client->setAccessToken($token['access_token']);
          $_SESSION['access_token'] = $token['access_token'];
          $google_service = new Google_Service_Oauth2($google_client);
          $data = $google_service->userinfo->get();
          $bool_email = true;
          $sql = "SELECT email FROM users";
          $result = mysqli_query($conectare, $sql);
          while($row = $result -> fetch_assoc()){
              if($row['email'] == $data['email']){
                 $bool_email = false;
              }
          }
          $username = $data['given_name']." ".$data['family_name'];
          $user_email = $data['email'];
          if($bool_email){
              $sql = "INSERT INTO users(username,email) VALUES('$username','$user_email')";
              $result = mysqli_query($conectare,$sql);
          }
          $sql = "SELECT * FROM users";
          $result = mysqli_query($conectare,$sql);
          while($row = $result -> fetch_assoc()){
            if($row['email'] == $data['email']){
                $_SESSION['id'] = $row['id'];
            }
        }
          if(!empty($data['given_name'])){
              $_SESSION['username'] = $data['given_name'];
          }
          header('Location: index.php');
          
        }
        else{
            die("este o problema");
        }
    }
if(!isset($_SESSION['access_token'])){
    $login_button = '<a href = "'.$google_client->createAuthUrl().'"><button type="button" style = "margin-top:10px;background: linear-gradient(120deg,#3297db,#8d44ad);border:none;height: 30px; color: #fff;"><span style = "padding: 20px; font-size: 17px"><i class="fab fa-google"></i> Conecteazate cu google</span></button></a>';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login_style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<form action="procesare_login.php" method="post" class="login-form">
    <h1>Login</h1>

    <div class="txtb">
    <input type="email" name="email" placeholder="Email" required>
 
    </div>
    <?php
      if(isset($_GET['error_email'])){
          echo '<div class="error">'.$_GET['error_email'].'</div>';
      }
     ?>
    <div class="txtb">
        <input type="password" name = "password" placeholder="Password" required>
    </div>
    <?php
      if(isset($_GET['error_password'])){
          echo '<div class="error">'.$_GET['error_password'].'</div>';
      }
     ?>
    
    <button class="logbtn" type="submit">Login</button>

    <div class="bottom-text">
        Nu am deja un cont? <a href="signup.php">Sign up</a><br>
        <a href="recuperare/recuperare.php">Mi-am uitat parola</a>
        <?php
        if(!$login_button == "")
         echo $login_button;
    ?>
    </div>

</from>

</body>
</html>