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
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.load('current', {
       'packages': ['geochart'],
       // Note: Because markers require geocoding, you'll need a mapsApiKey.
       // See: https://developers.google.com/chart/interactive/docs/basic_load_libs#load-settings
       'mapsApiKey': 'AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY'
     });
      google.charts.setOnLoadCallback(drawChart);
      google.charts.setOnLoadCallback(drawRegionsMap);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Balance'],
          <?php
            $servername = "192.168.254.81";
            $username = "root";
            $password = "root";
            $database = "form";

            //creates the connection
            $connection = new mysqli($servername, $username, $password, $database);

            //checks the connection
            if ($connection->connect_error){
                die("connection failed: " . $connection->connect_error);
            }

            // read all row from database table
            $sql = "SELECT * FROM monthly_balance ORDER BY Year DESC";
            $result = $connection->query($sql);

            if(!$result){
                die("Invalid query: " . $connection->error);
            }

            //read data pf each row
            for($i=0;$i<4;$i++){
                $row = $result->fetch_assoc();
                echo"
                    ['".$row["Year"]."-".$row["Month"]."',  ".$row["Balance"]."],
                ";
            }
          ?>
        ]);

        var data2 = google.visualization.arrayToDataTable([
            ['State', 'Loads'],
          <?php
            $servername = "192.168.254.81";
            $username = "root";
            $password = "root";
            $database = "form";

            //creates the connection
            $connection = new mysqli($servername, $username, $password, $database);

            //checks the connection
            if ($connection->connect_error){
                die("connection failed: " . $connection->connect_error);
            }

            // read all row from database table
            $sql = "SELECT * FROM state_count";
            $result = $connection->query($sql);

            if(!$result){
                die("Invalid query: " . $connection->error);
            }

            //read data pf each row
            while($row = $result->fetch_assoc()){             
                    echo"
                    ['US-".$row["State"]."',  ".$row["Count(*)"]."],
                ";
            }
          ?>
        ]);

        var data3 = google.visualization.arrayToDataTable([
            ['Element', 'Density', { role: 'style' }],
            <?php
                $servername = "192.168.254.81";
                $username = "root";
                $password = "root";
                $database = "form";

                //creates the connection
                $connection = new mysqli($servername, $username, $password, $database);

                //checks the connection
                if ($connection->connect_error){
                    die("connection failed: " . $connection->connect_error);
                }

                // read all row from database table
                $sql = "SELECT * FROM recurring_company";
                $result = $connection->query($sql);

                if(!$result){
                    die("Invalid query: " . $connection->error);
                }

                for($i=0;$i<5;$i++){
                    $row = $result->fetch_assoc();
                    echo"
                        ['".$row["CustomerRefName"]."',  ".$row["COUNT(*)"].", 'color: teal' ],
                    ";
                }
            ?>
        ]);

        var options = {
            title: 'Balance by month',
            curveType: 'function',
            legend: { position: 'bottom' },
        };

        var options2 = {
            region: 'US',
            title: 'Loads by State',
            resolution: 'provinces',
            colorAxis: {colors: ['white', 'green']},
            backgroundColor: { fill:'transparent' }
        };

        var options3 = {
            title: "Top 5 Companies by Loads",
            bar: {groupWidth: "95%"},
            legend: { position: "top" },
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);

        var chart2 = new google.visualization.GeoChart(document.getElementById('regions_div'));

        chart2.draw(data2, options2);

        var chart3 = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));

        chart3.draw(data3, options3);
      }

    </script>

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
            <div class="menu_links"><a href= "driver.php">Drivers</a></div>
            <div class="menu_links"><a href= "dashBoard.php">Dashboard</a></div>
            <div class="menu_links"><a href= "softWare.php">Software</a></div>
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
                                $password = "root";
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
                        <button class="add_button" id="add_task">Add tasks</button>
                    </table>
                    <div class="popup_task" id="form_popup">
                        <div class="close_btn" id="close_task">&times;</div>
                        <div class="heading"><span>Add New Tasks</span></div>
                        <form action="task.php" method="post">
                            <div class="tasks_text">
                                <label for="task_entry">Task *</label>
                                <input id="task_entry" name="task_entry" type="text" required>
                            </div>
                            <input id="submit" type="submit" value="Submit">
                        </form>
                    </div>
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
                                $password = "root";
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
                        <button class="add_button" id="add_note">Add notes</button>
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
                                $password = "root";
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
    <div class="report_container">
        <div id="report_heading">
            <label id="lable">Report</label>
        </div>
        <div class="report">
                <div id="curve_chart" style="width: 45%; height: 40vh;"></div>
                <div id="columnchart_values" style="width: 45%; height: 40vh;"></div>
                <div id="regions_div" style="width: 45vw; height: 50vh;"></div>
        </div>
    </div>
    <script src = "./form.js"></script>
</body>
</html>