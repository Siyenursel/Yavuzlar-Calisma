<?php
session_start();
include "../../connectDb.php";

if (isset($_SESSION['id']) && isset($_SESSION['role']) && ($_SESSION['role'] === "admin" || $_SESSION['role'] === "teacher")) {
    if (isset($_POST['id'], $_POST['lesson_name'], $_POST['teacher_id'])) {
        $id = $_POST['id'];
        $lesson_name = $_POST['lesson_name'];
        $teacher_id = $_POST['teacher_id'];
      

            $query = $conn->prepare("UPDATE lessons SET teacher_user_id = ?, lesson_name = ?  WHERE id = ?");
            $query->execute([$teacher_id, $lesson_name, $id]);

            
            header("Location: ../../derslerList.php");
            exit;
        }
    } else {
        header("Location: ../../derslerEdit.php");
        exit;
    }

?>