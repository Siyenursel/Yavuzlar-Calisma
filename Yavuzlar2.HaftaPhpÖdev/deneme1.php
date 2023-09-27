<!doctype html>
<html lang=tr-TR>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-Language" content="tr">
    <meta charset="utf-8">
    <title>Ornek</title>
    <style>
        body{
            background-color:black;
            color:white;
        }

    </style>

    <script type="text/javascript" language="javascript">
        function Deneme(){
            document .getElementById("IslemAlani").innerHTML="Ornek";
                }

    </script>

    </head>

    <body>
        <?php 
        echo "deneme yazdir";
        ?>
        <input type="button" onClick="Deneme()" value="işlem yap"><br>
        <div id="IslemAlani"></div>
    </body>
    </html>