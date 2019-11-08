 <?php 
	require_once('seller.php');
	require_once('admin.php');
	require_once('logger.php');
	require_once('Utility.php');
	require_once('initialize.php'); 
	require_once('jobseeker.php');
?>

<?php 
// JS functionalities
if(isset($_POST['signup_JS'])){
	$manager->signupJS();  
}elseif (isset($_POST['login_JS'])){
	$manager->loginJS(); 	
}elseif (isset($_POST['add_exam'])){
	$manager->addexam();
}



//not related
elseif(isset($_POST['bid'])){
	$manager->loaditems();				 //
}elseif(isset($_POST['add_item'])){
	$manager->addItem();			
}elseif(isset($_POST['remove_item'])){
	$manager->removeItemFromSeller();		//
}elseif(isset($_POST['update_itemDetailsbySeller'])){
	$manager->update_itemDetails();			//
}elseif(isset($_POST['update_sellerDetailsbySeller'])){
	$manager->update_SellerDetails();			//
}elseif(isset($_POST['logout_seller'])){
	$manager->logout_seller();
}elseif(isset($_POST['signout_seller'])){
	$manager->signout_seller();
}elseif(isset($_POST['activate_seller'])){
	$manager->activate_seller();
}elseif (isset($_POST['request_new_item'])){
	$manager->requestnewitem();
}elseif (isset($_POST['seller_Update_item'])){
	$manager->updateitemSeller();
}elseif(isset($_POST['seller_add_item'])){
	$manager->additemSeller();
  			
}

class manager{
	private $seller;
	private $mylogger;
	private $isAdmin;
	private $msg;

	private $JS;



	
	private static $sessions=array();

	public static function getInstance($key)
    {
        if(!array_key_exists($key, self::$sessions)) {
            self::$sessions[$key] = new self();
        }

        return self::$sessions[$key];
    }

    private function __construct(){}

    private function __clone(){}



    ////////////////// useless methods ////////////////



    //return the list of items of the seller

    public function loadMobileBrands(){
    	$utility= new Utility();
    	$cat=$_SESSION['currentcategory'];
    	$brands=$utility->loadMobileBrands($cat);
    	if ($brands){
    		return $brands;
    	}
    	
    }
    public function newItem(){
    	$_SESSION['currentcategory']=$_POST['category_id'];
    	header("Location:ajax_add_itemform.php");
    }
    public function loaditems(){
    	$seller=$_SESSION['currentseller'];
		$sellerid=$seller->id;
		$utility= new Utility();
		$bid=$_POST['bid'];
		$items=$utility->loaditems($bid);
		if ($items){
		echo json_encode($items);
		}
    }

    public function getSellersItemList(){
    	$seller=$_SESSION['currentseller'];
		$sellerid=$seller->id;
		$utility= new Utility();
		$itemlist=$utility->getSellersItemList($sellerid);
		if ($itemlist){
			$_SESSION['itemlist']=$itemlist;
		}
    }
    ////////////////////////////////////////////////
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
				$this->JS->init($email,$psw,$firstname,$lastname,$telephone,$gender,$address,$nic,$token);

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

	///////////////////////////////////////////////////////////

