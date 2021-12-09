<?php
session_start();
if(isset($_SESSION['access_token']) || isset($_SESSION['user_id'])){
    header("Location: index.php");
}
require_once('conectare/conectare.php');
  include 'config.php';
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
    $login_button = '<a href = "'.$google_client->createAuthUrl().'"><button type="button" style = "background: linear-gradient(120deg,#3297db,#8d44ad);border:none;height: 30px; color: #fff;"><span style = "padding: 20px; font-size: 17px"><i class="fab fa-google"></i> Conecteazate cu google</span></button></a>';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<form action="procesare_signup.php" method="post" class="login-form">
    <h1>Sign up</h1>

    <div class="txtb">
    <input type="text" name="nume" placeholder="Name" required>
 
    </div>


    <div class="txtb">
    <input type="text" name="email" placeholder="Email" required>
    </div>
    <?php
    if(isset($_GET['eroare'])){
        echo '<div class="error">
        '.$_GET['eroare'].'
        </div>
    ';
    }
    ?>

    <div class="txtb">
        <input type="password" name="password" placeholder="Password" required>
    </div>
    
    <button class="logbtn" type="submit">Login</button>

    <div class="bottom-text">
        Am deja un cont <a href="login.php">Login</a><br>
        <?php
        if(!$login_button == "")
         echo $login_button;
        ?>
    </div>

</from>

</body>
</html>