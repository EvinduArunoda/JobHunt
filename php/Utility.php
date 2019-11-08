<?php 
	 require_once('DBController.php');
	 require_once('config.php');
	?>




<?php 
	class Utility{
		private $controller;

		public function __construct(){
			$this->controller= new DBController();
		}

		public function addJS($email,$password,$firstname,$lastname,$dob,$gender,$address,$nic){
			$query="INSERT INTO jobseeker (Email,Password,FirstName,LastName,DOB,Gender,Address,NIC)VALUES ('$email','$password','$firstname','$lastname','$dob','$gender','$address','$nic')";
			$result=$this->controller->insertQuery($query);
			if($result){
				return true;
			}else{
				return false;
			}
		}
		
		public function getBasicInfoByEmail($email){
			$query="SELECT * FROM seller WHERE store_email='$email'";
			$result=$this->controller->runQuery($query);
			if($result){
				return $result;
			}else{
				return null;
			}
		}
		//when logging in 
		public function compareLoginDetails($email,$psw){
			$query="SELECT * FROM jobseeker WHERE Email='$email' AND Password='$psw'";
			$result=$this->controller->numRows($query);

			return $result;
		}
		

		public function checkAdminPsw($password){
			if ($password=="password123"){
				return true;
			}else{
				return false;
			}
		}

		
		public function checkSignup($email){
			$query="SELECT * FROM jobseeker WHERE Email LIKE '%$email%'";
			$result=$this->controller->numRows($query);
			return $result;
		}


	}

?>