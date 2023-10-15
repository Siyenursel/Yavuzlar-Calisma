<?php

session_start();
    
if (!isset($_SESSION['id']) || !isset($_SESSION['role']) ||$_SESSION['role'] !== "admin") {
 
    header("Location: login.php");
    exit;
}

try {
    //code...

if (isset($_POST['username']) && isset($_POST['password'])) {

    include "../../connectDb.php";
   
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $username = $_POST['username'];
    $pass = $_POST['password'];
    $role = $_POST['role'];

    $hashedPassword = password_hash($pass,PASSWORD_DEFAULT);
    
        $checkQuery = $conn->prepare("SELECT COUNT(*) as count FROM users WHERE username = :username");
        $checkQuery->bindParam(':username', $username);
        $checkQuery->execute();
        $result = $checkQuery->fetch();

        if ($result['count'] > 0) {  

            $em  = "Username already exist!";
            header("Location: ../../kullanıcıEkle.php?error=$em");
            exit;

        }else { 
        
            
            $query = $conn->prepare("INSERT INTO users(name, surname, username, password, role) VALUES (?, ?, ?, ?, ?)");
            $query->execute(array(
                $name,
                $surname,
                $username,
                $hashedPassword,
                $role,

            ));

            
            header("Location: ../../kullanıcıList.php");
            exit;
        
        
         } 
    }
else {
    header("Location: ../../kullanıcıEkle.php");
    exit;
}


} catch (\Throwable $th) {
    echo $th;
}
?>