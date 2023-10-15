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
        <div class="border border-2 border-primary px-5 py-5 " style="backdrop-filter: blur(8px); color: #F97171;">
            <form action="loginQuery.php" method="POST">
                <h2 class="position-relative ">Giriş Yap</h2>

                <div class="form-group">
                    <label>Kullanıcı Adı</label>
                    <input type="text" class="form-control" id="Email" name="username" 
                        placeholder="Kullanıcı Adı">

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Şifre</label>
                    <input type="password" class="form-control" id="Password" name="password" placeholder="Şifre">
                </div>
                <div class="form-group form-check">
                </div>

                    <button type="submit" class="btn btn-primary ">Giriş Yap</button>
                    kullanıcıList.php?error=Success
            </form>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>


