<?php 
require_once('initialize.php');
if
(isset($_SESSION['set'])){}
else{
	header("Location:admin_login.php");
}

 ?>
 <!DOCTYPE html>
<html>
<head>
	<title>NOVUS CREATIONS</title>
	<link rel="stylesheet" type="text/css" href="../css/admin_panel.css">
</head>
<body>
	<div class="wrapper">
		<header>
			<div class="title">
				<h1>MyChoice.lk</h1>
			</div>
		</header>
		<div class="rest">
			<div class="data clearfix">
				<div class="box clearfix">
					<div class="additem"><a href="add_mobile_html.php"><img src='../img/Mobile-Smartphone-icon.png'><br><br>Add New Mobile</a></div>
					<div class="additem clearfix"><a href="add_tablet_html.php"><img src='../img/ipad-white-icon.png'><br><br>Add New Tablet</a></div>
					<div class="additem clearfix"><a href="add_laptop_html.php"><img src='../img/Laptop_icon.png'><br><br>Add New Laptop</a></div>
					<div class="additem clearfix"><a href="add_television_html.php"><img src='../img/Devices-video-television-icon.png'><br><br>Add New Television</a></div>
					<div class="additem"><a href="add_brand.php"><img src='../img/Package-add-icon.png'><br><br>Add New Brand</a></div>
					<div class="additem"><a href="add_category.php"><img src='../img/system-database-add-icon.png'><br><br>Add New Category</a></div>
					<div class="additem"><a href="update_item_details.php"><img src='../img/ModernXP-67-Note-icon.png'><br><br>Update Item Data</a></div>
					<div class="additem"><a href="view_itemRequests.php"><img src='../img/shop-cart-add-icon.png'><br><br>Item Requests</a></div>
					<div class="additem"><a href="view_sellerRequests.php"><img src='../img/Actions-contact-new-icon.png'><br><br>Seller Requests</a></div>
					<div class="additem"><a href="view_items.php"><img src='../img/smartphone-icon.png'><br><br>View Items</a></div>
					<div class="additem"><a href="view_sellers.php"><img src='../img/Actions-view-pim-contacts-icon.png'><br><br>View Sellers</a></div>
					<div class="logout"><a href="LogOutAdmin.php"><img src='../img/logout-icon.png'><br><br>Logout</a></div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>