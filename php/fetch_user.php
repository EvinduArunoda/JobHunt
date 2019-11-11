<?php

include('connectionchat.php');

session_start();

$query = "
SELECT * FROM jobseeker 
WHERE JobseekerID != '".$_SESSION['JobseekerID']."' 
";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$output = '
<table>
 <tr>
  <th>Email</th>
  <th>Action</th>
 </tr>
';

foreach($result as $row)
{
 $status = '';
 $current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
 $current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
 $user_last_activity = fetch_user_last_activity($row['JobseekerID'], $connect);
 $output .= '
 <tr>
  <td>'.$row['Email'].' '.count_unseen_message($row['JobseekerID'], $_SESSION['JobseekerID'], $connect).'</td>

  <td><button type="button" class="btn btn-info btn-xs start_chat" data-touserid="'.$row['JobseekerID'].'" data-toEmail="'.$row['Email'].'">Start Chat</button></td>
 </tr>
 ';
}

$output .= '</table>';

echo $output;

?>
