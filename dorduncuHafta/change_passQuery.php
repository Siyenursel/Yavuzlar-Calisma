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