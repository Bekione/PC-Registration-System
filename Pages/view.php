<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="view.css?v=<?php echo time(); ?>">
    <link rel="shortcut icon" href="Assets/logo.png">
    <title>View Pc Owners</title>
</head>
<body>
    <?php
    echo file_get_contents('header.php');
    ?>
    <main class="main">
        <div class="container">
            <div class="top">
                <div class="back" title="Back">
                    <a href="manage.php">
                        <span class="fa fa-arrow-left"></span>
                    </a>
                </div>
                <div class="top_title">
                    <h2>Pc Owner Details</h2>
                </div>
            </div>
        <?php
        if(isset($_GET['viewId'])){
            $sid = $_GET['viewId'];

            $query = "SELECT * FROM `pc owners` WHERE Student_ID = '$sid'; ";
            $result = mysqli_query($con, $query);

            if($result){
                $data = mysqli_fetch_assoc($result);

                $fname = $data['First_Name'];
                $lname = $data['Last_Name'];
                $email = $data['Email'];
                $phone = $data['Phone_Number'];
                $stdPhoto = $data['Student_Photo'];
                $brand = $data['Pc_Brand'];
                $serial = $data['Pc_Serial'];
                $pcPhoto = $data['Pc_Photo'];
                $barcode = $data['Barcode'];
                $qrImage = $data['Qr_Code_Img'];

                echo '
                <div class="card">
                    <div class="left">
                        <div class="top">
                            <div class="pc_owner_img">
                                <a href=" '.$stdPhoto.' ">
                                    <img src="'.$stdPhoto.' " alt="">
                                </a>
                            </div>
                        </div>
                        <div class="details">
                            <div class="title">
                                <span class="fa fa-address-card-o"></span>
                                <span>Cerdentials</span>
                            </div>
                            <div class="id data" title="Student ID">
                                <span class="fa fa-id-card"></span>
                                <p>'.$sid.'</p>
                            </div>
                            <div class="name data" title="Name">
                                <span class="fa fa-user"></span>
                                <p>'.$fname.' '.$lname.'</p>
                            </div>
                            <div class="email data" title="Email">
                                <span class="fa fa-envelope"></span>
                                <p>'.$email.'</p>
                            </div>
                            <div class="phone data" title="Phone Number">
                                <span class="fa fa-phone"></span>
                                <p>'.$phone.'</p>
                            </div>
                            <div class="pc_brand data" title="Pc Brand">
                                <span class="fa fa-bandcamp"></span>
                                <p>'.$brand.'</p>
                            </div>
                            <div class="serial data" title="Serial Number">
                                <span class="fa fa-hashtag"></span>
                                <p>'.$serial.'</p>
                            </div>
                            <div class="barcode data" title="Barcode ID">
                                <span class="fa fa-barcode"></span>
                                <p>'.$barcode.'</p>
                            </div>
                        </div>
                    </div>
                    <div class="right">
                        <h3 class="title">Pc Image</h3>
                        <div class="pc_images">
                            <div class="pc_img">
                                <a href=" '.$pcPhoto.' ">
                                    <img src="'.$pcPhoto.' " alt="">
                                </a>
                            </div>
                            <div class="pc_img" title="Qr Code" style="display: flex; align-items: center; justify-content: center; padding-block: 1rem;">
                                <a href=" '.$qrImage.' ">
                                    <img src="'.$qrImage.' " alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                ';
            }
            else {
                die(mysqli_error($con));
            }
        }
        ?>
        </div>
        <footer>
            <div class="spacer"></div>
            <p>&copy; 2022 DBU PC Registration System. All rights reserved.</p>
        </footer>
    </main>
    <script src="app.js"></script>
</body>
</html>