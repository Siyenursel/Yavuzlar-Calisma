<?php
session_start();
include "connectDb.php";

if (!isset($_SESSION['id']) || !isset($_SESSION['role'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['eski_sifre']) && isset($_POST['yeni_sifre'])) {
        $user_id = $_SESSION['id'];
        $eski_sifre = $_POST['eski_sifre'];
        $yeni_sifre = $_POST['yeni_sifre'];

        // Kullanıcının eski şifresini doğrula
        $query = $conn->prepare("SELECT password FROM users WHERE id = ?");
        $query->execute([$user_id]);
        $user = $query->fetch(PDO::FETCH_ASSOC);
        
        if (password_verify($eski_sifre, $user['password'])) {
            // Eğer eski şifre doğru ise, yeni şifreyi güncelle
            $hashed_yeni_sifre = password_hash($yeni_sifre, PASSWORD_DEFAULT);
            $update_query = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
            $update_query->execute([$hashed_yeni_sifre, $user_id]);

            // Şifre değiştirme başarılı, kullanıcıyı profil sayfasına yönlendir
            header("Location: profile.php");
            exit;
        } else {
            $error = "Eski şifre yanlış. Şifre değiştirilemedi.";
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
        <div class="border border-2 border-primary px-5 py-5 ">
            <form method="POST">
                <h2 class="position-relative " style="color: #F97171;">Şifreni Değiştir</h2>

                <?php if (isset($error)) { ?>
                    <div class="alert alert-danger"><?= $error ?></div>
                <?php } ?>
                
                <div class="form-group">
                    <label for="eski_sifre" style="color: #F97171;">Eski Şifre</label>
                    <input type="text" class="form-control"  id="eski_sifre"name="eski_sifre" 
                        placeholder="eski şifre">

                </div>
                <div class="form-group">
                    <label for="yeni_sifre" style="color: #F97171;">Yeni Şifre</label>
                    <input type="text" class="form-control" id="yeni_sifre"   name="yeni_sifre" placeholder="Yeni_Şifre">
                </div>
                
                <button type="submit" class="btn btn-primary">Şifre Değiştir</button>
                
            </form>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>