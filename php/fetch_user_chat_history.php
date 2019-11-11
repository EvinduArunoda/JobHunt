<?php

include('connectionchat.php');

session_start();

echo fetch_user_chat_history($_SESSION['JobseekerID'], $_POST['to_JobseekerID'], $connect);

?>