	public function activateSeller(){
		$token=$_POST['token'];
		$this->seller=new seller();
		$result=$this->seller->getBasicInfoByDetail();
		if(!($result)){
			header("Location:signup.php");
		}else{
			echo "Your account has been activated successfully.";
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
			$_SESSION['currentseller']=new seller();
			$gotInfo=($_SESSION['currentseller']->getBasicInfoByEmail($email));
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

	//////////////////////////////////////////////////////////
	public function addItem(){
		$seller=$_SESSION['currentseller'];
		$sellerid=$seller->id;
		$cat=$_SESSION['currentcategory'];
		$utility=new Utility();
		$category_name=$utility->getCategoryById($cat);
		//echo "<pre>";
		//var_dump($_SESSION['currentseller']);
		//echo "</pre>";
		$item=itemFactory::createItem($_POST['category_name']);
		$item->init();
		$result=$item->addItem($sellerid);
		if($result){
			echo "item has been successfully added.";
		}else{
			echo "Failed to add the item, Please try again.";
		}
	}

////////////////////////////   add item seller   /////////////////////////////////////////
	public function additemSeller(){
		$seller=$_SESSION['currentseller'];
		$sellerid=$seller->id;
		$model=$_POST['item'];
		$availability=$_POST['list'];
		$price=$_POST['price'];

		

		$utility=new Utility();
		$result=$utility->getItemsForModel($model);
		if($result!=null){
				$item_id = $result[0]['item_id'];
				$category_id =  $result[0]['category_id'];
		}
		$result=$utility->checkItemForSeller($item_id,$sellerid);
		if($result==1){
			$this->msg="already added that item";
			echo("already added that item");
		}
		else{
			$utility=new Utility();
			$utility->addItemtoSeller($item_id,$category_id,$price,$availability,$sellerid);
		}
		
	}


	public function updateitemSeller(){
		$seller=$_SESSION['currentseller'];
		$sellerid=$seller->id;
		$item=$_POST['item'];
		$availability=$_POST['list'];
		$price=$_POST['price'];

		$utility=new Utility();
		$utility->SellerUpdateItem($sellerid,$item,$price,$availability);
		
		
	}
//////////////////////////////////////////////////////////////////////////////////////////
	
	public function removeItemFromSeller(){
		$seller=$_SESSION['currentseller'];
		$sellerid=$seller->id;
		$utility=new Utility();
		$result=$utility->removeItemFromSeller($sellerid,$_POST['item_id']);
		if($result){
			echo "Item is no longer in your item list";
		}else{
			echo "something went wrong. Please try again.";
		}
	}


	public function update_itemDetails(){
		$sellerid=$this->seller->seller_id;
		$item=new Item();
		$model=$_POST['model'];
		$item->getBasicFeatures($model);
		$item->getDetailsReleventToSeller($seller->sellerid,$item->itemid);
	}

	//admin methods
	public function loginAdmin(){
		$psw=$_POST['password'];
		$this->mylogger = new admin($psw);
		$result=$this->mylogger->login_admin();
		if ($result){
			$_SESSION['set']="set";
			$this->isAdmin=true;
			$this->getsellerRequestsList();
			$this->getitemRequestsList();
			$this->gettotalsellerList();
			$this->gettotalitemList();
			header("Location:admin_panel.php");
		}else{
			echo "something went wrong.Please try again";
		}

	}

//////////////////////////////////////////////////////////////////////////////
	
	public function addNewSeller(){
		$utility=new Utility();
		$isAdded=$utility->addNewSeller($_POST['addnewSeller']);
		if ($isAdded){
			echo "new seller Added";
			$this->getsellerRequestsList();
			$this->gettotalsellerList();
		}}


	public function updateItemDetailsbyAdmin(){
		$item=itemFactory::createItem($_POST['category_name']);
		$item->getBasicFeatures($_POST['model']);
		$item->getAdditionalItemFeatures();
		echo "<pre>";
		var_dump($item);
		echo "</pre>";
		$_SESSION['current_item']=$item;
		//header("Location:update_mobile_byAdmin.php");
	
	//  Remove item by admin function
	}
	public function RemoveItemByAdmin(){
		$utility=new Utility();
		$isAdded=$utility->RemoveItem($_POST['remove_this_item']);
		if ($isAdded){
			echo "State Changed";
		}
	}






	public function RemoveSellerByAdmin(){
		$utility=new Utility();
		$isAdded=$utility->RemoveSeller($_POST['remove_this_seller']);
		if ($isAdded){
			echo "seller Removed";
			$this->getsellerRequestsList();
			$this->gettotalsellerList();
		}

	}







	public function getsellerRequestsList(){
		$utility= new Utility();
		$sellerReqlist=$utility->getsellerRequestsList();
		if ($sellerReqlist){
			$_SESSION['sellerReqlist']=$sellerReqlist;
		}
	}

	public function getitemRequestsList(){
		$utility= new Utility();
		$itemReqlist=$utility->getitemRequestsList();
		if ($itemReqlist){
			$_SESSION['itemReqlist']=$itemReqlist;
		}
	}

	public function gettotalsellerList(){
		$utility= new Utility();
		$totsellerlist=$utility->gettotalsellerList();
		if ($totsellerlist){
			$_SESSION['totsellerlist']=$totsellerlist;
		}
	}

	public function gettotalitemList(){
		$utility= new Utility();
		$totitemlist=$utility->gettotalitemList();
		if ($totitemlist){
			$_SESSION['totitemlist']=$totitemlist;
		}
	}

	
	//M
	public function addItem___new(){
		$category=$_POST['category'];
		$item=itemFactory::createItem($category);
		$item->add_details();
	}
	//M
	public function updateItem__new(){
		$category=$_POST['category'];
		$item=itemFactory::createItem($category);
		$item->update_details();	
	}

	public function addCategory(){
		$category_name = $_POST['category'];
		$utility = new Utility();
		$result = $utility->addNewCategory($category_name);
		if($result){
			header("Location:admin_panel.php");
		}else{
			echo "There is an error occured...";
		}
	}

	public function addBrand(){
		$brand_name = $_POST['brand'];
		$utility = new Utility();
		$result = $utility->addNewBrand($brand_name);
		if($result){
			header("Location:admin_panel.php");
		}else{
			echo "There is an error occured...";
		}
	}

	public function updateMobileData(){
		$id=$_POST['id'];
		$processor=$_POST['processor'];
		$ram=$_POST['ram'];
		$storage=$_POST['storage'];
		$batterycapacity=$_POST['batterycapacity'];
		$version=$_POST['version'];
		$display=$_POST['display'];
		$colours=$_POST['colours'];
		$camera=$_POST['camera'];
		$fastCharging=$_POST['fastCharging'];
		$utility = new Utility();
		$result = $utility->updateMobileByAdmin($id,$processor,$ram,$storage,$batterycapacity,$version,$display,$colours,$camera,$fastCharging);
		if($result){
			header("Location:admin_panel.php");
		}else{
			echo "There is an error occured...";
		}
	}
	//M
	public function updateTableteData(){
		$id=$_POST['id'];
		$processor=$_POST['processor'];
		$ram=$_POST['ram'];
		$storage=$_POST['storage'];
		$batterycapacity=$_POST['batterycapacity'];
		$version=$_POST['version'];
		$display=$_POST['display'];
		$colours=$_POST['colours'];
		$camera=$_POST['camera'];
		$utility = new Utility();
		$result = $utility->updateTabletByAdmin($id,$processor,$ram,$storage,$batterycapacity,$version,$display,$colours,$camera);
		if($result){
			header("Location:admin_panel.php");
		}else{
			echo "There is an error occured...";
		}
	}
	//M
	public function updateLaptopeData(){
		$id=$_POST['id'];
		$processor=$_POST['processor'];
		$ram=$_POST['ram'];
		$storage=$_POST['storage'];
		$batterycapacity=$_POST['batterycapacity'];
		$display=$_POST['display'];
		$colours=$_POST['colours'];
		$os=$_POST['os'];
		$utility = new Utility();
		$result = $utility->updateLaptopByAdmin($id,$processor,$ram,$storage,$batterycapacity,$os,$display,$colours);
		if($result){
			header("Location:admin_panel.php");
		}else{
			echo "There is an error occured...";
		}
	}
	//M
	public function updateTelevisionData(){
		$id=$_POST['id'];
		$display=$_POST['display'];
		$type=$_POST['type'];
		$resolution=$_POST['resolution'];
		$power=$_POST['power'];
		$colours=$_POST['colours'];
		$utility = new Utility();
		$result = $utility->updateTelevisionByAdmin($id,$display,$type,$resolution,$power,$colours);
		if($result){
			header("Location:admin_panel.php");
		}else{
			echo "There is an error occured...";
		}
	}

	public function loadAdditionalProperties(){
		$item_id = $_POST['id'];
		$utility = new Utility();
		$result = $utility->loadAdditionalProperties($item_id);
		if($result){
			echo json_encode($result);
		}
	}

	///////////////////////    Register    /////////////////////
	public function addNewStore(){
		$companyName=$_POST['companyName'];
		$phone=$_POST['phone'];
		$mobile=$_POST['mobile'];
		$website=$_POST['website'];
		$address=$_POST['address'];
		$email=$_POST['seller_email'];
		$description="NO";
		$is_Active=0;
		$utility = new Utility();
		$result = $utility->addNewStore($email,$companyName,$phone,$mobile,$website,$address,0);
		if($result){
			echo "Data of The Store is added Successfully";
			header('Location: ../php/add_logo.php?store_id='.$last_id.'');
   		 exit;
		}
		else{
			$error= "data adding failed" ."<br>". mysqli_error($connection);
		}
	}

	public function requestnewitem(){
		$store_id=$_SESSION['currentseller']->id;
		$brand=$_POST['brand'];
		$category=$_POST['list'];
		$model=$_POST['model'];

		$utility = new Utility();
		$result = $utility->requestNewItem($store_id,$brand,$category,$model);
		if($result){
			echo "Data of The Store is added Successfully";
			header('Location:admin_panel.php');
   		 exit;
		}
		else{
			$error= "data adding failed" ."<br>". mysqli_error($connection);
		}
	}
	
}
 ?>