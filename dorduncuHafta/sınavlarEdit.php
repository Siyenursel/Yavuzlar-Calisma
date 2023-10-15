<?php
include "connectDb.php";

session_start();
if (!isset($_SESSION['id']) || !isset($_SESSION['role']) || !($_SESSION['role'] === "admin" || $_SESSION['role'] === "teacher")) {
    $em = "Warning";
    header("Location: lessonsList.php?error=$em");
    exit;
} else{

    $id = $_GET['id'];
    

    $examTable = "exams";
    $school = $conn->prepare("SELECT * FROM $examTable ORDER BY id DESC");
    $school->execute();
    $exams = $school->fetchAll(PDO::FETCH_ASSOC);

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
        <form class="login" action="Fonk/Sınav/sınavEdit.php" method="POST">
    		
    		<h3 style="color: #F97171;">Sınav Düzenle</h3>
			
		  
          
		  
          <?php 
                foreach ($exams as $exam) {
                    $examScore = "0";
                    if($exam["id"] === $id){
                        $examScore = $exam["exam_score"];
                        break;
                    }
                } 
            ?>
          <div class="mb-3">
		    <label style="color: #F97171;" class="form-label">sınav notu</label>
		    <input type="text" class="form-control" value="<?php echo $examScore; ?>" name="exam_score" required>
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
