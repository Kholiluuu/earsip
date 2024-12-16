<?php 

include 'config/koneksi.php';

if(isset($_POST['signUp'])){
    $firstName = $_POST['fName'];
    $lastName = $_POST['lName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = md5($password); // You should ideally use bcrypt or other hashing methods for better security

    // Use prepared statements to prevent SQL injection
    $checkEmail = $koneksi->prepare("SELECT * FROM users WHERE email = ?");
    $checkEmail->bind_param("s", $email);
    $checkEmail->execute();
    $result = $checkEmail->get_result();
    
    if($result->num_rows > 0){
        echo "Email Address Already Exists!";
    }
    else {
        // Insert the new user securely using prepared statements
        $insertQuery = $koneksi->prepare("INSERT INTO users (firstName, lastName, email, password) VALUES (?, ?, ?, ?)");
        $insertQuery->bind_param("ssss", $firstName, $lastName, $email, $password);
        
        if($insertQuery->execute()) {
            header("Location: index.php");
            exit();
        } else {
            echo "Error: " . $insertQuery->error;
        }
    }
}

if(isset($_POST['signIn'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = md5($password); // Again, bcrypt would be preferred over md5 for password hashing

    // Use prepared statements to prevent SQL injection
    $sql = $koneksi->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
    $sql->bind_param("ss", $email, $password);
    $sql->execute();
    $result = $sql->get_result();
    
    if($result->num_rows > 0){
        session_start();
        $row = $result->fetch_assoc();
        $_SESSION['email'] = $row['email'];
        echo "<script>alert('Sign Up Successful!'); window.location.href = 'admin.php';</script>";
        
    } else {
        echo "<script>alert('gagal!'); window.location.href = 'index.php';</script>";
    }
}

?>
