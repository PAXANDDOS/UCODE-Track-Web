<?php
    session_start();
    error_reporting(0);
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport\" content="width=device-width, initial-scale=1.0">
        <title>Files</title>
    </head>
    <body>
    <h1>Files</h1>
    <form action="index.php" method="post">
        <span>File name: <input type="text" name="file" required></span>
        <span>Content: <textarea name="content" required></textarea></span>
        <input type="submit" value="Create file">
    </form>
<?php
    function autoload($pClassName) { include(__DIR__ . '/' . $pClassName . '.php'); }
    spl_autoload_register("autoload");
    function is_dir_empty($dir) {
        if (!is_readable($dir)) return NULL; 
        return (count(scandir($dir)) == 2);
    }

    if($_POST['file'] && $_POST['content']) {
        $newfile = new File('tmp/'.$_POST['file']);
        $newfile->write($_POST['content']);
    }

    $list = new FilesList("tmp/");
    echo $list->toList() . "\n";

    if($_GET){
        $_SESSION['file'] = $_GET['file'];
        $file = $_SESSION['file'];
        echo("<h1>Selected file: \"<i>$file</i>\"</h1>");
        echo("<form action=\"index.php\" method=\"post\">
        <input type=\"text\" name=\"delete\" value=\"true\" style=\"display: none\">
        <input type=\"submit\" value=\"Delete file\">
        </form>
        <p>Content: ");
        echo(file_get_contents('tmp/'.$file).'</p>');
    }
    if($_POST['delete'] == 'true') {
        unlink("tmp/".$_SESSION['file']);
        if (is_dir_empty("tmp"))
            rmdir("tmp");
        session_destroy();
        header("Refresh:0");
    }
?>