<?php 
include 'connect.php';
if(isset($_POST['register'])){
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $id = $_POST['id'];
    $email = $_POST['email'];
    $phone = $_POST['phone_number'];
    $pc_brand = $_POST['pc_brand'];
    $pc_serial = $_POST['pc_serial'];
    $barcode = $_POST['barcode'];

    $std_photo = $_FILES['std_photo'];
    $std_photoName = $_FILES['std_photo']['name'];
    $std_photoTmpName = $_FILES['std_photo']['tmp_name'];
    $std_photoSize = $_FILES['std_photo']['size'];
    $std_photoError = $_FILES['std_photo']['error'];
    $std_photoType = $_FILES['std_photo']['type'];

    $std_photoExt = explode('.', $std_photoName);
    $std_photoActualExt = strtolower(end($std_photoExt));
    $allowed = array('jpg', 'jpeg', 'png');
    if(in_array($std_photoActualExt, $allowed)){
        if($std_photoError === 0){
            if($std_photoSize < 2000000){
                $std_photoNewName = uniqid('', true).".".$std_photoActualExt;
                $std_photoDestination = 'assets/owner_images/'.$std_photoNewName;
                move_uploaded_file($std_photoTmpName, $std_photoDestination);
            } else {
                echo '
                <script>
                    alert("Your student photo was to big.");
                </script>
                ';
            }
        } else {
            echo '
                <script>
                    alert("There was an error uploading the student photo.");
                </script>
            ';
        }
    } else {
        echo '
            <script>
                alert("The student file type is not supported by DBU PRS system.");
            </script>
        ';
    }

    $pc_photo = $_FILES['pc_photo'];
    $pc_photoName = $_FILES['pc_photo']['name'];
    $pc_photoTmpName = $_FILES['pc_photo']['tmp_name'];
    $pc_photoSize = $_FILES['pc_photo']['size'];
    $pc_photoError = $_FILES['pc_photo']['error'];
    $pc_photoType = $_FILES['pc_photo']['type'];
    
    $pc_photoExt = explode('.', $pc_photoName);
    $pc_photoActualExt = strtolower(end($pc_photoExt));
    $allowed = array('jpg', 'jpeg', 'png');
    if(in_array($pc_photoActualExt, $allowed)){
        if($pc_photoError === 0){
            if($pc_photoSize < 2000000){
                $pc_photoNewName = uniqid('', true).".".$pc_photoActualExt;
                $pc_photoDestination = 'assets/pc_images/'.$pc_photoNewName;
                move_uploaded_file($pc_photoTmpName, $pc_photoDestination);
            } else {
                echo '
                    <script>
                        alert("Your pc photo file was to big.");
                    </script>
                ';
            }
        } else {
            echo '
                <script>
                    alert("There was an error uploading the pc photo.");
                </script>
            ';
        }
    } else {
        echo '
            <script>
                alert("This pc photo file type is not supported by DBU PRS system.");
            </script>
        ';
    }

    require_once 'phpqrcode/qrlib.php';
    $path = "Assets/Pc_Qr_Codes/";
    $qr_img = $path."pcqr".time().".png"; // we can use unique() instead of time()
    $text = " Pc Owner Qr Code  ";
    $text .= " NAME : ".$fname." ".$lname;
    $text .= " ID : ".$id;
    $text .= " EMAIL : ".$email;
    $text .= " Phone : ".$phone;
    $text .= " PC BRAND : ".$pc_brand;
    $text .= " SERIAL NO : ".$pc_serial;
    QRcode::png($text, $qr_img, 'L', 3, 1);

    $query = "INSERT INTO `pc owners` (First_Name, Last_Name, Student_ID, Email, Phone_Number, Student_Photo, Pc_Brand, Pc_Serial, Pc_Photo, Barcode, Qr_Code_Img)
    VALUES('$fname', '$lname', '$id', '$email', '$phone', '$std_photoDestination', '$pc_brand', '$pc_serial', '$pc_photoDestination', '$barcode', '$qr_img')";  

    $result = mysqli_query($con, $query);

    if($result){
        echo '
            <div class="pop_up">
                <div class="remove" title="remove">
                    <span class="fa fa-times"></span>
                </div>
                <p>Registerd successfully.</p>
                <div class="slider_counter">
                    <span class="mover"><span>
                </div>
            </div>
        ';
    } else {
        die(mysqli_error($con));
    }
}
?>
<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Css/register.css?v=<?php echo time(); ?>">
    <link rel="shortcut icon" href="Assets/logo.png">
    <title>Register Pc Owner</title>
</head>
<body>
    <?php
    echo file_get_contents('header.php');
    ?>
    <main class="main"> 
        <h3 class="title">Register Pc Owners</h3>
        <div class="registration_form">
            <form method="post" action="" enctype="multipart/form-data">
                <div class="input">
                    <label for="fname">First Name</label>
                    <input type="text" name="firstname" id="fname" onmouseover="this.focus()">
                </div>
                <div class="input">
                    <label for="lname">Last Name</label>
                    <input type="text" name="lastname" id="lname">
                </div>
                <div class="input">
                    <label for="id">Student ID</label>
                    <input type="text" name="id" id="id" value="DBUR" placeholder="DBUR/">
                </div>
                <div class="input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email">
                </div>
                <div class="input">
                    <label for="phone">Phone Number</label>
                    <input type="text" name="phone_number" id="phone">
                </div>
                <div class="input">
                    <label for="avatar">Student Photo</label>
                    <input type="file" name="std_photo" id="avatar"><!-- accept="image/*" -->
                </div>
                <div class="input">
                    <label for="pc_name">PC Brand Name</label>
                    <input type="text" name="pc_brand" id="pc_name">
                </div>
                <div class="input">
                    <label for="pc_serial">PC Serial Number</label>
                    <input type="text" name="pc_serial" id="pc_serial">
                </div>
                <div class="input">
                    <label for="pc_photo">PC Photo</label>
                    <input type="file" name="pc_photo" id="pc_photo">
                </div>
                <div class="input">
                    <label for="barcode">Bar Code Number</label>
                    <input type="text" name="barcode" id="barcode">
                </div>
                <div class="input">
                    <input type="submit" name="register" value="Register">
                </div>
            </form>
        </div>
        <footer>
            <div class="spacer"></div>
            <p>&copy; 2022 DBU PC Registration System. All rights reserved.</p>
        </footer>
    </main>
    <script src="app.js"></script>
</body>
</html>
