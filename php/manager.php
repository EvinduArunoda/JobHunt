 <?php
	require_once('logger.php');
	require_once('Utility.php');
	require_once('initialize.php');
	require_once('jobseeker.php');
	require_once('hr.php');
?>

<?php
// JS functionalities
if(isset($_POST['signup_JS'])){
	$manager->signupJS();
}elseif (isset($_POST['login_JS'])){
	$manager->loginJS();
}elseif (isset($_POST['add_exam'])){
	$manager->addexam();
}elseif (isset($_POST['add_job'])){
	$manager->addjob();
}elseif (isset($_POST['start_exam'])){
	$manager->loadexam();
}elseif (isset($_POST['remove_Job'])){
	$manager->removeJob();
}
elseif (isset($_POST['start_exam_Job'])){
	$manager->loadexam();
}
// HR functios

elseif (isset($_POST['hr_login'])){
	$manager->hrlogin();
}elseif (isset($_POST['submit_answer'])){
	$manager->submitanswer();
}elseif (isset($_POST['Add_toExam'])){
	$manager->addtoexam();
}elseif (isset($_POST['addexamtojob'])){
	$manager->addexamtojob();
}elseif (isset($_POST['AddExamto_Job'])){
	$manager->AddExamto_Job();
}elseif (isset($_POST['addquestion'])){
	$manager->addquestion();
}
}elseif (isset($_POST['Edit_Job'])){
	$manager->Edit_Job();
}elseif (isset($_POST['addvacancy'])){
	$manager->addvacancy();
}elseif (isset($_POST['viewapplicants'])){
	$manager->viewapplicants();
}




class manager{
	private $mylogger;
	private $msg;
	private $JS;
	private $isHR;

	private static $sessions=array();

	public static function getInstance($key)
    {
        if(!array_key_exists($key, self::$sessions)) {
            self::$sessions[$key] = new self();
        }

        return self::$sessions[$key];
    }

    public function __construct(){}

    private function __clone(){}

    //////////////////// JS Functions /////////////////////

	public function signupJS(){

		$email=$_POST['Email'];
		$psw=$_POST['password'];
		$nic=$_POST['nic'];
		$firstname=$_POST['first_name'];
		$lastname=$_POST['last_name'];
		$dob = $_POST['date_of_birth'];
		$gender = $_POST['gender'];
		$address = $_POST['address'];
		$telephone = $_POST['phone'];
		$token = "";

		//////////////////////////////////////
		$utility=new Utility();
		$isSignedup=$utility->checkSignup($email);
		//////////////////////////////////////


		if(!empty($_POST["password"]) && ($_POST["password"] == $_POST["reconfirmedPassword"])) {
    		$password = ($_POST["password"]);
    		$cpassword = ($_POST["reconfirmedPassword"]);
	   		if (strlen($_POST["password"]) < '8') {
	        	$this->msg = "Your Password Must Contain At Least 8 Characters!";
	    	}
	    	elseif(!preg_match("#[0-9]+#",$password)) {
	        	$this->msg = "Your Password Must Contain At Least 1 Number!";
	    	}
	    	elseif(!preg_match("#[A-Z]+#",$password)) {
	        	$this->msg = "Your Password Must Contain At Least 1 Capital Letter!";
	    	}
	    	elseif(!preg_match("#[a-z]+#",$password)) {
	        	$this->msg = "Your Password Must Contain At Least 1 Lowercase Letter!";
	    	}
	    	elseif($isSignedup){
	        	$this->msg = "Your email address has been used";
	    	}
	    	else{
	    		$this->JS= new jobseeker();
				$this->JS->init($email,$psw,$firstname,$lastname,$telephone,$gender,$address,$nic);

				$entered_to_db=$this->JS->addJS();

				if($entered_to_db){

					$_SESSION['JS_email'] = $email ;

					header("Location:JSlogin.php");
					$this->msg = "Done";
					//$this->getsellerRequestsList();
				}else{
				$this->msg="Something went wrong. Please try again or please check your email.";
				}
	    	}
			}
			elseif(!empty($_POST["password"])) {
	    		$this->msg = "Please Check You've Entered Or Confirmed Your Password!";
			} else {
	     	$this->msg = "Please enter password   ";
			}
			if($this->msg == "Done"){}
			else{
			//header("Location:SignupError.php?msg=".$this->msg);}
			echo $this->msg;

		}
	}


	//////////////////////////////////////////////////////////
	public function loginJS(){
		$this->msg = "";

		$email=$_POST['JS_email'];
		$psw=$_POST['password'];
		$this->mylogger = new logger($email,$psw);
		$result=$this->mylogger->login();
		if ($result){

			//require_once('initialize.php');
			//$db = Database::getInstance();
			//$connection = $db->getConnection();
			echo "Logged In";
			$_SESSION['set']="set";
			$utility=new Utility();
			$_SESSION['currentuser']= $utility -> getUserIdInfoByEmail($email)[0];
			$_SESSION['UserID'] = $_SESSION['currentuser']['JobseekerID'];
			$_SESSION['JobseekerID']=$_SESSION['UserID'];
			$_SESSION['Email'] = 'username';


			header("Location:sJSACC.php");
			//header("Location:selleracc.php");

			//$gotInfo=($_SESSION['currentseller']->getBasicInfoByEmail($email));
			//if($gotInfo){
			//	$gotlist=$this->getSellersItemList();
			//	echo "<pre>";
			//	var_dump($gotlist);
			//	echo "</pre>";
			//	header("Location:sellerAcc.php");
			//}else{
			//	$this->msg = "something went wrong.Please try again";
			//}
		}
		else{
			$this->msg = "Password, Username mismatch";
			header("Location:LoginError.php");
		}
	}

