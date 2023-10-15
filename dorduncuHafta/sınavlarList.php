<?php
    session_start();
    include "connectDb.php";
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
            
          <h4 class="col-md-12 mt-4" style="font-size:50px;">Sınav listesi</h4>
            </div>
            
        <p style="font-size:30px;">
        Yeni Sınav Ekle <a href="sınavlarEkle.php" class="btn btn-info" style="font-size:20px;" role="button" >Ekle</a>
            </p>
            
        </section>
        
        </div>
            <!-- TABLO -->
            <div class=" d-flex align-items-center justify-content-center " >
                <table class="tablex w-75 m-3 border border-3 border-secondary fs-3" style="backdrop-filter: blur(8px);">
                    <thead>
                        <tr>
                        <th>Sınav Tarihi</th>
                          <th>Sınıf Adı</th>
                         <th>Öğrenci İsmi</th>
                        <th>Öğrenci Soyismi</th>
                          <th>Ders Adı</th>
                          <th>Ders Notu</th>

                            <th>Düzenle</th>
                            <th>SİL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    
                    $ObsDb = $conn->prepare("SELECT A.id, A.exam_score, A.exam_date, B.name, B.surname, C.lesson_name, D.class_name
                    FROM exams A 
                    INNER JOIN users B ON A.student_id = B.id 
                    INNER JOIN lessons C ON A.lesson_id = C.id
                    INNER JOIN classes D ON A.class_id = D.id");
                    $ObsDb->execute();
                    $exams = $ObsDb->fetchAll(PDO::FETCH_ASSOC);

                    foreach($exams as $exam){
                        echo "<tr>
                       
                        <td>{$exam['exam_date']}</td>
                       <td>{$exam['class_name']}</td>
                         <td>{$exam['name']}</td>
                         <td>{$exam['surname']}</td>
                         <td>{$exam['lesson_name']}</td>
                         <td>{$exam['exam_score']}</td>
                        <td>
                                    <a href='sınavlarEdit.php?id={$exam['id']}' class='btn btn-block btn-info'>Düzenle</a>
                                </td>
                        <td>
                                    <a href='Fonk/Sınav/sınavSil.php?id={$exam['id']}' class='btn btn-block btn-danger'>Sil</a>
                                </td>
                    </tr>";
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