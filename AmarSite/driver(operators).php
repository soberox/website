<?php
    require("login.php");
    if(!isset($_SESSION["user"])){
        header("location: login_page.php");
        exit();
    }

    if(isset($_GET['logout'])){
        logoutUser();
    }

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
<body>
<div class="banner">
        <img src="van_logo.png"></img>
        <h1>Armarcargo</h1>
        <div class="login_details">
            <input type='button' value='"User: <?php echo $_SESSION["user"] ?>"'>
            <div class="dropDown">
                <?php
                    if(isset($_GET['delete-account'])){
                        ?>
                            <p class="confirm-deletion">
                                are you sure?
                                <a class="confirm-deletion" href="?confirm-account-deletion">Delete account</a>
                            </p>
                        <?php
                    }else{
                        ?>
                            <a href="?delete-acount">Delete account</a>
                        <?php
                    }
                ?>
                <a href="?logout"> Log out </a>
            </div>
        </div>
    </div>
    <div class="tittle">Drivers</div>
    <div class="container">
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "kU&p7W^Yt>5KHJGn-Q#Zm@";
        $database = "quadro";

        //creates the connection
        $connection = new mysqli($servername, $username, $password, $database);

        //checks the connection
        if ($connection->connect_error){
            die("connection failed: " . $connection->connect_error);
        }

        // read all row from database table
        $sql = "SELECT * FROM crm";
        $result = $connection->query($sql);
        $result->data_seek(21);

        if(!$result){
            die("Invalid query: " . $connection->error);
        }

        //read data pf each row
        while($row = $result->fetch_assoc()){
            if (empty($row["A"])){
                break;
            }
            echo "<form class='driver'>
                <div class='driver_img'></div>
                <input type='button' value='" . $row["C"] . "'>
                <div class='dropDown'>
                    <table>
                        <tr>
                            <th class='row1'>measurements: </th>
                            <td class='row2'>" . $row["A"] . "</td>
                        </tr>
                        <tr>
                            <th class='row1'>phone: </th>
                            <td class='row2'><a href='tel:" . $row["D"] . "'>" . $row["D"] . "</a></td>
                        </tr>
                        
                        <tr>
                            <th class='row1'>location: </th>
                            <td class='row2'><a href='https://www.google.com/maps/search/?api=1&query=" . $row["E"] . "'>" . $row["E"] . "</a></td>
                        </tr>
                        <tr>
                            <th class='row1'>note: </th>
                            <td class='row2'>" . $row["F"] . "</td>
                        </tr>
                    </table>
                </div>
            </form>";
        }
        ?>
        </div>
    <script> src = "./script.js"</script>
</body>
</html>