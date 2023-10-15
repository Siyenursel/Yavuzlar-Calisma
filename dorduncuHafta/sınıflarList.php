<?php
    include "connectDb.php";
   
    session_start();
    
if (!isset($_SESSION['id']) || !isset($_SESSION['role']) ||$_SESSION['role'] !== "admin") {
 
    header("Location: login.php");
    exit;
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style2.css">
</head>

<body id="a">

    <div>
        <!-- NAVBAR -->
        <?php include("sabit/navbar.php");?>
        <!-- NAVBAR BİTİŞ -->

        <div class="mt-5">
            <div class="justify-content-center align-items-center d-flex">
                <section class="user-text d-flex  align-items-center flex-column btn-danger">
                    <div class="conteiner d-flex w-200 mt-4 mb-4">

                        <h4 class="col-md-12 mt-4" style="font-size:50px;">Sınıf listesi</h4>
                    </div>

                    <p style="font-size:30px;">
                        Yeni Sınıf Ekle <a href="sınıflarEkle.php" class="btn btn-info" style="font-size:20px;"
                            role="button">Ekle</a>
                    </p>

                </section>
                <?php if (isset($_GET['error'])) { ?>
                <div class="alert alert-info" role="alert">
                    <?=$_GET['error']?>
                </div>
                <?php } ?>
            </div>
            <!-- TABLO -->
            <div class=" d-flex align-items-center justify-content-center ">
                <table class="tablex w-75 m-3 border border-3 border-secondary fs-3"
                    style="backdrop-filter: blur(8px);">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Öğretmen Adı</th>
                            <th>Sınıf Adı</th>

                            <?php if($_SESSION["role"] === "admin" || $_SESSION["role"] === "teacher") { ?>
                            
                            <th>ortalama not</th>
                            <th>öğrenci sayısı</th>

                            <?php } ?>
                            <?php if($_SESSION["role"] === "admin") { ?>
                            <th>Düzenle</th>
                            <th>Sil</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    
                    $query = $conn->prepare("SELECT B.class_name, COUNT(C.student_id) FROM classes_students C INNER JOIN classes B WHERE C.class_id = B.id GROUP BY B.class_name");
                    $query->execute();
                    $countStudents = $query->fetchAll(PDO::FETCH_ASSOC);
                    
                    $queryAverage = $conn->prepare("WITH ClassAverages AS (
                        SELECT A.class_id, B.class_name, AVG(A.exam_score) AS class_average
                        FROM exams A
                        INNER JOIN classes B ON A.class_id = B.id
                        WHERE A.class_id = B.id
                        GROUP BY B.class_name
                      )

                      SELECT A.id, B.id, B.class_teacher_id, A.name, A.surname, B.class_name, C.class_average
                      FROM users A
                      INNER JOIN classes B ON A.id = B.class_teacher_id
                      LEFT JOIN ClassAverages C ON B.class_name = C.class_name;
                      ");

                      $queryAverage->execute();
                      $classes = $queryAverage->fetchAll(PDO::FETCH_ASSOC);

                      
                    
                    
                    
                      foreach($classes as $class){
                        $count= "N/A";
                        foreach ($countStudents as $countStudent) {
                            if ($countStudent["class_name"] == $class["class_name"]) {
                              $count = $countStudent["COUNT(C.student_id)"];
                              break;
                            }
                        }
                        

                        echo "
                        <tr>
                        <td>{$class['id']}</td>
                        <td>{$class['name']} {$class['surname']}</td>
                        <td>{$class['class_name']}</td>
                        
                        <th>" . number_format($class['class_average'], 2) . "</th>
                        <th>$count</th>
                        
                        <td>
                                    <a href='sınıflarEdit.php?id={$class['id']}' class='btn btn-block btn-info'>Sınıf düzenle</a>
                                </td>
                        <td>
                                    <a href='Fonk/Sınıflar/sınıfSil.php?id={$class['id']}' class='btn btn-block btn-danger'>Sil</a>
                                </td>
                       
                    </tr>
                    ";
                    }
                
                    ?>

                    </tbody>
                </table>
            </div>



        </div>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>



</body>

</html>