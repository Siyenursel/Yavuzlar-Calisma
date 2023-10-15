<?php
    session_start();
    include "connectDb.php";
if (!isset($_SESSION['id']) || !isset($_SESSION['role']) ||$_SESSION['role'] !== "admin") {
 
    header("Location: login.php");
    exit;
}else{

    $usersTable = "users";
    $school = $conn->prepare("SELECT * FROM $usersTable WHERE role='student' ORDER BY id DESC");
    $school->execute();
    $users = $school->fetchAll(PDO::FETCH_ASSOC);

    $studentClass = "classes_students";
    $school = $conn->prepare("SELECT * FROM $studentClass ORDER BY id DESC");
    $school->execute();
    $studentClasses = $school->fetchAll(PDO::FETCH_ASSOC);

    $classes = "classes";
    $school = $conn->prepare("SELECT * FROM $classes ORDER BY id DESC");
    $school->execute();
    $classes = $school->fetchAll(PDO::FETCH_ASSOC);

    
    $lessonsTable = "lessons";
    $school = $conn->prepare("SELECT * FROM $lessonsTable ORDER BY id DESC");
    $school->execute();
    $lessons = $school->fetchAll(PDO::FETCH_ASSOC);

    $tempClassId = "";
    foreach ($classes as $class) {
        if($class["class_teacher_id"] === $_SESSION["id"]){
            $tempClassId = $class["id"];    
        } 
    }
    

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
            <form class="login" action="./Fonk/Sınav/sınavEkle.php" method="POST">



                <?php if (isset($_GET['error'])) { ?>
                <div class="alert alert-info" role="alert">
                    <?=$_GET['error']?>
                </div>
                <?php } ?>



            </form>
            <form action="./Fonk/Sınav/sınavEkle.php" method="POST">
                <h2 class="position-relative ">Sınav Ekle</h2>

                
                <div class="form-group">
                    <label style="color: #F97171;">Sınav tarihi</label>
                    <input type="text" class="form-control" name="exam_date">
                </div>
                <div class="form-group">
                    <label style="color: #F97171;">Sınıf İsmi</label>
                    <select class="form-control" name="class_name">
                    <option value="0">Seç</option>
                <?php 
                foreach ($classes as $lesson) {
                ?>
                <option value="<?php echo $lesson["id"]; ?>"><?php echo $lesson["class_name"]; ?></option>
                <?php } ?>

		    </select>
                </div>
                <div class="form-group">
                    <label style="color: #F97171;">öğrenci adı</label>
                    <select class="form-control" name="student_id">
                <option value="0">seç</option>
                <?php 
                foreach ($users as $user) {
                ?>
                <option value="<?php echo $user["id"]; ?>"><?php echo $user["name"]; ?></option>
                <?php } ?>
		    </select>

                </div>
                <div class="mb-3">
		    <label style="color: #F97171;" class="form-label">Ders Adı</label>
		    <select class="form-control" name="lesson_id">
                <option value="0">seç</option>
                <?php 
                foreach ($lessons as $lesson) {
                ?>
                <option value="<?php echo $lesson["id"]; ?>"><?php echo $lesson["lesson_name"]; ?></option>
                <?php } ?>
		    </select>
		  </div>
                <div class="form-group">
                    <label style="color: #F97171;">Ders Notu</label>
                    <input type="text" class="form-control" name="exam_score">
                </div>

                

                <button type="submit" class="btn btn-primary mt-5">Ekle</button>
                <a href="sınavList.php" class="btn btn-secondary mt-5 ml-3" role="buton">Listeye Geri Dön</a>
            </form>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>