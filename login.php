<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css?v=<?php echo time();  ?>">
    <link rel="shortcut icon" href="Assets/logo.png">
    <title>Login</title>
</head>
<body>
    <h2 class="title">DBU Pc Registration System</h2> 
    <div class="login">
        <h1>Login</h1>
        <form action="authenticate.php" method="post">
            <div class="err_display">
                <p class="err_msg">
                    <?php
                    if(isset($_GET['err'])){
                        echo'
                        <style>
                            .err_msg{
                                padding: 5px;
                                color: white;
                                font-size: 15px;
                            }
                        </style>
                        ';
                        echo "Wrong username or password!";
                    }
                    ?>
                </p>
            </div>
            <div class="input first">
                <label for="username">
                    <span class="fa fa-user"></span>
                </label>
                <input type="text" name="username" id="username" placeholder="username" id="username" autocomplete="off" >
            </div>
            <div class="input">
                <label for="password">
                    <span class="fa fa-lock"></span>
                </label>
                <input type="password" name="password" id="password" placeholder="Password" id="password" autocomplete="off" >
            </div>
            <div class="foot">
                <input type="submit" name="admin_login" value="Login">
            </div>
        </form>
    </div>
</body>
</html> 