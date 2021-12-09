<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <title>Recuperare</title>
    <style>
        form input{
            outline: none;
            border: none;
            font-size: 20px;
            background: none;
        }
        *{
            margin: 0;
            box-sizing: border-box;
        }
        body{
         min-height: 100vh;
         background: linear-gradient(120deg,#3297dba8,#8d44adbe), url(../R.jpg) no-repeat center center/cover;
         display: flex;
         justify-content: center;
         align-items: center;
       }
       .input{
           background: rgba(255,255,255,0.3455);
           color: #fff;
           padding: 10px;
           border-radius: 20px;
           margin-top: 20px;
           
           display: flex;
       }
       form button{
           border: none;
           background: linear-gradient(to right, #fa709a 0%, #fee140 100%);
           width: 240px;
           height: 50px;
           margin-top: 10px;
           border-radius: 30px;
       }
       form{
           background-image: linear-gradient(to top, #7028e4 0%, #e5b2ca 100%);
           padding: 50px;
           display: flex;
           flex-direction: column;
           justify-content: center;
           align-items: center;
           border-radius: 30px;
       }
       form img{
           max-width: 240px;
       }
       ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
        color: black;
        opacity: 1; /* Firefox */
        }

        :-ms-input-placeholder { /* Internet Explorer 10-11 */
        color: black;
        }

        ::-ms-input-placeholder { /* Microsoft Edge */
        color: black;
        }
       @media(max-width: 400px){
           form{
               height: 100vh;
               border-radius: 0;
               padding: 0;
               width: 100vw;
           }
       }
    </style>
</head>
<body>
<?php
        $selector = $_GET['selector'];
        $validator = $_GET['validator'];

        if(empty($selector) || empty($validator)){
            echo "Nu s-a putut valida";
        }
        else{
            if(ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false){
        ?>
        <form action="process_password.php" method="POST">
        <img src="rec.svg" style="width: 50%">
        <h1>Introdu o parola noua</h1>
        <input type="hidden" name="selector" value="<?php echo $selector?>">
        <input type="hidden" name="validator" value="<?php echo $validator?>">
        <div class="input">
        <i class="fas fa-user"></i>
        <input type="password" name="password" id="password" placeholder="Introdu parola" required>
        </div>
        <div class="input">
        <i class="fas fa-user-lock"></i>
        <input type="password" name="verify" placeholder="Confirma parola" required>
        </div>
        <button type="submit">Reseteaza parola</button>
        </form>
        <?php
            }
        }
        ?>

</body>
</html>