<?php
    require("login.php");
    if(isset($_GET['confirm-account-deletion'])){
        deleteAccount();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Document</title>
</head>
<body id= "registration_screen">
    <div class="popup_register" id="form_popup">
        <div class="heading">
            <span>Delete account</span>
        </div>
        <p><i>are you sure you want to delete your account</i></p>
        <div class="logout_container">
            <div class="goback">
            <a href="#" onclick="window.history.go(-1); return false;">No</a>
            </div>
            <div class="delete">
                <a href="?confirm-account-deletion">Yes</a>
            </div>
        </div>
        <?php
            if(@$response=="success"){
                ?>
                    <p class= "success"> This account is deleted. </p>
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
