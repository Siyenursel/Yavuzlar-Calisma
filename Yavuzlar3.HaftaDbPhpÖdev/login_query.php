<?php
    	try{
    	$conn = new PDO('sqlite:db/dataBase.db');
    	//Setting connection attributes
    	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     
    	
    		// Setting variables
    		$username = $_POST['username'];
    		$password = $_POST['password'];
     
    		// Select Query for counting the row that has the same value of the given username and password. This query is for checking if the access is valid or not.
    		$query = "SELECT COUNT(*) as count FROM `User` WHERE `username` = :username AND `password` = :password";
    		$stmt = $conn->prepare($query);
    		$stmt->bindParam(':username', $username);
    		$stmt->bindParam(':password', $password);
    		$stmt->execute();
    		$row = $stmt->fetch();
     
    		$count = $row['count'];
    		if($count > 0){
    			header('location:main.php');
    		}else{
    			$_SESSION['error'] = "Invalid username or password";
    			header('location:login.php');
    		}

          
        }
            catch (PDOException $e) {
                die("db error " . $e->getMessage());
            }
    		
    	
    ?>

