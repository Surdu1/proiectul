<?php
   if(isset($_POST['password'])){
     $selector = $_POST['selector'];
     $validatior = $_POST['validator'];
     $password = $_POST['password'];
     $verify = $_POST['verify'];
     
     if(empty($password) || empty($verify)){
         header('Location: ../index.php');
         exit();
     }
     else if($password != $verify){
        echo 'parolele nu se protivesc';
        exit();
     }

    $currentData = date("U");
    require_once '../conectare/conectare.php';
    $sql = 'SELECT * FROM pass_reset WHERE selector = ? AND expires >= ?';
    $stmt = mysqli_stmt_init($conectare);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        echo "Este o eroare";
        exit();
    }else{
        mysqli_stmt_bind_param($stmt,"ss",$selector,$currentData);
      
        mysqli_stmt_execute($stmt);

        $result =  mysqli_stmt_get_result($stmt);
        
        if(!$row = mysqli_fetch_assoc($result)){
            echo 'Timplul a expirat, trebuie sa faci inca o cerere';
            exit();
        }else{
            $tokenBin = hex2bin($validatior);
            $tokenCheck = password_verify($tokenBin, $row['token']);
            if($tokenCheck === false){
                echo 'Tokenul nu s-a potrivit,Tu trebuie sa faci inca o cerere';
                exit();
            }else if($tokenCheck === true){
              $tokenEmail = $row['email'];
              echo '<script>
              conslole.log("'.$tokenEmail.'")
              </script>';
              $sql = "SELECT * FROM users WHERE email=?";
              $stmt = mysqli_stmt_init($conectare);
              if(!mysqli_stmt_prepare($stmt,$sql)){
                  echo "Este o eroare";
                  exit();
              }else{
                  mysqli_stmt_bind_param($stmt,"s",$tokenEmail);
                  mysqli_stmt_execute($stmt);
                  $result =  mysqli_stmt_get_result($stmt);
                  if(!$row = mysqli_fetch_assoc($result)){
                  echo 'Te rugam sa faci alta cerere';
                  exit();
                  }else{
                    $sql = "UPDATE users SET password=? WHERE email=?";
                    $stmt = mysqli_stmt_init($conectare);
                    if(!mysqli_stmt_prepare($stmt,$sql)){
                        echo "Este o eroare";
                        exit();
                    }else{
                        $newpwd = password_hash($password,PASSWORD_DEFAULT);
                        mysqli_stmt_bind_param($stmt,"ss",$newpwd,$tokenEmail);
                        mysqli_stmt_execute($stmt);
                        $sql = "DELETE FROM pass_reset WHERE email=?";
                        $stmt = mysqli_stmt_init($conectare);
                        echo 'Bine';
                        if(!mysqli_stmt_prepare($stmt,$sql)){
                            echo 'Exista o eroare';
                            exit();
                        }else{
                            mysqli_stmt_bind_param($stmt,"s",$tokenEmail);
                            mysqli_stmt_execute($stmt);
                            header('Location: ../login.php');
                        }
                    }
                  }
              }
            }
        }
    }

   }else{
       header('Location: ../index.php');
   }
?>