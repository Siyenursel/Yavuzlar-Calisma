<?php

include "../../connectDb.php";
session_start();
if (!isset($_SESSION['id']) || !isset($_SESSION['role']) || $_SESSION['role'] !== "admin") {
    $em = "Warning";
    header("Location: ../../derslerList.php?error=$em");
    exit;
}

if(isset($_GET['id'])){

    try {
        $id = $_GET['id'];
        $examsTable = "exams";
        $lessonsTable = "lessons";

        $query = $conn->prepare("DELETE FROM $examsTable WHERE lesson_id = ?");
        $query->execute([$id]);

        $query = $conn->prepare("DELETE FROM $lessonsTable WHERE id = ?");
        $query->execute([$id]);

        header("Location: ../../derslerList.php");
        exit;
    } catch (PDOException $e) {
        
        $error_message = "Error deleting user: " . $e->getMessage();
        echo $error_message;
    }
    
} else {
    echo "POST data is missing.";
    print_r($_POST);
}

?>