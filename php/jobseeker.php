<?php require_once('Utility.php') ?>

<?php  
class jobseeker{
	public $id;
	public $firstname;
    public $lastname;
    public $dob;
    public $gender;
    public $telephone;
    public $nic;
    public $password;
    public $email;
    private $utility;

    public function __construct(){
    	$this->utility= new Utility();
    }

    public function init($email,$password,$firstname,$lastname,$telephone,$gender,$address,$nic){
        $this->email=$email;
        $this->password=$password;
        $this->firstname=$firstname;
        $this->nic=$nic;
        $this->gender=$gender;
        $this->lastname=$lastname;
        $this->telephone=$telephone;
    }
    //add seller to DB by signing up
	public function addJS(){
		$result=$this->utility->addJS($this->email,$this->password,$this->firstname,$this->lastname,$this->dob,$this->gender,$this->address,$this->nic);
        return $result;
	}
    //fetch seller detailsfrom the DB and assign them to attribute variables
    

    public function getBasicInfoByEmail($email){
        $result=$this->utility->getBasicInfoByEmail($email);
        if ($result){
            $this->id=$result[0]['store_id'];
            $this->name=$result[0]['store_name'];
            $this->email=$email;
            $this->company=$result[0]['companyName'];
            $this->address=$result[0]['store_address'];
            $this->telephone=$result[0]['telephone'];
            $this->mobile=$result[0]['mobile'];
            $this->regNo=$result[0]['registrationNumber'];
            $this->website=$result[0]['website'];
            $this->password=$result[0]['password'];
            $this->isActive=$result[0]['seller_isActive'];
            return true;
        }else{
            return false;
        }
    }
}
 ?>