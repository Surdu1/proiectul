<?php
if(isset($_POST['email']) && $_POST['email'] == ""){
    header('Location: recuperare.php?result=error');
    die();
}
if(isset($_POST['email'])){
    require_once '../conectare/conectare.php';
    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);
    $url = "http://localhost/recuperare/recuperare_token.php?selector=" .$selector. "&validator=" . bin2hex($token);
    $expires = date("U") + 1800;
    $userEmail = $_POST['email'];
    $sql = "DELETE FROM pass_reset WHERE email=?";
    $stmt = mysqli_stmt_init($conectare);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        echo "Este o eroare";
        exit();
    }
    else{
        mysqli_stmt_bind_param($stmt,"s",$userEmail);
        mysqli_stmt_execute($stmt);
    }

    $sql = "INSERT INTO pass_reset(email,selector,token,expires) VALUES(?,?,?,?)";
    $stmt = mysqli_stmt_init($conectare);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        echo "Este o eroare";
        exit();
    }
    else{
        $hashedToken = password_hash($token,PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt,"ssss",$userEmail,$selector,$hashedToken,$expires);
        mysqli_stmt_execute($stmt);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conectare);

    $to = $userEmail;
    $subject = "Link-ul cantre resetatrea palolei";
    $message = '<p>Reactualizarea parolei,intra pe link pentru a introduce o alta parola</p>';
    $message .= '<p>Acesta este link-ul parolei tale:</p>';
    $message .= '<a href="'.$url.'">'.$url.'</a>';
    $headers = "Form: boss <boss@gmail.com>\r\n";
    $headers .= "Reply-To: boss@gmail.com\r\n";
    $headers .= "Content-type: text/html\r\n";
    mail($to,$subject,$message,$headers);
    echo $url;
}
else{
    header('Location: recuperare.php?result=error');
    die();
}
?>