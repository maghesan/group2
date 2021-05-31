<?php
	require_once $_SERVER["DOCUMENT_ROOT"].'/AskRunnerSystem/Business Service Layer/Database/AskRunnerSystem.php';
	
	class productcontroller{

		function addpet(){
			$pet = new pet();
			$pet->SP_ID = $_POST['SP_ID'];
			$pet->PET_NAME = $_POST['PET_NAME'];
			$pet->PET_TYPE = $_POST['PET_TYPE'];
			$pet->PET_PRICE = $_POST['PET_PRICE'];
			$pet->PET_BRAND = $_POST['PET_BRAND'];
			$pet->PET_FUNCTION = $_POST['PET_FUNCTION'];
			$pet->PET_DESCRIPTIONS = $_POST['PET_DESCRIPTIONS'];
			$pet->PET_STOCK = $_POST['PET_STOCK'];
			$pet->PET_LIFE_STAGE = $_POST['PET_LIFE_STAGE'];
			$pet->PET_EXPIRY_DATE = $_POST['PET_EXPIRY_DATE'];
			$pet->PET_SHIPS_FROM = $_POST['PET_SHIPS_FROM'];
			$pet->PET_SHIP_FEE = $_POST['PET_SHIP_FEE'];
			$pet->PET_ORIGIN = $_POST['PET_ORIGIN'];
			$pet->PET_IMAGE = $_POST['PET_IMAGE'];
			$pet->PET_PUBLISH = $_POST['PET_PUBLISH'];
			if($pet->addpro()){

				$message = "Add Product Successfuly, You can view your product now!";
				echo "<script type='text/javascript'>alert('$message'); window.location = '../Service Provider Interface/ServiceProviderProduct.php?views';</script>";
			}

		}


		function viewpet($SP_ID){
			$pet = new pet();
			$pet->SP_ID = $SP_ID;
			return $pet-> petdata();
		}
		
		function allpet(){
			$pet = new pet();
			return $pet-> allpetdata();
		}

		function editpet($PET_PROID){
			$pet = new pet();

			$pet->PET_PROID = $_POST['PET_PROID'];
			$pet->PET_NAME = $_POST['PET_NAME'];
			$pet->PET_TYPE = $_POST['PET_TYPE'];
			$pet->PET_PRICE = $_POST['PET_PRICE'];
			$pet->PET_BRAND = $_POST['PET_BRAND'];
			$pet->PET_FUNCTION = $_POST['PET_FUNCTION'];
			$pet->PET_DESCRIPTIONS = $_POST['PET_DESCRIPTIONS'];
			$pet->PET_STOCK = $_POST['PET_STOCK'];
			$pet->PET_LIFE_STAGE = $_POST['PET_LIFE_STAGE'];
			$pet->PET_EXPIRY_DATE = $_POST['PET_EXPIRY_DATE'];
			$pet->PET_SHIPS_FROM = $_POST['PET_SHIPS_FROM'];
			$pet->PET_SHIP_FEE = $_POST['PET_SHIP_FEE'];
			$pet->PET_ORIGIN = $_POST['PET_ORIGIN'];
			$pet->PET_IMAGE = $_POST['PET_IMAGE'];
			$pet->PET_PUBLISH = $_POST['PET_PUBLISH'];
			
			if($pet->updatepet()){

				$message = "Update Successfuly";
				echo "<script type='text/javascript'>alert('$message'); window.location = 'ServiceProviderProduct.php?views';</script>";
			}
		}
		function deletepet($PET_PROID){
			$pet = new pet();
			$pet->PET_PROID = $PET_PROID;
			if($pet->deletepet()){

				$message = "Delete Successfuly";
				echo "<script type='text/javascript'>alert('$message'); window.location = 'ServiceProviderProduct.php?views';</script>";
			}
		}

		function viewAllpet()
		{
			$food = new pet();
			return $food-> allpetdata();
		}
		function petdetails($PET_PROID)
		{
			$pet = new pet();
			$pet->PET_PROID = $PET_PROID;
			return $pet-> petDetailsdata();
		}

		function addorderpet(){
			$pet = new pet();
			$pet->CUST_ID = $_SESSION['CUST_ID'];
			$pet->ORDER_TYPE = "PET ASSIST";
			$pet->ORDER_NAME = $_POST['CUST_NAME'];
			$pet->ORDER_ADD = $_POST['CUST_ADDRESS'];
			$pet->ORDER_PHONE_NO = $_POST['CUST_PHONE_NO'];
			$pet->ORDER_PRO_ID = $_POST['PET_PROID'];
			$pet->ORDER_PROD_NAME = $_POST['PET_NAME'];
			$pet->ORDER_PROD_PRICE = $_POST['PET_PRICE'];
			$pet->ORDER_DATE = date("Y-m-d H:i:s");
	
			
			if($pet->addorderpet()){

				$message = "Your order are added";
				echo "<script type='text/javascript'>alert('$message'); window.location = 'CustomerOrder.php';</script>";
			}
		}

//end pet part
//goods part
		function addgoods(){
			$goods = new goods();
			$goods->SP_ID = $_POST['SP_ID'];
			$goods->GD_NAME = $_POST['GD_NAME'];
			$goods->GD_TYPE = $_POST['GD_TYPE'];
			$goods->GD_CATEGORY = $_POST['GD_CATEGORY'];
			$goods->GD_BRAND = $_POST['GD_BRAND'];
			$goods->GD_PRICE = $_POST['GD_PRICE'];
			$goods->GD_STOCK = $_POST['GD_STOCK'];
			$goods->GD_SHIPS_FEE = $_POST['GD_SHIPS_FEE'];
			$goods->GD_ORIGIN = $_POST['GD_ORIGIN'];
			$goods->GD_SHIPS_FROM = $_POST['GD_SHIPS_FROM'];
			$goods->GD_IMAGE = $_POST['GD_IMAGE'];
			$goods->GD_PUBLISH = $_POST['GD_PUBLISH'];
			$goods->GD_DESCRIPTIONS = $_POST['GD_DESCRIPTIONS'];
			if($goods->addpro()){

			
				$message = "Add Product Successfuly, You can view your product now!";
				echo "<script type='text/javascript'>alert('$message'); window.location = '../Service Provider Interface/ServiceProviderProduct.php?views';</script>";
			}

		}

		function viewgoods($SP_ID){
			$goods = new goods();
			$goods->SP_ID = $SP_ID;
			return $goods-> goodsdata();
		}
	
		function editgoods($GD_PROID){
			$goods = new goods();

			$goods->GD_PROID = $_POST['GD_PROID'];
			$goods->GD_NAME = $_POST['GD_NAME'];
			$goods->GD_TYPE = $_POST['GD_TYPE'];
			$goods->GD_CATEGORY = $_POST['GD_CATEGORY'];
			$goods->GD_BRAND = $_POST['GD_BRAND'];
			$goods->GD_PRICE = $_POST['GD_PRICE'];
			$goods->GD_STOCK = $_POST['GD_STOCK'];
			$goods->GD_SHIPS_FEE = $_POST['GD_SHIPS_FEE'];
			$goods->GD_ORIGIN = $_POST['GD_ORIGIN'];
			$goods->GD_SHIPS_FROM = $_POST['GD_SHIPS_FROM'];
			$goods->GD_IMAGE = $_POST['GD_IMAGE'];
			$goods->GD_PUBLISH = $_POST['GD_PUBLISH'];
			$goods->GD_DESCRIPTIONS = $_POST['GD_DESCRIPTIONS'];
			
			if($goods->updategoods()){

				$message = "Update Successfuly";
				echo "<script type='text/javascript'>alert('$message'); window.location = 'ServiceProviderProduct.php?views';</script>";
			}
		}
		function deletegoods($GD_PROID){
			$goods = new goods();
			$goods->GD_PROID = $GD_PROID;
			if($goods->deletegoods()){

				echo "<script type='text/javascript'>alert('$message'); window.location = 'ServiceProviderProduct.php?views';</script>";
			}
		}
		function viewAllgoods()
		{
			$goods = new goods();
			return $goods-> allgoodsdata();
		}
		function allgoods(){
			$goods = new goods();
			return $goods-> allgoodsdata();
		}

		function gooddetails($GD_PROID)
		{
			$goods = new goods();
			$goods->GD_PROID = $GD_PROID;
			return $goods-> goodsDetailsdata();
		}

		function addordergoods(){
			$goods = new goods();
			$goods->CUST_ID = $_SESSION['CUST_ID'];
			$goods->ORDER_TYPE = "GOODS";
			$goods->ORDER_NAME = $_POST['CUST_NAME'];
			$goods->ORDER_ADD = $_POST['CUST_ADDRESS'];
			$goods->ORDER_PHONE_NO = $_POST['CUST_PHONE_NO'];
			$goods->ORDER_PRO_ID = $_POST['GD_PROID'];
			$goods->ORDER_PROD_NAME = $_POST['GD_NAME'];
			$goods->ORDER_PROD_PRICE = $_POST['GD_PRICE'];
			$goods->ORDER_DATE = date("Y-m-d H:i:s");
	
			
			if($goods->addordergoods()){

				$message = "Your order are added";
				echo "<script type='text/javascript'>alert('$message'); window.location = 'CustomerOrder.php';</script>";
			}
		}

//end goods part
//food part
		function addfood(){
			$food = new food();
			$food->SP_ID = $_POST['SP_ID'];
			$food->FD_NAME = $_POST['FD_NAME'];
			$food->FD_TYPE = $_POST['FD_TYPE'];
			$food->FD_PRICE = $_POST['FD_PRICE'];
			$food->FD_BRAND = $_POST['FD_BRAND'];
			$food->FD_STOCK = $_POST['FD_STOCK'];
			$food->FD_EXPIRY_DATE = $_POST['FD_EXPIRY_DATE'];
			$food->FD_CERTIFICATIONS = $_POST['FD_CERTIFICATIONS'];
			$food->FD_SHIP_FEE = $_POST['FD_SHIP_FEE'];
			$food->FD_ORIGIN = $_POST['FD_ORIGIN'];
			$food->FD_SHIPS_FROM = $_POST['FD_SHIPS_FROM'];
			$food->FD_IMAGE = $_POST['FD_IMAGE'];
			$food->FD_PUBLISH = $_POST['FD_PUBLISH'];
			$food->FD_DESCRIPTIONS = $_POST['FD_DESCRIPTIONS'];
			if($food->addpro()){

			
				$message = "Add Product Successfuly, You can view your product now!";
				echo "<script type='text/javascript'>alert('$message'); window.location = '../Service Provider Interface/ServiceProviderProduct.php?views';</script>";
			}

		}

		function viewfood($SP_ID){
			$food = new food();
			$food->SP_ID = $SP_ID;
			return $food-> fooddata();
		}

		function allfood(){
			$food = new food();
			return $food-> allfooddata();
		}

		function editfood($FD_PROID){
			$food = new food();

			$food->FD_PROID = $_POST['FD_PROID'];
			$food->FD_NAME = $_POST['FD_NAME'];
			$food->FD_TYPE = $_POST['FD_TYPE'];
			$food->FD_PRICE = $_POST['FD_PRICE'];
			$food->FD_BRAND = $_POST['FD_BRAND'];
			$food->FD_STOCK = $_POST['FD_STOCK'];
			$food->FD_EXPIRY_DATE = $_POST['FD_EXPIRY_DATE'];
			$food->FD_CERTIFICATIONS = $_POST['FD_CERTIFICATIONS'];
			$food->FD_SHIP_FEE = $_POST['FD_SHIP_FEE'];
			$food->FD_ORIGIN = $_POST['FD_ORIGIN'];
			$food->FD_SHIPS_FROM = $_POST['FD_SHIPS_FROM'];
			$food->FD_IMAGE = $_POST['FD_IMAGE'];
			$food->FD_PUBLISH = $_POST['FD_PUBLISH'];
			$food->FD_DESCRIPTIONS = $_POST['FD_DESCRIPTIONS'];
			
			if($food->updatefood()){

				$message = "Update Successfuly";
				echo "<script type='text/javascript'>alert('$message'); window.location = 'ServiceProviderProduct.php?views';</script>";
			}
		}
		function deletefood($FD_PROID){
			$food = new food();
			$food->FD_PROID = $FD_PROID;
			if($food->deletefood()){

				$message = "Delete Successfuly";
				echo "<script type='text/javascript'>alert('$message'); window.location = 'ServiceProviderProduct.php?views';</script>";
			}
		}
		function viewAllfood(){
			$food = new food();
			
			return $food-> allfooddata();
		}

		function fooddetails($FD_PROID)
		{
			$food = new food();
			$food->FD_PROID = $FD_PROID;
			return $food-> foodDetailsdata();
		}


		function addorderfood(){
			$food = new food();
			$food->CUST_ID = $_SESSION['CUST_ID'];
			$food->ORDER_TYPE = "FOOD";
			$food->ORDER_NAME = $_POST['CUST_NAME'];
			$food->ORDER_ADD = $_POST['CUST_ADDRESS'];
			$food->ORDER_PHONE_NO = $_POST['CUST_PHONE_NO'];
			$food->ORDER_PRO_ID = $_POST['FD_PROID'];
			$food->ORDER_PROD_NAME = $_POST['FD_NAME'];
			$food->ORDER_PROD_PRICE = $_POST['FD_PRICE'];
			$food->ORDER_DATE = date("Y-m-d H:i:s");
	
			
			if($food->addorderfood()){

				$message = "Your order are added";
				echo "<script type='text/javascript'>alert('$message'); window.location = 'CustomerOrder.php';</script>";
			}
		}
//end food part
//medical part
		function addmedical(){
			$medical = new medical();
			$medical->SP_ID = $_POST['SP_ID'];
			$medical->MD_NAME = $_POST['MD_NAME'];
			$medical->MD_TYPE = $_POST['MD_TYPE'];
			$medical->MD_FUNCTION = $_POST['MD_FUNCTION'];
			$medical->MD_SKIN_CONCERN = $_POST['MD_SKIN_CONCERN'];
			$medical->MD_SKIN_TYPE = $_POST['MD_SKIN_TYPE'];
			$medical->MD_BRAND = $_POST['MD_BRAND'];
			$medical->MD_PRICE = $_POST['MD_PRICE'];
			$medical->MD_STOCK = $_POST['MD_STOCK'];
			$medical->MD_EXPIRY_DATE = $_POST['MD_EXPIRY_DATE'];
			$medical->MD_SHIP_FEE = $_POST['MD_SHIP_FEE'];
			$medical->MD_ORIGIN = $_POST['MD_ORIGIN'];
			$medical->MD_SHIPS_FROM = $_POST['MD_SHIPS_FROM'];
			$medical->MD_IMAGE = $_POST['MD_IMAGE'];
			$medical->MD_PUBLISH = $_POST['MD_PUBLISH'];
			$medical->MD_DESCRIPTIONS = $_POST['MD_DESCRIPTIONS'];
			if($medical->addpro()){

			
				$message = "Add Product Successfuly, You can view your product now!";
				echo "<script type='text/javascript'>alert('$message'); window.location = '../Service Provider Interface/ServiceProviderProduct.php?views';</script>";
			}

		}

		function viewmedical($SP_ID){
			$medical = new medical();
			$medical->SP_ID = $SP_ID;
			return $medical-> medicaldata();
		}
		function allmedical(){
			$medical = new medical();
			return $medical-> allmedicaldata();
		}

		function editmedical($MD_PROID){
			$medical = new medical();

			$medical->MD_PROID = $_POST['MD_PROID'];
			$medical->MD_NAME = $_POST['MD_NAME'];
			$medical->MD_TYPE = $_POST['MD_TYPE'];
			$medical->MD_FUNCTION = $_POST['MD_FUNCTION'];
			$medical->MD_SKIN_CONCERN = $_POST['MD_SKIN_CONCERN'];
			$medical->MD_SKIN_TYPE = $_POST['MD_SKIN_TYPE'];
			$medical->MD_BRAND = $_POST['MD_BRAND'];
			$medical->MD_PRICE = $_POST['MD_PRICE'];
			$medical->MD_STOCK = $_POST['MD_STOCK'];
			$medical->MD_EXPIRY_DATE = $_POST['MD_EXPIRY_DATE'];
			$medical->MD_SHIP_FEE = $_POST['MD_SHIP_FEE'];
			$medical->MD_ORIGIN = $_POST['MD_ORIGIN'];
			$medical->MD_SHIPS_FROM = $_POST['MD_SHIPS_FROM'];
			$medical->MD_IMAGE = $_POST['MD_IMAGE'];
			$medical->MD_PUBLISH = $_POST['MD_PUBLISH'];
			$medical->MD_DESCRIPTIONS = $_POST['MD_DESCRIPTIONS'];
			
			if($medical->updatemedical()){

				$message = "Update Successfuly";
				echo "<script type='text/javascript'>alert('$message'); window.location = 'ServiceProviderProduct.php?views';</script>";
			}
		}
		function deletemedical($MD_PROID){
			$medical = new medical();
			$medical->MD_PROID = $MD_PROID;
			if($medical->deletemedical()){

				$message = "Delete Successfuly";
				echo "<script type='text/javascript'>alert('$message'); window.location = 'ServiceProviderProduct.php?views';</script>";
			}
		}
		//view all medical that available
		function viewAllmedical()
		{
			$medical = new medical();
			return $medical-> allmedicaldata();
		}

		//view the medical product details
		function medicaldetails($MD_PROID)
		{
			$medical = new medical();
			$medical->MD_PROID = $MD_PROID;
			return $medical-> medicalDetailsdata();
		}

		//add medical product to ordertable
		function addordermedical(){
			$medical = new medical();
			$medical->CUST_ID = $_SESSION['CUST_ID'];
			$medical->ORDER_TYPE = "MEDICAL";
			$medical->ORDER_NAME = $_POST['CUST_NAME'];
			$medical->ORDER_ADD = $_POST['CUST_ADDRESS'];
			$medical->ORDER_PHONE_NO = $_POST['CUST_PHONE_NO'];
			$medical->ORDER_PRO_ID = $_POST['MD_PROID'];
			$medical->ORDER_PROD_NAME = $_POST['MD_NAME'];
			$medical->ORDER_PROD_PRICE = $_POST['MD_PRICE'];
			$medical->ORDER_DATE = date("Y-m-d H:i:s");
	
			
			if($medical->addordermedical()){

				$message = "Your order are added";
				echo "<script type='text/javascript'>alert('$message'); window.location = 'CustomerOrder.php';</script>";
			}
		}

	}


 ?>