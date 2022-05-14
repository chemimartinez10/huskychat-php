<?php
    session_start();
    include_once "config.php";
    $fname = mysqli_escape_string($conn, $_POST['fname']);
    $lname = mysqli_escape_string($conn, $_POST['lname']);
    $email = mysqli_escape_string($conn, $_POST['email']);
    $password = mysqli_escape_string($conn, $_POST['password']);

    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
        //validate email
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            //correct email
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE users.email = '{$email}'");
            if(mysqli_num_rows($sql) > 0){
                //Already exist an equal email on database
                echo "$email - This email is already taken";
            }
            else{
                //let going to check file
                if(isset($_FILES['image'])){
                    //file uploaded
                    $img_name = $_FILES['image']['name'];
                    $tmp_name = $_FILES['image']['tmp_name'];

                    $img_explode = explode('.', $img_name);
                    $img_ext = end($img_explode);

                    $extensions = ['jpg', 'jpeg', 'png'];
                    if(in_array($img_ext, $extensions)){
                        $time = time(); //making unique id
                        $new_img_name = $time.$img_name;
                        if(move_uploaded_file($tmp_name, 'images/'.$new_img_name)){
                            $status = 'Active now';
                            $unique_id = rand(time(), 10000000);
                            //Insert into database new user data
                            $sql2 = mysqli_query($conn,"INSERT INTO users (unique_id, fname, lname, email, password, image, status) VALUES ({$unique_id}, '{$fname}', '{$lname}', '{$email}', '{$password}', '{$new_img_name}', '{$status}')");
                            
                            //if was inserted
                            if($sql2){
                                $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                if(mysqli_num_rows($sql3) > 0){
                                    //convert query into associative array
                                    $row = mysqli_fetch_assoc($sql3);
                                    //create a session variable to identify user
                                    $_SESSION['unique_id'] = $row['unique_id'];
                                    echo "success";
                                }
                            }
                        }
                        else{
                            echo "Error uploading image";
                        }

                    }
                    else{
                        echo "Please upload an image - jpg, jpeg, png";
                    }
                }
                else{
                    echo "Please upload an image";
                }
            }
        }
        else{
            echo "$email - This is not a valid email";
        }
    }
    else{
        echo "Please fill all fields";
    }
?>