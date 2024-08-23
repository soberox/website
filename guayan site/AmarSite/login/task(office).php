<?php
    $task_entry = $_POST['task_entry'];

    $conn = new mysqli('forms.cdgs8omyu4nt.us-east-1.rds.amazonaws.com', 'admin', 'GzpRxwg9p24VLoGjUzxA', 'form');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    } else{
        $stmt = $conn->prepare("insert into task(task, Date)
            values(?,?)");
        $stmt->bind_param("ss", $task_entry, date("Y/m/d"));
        $stmt->execute();
        echo "It worked dude";
        header("Location: ../dashBoard(office).php");
        $stmt->close();
        $conn->close();
    }
?>
