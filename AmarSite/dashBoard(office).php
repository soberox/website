<?php
    require("login.php");
    if(!isset($_SESSION["user"])){
        header("location: login_page.php");
        exit();
    }
    if(isset($_GET['logout'])){
        logoutUser();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <title>Armarcargo</title>
</head>
<body id="company">
    <div class="banner">
        <img src="van_logo.png"></img>
        <h1>Armarcargo</h1>
        <div class="login_details">
            <button id="operations">User: <?php echo $_SESSION["user"] ?></button>
            <div class="dropDown_menu">
                <div class="menu_links">
                    <a href="delete_account.php"> Delete<br>account </a>
                </div>
                <div class="menu_links">
                    <a href="?logout"> Log out </a>
                </div>
            </div>
        </div>
    </div>
    <div class="menu" id="menu">
        <button id="operations">Operations</button>
        <div class="dropDown_menu">
            <div class="menu_links"><a href= "driver(office).php">Drivers</a></div>
            <div class="menu_links"><a href= "dashBoard(office).php">Dashboard</a></div>
            <div class="menu_links"><a href= "softWare(office).php">Software</a></div>
        </div>
    </div>
    <div class="tittle">Dashboard</div>
    <div class="container">
        <div class="tasks">
                <div class="subheading">
                    <span>Tasks</span>
                </div>
                <div class="table_container">
                    <table>
                        <thead>
                            <tr class="tasks_header">
                                <th>Date</th>
                                <th>Task</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                               $servername = "192.168.254.81";
                                $username = "root";
                                $password = "kU&p7W^Yt>5KHJGn-Q#Zm@";
                                $database = "form";


                                //creates the connection
                                $connection = new mysqli($servername, $username, $password, $database);

                                //checks the connection
                                if ($connection->connect_error){
                                    die("connection failed: " . $connection->connect_error);
                                }

                                // read all row from database table
                                $sql = "SELECT * FROM task";
                                $result = $connection->query($sql);

                                if(!$result){
                                    die("Invalid query: " . $connection->error);
                                }

                                //read data pf each row
                                for($i=0;$i<13;$i++){
                                    $row = $result->fetch_assoc();
                                    if (empty($row["task"])){
                                        echo"
                                        <tr>
                                            <td> </td>
                                            <td> </td>
                                        </tr>
                                        ";
                                    }else{
                                        echo"
                                        <tr>
                                            <td>". $row["date"] ."</td>
                                            <td>". $row["task"] ."</td>
                                        </tr>
                                        ";
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
        </div>
        <div class="notes">
                <div class="subheading">
                    <span>Notes</span>
                </div>
                <div class="table_container">
                    <table>
                        <thead>
                            <tr class="notes_header">
                                <th>Name</th>
                                <th>Note</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                               $servername = "192.168.254.81";
                                $username = "root";
                                $password = "kU&p7W^Yt>5KHJGn-Q#Zm@";
                                $database = "form";


                                //creates the connection
                                $connection = new mysqli($servername, $username, $password, $database);

                                //checks the connection
                                if ($connection->connect_error){
                                    die("connection failed: " . $connection->connect_error);
                                }

                                // read all row from database table
                                $sql = "SELECT * FROM note";
                                $result = $connection->query($sql);

                                if(!$result){
                                    die("Invalid query: " . $connection->error);
                                }

                                //read data pf each row
                                for($i=0;$i<13;$i++){
                                    $row = $result->fetch_assoc();
                                    if (empty($row["Note"])){
                                        echo"
                                        <tr>
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                        </tr>
                                        ";
                                    }else{
                                        echo"
                                        <tr>
                                            <td>". $row["Name"] ."</td>
                                            <td>". $row["Note"] ."</td>
                                            <td>". $row["Date"] ."</td>
                                        </tr>
                                        ";
                                    }
                                }
                            ?>
                        </tbody>
                        <button class="add_button" id="add_note" type="submit">Add notes</button>
                    </table>
                    <div class="popup_note" id="form_popup">
                        <div class="close_btn" id="close_note">&times;</div>
                        <div class="heading"><span>Add New Note</span></div>
                        <form action="note.php" method="post">
                            <div class="name_text">
                                <label for="note_name">Name *</label>
                                <input id="note_name" name="note_name" type="text" required>
                            </div>
                            <div class="note_text">
                                <label for="note_entry">Note *</label>
                                <input id="note_entry" name="note_entry" type="text" required>
                            </div>
                            <input id="submit" type="submit" value="Submit">
                        </form>
                    </div>
                </div>
        </div>
        <div class="orders">
            <div class="subheading">
                <span>Recent Orders</span>
            </div>
            <div class="table_container">
                <table>
                        <thead>
                            <tr id="orders_header">
                                <th>Date</th>
                                <th>Number</th>
                                <th>Customer</th>
                                <th>Due Date</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                               $servername = "192.168.254.81";
                                $username = "root";
                                $password = "kU&p7W^Yt>5KHJGn-Q#Zm@";
                                $database = "form";


                                //creates the connection
                                $connection = new mysqli($servername, $username, $password, $database);

                                //checks the connection
                                if ($connection->connect_error){
                                    die("connection failed: " . $connection->connect_error);
                                }

                                // read all row from database table
                                $sql = "SELECT * FROM invoice ORDER BY id DESC";
                                $result = $connection->query($sql);

                                if(!$result){
                                    die("Invalid query: " . $connection->error);
                                }

                                //read data pf each row
                                for($i=0;$i<13;$i++){
                                    $row = $result->fetch_assoc();
                                    if (empty($row["DocNumber"])){
                                        echo"
                                        <tr>
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                        </tr>
                                        ";
                                    }else{
                                        echo"
                                        <tr>
                                            <td>". $row["TxnDate"] ."</td>
                                            <td>". $row["DocNumber"] ."</td>
                                            <td>". $row["CustomerRefName"] ."</td>
                                            <td>". $row["DueDate"] ."</td>
                                            <td>". $row["TotalAmt"] ."</td>
                                        </tr>
                                        ";
                                    }
                                }
                            ?>
                        </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src = "./form(office).js"></script>
</body>
</html>