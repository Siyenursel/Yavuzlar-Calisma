<?php
        try{
       
    	
    	$conn = new PDO('sqlite:db/dataBase.db');
    	
    	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    	
    	
    		$username = $_POST['username'];
    		$password = $_POST['password'];
    		
            $arrays = "[]";
    		$query = "INSERT INTO `User` (username, password,todo) VALUES(:username, :password , :todo)";
    		$stmt = $conn->prepare($query);
    		$stmt->bindParam(':username', $username);
    		$stmt->bindParam(':password', $password);
    		$stmt->bindParam(':todo', $arrays);

     
    		
    		$stmt->execute();
    			
    		header('location: login.php');
    		
     
    	
    }
    catch (PDOException $e) {
        echo("db error " . $e->getMessage());
    }
    ?>