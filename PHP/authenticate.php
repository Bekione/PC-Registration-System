<?php
session_start();
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'pcregistration';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
    
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

if ( !isset($_POST['username'], $_POST['password']) ) {
    
	exit('Please fill both the username and password fields!');
}

if ($stmt = $con->prepare('SELECT id, password FROM security WHERE username = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
    
	$stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password);
        $stmt->fetch();
        
        if ($_POST['password'] === $password) {
            
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST['username'];
            $_SESSION['id'] = $id;
            $name = $_SESSION['name'];
            header('location: index.php?security='.$name.' ');
        } else {
            // Incorrect password
            header('location: login.php?err');
        }
    } else {
        // Incorrect username
        header('location: login.php?err');
    }

	$stmt->close();
}





// if(isset($_POST['admin_login'])){
//     $username = $_POST['username'];
//     $password = $_POST['password'];

//     $query = "SELECT * FROM `security` WHERE Username = '".$username."' AND Password = '".$password."'; ";

//     $result = mysqli_query($con, $query);

//     if(mysqli_num_rows($result) == 1){
//         header('location: index.php?msg');
//     }
//     else {
//         header('location: login.php');
//     }
// } 
?> 