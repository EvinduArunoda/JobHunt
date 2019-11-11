<?php

include('connectionchat.php');

session_start();

$message = '';

if(isset($_SESSION['JobseekerID']))
{
 header('location:index.php');
}

if(isset($_POST["login"]))
{
 $query = "
   SELECT * FROM login 
    WHERE Email = :Email
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
    array(
      ':Email' => $_POST["Email"]
     )
  );
  $count = $statement->rowCount();
  if($count > 0)
 {
  $result = $statement->fetchAll();
    foreach($result as $row)
    {
      if(password_verify($_POST["password"], $row["password"]))
      {
        $_SESSION['JobseekerID'] = $row['JobseekerID'];
        $_SESSION['Email'] = $row['Email'];
        $sub_query = "
        INSERT INTO login_details 
        (JobseekerID) 
        VALUES ('".$row['JobseekerID']."')
        ";
        $statement = $connect->prepare($sub_query);
        $statement->execute();
        $_SESSION['login_details_id'] = $connect->lastInsertId();
        header("location:index.php");
      }
      else
      {
       $message = "<label>Wrong Password</label>";
      }
    }
 }
 else
 {
  $message = "<label>Wrong Email</labe>";
 }
}

?>

<html>  
    <head>  
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </head>  
    <body>  
   <div class="panel panel-default">
      <div class="panel-heading">Login</div>
    <div class="panel-body">
     <form method="post">
      <p class="text-danger"><?php echo $message; ?></p>
      <div class="form-group">
       <label>Enter Email</label>
       <input type="text" name="Email" class="form-control" required />
      </div>
      <div class="form-group">
       <label>Enter Password</label>
       <input type="password" name="password" class="form-control" required />
      </div>
      <div class="form-group">
       <input type="submit" name="login" class="btn btn-info" value="Login" />
      </div>
     </form>
    </div>
   </div>

    </body>  
</html>