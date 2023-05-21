<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="manage.css?v=<?php echo time() ?>">
    <link rel="shortcut icon" href="Assets/logo.png">
    <title>Manage Pc Owners</title>
</head>
<body>
    <?php
    echo file_get_contents('header.php');
    ?>
    <main class="main">
    <?php
    if(isset($_GET['msg'])){
        echo '
            <div class="pop_up">
                <div class="remove" title="remove">
                    <span class="fa fa-times"></span>
                </div>
                <p>Updated Successfully.</p>
                <div class="slider_counter">
                    <span class="mover"><span>
                </div>
            </div>
        ';
    }
    if(isset($_GET['delmsg'])){
        echo '
            <div class="pop_up">
                <div class="remove" title="remove">
                    <span class="fa fa-times"></span>
                </div>
                <p>All data deleted<br>successfully.</p>
                <div class="slider_counter">
                    <span class="mover"><span>
                </div>
            </div>
        ';
    }
    ?>
        <div class="container">
            <div class="actions">
                <button type="submit" name="update" class="update" onclick="location = 'update.php'">Update Data</button>
                <button name="delete" class="delete">Delete Data</button>
                <form action="">
                    <button type="submit">More...</button>
                </form>
            </div>
            <div class="top del">
                <div class="back" title="Back">
                    <a href="manage.php">
                        <span class="fa fa-arrow-left"></span>
                    </a>
                </div>
                <div class="top_title">
                    <h2>Delete Pc Owners Data</h2>
                </div>
            </div>
            <div class="delete-all actions">
                <a href="" class="del-all-link">
                    <button name="delete_all" class="delete_all_btn">Delete All</button>
                </a>
            </div>
            <div class="table_wrapper">
                <table class="table">
                    <thead>
                        <tr class="head_row">
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
                        <?php

                        $query = "SELECT * FROM `pc owners`";
                        $result = mysqli_query($con, $query);
                        if($result){
                            $count = 0;
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
                                        <th scope="row" class="std_id" >'.$id.'</th>
                                        <td>'.$fname.'</td>
                                        <td>'.$lname.'</td>
                                        <td>'.$phone.'</td>
                                        <td>'.$brand.'</td>
                                        <td>'.$serial.'</td>
                                        <td>'.$barcode.'</td>
                                    </tr>';
                            }
                            if($count==0){
                                echo '
                                <script>
                                const deleteBtn = document.querySelector(".delete");
                                const updateBtn = document.querySelector(".update");
                                deleteBtn.setAttribute("disabled", true);
                                updateBtn.setAttribute("disabled", true);
                                </script>
                                <style>
                                .table{
                                    display: none;
                                }
                                .actions button[disabled=true]{
                                    background-color: gray;
                                    opacity: .8;
                                    cursor: not-allowed;
                                }
                                </style>
                                <div class="empty">
                                    <h3>🤷‍♂️</h3>
                                    <h3>No data recorded!</h3>
                                </div>
                                ';
                            }
                        } else {
                            die(mysqli_error($con));
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>


        <footer>
            <div class="spacer"></div>
            <p>&copy; 2022 DBU PC Registration System. All rights reserved.</p>
        </footer>
    </main>
    <script>
        const tblRows = document.querySelectorAll(".body_row"); 
        tblRows.forEach(row => {
            row.setAttribute("title", "See Detail");
            row.addEventListener('click', () => {
                var id = row.childNodes[1].innerHTML;
                if(id != undefined){
                    window.location = `view.php?viewId=${id}`;
                }
                
            })
        })
        
    </script>
    <script src="app.js?v=<?php echo time() ?>"></script>
    <script src="deletion.js?v=<?php echo time() ?>"></script>
</body>
</html>
