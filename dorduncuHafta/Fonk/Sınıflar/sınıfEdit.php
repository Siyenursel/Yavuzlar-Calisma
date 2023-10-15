<?php
session_start();
include "../../connectDb.php";

if (isset($_SESSION['id']) && isset($_SESSION['role']) && ($_SESSION['role'] === "admin" || $_SESSION['role'] === "teacher")) {
    if (isset($_POST['id'], $_POST['class_name'], $_POST['teacher_id'])) {
        $id = $_POST['id'];
        $class_name = $_POST['class_name'];
        $teacher_id = $_POST['teacher_id'];

    

        
            $query = $conn->prepare("UPDATE classes SET class_teacher_id = ?,class_name = ?  WHERE id = ?");
            $query->execute([$teacher_id, $class_name, $id]);

            
            header("Location: ../../sınıflarList.php");
            exit;
        }
    } else {
        header("Location: ../../sınıflarEdit.php");
        exit;
    }


?>