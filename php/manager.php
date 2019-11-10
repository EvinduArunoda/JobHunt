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
}elseif (isset($_POST['submit_answer'])){
	$manager->submitanswer();
}
// HR functios

elseif (isset($_POST['hr_login'])){
	$manager->hrlogin();
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
		
	}

	public function addjob(){

		$pname=$_POST["pname"];
   	 $price=$_POST["price"];
    $img=$target_path;
    $des=$_POST["des"];

    	$utility=new Utility();
		$job_added=$utility->addjob($email);
	
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
		//$examID = $_POST[];
		// $utility=new Utility();
		// $exam=$utility->load_exam_question($examID);



		// if (is_null($resultArr)){
  // 			echo('no questions added yet.');
		// }else{
  // 			foreach($resultArr as $result) {
  // 				$q_id = $result['Q_id']
  // 				$correct_ans = $result['Ans']



  
		// }

		// return($exam);

	}

	//////////////////////////////// HR Functions ////////////////

	public function hrlogin(){

		$psw=$_POST["password"];
		$this->mylogger = new hr($psw);
		$result=$this->mylogger->login_hr();
		if ($result){
			$_SESSION['set']="set";
			$this->isHR=true;
			//$this->getsellerRequestsList();
			//$this->getitemRequestsList();
			//$this->gettotalsellerList();
			//$this->gettotalitemList();
			header("Location:hr_home.php");
		}else{
			echo "something went wrong.Please try again";
		}	
	
	}



}

 ?>