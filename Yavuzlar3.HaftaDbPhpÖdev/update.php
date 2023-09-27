<?php

$newtodo = $_POST['newtodo'];
$username = $_POST['username'];



    $conn = new PDO('sqlite:db/dataBase.db');

    $stmt = $conn->prepare("UPDATE User SET todo =:todo WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':todo', $newtodo);

    $stmt->execute();



?>