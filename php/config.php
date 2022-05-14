<?php
    $conn = mysqli_connect('localhost', 'root', null, 'chatapp');
    if(!$conn){
        echo "database connected" . mysqli_connect_error();
    }
?>