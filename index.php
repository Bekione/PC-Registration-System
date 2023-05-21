<?php 
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css?v=<?php echo time() ?>">
    <link rel="shortcut icon" href="Assets/logo.png">
    <title>DBU Pc Registration System</title>
</head>
<body>
    <?php
    echo file_get_contents('header.php');
    echo time();
    ?>
    <main class="main"> 
        <?php
        if(isset($_GET['security'])){
            $security_name = $_GET['security'];
            echo '
                <div class="pop_up">
                    <div class="remove" title="remove">
                        <span class="fa fa-times"></span>
                    </div>
                    <p>Wellcome '.$security_name.'</p>
                    <div class="slider_counter">
                        <span class="mover"><span>
                    </div>
                </div>
            ';
        }
        ?>
        <div class="stats">
            <div class="stat">
                <div class="data">
                    <h3 class="number">
                        <?php 
                        $query = "SELECT * FROM `pc owners`;";
                        $result = mysqli_query($con, $query);
                        if($result){
                            $num = 0;
                            while($row = mysqli_fetch_assoc($result)){
                                $num++;
                            }
                        }

                         echo $num; 
                        ?>
                    </h3>
                    <p class="name">Registerd Pc</p>
                </div>
                <div class="foot">
                    <a href="manage.php">See more</a>
                    <span class="fa fa-arrow-right"></span>
                </div>
            </div>
            <div class="stat">
                <div class="data">
                    <h3 class="number">
                    <?php 
                        $query = "SELECT * FROM `pc owners`;";
                        $result = mysqli_query($con, $query);
                        if($result){
                            $num = 0;
                            while($row = mysqli_fetch_assoc($result)){
                                $num++;
                            }
                        }
                         echo $num; 
                        ?>
                    </h3>
                    <p class="name">Pc registerd this week</p>
                </div>
                <div class="foot">
                    <a href="manage.php">See more</a>
                    <span class="fa fa-arrow-right"></span>
                </div>
            </div>
            <div class="stat">
                <div class="data">
                    <h3 class="number">
                    <?php 
                        $query = "SELECT * FROM `pc owners`;";
                        $result = mysqli_query($con, $query);
                        if($result){
                            $num = 0;
                            while($row = mysqli_fetch_assoc($result)){
                                $num++;
                            }
                        }
                         echo $num; 
                        ?>
                    </h3>
                    <p class="name">Non student owners</p>
                </div>
                <div class="foot">
                    <a href="manage.php">See more</a>
                    <span class="fa fa-arrow-right"></span>
                </div>
            </div>
        </div>
        <div class="feed">
            <div class="feed_main">
                
            </div>
            <div class="feed_right"></div>
        </div>
      
        <footer>
            <div class="spacer"></div>
            <p>&copy; 2022 DBU PC Registration System. All rights reserved.</p>
        </footer>
    </main>
    <script src="app.js"></script>
</body>
</html>
