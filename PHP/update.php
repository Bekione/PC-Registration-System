<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Css/manage.css?v=<?php echo time();?>">
    <link rel="shortcut icon" href="Assets/logo.png">
    <title>Update Pc Owners</title>
    <style>
        <?php include 'manage.css' ?>
    </style>
</head>
<body>
    <?php
    echo file_get_contents('header.php');
    ?>
    <main class="main">
        <div class="top">
            <div class="back" title="Back">
                <a href="manage.php">
                    <span class="fa fa-arrow-left"></span>
                </a>
            </div>
            <div class="top_title">
                <h2>Update Pc Owners Data.</h2>
            </div>
        </div>
        <div class="container update_box">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Pc Brand</th>
                        <th scope="col">Pc Serial</th>
                        <th scope="col">Barcode</th>
                        <th scope="col" class="operation">Update</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM `pc owners`";
                    $result = mysqli_query($con, $query);
                    if($result){
                        while($row = mysqli_fetch_assoc($result)){
                            $id = $row['Student_ID'];
                            $fname = $row['First_Name'];
                            $lname = $row['Last_Name'];
                            $phone = $row['Phone_Number'];
                            $brand = $row['Pc_Brand'];
                            $serial = $row['Pc_Serial'];
                            $barcode = $row['Barcode'];

                            echo '<tr>
                                    <th scope="row">'.$id.'</th>
                                    <td>'.$fname.'</td>
                                    <td>'.$lname.'</td>
                                    <td>'.$phone.'</td>
                                    <td>'.$brand.'</td>
                                    <td>'.$serial.'</td>
                                    <td>'.$barcode.'</td>
                                    <td class="operation">
                                        <a href="_UPDATE.php?updateId='.$id.'" class="update" title="Update '.$fname.'">
                                            <span class="fa fa-edit"></span>
                                        </a>
                                    </td>
                                </tr>
                                ';
                        }
                    } else {
                        die(mysqli_error($con));
                    }
                    ?>

                </tbody>
            </table>
        </div>


        <footer>
            <div class="spacer"></div>
            <p>&copy; 2022 DBU PC Registration System. All rights reserved.</p>
        </footer>
    </main>

    <script src="app.js"></script>
</body>
</html>
