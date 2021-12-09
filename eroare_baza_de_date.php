<?php
require_once 'conectare/conectare.php';
if($conectare){
    header("Location: /");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .error-view{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background: rgba(0,0,0,0.86);
            padding: 20px;
            border-radius: 40px;
            color: #fff;

        }
        .alert{
            margin-top: 10px;
            opacity: 0.9;
            border-radius: 20px;
        }
        .error-view img{
            width: 50%;
        }
        body{
            min-height: 100vh;
            background: linear-gradient(120deg,#db7032a8,#ad4467be), url(icon/studio.1.jpg) no-repeat center center/cover;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        *{
            margin:0;
            box-sizing: border-box;
        }
        @media(max-width: 500px){
            .error-view img{
            width: 100%;
            height: 300px;
            }
        }
    </style>
</head>
<body>
    <div class="error-view">
        <img src="icon/error.svg">
        
        <div class="alert alert-danger" role="alert">
        <h1>Ne pare rau,dar nu ne putem conecta la baza de date</h1>
        </div>
    </div>
</body>
</html>