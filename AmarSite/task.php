<?php
    $task_entry = $_POST['task_entry'];

    $conn = new mysqli('localhost', 'root', 'kU&p7W^Yt>5KHJGn-Q#Zm@', 'form');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    } else{
        $stmt = $conn->prepare("insert into task(task, Date)
            values(?,?)");
        $stmt->bind_param("ss", $task_entry, date("Y/m/d"));
        $stmt->execute();
        echo "It worked dude";
        header("Location: dashBoard.php");
        $stmt->close();
        $conn->close();
    }
?>
