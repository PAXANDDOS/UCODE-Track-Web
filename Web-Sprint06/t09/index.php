<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Avenger Application</title>
</head>
<body>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap');
        * {
            font-family: 'Montserrat', sans-serif;
        }
        body {
            background: linear-gradient(5deg,#111c23,#0a131d);
            background-image: linear-gradient(deg, rgb(17, 28, 35), rgb(10, 19, 29));
        }
        form {
            border: 2px solid gray;
            padding: 20px 20px 20px 20px;
        }
        input[type='submit'], input[type='reset'] {
            padding:0.4%;
            outline: none;
            border-radius: 5px;
            border: 2px solid white;
            background-color:transparent;
            color: white;
            transition: .3s cubic-bezier(.3,.01,.3,1.26);
            transition-property: background-color, color, border;
        }
        input[type='submit']:hover, input[type='reset']:hover {
            background-color:white;
            color: #111c23;
        }
        input[type='submit']:active, input[type='reset']:active {
            background-color:rgba(255,255,255,0.3);
            color: rgba(255,255,255,0.8);
        }
        input[type='text'], input[type='number'], textarea {
            background-color: transparent;
            border: 2px solid white;
            padding: 0.3%;
            border-radius: 5px;
            color: white;
        }
        h1, span, label, legend, input[type='file'] {
            -moz-user-select: none;
            -ms-user-select: none;
            -webkit-user-select: none;
            user-select: none;
            color:white;
        }
    </style>
    <h1 style="color:white;">New Avenger Application</h1>
    <?php
        error_reporting(0);
        $array = [
            "name" => $_POST['name'],
            "email" => $_POST['email'],
            "age" => $_POST['age'],
            "description" => $_POST['about'],
            "photo" => $_POST['photo']
        ];
        if($array['name'] != null) {
            echo("<fieldset style=\"padding:2%; background-color: rgba(255,255,255,0.9);\">
            <span style=\"color:black;\">POST</span><br>
            <p>
            <pre>");
            print_r($array);
            echo("</pre>
            </p>
            </fieldset>");
        }
    ?>
    <br>
    <form action="index.php" method="post">
        <fieldset style="margin-bottom:2%;">
            <legend>About candidate</legend>
                <p>
                    <label>Name <input type="text" name="name" placeholder="Tell your name" size="18" autofocus required></label>
                    <label>E-mail <input type="text" name="email" placeholder="Tell your e-mail" size="18" required></label>
                    <label>Age <input type="number" name="age" min="1" max="999" step="1" size="5" required></label>
                    <br><br>
                    <span>About</span>
                    <textarea name="about" id="about" cols="70" rows="5" maxlength="500" placeholder="Tell about yourself, max 500 symbols" required></textarea>
                    <br>
                </p>
                <p>
                    <span>Your photo:</span>
                    <input type="file" name="photo" required>
                </p>
        </fieldset>
        <input type="reset" name="clear" value="CLEAR">
        <input type="submit" name="send" value="SEND">
    </form>
</body>
</html>