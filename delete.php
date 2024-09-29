<?php 

include "config.php"; 

if (isset($_GET['id'])) {

    $userid = $_GET['id'];

    $sql = "DELETE FROM `users` WHERE `userid`='$userid'";

    $result = $conn->query($sql);

    if ($result == TRUE) {
        echo "Record deleted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

} 

?>
