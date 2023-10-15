<?php

include "../../connectDb.php";
session_start();
if (!isset($_SESSION['id']) || !isset($_SESSION['role']) || !($_SESSION['role'] === "admin" || $_SESSION['role'] === "teacher") ) {
    $em = "Warning";
    header("Location: ../../examsList.php?error=$em");
    exit;
}


    
        $id = $_GET['id'];
        $examTable = "exams";

        
        $query = $conn->prepare("DELETE FROM $examTable WHERE id = ?");
        $query->execute([$id]);

        header("Location: ../../sınavlarList.php");
        exit;
    
    


?>