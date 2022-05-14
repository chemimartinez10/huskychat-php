<?php
    $conn = mysqli_connect('containers-us-west-49.railway.app', 'root', 'lfEFtgDSzEdOdvoTrfCN', 'railway',6824);
    if(!$conn){
        echo "database connected" . mysqli_connect_error();
    }
?>