<?php
    require "login.php";
    if(isset($_POST['submit'])){
        $response = registerUser($_POST['email'], $_POST['username'], $_POST['password'], $_POST['confirm_password']);
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
<body id= "registration_screen">
    <div class="popup_register" id="form_popup">
        <div class="heading">
            <span>Sign up</span>
        </div>
        <p><i>Please fill all required fields to sign up</i></p>
        <form action="" method="post">
            <div class="tasks_text" id="registration_container">
                <div>
                    <label for="email">Email *</label>
                    <input id="email" name="email" type="text" value="<?php echo@$_POST['email'] ?>">
                </div>
                <div>
                    <label for="userName">Username *</label>
                    <input id="userName" name="username" type="text" value="<?php echo@$_POST['username'] ?>">
                </div>
                <div>
                    <label for="password">Password *</label>
                    <input id="password" name="password" type="password" value="<?php echo@$_POST['password'] ?>">
                </div>
                <div>
                    <label for="confirm_password">Confirm password *</label>
                    <input id="confirm_password" name="confirm_password" type="password" value="<?php echo@$_POST['confirm_password'] ?>">
                </div>
            </div>
            <button id="submit" type="submit" name="submit">Submit</button>
        </form>
        <p><i>already have an account?</i> <a href="login_page.php">log in</a></p>
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