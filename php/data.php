<?php

while ($row = mysqli_fetch_assoc($sql)) {
    ($row['status'] == 'Offline now') ? $online = 'offline': $online = "";
    $query = "SELECT * FROM messages WHERE (outgoing_msg_id={$row['unique_id']} AND incoming_msg_id=$outgoing_id) OR (outgoing_msg_id=$outgoing_id AND incoming_msg_id={$row['unique_id']}) ORDER BY id DESC LIMIT 1";

    $sql2 = mysqli_query($conn, $query);
    $row2 = mysqli_fetch_array($sql2);
    $you="";
    if(mysqli_num_rows($sql2) > 0){
        $result = $row2['message'];
        ($row2['outgoing_msg_id'] == $outgoing_id) ? $you = 'You: ' : $you = '';
    }else{
        $result = 'No message available';
    }
    (strlen($result) > 25) ? $msg = substr($result, 0, 25)."...": $msg=$result;
    $output .= '<a href="chat.php?user_id='.$row['unique_id'].'">
                    <div class="content">
                        <img src="php/images/' . $row['image'] . '" alt="">
                        <div class="details">
                            <span>' . $row['fname'] . ' ' . $row['lname'] . '</span>
                            <p>' . $you . $msg . '</p>
                        </div>
                    </div>
                    <div class="status-dot '.$online.'">
                        <i class="fas fa-circle"></i>
                    </div>
                </a>';
}

?>