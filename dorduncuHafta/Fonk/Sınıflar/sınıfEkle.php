<?php 
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['role']) && $_SESSION['role'] === "admin"){
    if (isset($_POST['class_name']) && isset($_POST['teacher_id'])) {

        include "../../connectDb.php";
       
        $class_name = $_POST['class_name'];
        $teacher_id = $_POST['teacher_id'];

       
       
    
            
                $school = "classes";
                $query = $conn->prepare("INSERT INTO $school(class_name, class_teacher_id) VALUES (?, ?)");
                $query->execute(array(
                    $class_name,
                    $teacher_id,

                ));

                $em  = "Success";
                header("Location: ../../sınıflarList.php");
                exit;
            
            
        }
    } else {
        header("Location: ../../sınıflarEkle.php");
        exit;
    }

?>