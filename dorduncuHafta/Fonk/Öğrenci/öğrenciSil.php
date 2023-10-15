<?php

include "../../connectDb.php";
session_start();


if(isset($_GET['id'])){

    try {
        $id = $_GET['id'];
        $usersTable = "users";
        $classTable = "classes";
        $examsTable = "exams";
        $studentsTable = "classes_students";
        $lessonsTable = "lessons";

        $query = $conn->prepare("DELETE FROM $examsTable WHERE student_id = ?");
        $query->execute([$id]);

        $query = $conn->prepare("DELETE FROM $studentsTable WHERE student_id = ?");
        $query->execute([$id]);

        $query = $conn->prepare("DELETE FROM $classTable WHERE class_teacher_id = ?");
        $query->execute([$id]);
        
        $query = $conn->prepare("DELETE FROM $lessonsTable WHERE teacher_user_id = ?");
        $query->execute([$id]);
        
        $query = $conn->prepare("DELETE FROM $usersTable WHERE id = ?");
        $query->execute([$id]);

        header("Location: ../../kullanıcıList.php");
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