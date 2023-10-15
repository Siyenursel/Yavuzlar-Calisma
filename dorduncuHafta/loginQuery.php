
<?php 
session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {

    include "connectDb.php";
    
    $username = $_POST['username'];
    $pass = $_POST['password'];


   
        $sql = "SELECT id, username, password, role FROM users WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$username]);

        
        if ($stmt->rowCount() == 1) {
            $user = $stmt->fetch();
            
            $storedUsername = $user['username']; 
            $storedPassword = $user['password'];
            $role = $user['role'];
            $id = $user['id'];
           
            if ($storedUsername === $username) {
                if (password_verify($pass, $storedPassword)) {
                    $_SESSION['id'] = $id;
                    $_SESSION['username'] = $storedUsername;
                    $_SESSION['role'] = $role;
                    
                    
                    header("Location: main.php");
                    exit;
                } else {
                    header("Location: login.php");
           		 exit;
                }
            } else {
                header("Location: login.php");
            exit;
            }
        } else {
            header("Location: login.php");
            exit;
        }  
    }
 else {
    header("Location: ../login.php");
    exit;
}
?>