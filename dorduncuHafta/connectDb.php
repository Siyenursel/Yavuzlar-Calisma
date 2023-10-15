<?php

    $aName = "localhost";
    $bName = "root";
    $pass = "";
    $db_name = "ObsDb";

    try{
        $conn = new PDO("mysql:host=$aName;dbname=$db_name", $bName, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
    }
?>