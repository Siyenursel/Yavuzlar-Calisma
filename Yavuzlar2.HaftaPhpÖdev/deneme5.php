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

            function Deneme(){

                $GLOBALS["Deger"] ="Ekrana basilacak yazi";
            }   
            Deneme();
            echo $Deger;


        ?>
        
    </body>
    </html>