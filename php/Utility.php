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
			$query="INSERT INTO job (Title,Description,Salary,VacancyCount,PositionCount) VALUES('$name','$des','$salary','$v_count','$p_count')";

			$result=$this->controller->insertQuery($query);
			return $result;


			if($result){
				header('Location: addDone.php');
			}else{

			}
		}


		public function addexam($job,$duration,$exam_date){
			$query="INSERT INTO exam(title,D_L,duration) VALUES('$job', '$exam_date','$duration')";

			$result=$this->controller->insertQuery($query);
			return $result;

		}

		public function getexamID($job){
			$query="SELECT exam_id from exam WHERE Title='$job'";

			$result=$this->controller->runQuery($query);
			return $result;

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
			$result=$this->controller->insertQuery($query);
			if($result){
				return $result;
			}else{
				return null;
			}
		}

		public function getAllJobList(){
			$query="SELECT * FROM job";
			$result=$this->controller->runQuery($query);
			if($result){
				return $result;
			}else{
				return null;
			}
		}

		public function getAllQuestion(){
			$query="SELECT * FROM questions";
			$result=$this->controller->runQuery($query);
			if($result){
				return $result;
			}else{
				return null;
			}
		}

		public function removeJob($jobid){
			$query="DELETE FROM job WHERE JobID = '$jobid'";
			$result=$this->controller->runQuery($query);
			
		}

		public function addtoexam($q_id,$exam){

			
			$query="INSERT INTO exam_q (exam_id,question_id) VALUES('$exam','$q_id')";
			$result=$this->controller->insertQuery($query);
			if($result){
				return $result;
			}else{
				return null;
			}
		}

		public function getAllExam(){
			$query="SELECT * FROM exam";
			$result=$this->controller->runQuery($query);
			if($result){
				return $result;
			}else{
				return null;
			}
		}

		public function addtojob($exam_id,$job_id){
			

			$query = "UPDATE job SET exam_id='$exam_id' WHERE JobID='$job_id'";
			$result=$this->controller->updateQuery($query);
			return $result;
		}

		public function addvacancy($jobid){

			$status = 1;
			
			$query="INSERT INTO jobvacancy (JobID,Status) VALUES('$jobid','$status')";
			$result=$this->controller->insertQuery($query);
			if($result){
				return $result;
			}else{
				return null;
			}
		}



		







	}

?>