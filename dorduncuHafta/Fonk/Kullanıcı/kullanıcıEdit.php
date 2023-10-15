<?php
session_start();
include "../../connectDb.php";
try {
if (isset($_SESSION['id']) && isset($_SESSION['role']) && $_SESSION['role'] === "admin") {
    if (isset( $_POST['username'], $_POST['password'], $_POST['role'])) {
        $id = $_GET['id'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $username = $_POST['username'];
        $pass = $_POST['password'];
        $role = $_POST['role'];
        var_dump($id,$name,$surname,$username,$pass,$role);
        
        $hashedPassword = password_hash($pass,PASSWORD_DEFAULT);
        
        
        $query = $conn->prepare("UPDATE users SET name = :name, surname = :surname, username = :username, password = :password, role = :role WHERE id = :id");
        $query->bindParam(':name', $name);
        $query->bindParam(':surname', $surname);
        $query->bindParam(':username', $username);
        $query->bindParam(':password', $hashedPassword);
        $query->bindParam(':role', $role);
        $query->bindParam(':id', $id);

        $query->execute();
        
            
        header("Location: ../../kullanıcıList.php");
        exit;
        }
    } else {
        header("Location: ../../kullanıcıEdit.php");
        exit;
    }
    exit;
} catch (Exception $e) {
    echo "Hata: " . $e->getMessage();
}
?>