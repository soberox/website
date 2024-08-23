<?php
    require "login.php";
    if(isset($_POST['submit'])){
        $response = loginUser($_POST['username'], $_POST['password']);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <link rel="stylesheet" type="text/css" href="../styles.css">
    <title>Document</title>
</head>
<body id="home_screen">
    <div class="banner">
        <img src="../images/van_logo.png"></img>
        <h1>Armarcargo</h1>
    </div>
    <div class="background">
        <video src="../images/van_backgroundvid.mp4" muted loop autoplay></video>
    </div>
    <div class="login_button">
        <button class="add_button" id="start_login">LOGIN</button>
    </div>
    <div class="popup_login" id="form_popup">
        <div class="close_btn" id="close_log">&times;</div>
        <div class="heading">
            <span>Login in</span>
        </div>
        <p><i>Please fill all required fields to login in</i></p>
        <form action="" method="post">
            <div class="tasks_text">
                <label for="userName">Username *</label>
                <input id="userName" name="username" type="text" value="<?php echo@$_POST['username'] ?>">
                <label for="password">Password *</label>
                <input id="password" name="password" type="password" value="<?php echo@$_POST['password'] ?>">
            </div>
            <button id="submit" name="submit" type="submit">Submit</button>
        </form>
        <p><i>Don't have an account?</i> <a href="register.php">Create here</a></p>
        <p><a href="resetPassword.php">Forgot password?</a></p>
        <?php
            if(@$response=="success"){
                ?>
                    <p class= "success"> Your registration was successful</p>
                <?php
            } else{
                ?>
                    <p class="error"><?php echo@$response; ?></p>
                <?php
            }
        ?>
    </div>
    <script src = "../js/login.js"></script>
</body>
</html>