	public function addexam(){
		$job=$_POST['job'];
   	 	$hrs=$_POST['hrs'];
    	$min=$_POST['min'];
    	$exam_date=$_POST['exam_date'];
    	$duration = (int)$min + (int)$hrs*60;

   		$utility=new Utility();
		$job_added=$utility->addexam($job,$duration,$exam_date);

		if($job_added){
			$jobIDarray = $utility->getexamID($job)[0];
			$jobID = $jobIDarray['exam_id'];
			$_SESSION['current_jb_id']=$jobID;

			header("Location:sel_questions.php");

		}


	}

	public function addjob(){

		$name=$_POST['title'];
   	 	$des=$_POST['description'];
    	$salary=$_POST['salary'];
    	$v_count=$_POST['vacancy_count'];
    	$p_count=$_POST['position_count'];

    	$utility=new Utility();
		$job_added=$utility->addjob($name,$des,$salary,$v_count,$p_count);
		$this->getAllJobList();
		header("Location:hr_home.php");


	}

	public function loadexam(){
		$examID = 1;
		$utility=new Utility();
		$examtime=$utility->getexamtime($examID)[0];

		$duration = $examtime['duration']*60;
		$_SESSION['duration'] = $duration;
		$_SESSION['start_time'] = time();
		//$_SESSION['examID'] =
		header("Location:exam.php");

	}

	public function load_exam_question($examID){
		$utility=new Utility();
		$exam=$utility->load_exam_question($examID);

		return($exam);

	}


	public function submitanswer(){
		$examID = $_POST['examID'];
		$user = $_SESSION['UserID'];
		$utility=new Utility();
		$resultArr=$utility->load_exam_question($examID);

		$mark = 0;


		if (is_null($resultArr)){
  			echo('no questions added yet.');
		}else{
			if($_SESSION['timeout']){

  			foreach($resultArr as $result) {
  				$q_id = $result['Q_id'];
  				$correct_ans = $result['Ans'];

  				$answer = $_POST[$q_id];

  				if($answer == $correct_ans){
  					$mark = $mark + 1;
  				}

		}
	}

		$submitted = $utility->submit_grade($examID,$user,$mark);

		echo $mark;
	}
}

	//////////////////////////////// HR Functions ////////////////

	public function hrlogin(){

		$psw=$_POST["password"];
		$this->mylogger = new hr($psw);
		$result=$this->mylogger->login_hr();
		if ($result){
			$_SESSION['set']="set";
			$this->isHR=true;
			$this->getAllJobList();
			$this->getAllQuestion();
			//$this->gettotalsellerList();
			//$this->gettotalitemList();
			header("Location:hr_home.php");
		}else{
			echo "something went wrong.Please try again";
		}

	}

	public function getAllJobList(){
		$utility= new Utility();
		$AllJobs=$utility->getAllJobList();
		if ($AllJobs){
			$_SESSION['AllJobs']=$AllJobs;
		}
	}

	public function getAllQuestion(){
		$utility= new Utility();
		$AllQuestions=$utility->getAllQuestion();
		if ($AllQuestions){
			$_SESSION['AllQuestions']=$AllQuestions;
		}
	}

	public function removeJob(){

		$jobid = $_POST['remove_Job'];

		$utility= new Utility();
		$AllQuestions=$utility->removeJob($jobid);

	}

	public function addtoexam(){

		foreach($_SESSION['AllQuestions'] as $result) {
			if($result['Q_id'] = $_POST['Add_toExam']){
				$q_id = $result['Q_id'];
			}

  		}

		$exam = $_SESSION['current_jb_id'];

		$utility= new Utility();
		$result=$utility->addtoexam($q_id,$exam);

		header("Location:sel_questions.php");
	}

	public function addexamtojob(){
		$_SESSION['addexamjob'] = $_POST['addexamtojob'];

		header("Location:all_exams.php");


	}

	public function getAllExam(){
		$utility= new Utility();
		$AllExam=$utility->getAllExam();
		if ($AllExam){
			$_SESSION['AllExam']=$AllExam;
		}
	}

	public function AddExamto_Job(){
		$exam_id = $_POST['AddExamto_Job'];
		$job_id = $_SESSION['addexamjob'];

		echo $exam_id;
		echo $job_id;
		$utility= new Utility();
		$added=$utility->addtojob($exam_id,$job_id);

		header("Location:hr_home.php");



	}

	public function addquestion(){
		$question=$_POST['question'];
   	 	$A1=$_POST['answer1'];
    	$A2=$_POST['answer2'];
    	$A3=$_POST['answer3'];
    	$A4=$_POST['answer4'];
    	$CA = $_POST['correctans'];

    	$utility= new Utility();
		$added=$utility->addquestion($question,$A1,$A2,$A3,$A4,$CA);
		$this->getAllQuestion();
		header("Location:hr_home.php");



	}



}

 ?>
