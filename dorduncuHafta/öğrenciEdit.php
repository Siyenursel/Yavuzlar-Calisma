
<?php
    session_start();
    include "connectDb.php";
if (!isset($_SESSION['id']) || !isset($_SESSION['role']) ||$_SESSION['role'] !== "admin") {
 
    header("Location: login.php");
    exit;
}   else{
    $id = $_GET['id'];
    $usersTable = "users";
    
    $query = $conn->prepare("SELECT * FROM $usersTable WHERE id = ?");
    $query->execute([$id]);
    $user = $query->fetch(PDO::FETCH_ASSOC);

    $name = $user['name'];
    $surname = $user['surname'];
    $username = $user['username'];
    $role = $user['role'];
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
            <form method="POST" action="Fonk/Kullanıcı/kullanıcıEdit.php?id=<?= $id ?>">
                <h2 class="position-relative ">Kullanıcı Düzenle</h2>

                <div class="form-group">
                    <label style="color: #F97171;">İsim</label>
                    <input value="<?php echo $name;?>" type="text" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label style="color: #F97171;">Soyisim</label>
                    <input value="<?= $surname?>" type= "text" class="form-control" name="surname">
                </div>
                <div class="form-group">
                    <label style="color: #F97171;">Kullanıcı Adı</label>
                    <input value="<?= $username?>" type="text" class="form-control" name="username">
                </div>
                <div class="form-group">
                    <label style="color: #F97171;">Yeni Şifre</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="form-group">
                    <label style="color: #F97171;">Rol</label>
                    <select name="role" class="form-control">
                        <option value="0" selected ><?= $role?></option>
                        <option value="admin">admin</option>
                        <option value="teacher">öğretmen</option>
                        <option value="student">öğrenci</option>
                        
                    </select>
                </div>

                <button type="submit" class="btn btn-primary mt-5">Düzenle</button>
                <a href="kullanıcıList.php" class="btn btn-secondary mt-5 ml-3" role="buton">Geri Dön</a>
            </form>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
