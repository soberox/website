<?php
    $note_name = $_POST['note_name'];
    $note_entry = $_POST['note_entry'];

    $conn = new mysqli('localhost', 'root', 'kU&p7W^Yt>5KHJGn-Q#Zm@', 'form');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    } else{
        $stmt = $conn->prepare("insert into note(Name, Note, Date)
            values(?,?,?)");
        $stmt->bind_param("sss",$note_name, $note_entry, date("Y/m/d"));
        $stmt->execute();
        echo "It worked dude";
        header("Location: dashBoard.php");
        $stmt->close();
        $conn->close();
    }
?>