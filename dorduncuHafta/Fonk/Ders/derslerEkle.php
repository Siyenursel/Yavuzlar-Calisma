<?php 
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['role']) && $_SESSION['role'] === "admin"){
    if (isset($_POST['lesson_name']) && isset($_POST['teacher_id'])) {

        include "../../connectDb.php";
       
        $lesson_name = $_POST['lesson_name'];
        $teacher_id = $_POST['teacher_id'];
            
                $ObsDb = "lessons";
                $query = $conn->prepare("INSERT INTO $ObsDb(teacher_user_id, lesson_name) VALUES (?, ?)");
                $query->execute(array(
                    $teacher_id,
                    $lesson_name,

                ));

                
                header("Location: ../../derslerList.php");
                exit;
            
        }
    } else {
        header("Location: ../../derslerEkle.php");
        exit;
    }


?>