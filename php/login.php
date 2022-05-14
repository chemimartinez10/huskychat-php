<?php
    session_start();
    include_once "config.php";
    $email = mysqli_escape_string($conn, $_POST['email']);
    $password = mysqli_escape_string($conn, $_POST['password']);

    //real work here
    if(!empty($email) && !empty($password)){
        //validate email
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            //correct email format
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}'");
            if(mysqli_num_rows($sql) > 0){
                //correct email and user and password
                $sql2 = mysqli_query($conn, "UPDATE users SET status = 'Active now' WHERE email = '{$email}' AND password = '{$password}'");
                if($sql2){
                    $user = mysqli_fetch_assoc($sql);
                    $_SESSION['unique_id'] = $user['unique_id'];
                    echo "success";
                }
                else{
                    echo "Database update status error";
                }
            }
            else{
                echo "There's no account with these credencials";
            }
        }
        else{
            echo "$email - Please enter a valid email address!";
        }
    }
    else{
        echo "Please fill all fields";
    }
?>