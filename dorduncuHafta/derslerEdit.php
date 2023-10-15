<?php
include "connectDb.php";

session_start();
if (!isset($_SESSION['id']) || !isset($_SESSION['role']) || !($_SESSION['role'] === "admin" || $_SESSION['role'] === "teacher")) {
    $em = "Warning";
    header("Location: lessonsList.php?error=$em");
    exit;
} else{

    $id = $_GET['id'];
    $lessonsTable = "lessons";
    
    $query = $conn->prepare("SELECT * FROM $lessonsTable WHERE id = ?");
    $query->execute([$id]);
    $lesson = $query->fetch(PDO::FETCH_ASSOC);

    $teacher_user_id = $lesson['teacher_user_id'];
    $lesson_name = $lesson['lesson_name'];
    
    
    $teacherRole = "teacher";
    $query = $conn->prepare("SELECT id, name, surname FROM users WHERE role = ?");
    $query->execute([$teacherRole]);

    $teachers = $query->fetchAll(PDO::FETCH_ASSOC);

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
        <div class="border border-2 border-primary px-5 py-5" style="backdrop-filter: blur(8px);">
        <form class="login" action="Fonk/Ders/derslerEdit.php" method="POST">
    		
    		<h3 style="color: #F97171;">Ders Düzenle</h3>
			
		  <div class="mb-3">
		    <label style="color: #F97171;" class="form-label">Ders ismi</label>
		    <input type="text" class="form-control" name="lesson_name" value="<?php echo "$lesson_name" ?>" required>
		  </div>
		  
          <div class="mb-3">
		    <label style="color: #F97171;" class="form-label">Öğretmen ismi</label>
		    <select class="form-control" name="teacher_id">
                
                <?php foreach ($teachers as $teacher) { 
                    if($teacher['id'] == $teacher_user_id){?>
                        <option value="0" selected><?php echo "$teacher_user_id". " - " .  $teacher['name'] . "  " . $teacher['surname'] ?></option>
                    <?php } ?>
                        <option value="<?= $teacher['id'] ?>"><?= $teacher['name'] . ' ' . $teacher['surname'] ?></option>
                <?php } ?>

		    </select>
		  </div>

          
          <input type="hidden" name="id" value="<?=$id?>">

		  <button type="submit" class="btn btn-primary">Düzenle</button>
		  <a href="derslerList.php" class="btn btn-secondary" role="button" >Geri DÖn</a>
		</form>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
