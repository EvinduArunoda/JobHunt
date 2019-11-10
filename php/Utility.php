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



		public function addjob($name,$des,$salary,$v_count,$p_count){
			$query="INSERT INTO exam (Title,Description,Salary,VacancyCount,PositionCount) VALUES('$name','$des','$salary','$v_count','$p_count')";

			$result=$this->controller->insertQuery($query);
			return $result;


			if($result){
				header('Location: addDone.php');
			}else{

			}
		}


		public function addexam($name,$date,$time){
			$query="INSERT INTO exam(title,D_L,duration) VALUES('$name', '$date','$time')";

			$result=$this->controller->insertQuery($query);
			return $result;


			if($result){
				header('Location: addDone.php');
			}else{

			}
		}

		public function addquestion($question,$ans1,$ans2,$ans3,$ans4,$ans_c){
			$query="INSERT INTO questions(Q,A1,A2,A3,A4,Ans) VALUES('$question','$ans1','$ans2','$ans3','$ans4','$ans_c')";

			$result=$this->controller->insertQuery($query);
			return $result;


			if($result){
				header('Location: addDone.php');
			}else{

			}

		}

		public function checkHrPsw($password){
			if ($password=="password123"){
				return true;
			}else{
				return false;
			}
		}

		public function getUserIdInfoByEmail($email){
			$query="SELECT JobseekerID FROM jobseeker WHERE Email='$email'";
			$result=$this->controller->runQuery($query);
			if($result){
				return $result;
			}else{
				return null;
			}
		}

		public function load_exam_question($examID){
			$query="SELECT * FROM questions,exam_q WHERE Q_id=question_id AND exam_id='$examID' ";
			$result=$this->controller->runQuery($query);
			if($result){
				return $result;
			}else{
				return null;
			}
		}

		public function getexamtime($examID){
			$query="SELECT duration FROM exam WHERE exam_id='$examID' ";
			$result=$this->controller->runQuery($query);
			if($result){
				return $result;
			}else{
				return null;
			}
		}

		public function submit_grade($examID,$user,$mark){
			$query="INSERT INTO results(exam_id,user_id,mark) VALUES('$examID','$user','$mark')";
			$result=$this->controller->InsertQuery($query);
			if($result){
				return $result;
			}else{
				return null;
			}
		}



	}

?>