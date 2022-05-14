<?php
session_start();
if (isset($_SESSION['unique_id'])) {
    include_once "config.php";
    $outgoing_id = mysqli_escape_string($conn, $_POST['outgoing_id']);
    $incoming_id = mysqli_escape_string($conn, $_POST['incoming_id']);
    $output = "";

    $sql = mysqli_query($conn, "SELECT * FROM messages JOIN users ON unique_id = outgoing_msg_id WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id}) OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY messages.id ASC");

    if(mysqli_num_rows($sql) > 0){
        while($row = mysqli_fetch_assoc($sql)){
            if($row['outgoing_msg_id'] == $outgoing_id){
                //in this case logged user is sender
                $output.='<div class="chat outgoing">
                    <div class="details">
                        <p>'.$row['message'].'</p>
                    </div>
                </div>';
            }else{
                //in this case u receive
                $output.='<div class="chat incoming">
                    <img src="php/images/'.$row['image'].'" alt="">
                    <div class="details">
                        <p>'.$row['message'].'</p>
                    </div>
                </div>';
            }
        }

        echo $output;
    }

} else {
    header('../login.php');
}
?>