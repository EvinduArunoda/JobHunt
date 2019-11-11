<?php

include('connectionchat.php');

session_start();

$data = array(
 ':to_JobseekerID'  => $_POST['to_JobseekerID'],
 ':from_JobseekerID'  => $_SESSION['JobseekerID'],
 ':chat_message'  => $_POST['chat_message'],
 ':status'   => '1'
);

$query = "
INSERT INTO chat_message 
(to_JobseekerID, from_JobseekerID, chat_message, status) 
VALUES (:to_JobseekerID, :from_JobseekerID, :chat_message, :status)
";

$statement = $connect->prepare($query);

if($statement->execute($data))
{
 echo fetch_user_chat_history($_SESSION['JobseekerID'], $_POST['to_JobseekerID'], $connect);
}

?>
