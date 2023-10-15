<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Yavuzlar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="main.php">Ana Sayfa</a>
                </li>

                <?php
            if($_SESSION["role"]=="admin"){

            
        
                       ?>

                <li class="nav-item">
                    <a class="nav-link" href="kullanıcıList.php">Admin</a>
                </li>

                <?php
        }
        
                      ?>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Öğrenci İşlemleri
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="sınıflarList.php">Sınıflar</a></li>
                        <?php
            if($_SESSION["role"]=="admin" || $_SESSION["role"]=="teacher"){

            
        
                       ?>

                        <li><a class="dropdown-item" href="öğrencilerList.php">Öğrenciler</a></li>
                        <li><a class="dropdown-item" href="derslerList.php">Dersler</a></li>
                        <?php
        }
        
                      ?>

                        <li><a class="dropdown-item" href="sınavlarList.php">Sınavlar</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <!-- <li><a class="dropdown-item" href="#">Something else here</a></li> -->
                    </ul>
                </li>

            </ul>
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="çıkış.php">Çıkış Yap</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="profile.php">Profil</a>
                </li>
            </ul>
        </div>
    </div>
</nav>