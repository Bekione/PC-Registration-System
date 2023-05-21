<!--Dave Pin 1133007799-->
<?php 
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="result.css?v=<?php echo time(); ?>">
    <link rel="shortcut icon" href="Assets/logo.png">
    <title>DBU Pc Registration System</title>
</head>
<body>
    <?php
    echo file_get_contents('header.php');
    ?>
    <main class="main"> 
        <div class="view_container">
        <table class="table">
            <?php
            $count = 0;
            if(isset($_POST['search'])){
                $filter = $_POST['search_filter'];
                $question = $_POST['search_val'];

                if($filter == 'name'){
                    $query = "SELECT * FROM `pc owners` WHERE First_Name = '$question' ";
                }
                else if($filter == 'serial'){
                    $query = "SELECT * FROM `pc owners` WHERE Pc_Serial = '$question' ";
                }
                else if($filter == 'barcode'){
                    $query = "SELECT * FROM `pc owners` WHERE barcode = '$question' ";
                }
                else if($filter == 'phone'){
                    $query = "SELECT * FROM `pc owners` WHERE Phone_Number = '$question' ";
                } 
                else if($filter == 'brand'){
                    $query = "SELECT * FROM `pc owners` WHERE Pc_Brand = '$question' ";
                }               
                else {
                    $query = "SELECT * FROM `pc owners` WHERE Student_ID = '$question' ";
                }
                
                $result = mysqli_query($con, $query);
                if($result){
                    while($row = mysqli_fetch_array($result)){
                        $count++;
                        $id = $row['Student_ID'];
                        $fname = $row['First_Name'];
                        $lname = $row['Last_Name'];
                        $phone = $row['Phone_Number'];
                        $brand = $row['Pc_Brand'];
                        $serial = $row['Pc_Serial'];
                        $barcode = $row['Barcode'];

                        echo '<tr class="body_row">
                                <th scope="row">'.$id.'</th>
                                <td>'.$fname.'</td>
                                <td>'.$lname.'</td>
                                <td>'.$phone.'</td>
                                <td>'.$brand.'</td>
                                <td>'.$serial.'</td>
                                <td>'.$barcode.'</td>
                            </tr>';
                    }                    
                }
                if($result){
                    if($count == 0){
                        echo '
                            <div class="wrong_search_msg">
                                <div class="msg">
                                    <p>🤷‍♂️</p>
                                    <h2>No record found :(</h2>
                                </div>
                                <div class="recommendation">
                                    <p>Try:</p>
                                    <ul>
                                        <li>Using another filter</li>
                                        <li>Checking your spellings</li>
                                        <li><a href="#">Contact help center</a></li>
                                    </ul>
                                </div>
                            </div>
                        ';
                    }
                    else{
                        echo '
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Phone Number</th>
                                    <th scope="col">Pc Brand</th>
                                    <th scope="col">Pc Serial</th>
                                    <th scope="col">Barcode</th>
                                </tr>
                            </thead>
                            <tbody>
                        ';
                    }
                }
                else {
                    die(mysqli_error($con));
                }

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
    <script>
        const tblRows = document.querySelectorAll(".body_row"); 
        tblRows.forEach((row, index) => {
            row.addEventListener('click', () => {
                const id = row.childNodes[1].innerHTML;
                window.location = `view.php?viewId=${id}`;
            })
        })
    </script>
</body>
</html>