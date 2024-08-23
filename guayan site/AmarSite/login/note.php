<?php
    $note_name = $_POST['note_name'];
    $note_entry = $_POST['note_entry'];

    $conn = new mysqli('forms.cdgs8omyu4nt.us-east-1.rds.amazonaws.com', 'admin', 'GzpRxwg9p24VLoGjUzxA', 'form');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    } else{
        $stmt = $conn->prepare("insert into note(Name, Note, Date)
            values(?,?,?)");
        $stmt->bind_param("sss",$note_name, $note_entry, date("Y/m/d"));
        $stmt->execute();
        echo "It worked dude";
        header("Location: ../dashBoard.php");
        $stmt->close();
        $conn->close();
    }
?>