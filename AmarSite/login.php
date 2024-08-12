<?php
    require "config.php";
    
    function connect(){
        $connection = new mysqli(servername, username, password, database);

        if ($connection->connect_errno != 0){
            $error = $connection->connect_error;
            $error_date = date("F j. Y, g:i a");
            $message = "{$error} | {$error_date} \r\n";
            file_put_contents("db-log.txt", $message, FILE_APPEND);
            return false;
        }
        return $connection;
    }
    function registerUser($email, $username, $password, $confirm_password){
        $type = "broker";
        $connection = connect();
        $args = func_get_args();

        $args = array_map(function($value){
            return trim($value);
        }, $args);

        foreach($args as $value){
            if(empty($value)){
                return "All fields are requred";
            }
        }

        foreach($args as $value){
            if(preg_match("/([<|>])/", $value)){
                return "<> characters are not allowed";
            }
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return "Email is not valid";
        }

        $stmt = $connection->prepare("SELECT email FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();
        if($data != null){
            return "email already exits, please use a different email";
        }

        if(strlen($username) > 45){
            return "Username is to long";
        }

        $stmt = $connection->prepare("SELECT email FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();
        if($data != null){
            return "username already exits, please use a different username";
        }

        if(strlen($password) > 45){
            return "Password  is to long";
        }

        if($password != $confirm_password){
            return "passwords don't match";
        }


        $stmt = $connection->prepare("INSERT INTO users(username, password, email, type) Values(?,?,?,?)");
        $stmt->bind_param("ssss", $username, $password, $email, $type);
        $stmt->execute();
        if($stmt->affected_rows != 1){
            return "an error occurred. Please try again";
        } else{
            header("location: login_page.php");
            exit();
        }
    }
    function loginUser($username, $password){
        $connection = connect();
        $username = trim($username);
        $password = trim($password);

        if($username == "" || $password == ""){
            return "Both fields are required";
        }

        $username = filter_var($username, FILTER_SANITIZE_STRING);
        $password = filter_var($password, FILTER_SANITIZE_STRING);

        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt =$connection->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();
        if($data == NULL){
            return "Wrong username or password";
        }
        if((password_verify($password, $data["password"]) == true) || (($password == $data["password"]))){
            $_SESSION["user"] = $username;
            if($data["type"] == "broker"){
                header("location: driver(operators).php");
                exit();
            }
            if($data["type"] == "office"){
                header("location: dashBoard(office).php");
                exit();
            }
            if($data["type"] == "manager"){
                header("location: dashBoard.php");
                exit();
            }
        } else{
            return "Wrong username or password";
        }
    }
    function logoutUser(){
        session_destroy();
        header("location: login_page.php");
    }
    function passwordReset($email){
        $connection = connect();
        $email = trim($email);

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return "Email is not valid";
        }

        $stmt = $connection->prepare("SELECT email FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();

        if($data == NULL){
            return "Email doesn't exist in the database";
        }

        $str = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz";
        $password_length = 12;
        $shuffled_str = str_shuffle($str);
        $new_pass = substr($shuffled_str, 0, $password_length);

        $subject = "Password recovery";
        $body = "You can log in with your new password". "\r\n";
        $body .= "From: Admin \r\n";

        $headers = "MIME-Version: 1.0". "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: Admin \r\n";

        $send = mail($email, $subject, $body, $headers);
        if($send == FALSE){
            return "Email not send. Please try again";
        } else{
            $stmt = $connection->prepare("UPDATE users SET password = ? WHERE email = ?");
            $stmt->bind_param("ss",$new_pass, $email);
            $stmt->execute();
            if($stmt->affected_rows != 1){
                return "There was a connection error, please try again.";
            }else{
                return "success";
            }
        }
    }
    function deleteAccount(){
        $connection = connect();

        $sql = "DELETE FROM users WHERE username = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("s", $_SESSION['user']);
        $stmt->execute();

        if($stmt->affected_rows != 1){
            return "An error occurred/ Please try again";
        }else{
            session_destroy();
            header("location: delete-message.php");
            exit();
        }
    }
?>