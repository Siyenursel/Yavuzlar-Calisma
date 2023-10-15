<?php
    include "connectDb.php";
    
    
    session_start();
    if (!isset($_SESSION['id']) || !isset($_SESSION['role'])) {
        header("Location: login.php");
        exit;
    }

    $userId = $_SESSION['id'];
    
    $query = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $query->execute([$userId]);
    $user = $query->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kullanıcı Profili</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style2.css">
</head>

<body>
<?php include("sabit/navbar.php");?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="border border-2 border-primary p-4" style="backdrop-filter: blur(8px);">
                    <h3 class="text-center">Kullanıcı Profili</h3>
                    <div>
                        <label for="name" class="form-label">Adı:</label>
                        <input type="text" id="name" class="form-control" value="<?php echo $user['name']; ?>" disabled>
                    </div>
                    <div>
                        <label for="surname" class="form-label">Soyadı:</label>
                        <input type="text" id="surname" class="form-control" value="<?php echo $user['surname']; ?>" disabled>
                    </div>
                    <div>
                        <label for="username" class="form-label">Kullanıcı Adı:</label>
                        <input type="text" id="username" class="form-control" value="<?php echo $user['username']; ?>" disabled>
                    </div>
                    <div>
                        <label for="role" class="form-label">Rolü:</label>
                        <input type="text" id="role" class="form-control" value="<?php echo $user['role']; ?>" disabled>
                    </div>
                    <div>
                        <label for="created_at" class="form-label">Kayıt Tarihi:</label>
                        <input type="text" id="created_at" class="form-control" value="<?php echo $user['created_at']; ?>" disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center mt-3">
    <a href="change_pass.php" class="btn btn-primary">Şifre Değiştir</a>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
