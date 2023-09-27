<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <title>Document</title>
</head>
<body>
    <div class="container vh-100 w-25">
        <div class="row justify-center h-100">
          <div class="card my-auto">
            <div class="card-header">
            <h2>Giriş Yap</h2>
            </div>
            <div class="card-body">
              <form action="main.php" method="POST">
                  <div class="form-group">
                      <label>kullanıcı adı</label>
                      <input type="text" class="form-control" name="username">
                  </div>
                  <div class="form-group">
                    <label>şifre</label>
                    <input type="password" class="password" name="password">
                  </div>
                 <input type="submit" class="btn btn-primary" value="Giriş Yap">
                </form>
                <a href="register.php">Bir hesabın yok mu? Kayıt ol</a>
            </div>
            <div class="card-footer">

            </div>
          </div>
        </div>
    </div>


    

</body>
</html>