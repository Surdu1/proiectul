<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
           width: 200px;
           height: 30px;
           margin-top: 10px;
           border-radius: 20px;
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
    <form action="recuperare_result.php" method='post'>
        <img src="recuper_logo.svg">
        <h1>Recuperare parola</h1>
        <div class="input">
        <i class="fas fa-envelope"></i>
        <input type="email" name="email" placeholder="Introdu email-ul pentru recuperare" required>
        </div>
        <button type="submit">Trimite</button>
        <?php
        if(isset($_GET['result'])&& $_GET['result'] == "success"){
            echo '<p style="font-size: 20px">Verifica email-ul</p>';
        }
        if(isset($_GET['result'])&& $_GET['result'] == "error"){
            echo '<p style="font-size: 20px">S-a intamplat o eroare</p>';
        }
        ?>
    </form>
</body>
</html>