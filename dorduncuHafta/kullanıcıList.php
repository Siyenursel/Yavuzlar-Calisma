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
            
          <h4 class="col-md-12 mt-4" style="font-size:50px;">Kullanıcı listesi</h4>
            </div>
            
        <p style="font-size:30px;">
        Yeni Kullanıcı Ekle <a href="kullanıcıEkle.php" class="btn btn-info" style="font-size:20px;" role="button" >Ekle</a>
            </p>
            
        </section>
        
        </div>
            <!-- TABLO -->
            <div class=" d-flex align-items-center justify-content-center " >
                <table class="tablex w-75 m-3 border border-3 border-secondary fs-3" style="backdrop-filter: blur(8px);">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>İSİM</th>
                            <th>SOYİSİM</th>
                            <th>KULLANICI ADI</th>
                            <th>ROL</th>

                            <th>Düzenle</th>
                            <th>SİL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    
                    $ObsDb = $conn->prepare("SELECT * FROM users ORDER BY id DESC");
                    $ObsDb->execute();
                    $users = $ObsDb->fetchAll(PDO::FETCH_ASSOC);

                    foreach($users as $user){
                        echo "<tr>
                        <th scope='row'>{$user['id']}</th>
                        <td>{$user['name']}</td>
                        <td>{$user['surname']}</td>
                        <td>{$user['username']}</td>
                        <td>{$user['role']}</td>
                        <td>
                                    <a href='kullanıcıEdit.php?id={$user['id']}' class='btn btn-block btn-info'>Düzenle</a>
                                </td>
                        <td>
                                    <a href='Fonk/Kullanıcı/kullanıcıSil.php?id={$user['id']}' class='btn btn-block btn-danger'>Sil</a>
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