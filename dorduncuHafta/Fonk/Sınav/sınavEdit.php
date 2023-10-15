<?php
session_start();
include "../../connectDb.php";

if (isset($_SESSION['id']) && isset($_SESSION['role']) && ($_SESSION['role'] === "admin" || $_SESSION['role'] === "teacher") ) {
    if (isset($_POST['id'], $_POST['exam_score'])) {
        $id = $_POST['id'];
        $exam_score = $_POST['exam_score'];
        
      

      

            $query = $conn->prepare("UPDATE exams SET exam_score = ?  WHERE id = ?");
            $query->execute([$exam_score, $id]);

            $em = "Success !!";
            header("Location: ../../sınavlarList.php?id=$id&error=$em");
            exit;
        }
    } else {
        header("Location: ../../sınavlarEdit.php");
        exit;
    }

?>