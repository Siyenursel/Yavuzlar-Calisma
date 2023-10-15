<?php 
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['role']) && ($_SESSION['role'] === "admin" || $_SESSION['role'] === "teacher") ){
    if (isset($_POST['student_id']) && isset($_POST['lesson_id']) && isset($_POST['exam_score'])) {

        include "../../connectDb.php";
       
        $student_id = $_POST['student_id'];
        $lesson_id = $_POST['lesson_id'];
        $exam_score = $_POST['exam_score'];
        var_dump($student_id);
        $studentClass = "classes_students";
        $school = $conn->prepare("SELECT class_id FROM $studentClass WHERE student_id=:student_id");
        $school->bindParam(':student_id', $student_id,);
        $school->execute();
        $studentClasses = $school->fetchAll(PDO::FETCH_ASSOC);
        $class_id=$studentClasses[0]["class_id"];
        var_dump($studentClasses);
        if($class_id==NULL){
            $m = "Sınıfı olmayan öğrenciye not ekleyemezsiniz.";
             header("Location: sınavEkle.php?error=$m");
            die();
        }

                $school = "exams";
                $query = $conn->prepare("INSERT INTO $school(student_id, class_id, lesson_id, exam_score) VALUES (?, ?, ?, ?)");
                $query->execute(array(
                    $student_id,
                    $class_id,
                    $lesson_id,
                    $exam_score,

                ));

                
                header("Location: ../../sınavlarList.php?");
                exit;
            
            
        }
    } else {
        header("Location: ../../sınavlarEkle.php");
        exit;
    }


?>