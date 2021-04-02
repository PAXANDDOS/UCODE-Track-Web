<?php
    session_start();
    error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session for new</title>
    </head>
    <body>
        <style>
            form {
                border: 2px solid gray;
                padding: 20px 20px 20px 20px;
            }
            .input {
                <?php
                    if(isset($_SESSION['name'])) echo("display: none;");
                    else echo("display: block;");
                ?>
            }
            .output {
                <?php
                    if(isset($_SESSION['name'])) echo("display: block;");
                    else echo("display: none;");
                ?>
            }
            .output p {
                margin-top: 0.1%;
                margin-left: 3%;
            }
        </style>
        <div class="input">
            <h1>Session for new</h1>
            <form action="index.php" method="post">
                <fieldset>
                    <legend>About HERO</legend>
                        <p>
                            <span>Real Name</span>
                            <input type="text" name="name" placeholder="Superhero real name" size="18" autofocus>
                            <span>Current Alias</span>
                            <input type="text" name="alias" placeholder="Superhero alias" size="18">
                            <span>Age</span>
                            <input type="number" name="age" min="1" max="999" step="1" size="5">
                            <br><br>
                            <span>About</span>
                            <textarea name="about" id="about" cols="70" rows="5" maxlength="500" placeholder="Information about the superhero, max 500 symbols"></textarea>
                            <br>
                        </p>
                        <p>
                            <span>Photo:</span>
                            <input type="file" name="photo">
                        </p>
                </fieldset>
                <fieldset>
                    <legend>Powers</legend>
                    <p>
                        <input type="checkbox" id="strength" name="strength">
                        <label for="strength">Strength</label>

                        <input type="checkbox" id="speed" name="speed">
                        <label for="speed">Speed</label>

                        <input type="checkbox" id="intelligence" name="intelligence">
                        <label for="intelligence">Intelligence</label>

                        <input type="checkbox" id="teleportation" name="teleportation">
                        <label for="teleportation">Teleportation</label>

                        <input type="checkbox" id="immortal" name="immortal">
                        <label for="immortal">Immortal</label>

                        <input type="checkbox" id="another" name="another">
                        <label for="another">Another</label>
                        <br>
                        <p>
                            <span>Level of control</span>
                            <input type="range" name="levelControl" min="0" max="10" step="1" value="0">
                        </p>
                    </p>
                </fieldset>
                <fieldset id="publicity">
                    <legend>Publicity</legend>
                    <p>
                        <input type="radio" id="unknown" value="unknown" name="publicity">
                        <label for="unknown">UNKNOWN</label>

                        <input type="radio" id="ghost" value="ghost" name="publicity">
                        <label for="ghost">LIKE A GHOST</label>

                        <input type="radio" id="comic" value="in comics" name="publicity">
                        <label for="comic">I AM IN COMICS</label>

                        <input type="radio" id="club" value="fun club" name="publicity">
                        <label for="club">I HAVE FUN CLUB</label>

                        <input type="radio" id="star" value="superstar" name="publicity">
                        <label for="star">SUPERSTAR</label>
                    </p>
                </fieldset><br>
                    <input type="reset" name="clear" value="CLEAR">
                    <input type="submit" name="sendTo" value="SEND">
            </form>
        </div>
        <div class="output">
        <h1>Session for new</h1>
        <?php
        if($_POST) {
            $arr = [
                "name" => $_POST["name"] ? $_POST["name"] : "",
                "alias" => $_POST["alias"] ? $_POST["alias"] : "",
                "age" => $_POST["age"] ? $_POST["age"] : "",
                "description" => $_POST["about"] ? $_POST["about"] : "",
                "photo" => $_POST["photo"] ? $_POST["photo"] : "",
                "strength" => $_POST["strength"] ? "has" : "",
                "speed" => $_POST["speed"] ? "has" : "",
                "intelligence" => $_POST["intelligence"] ? "has" : "",
                "teleportation" => $_POST["teleportation"] ? "has" : "",
                "immortal" => $_POST["immortal"] ? "has" : "",
                "another" => $_POST["another"] ? "another" : "",
                "level" => $_POST["levelControl"] ? ($_POST["levelControl"]) : "",
                "purpose" => $_POST["publicity"] ? $_POST["publicity"] : "",
            ];
            $_SESSION["data"] = $arr;
            if($_SESSION["data"]) {
                echo("<style>.input { display: none; } .output { display: block; }</style>");
                foreach($_SESSION["data"] as $key => $value) {
                    echo("<p>");
                    echo $key." : ".$value."<br>";
                    echo("</p>");
                }
            }
        }
        ?>
            <form action=<?php $_SESSION["data"] = ""; session_destroy(); ?> method="post">
                <input name="forget" type="submit" value="FORGET">
            </form>
        </div>
    </body>
</html>