<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $message = mysqli_escape_string($conn, $_POST['message']);
        $outgoing_id = mysqli_escape_string($conn, $_POST['outgoing_id']);
        $incoming_id = mysqli_escape_string($conn, $_POST['incoming_id']);
        if(!empty($message)){
            $sql = mysqli_query($conn, "INSERT INTO messages (outgoing_msg_id, incoming_msg_id, message) VALUES ('{$outgoing_id}', '{$incoming_id}', '{$message}')") or die();

        }

    }else{
        header('../login.php');
    }

?>