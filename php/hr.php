<?php 
	class hr{
		private $utility;
		public $password;

		public function __construct($psw){
    		$this->utility= new Utility();
    		$this->password=$psw;
    	}

    	public function login_hr(){
    		$isCorrect=$this->utility->checkHrPsw($this->password);
    		if ($isCorrect){
    			return true;
    		}else{
    			return false;
    		}
    	}
	}
 ?>