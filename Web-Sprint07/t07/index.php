<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data to XML</title>
</head>
<body>
<style>
table {
    border: 2px double gray;
    width: 100%;
}
table td {
    border: 1px double black;
}
</style>
<h1>Avenger Quote to XML</h1>
<?php
    function autoload($pClassName) { include(__DIR__. '/' . $pClassName. '.php'); }
    spl_autoload_register("autoload");

    $avengerQuote1 = new AvengerQuote(1, "Tony Stark", "Sample text", [ "tony.jpg", "tony2.jpg", "tony3.jpg" ]);
    $avengerQuote1->addComment("Ogo nifiga sebe");
    $avengerQuote1->addComment("Oracle zadolbal");

    $avengerQuote2 = new AvengerQuote(2, "Bruce Banner", "HULK CRASH", [ "selfie.jpg" ]);
    $avengerQuote2->addComment("Lmao");
    
    $avengerQuote4 = new AvengerQuote(3, "psapronov", "Написал Киеву", [ "Peer-to-Peer", "В треды пожалуйста" ]);
    $avengerQuote4->addComment("Проблема с компиляцией на вашей стороне");
    $avengerQuote4->addComment("Тут все понятно");
    $avengerQuote4->addComment("Спасибо за репорт");

    $listAvengerQuote = new ListAvengerQuotes();
    $listAvengerQuote->addAvengerQuote($avengerQuote1);
    $listAvengerQuote->addAvengerQuote($avengerQuote2);
    $listAvengerQuote->addAvengerQuote($avengerQuote4);
    $listAvengerQuote->toXML("file.xml");

    echo '<table><tr><td><pre>';
    print_r($listAvengerQuote); 
    echo '</pre></td><td><pre>';
    print_r($listAvengerQuote->fromXML("file.xml"));
    echo '</pre></td></tr></table>';
?>