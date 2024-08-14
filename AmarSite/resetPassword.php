<?php
    require "login.php";
    if(isset($_POST['submit'])){
        $response = passwordReset($_POST['email']);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Document</title>
</head>
<body id= "registration_screen">
    <div class="popup_reset" id="form_popup">
        <div class="heading">
            <span>Password reset</span>
        </div>
        <p><i>Please enter your email so we can send you a new password</i></p>
        <form action="" method="post">
            <div class="tasks_text">
                <div>
                    <label for="email">Email *</label>
                    <input id="email" name="email" type="text" value="<?php echo @$_POST['email']; ?>">
                </div>
            </div>
            <button id="submit" type="submit" name="submit">Submit</button>
        </form>
        <a href="login_page.php">Back to login page?</a>
        <?php
            if(@$response=="success"){
                ?>
                    <p class= "success"> Check you email so you can log in with you new password</p>
                <?php
            } else{
                ?>
                    <p class="error"><?php echo@$response; ?></p>
                <?php
            }
        ?>
    </div>
    <script src = "./login.js"></script>
</body>
</html>