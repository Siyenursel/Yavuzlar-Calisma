<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>todoList</title>
    
   
    <link rel="stylesheet" href="sytle.css"/>
     
</head>
<body>
    
    <div class="container">
        <div class="todo">
            <h1>Yapılacaklar Listesi</h1>

            <!-- <label for="search">Search todos</label> -->
            <!-- <input type="search" id="search"> -->
            <input id="searchİnput" type="text" placeholder="Ara">
            <div class="row">
                <input type="text" id="input-box" placeholder="Yapılacaklara bir şeyler ekle">
                <button id="buton1" >EKLE</button>
            </div>

        <div id="tasks">
            <!-- <div class="List">
                
                  <input type="text" id="listeText"  placeholder="blablabla" readonly>
                     <button id="butonDüzenle">DÜZENLE</button> 
                     <Button id="butonSil">SİL</Button>

            </div> -->
        </div>

        </div>
    </div>

    <script src="script.js" defer></script>
    <?php
    $username = $_POST['username'];
    $password = $_POST['password'];
   
    function gettodo($user) {
        
        
        $conn = new PDO('sqlite:db/dataBase.db');
    
        $stmt = $conn->prepare("SELECT * FROM User WHERE username = :username");
        $stmt->bindParam(':username', $user);
        $stmt->execute();
        
        $result =$stmt->fetch(PDO::FETCH_ASSOC);
        
        
        return $result;
    }
    
    

    	try{
    	$conn = new PDO('sqlite:db/dataBase.db');
    	
    	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     
    	
    		
    		
     
    		
    		$query = "SELECT COUNT(*) as count FROM `User` WHERE `username` = :username AND `password` = :password";
    		$stmt = $conn->prepare($query);
    		$stmt->bindParam(':username', $username);
    		$stmt->bindParam(':password', $password);
    		$stmt->execute();
    		$row = $stmt->fetch();
    		$count = $row['count'];
    		if($count > 0){
    			//header('location:main.php');
    		}else{
    			$_SESSION['error'] = "Invalid username or password";
    			header('location:login.php');
    		}
          
        }
            catch (PDOException $e) {
                die("db error " . $e->getMessage());
            }
    		
            
            
    ?>
    
   
    <div style = "visibility: hidden; display: none;" id="todo"><?php echo gettodo($username)['todo'];; ?></div>
    <div style = "visibility: hidden; display: none;" id="username"><?php echo $username;?></div>

</body>
</html>


<?php



?>