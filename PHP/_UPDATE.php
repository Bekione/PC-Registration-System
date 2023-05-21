<?php
include 'connect.php';

$sid = $_GET['updateId'];

if(isset($_POST['update'])){
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $id = $_POST['id'];
    $email = $_POST['email'];
    $phone = $_POST['phone_number'];
    $std_photo = $_POST['std_photo'];
    $pc_brand = $_POST['pc_brand'];
    $pc_serial = $_POST['pc_serial'];
    $pc_photo = $_POST['pc_photo'];
    $barcode = $_POST['barcode'];

    $query = "UPDATE `pc owners` SET First_Name = '$fname', Last_Name = '$lname', Student_ID = '$id', Email = '$email', Phone_Number = '$phone', Student_Photo = '$std_photo', Pc_Brand = '$pc_brand', Pc_Serial = '$pc_serial', Pc_Photo = '$pc_photo', Barcode = '$barcode' WHERE Student_ID = '$sid';";
    $result = mysqli_query($con, $query);

    if($result){
        header('location:manage.php?msg');
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
    <link rel="stylesheet" href="register.css">
    <link rel="shortcut icon" href="Assets/photo-1.jpg">
    <title>Register Pc Owner</title>
</head>
<body>
    <?php
    echo file_get_contents('header.php');
    ?>
    <main class="main"> 
        <h3 class="title">Update Pc Owner</h3>
        <div class="registration_form">
            <?php
            $sid = $_GET['updateId'];
            $query = "SELECT * FROM `pc owners` WHERE Student_ID = '$sid' ";
            $result = mysqli_query($con, $query);
            if($result){
                $row = mysqli_fetch_array($result);
                $fname = $row['First_Name'];
                $lname = $row['Last_Name'];
                $id = $row['Student_ID'];
                $email = $row['Email'];
                $phone = $row['Phone_Number'];
                $std_photo = $row['Student_Photo'];
                $brand = $row['Pc_Brand'];
                $serial = $row['Pc_Serial'];
                $pc_photo = $row['Pc_Photo'];
                $barcode = $row['Barcode'];
            ?>
                <form method="post" action="">
                    <div class="input">
                        <label for="fname">First Name</label>
                        <input type="text" name="firstname" id="fname" value="<?php echo $fname ?>">
                    </div>
                    <div class="input">
                        <label for="lname">Last Name</label>
                        <input type="text" name="lastname" id="lname" value="<?php echo $lname ?>">
                    </div>
                    <div class="input">
                        <label for="id">Student ID</label>
                        <input type="text" name="id" id="id" placeholder="DBUR/" value="<?php echo $id ?>">
                    </div>
                    <div class="input">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" value="<?php echo $email ?>">
                    </div>
                    <div class="input">
                        <label for="phone">Phone Number</label>
                        <input type="text" name="phone_number" id="phone" value="<?php echo $phone ?>">
                    </div>
                    <div class="input">
                        <label for="avatar">Student Photo</label>
                        <input type="file" name="std_photo" id="avatar" value="<?php echo $std_photo ?>">
                    </div>
                    <div class="input">
                        <label for="pc_name">PC Brand Name</label>
                        <input type="text" name="pc_brand" id="pc_name" value="<?php echo $brand ?>">
                    </div>
                    <div class="input">
                        <label for="pc_serial">PC Serial Number</label>
                        <input type="text" name="pc_serial" id="pc_serial" value="<?php echo $serial ?>">
                    </div>
                    <div class="input">
                        <label for="pc_photo">PC Photo</label>
                        <input type="file" name="pc_photo" id="pc_photo" value="<?php echo $pc_photo ?>">
                    </div>
                    <div class="input">
                        <label for="barcode">Bar Code Number</label>
                        <input type="text" name="barcode" id="barcode" value="<?php echo $barcode ?>">
                    </div>
                    <div class="input">
                        <input type="submit" name="update" value="Update">
                    </div>
                </form>
            <?php
            }
            else {
                die(mysqli_error($con));
            }
            ?>
        </div>
        <footer>
            <div class="spacer"></div>
            <p>&copy; 2022 DBU PC Registration System. All rights reserved.</p>
        </footer>
    </main>
    <script src="app.js"></script>
    <script>
        const inputs = document.querySelectorAll(".input input");
        inputs.forEach(input => {
            input.value.style.color = "red";
        })
    </script>
</body>
</html>