<?php



$connect = new PDO("mysql:host=localhost;dbname=jobhunt", "root", "");

function fetch_user_last_activity($JobseekerID, $connect)
{
 $query = "
 SELECT * FROM login_details 
 WHERE JobseekerID = '$JobseekerID' 
 ORDER BY last_activity DESC 
 LIMIT 1
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  return $row['last_activity'];
 }
}

function fetch_user_chat_history($from_JobseekerID, $to_JobseekerID, $connect)
{
 $query = "
 SELECT * FROM chat_message 
 WHERE (from_JobseekerID = '".$from_JobseekerID."' 
 AND to_JobseekerID = '".$to_JobseekerID."') 
 OR (from_JobseekerID = '".$to_JobseekerID."' 
 AND to_JobseekerID = '".$from_JobseekerID."') 
 ORDER BY timestamp DESC
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 $output = '<ul class="list-unstyled">';
 foreach($result as $row)
 {
  $user_name = '';
  if($row["from_JobseekerID"] == $from_JobseekerID)
  {
   $user_name = '<b>You</b>';
  }
  else
  {
   $user_name = '<b>'.get_user_name($row['from_JobseekerID'], $connect).'</b>';
  }
  $output .= '
  <li style="border-bottom:1px dotted #ccc">
   <p>'.$user_name.' - '.$row["chat_message"].'
    <div align="right">
     - <small><em>'.$row['timestamp'].'</em></small>
    </div>
   </p>
  </li>
  ';
 }
 $output .= '</ul>';
 $query = "
 UPDATE chat_message 
 SET status = '0' 
 WHERE from_JobseekerID = '".$to_JobseekerID."' 
 AND to_JobseekerID = '".$from_JobseekerID."' 
 AND status = '1'
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
 return $output;
}

function get_user_name($JobseekerID, $connect)
{
 $query = "SELECT Email FROM login WHERE JobseekerID = '$JobseekerID'";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  return $row['Email'];
 }
}

function count_unseen_message($from_JobseekerID, $to_JobseekerID, $connect)
{
 $query = "
 SELECT * FROM chat_message 
 WHERE from_JobseekerID = '$from_JobseekerID' 
 AND to_JobseekerID = '$to_JobseekerID' 
 AND status = '1'
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
 $count = $statement->rowCount();
 $output = '';
 if($count > 0)
 {
  $output = '<span>'.$count.'</span>';
 }
 return $output;
}



?>
