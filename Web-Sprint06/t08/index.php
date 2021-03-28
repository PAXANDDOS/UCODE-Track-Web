<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>What Thanos did for the Soul Stone?</title>
</head>
<body>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap');
    * {
        font-family: 'Montserrat', sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    body { 
        display:flex;
        flex-direction:column;
        justify-content:center;
        align-items:center;
        min-height:100vh;
        background: linear-gradient(5deg,#111c23,#0a131d);
        background-image: linear-gradient(deg, rgb(17, 28, 35), rgb(10, 19, 29));
    }
    h1{
        width: 60%;
        margin-bottom: 2%;
        color: white;
    }
    form {
        display: flex;
        flex-direction:column;
        width: 60%;
    }
    label {
        margin: 1% 0;
        color: white;
    }
    p {
        margin-top: 2%;
        color: white;
    }
    input[type='submit'] {
        margin-top: 2%;
        padding: 1%;
        outline: none;
        border-radius: 5px;
        border: 2px solid white;
        background-color:transparent;
        color: white;
        transition: .3s cubic-bezier(.3,.01,.3,1.26);
        transition-property: background-color, color, border;
    }
    input[type='submit']:hover {
        background-color:white;
        color: #111c23;
    }
    input[type='submit']:active {
        background-color:rgba(255,255,255,0.3);
        color: rgba(255,255,255,0.8);
    }
    </style>
    <h1>У меня было 5 сердечек, стало 4. Почему? (случай на первом стейдже)</h1>
    <form action="index.php" method="post">
        <label><input name="option" type="radio" value="1"> Ноут на стол поставил</label>
        <label><input name="option" type="radio" value="2"> Запустил apex legends на маке</label>
        <label><input name="option" type="radio" value="3"> Потерял карту</label>
        <input type="submit" value="Ты дурачок?">
    </form>
    <p>
        <?php
        error_reporting(0);
        $formdata = $_POST['option'];
        if($formdata) {
            switch($formdata) {
                case 1: echo("Та ну.. Мне что-бы ноут тут поставить надо больше места"); break;
                case 2: echo("Да.. Но только для того чтобы проверить!!!11!"); break;
                case 3: echo("Не-а. Моя карта всегда как новая"); break;
            }
        }
        ?>
    </p>
</body>
</html>
