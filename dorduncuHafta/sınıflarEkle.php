<?php
    session_start();
    include "connectDb.php";
if (!isset($_SESSION['id']) || !isset($_SESSION['role']) ||$_SESSION['role'] !== "admin") {
 
    header("Location: login.php");
    exit;
}
    
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style2.css">
</head>

<body>

    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="border border-2 border-primary px-5 py-5 " style="backdrop-filter: blur(8px);">
            <form class="login" action="./Fonk/Sınıflar/sınıfEkle.php" method="POST">



                <?php if (isset($_GET['error'])) { ?>
                <div class="alert alert-info" role="alert">
                    <?=$_GET['error']?>
                </div>
                <?php } ?>



            </form>
            <form action="./Fonk/Sınıflar/sınıfEkle.php" method="POST">
                <h2 class="position-relative ">Sınıf Ekle</h2>

                
                <div class="form-group">
                    <label style="color: #F97171;">Sınıf İsmi</label>
                    <input type="text" class="form-control" name="class_name">
                </div>

                <div class="form-group">
                    <label style="color: #F97171;">Öğretmen İsim</label>
                    <select class="form-control" name="teacher_id">
                <option value="0">seç</option>
                <?php
                        $query = $conn->prepare("SELECT id, name, surname FROM users WHERE role = 'teacher'");
                        $query->execute();
                        
                        $teachers = $query->fetchAll(PDO::FETCH_ASSOC);
                         foreach ($teachers as $teacher) {
                         echo "
                        <option value='{$teacher['id']}'> {$teacher['name']} {$teacher['surname']}</option>
                        ";
                         }
                         ?>
		    </select>
                </div>

                <button type="submit" class="btn btn-primary mt-5">Ekle</button>
                <a href="sınıflarList.php" class="btn btn-secondary mt-5 ml-3" role="buton">Listeye Geri Dön</a>
            </form>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>