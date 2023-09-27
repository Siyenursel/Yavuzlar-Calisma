<!doctype html>
<html lang=tr-TR>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-Language" content="tr">
    <meta charset="utf-8">
    <title>Ornek</title>
    
    </head>

    <body>
      
        <?php

            define("örnek1","deneme1");
            define("örnek2","deneme2");

            define("sonuc",örnek1 . örnek2);
            echo sonuc;

            const C_örnek1 = "deneme3";
            const C_örnek2 = "deneme4";
            const SONUC = C_örnek1 . " " . C_örnek2;
            echo SONUC ;

        ?>


    </body>
    </html>