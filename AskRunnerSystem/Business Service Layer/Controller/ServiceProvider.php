<?php
	require_once $_SERVER["DOCUMENT_ROOT"].'/AskRunnerSystem/Business Service Layer/Database/AskRunnerSystem.php';
	
	class spcontroller{

		function register(){
			$serviceprovider = new spaccount();
			$serviceprovider->SP_USERNAME = $_POST['SP_USERNAME'];
			$serviceprovider->SP_OWNNAME = $_POST['SP_OWNNAME'];
			$serviceprovider->SP_BUSINESS_NAME = $_POST['SP_BUSINESS_NAME'];
			$serviceprovider->SP_PASSWORD = $_POST['SP_PASSWORD'];
			$serviceprovider->SP_PHONE_NO = $_POST['SP_PHONE_NO'];
			$serviceprovider->SP_COMPADDRESS = $_POST['SP_COMPADDRESS'];
			$serviceprovider->SP_EMAIL = $_POST['SP_EMAIL'];
			$serviceprovider->SP_SSM = $_POST['SP_SSM'];
			$serviceprovider->SP_VERIFY = $_POST['SP_VERIFY'];
			if($serviceprovider->spregister()){
				$message = "Register Successfuly, You can login now!";
				echo "<script type='text/javascript'>alert('$message'); window.location = 'Index.php';</script>";
			}

		}
		function login($SP_USERNAME){
			$serviceprovider = new spaccount();
			$serviceprovider->SP_USERNAME = $SP_USERNAME;
			return $serviceprovider->splogin();
		}

		function logout(){
			session_start();
			session_destroy();
			header("Location:index.php");

		}

		function spview($SP_ID){
			$serviceprovider = new spaccount();
			$serviceprovider->SP_ID = $SP_ID;
			return $serviceprovider-> spdata();
		}
		function spviewall(){
			$serviceprovider = new spaccount();
			return $serviceprovider-> spdataall();
		}
		function spedit($SP_ID){
			$serviceprovider = new spaccount();
			$serviceprovider->SP_ID = $SP_ID;
			$serviceprovider->SP_OWNNAME = $_POST['SP_OWNNAME'];
			$serviceprovider->SP_BUSINESS_NAME = $_POST['SP_BUSINESS_NAME'];
			$serviceprovider->SP_PASSWORD = $_POST['SP_PASSWORD'];
			$serviceprovider->SP_PHONE_NO = $_POST['SP_PHONE_NO'];
			$serviceprovider->SP_COMPADDRESS = $_POST['SP_COMPADDRESS'];
			$serviceprovider->SP_EMAIL = $_POST['SP_EMAIL'];
			$serviceprovider->SP_SSM = $_POST['SP_SSM'];
			
			if($serviceprovider->spupdate()){
				$message = "Update Successfuly";
				echo "<script type='text/javascript'>alert('$message'); window.location = 'ServiceProviderAccount.php';</script>";
			}
		}
		function spincome($SP_ID){
			$serviceprovider = new spaccount();
			$serviceprovider->SP_ID = $SP_ID;
			return $serviceprovider-> spincomedata();
		}
		function spallincome(){
			$serviceprovider = new spaccount();
            $serviceprovider->SP_ID = $_POST['SP_ID'];
			return $serviceprovider-> spallincomedata();
		}

        function spincomingorder($SP_ID){
            $serviceprovider = new spaccount();
            $serviceprovider->SP_ID = $SP_ID;
            return $serviceprovider-> spincomingorderdata();
        }

		function spverify(){
			$serviceprovider = new spaccount();
			$serviceprovider->SP_ID = $_POST['SP_ID'];
			$serviceprovider->SP_VERIFY = $_POST['SP_VERIFY'];
			if($serviceprovider->spverify()){
				$message = "Verified Successfuly";
				echo "<script type='text/javascript'>alert('$message')";
			}
		}
	}

?>
<!-- 
SP_USERNAME
SP_OWNNAME
SP_BUSINESS_NAME
SP_PASSWORD
SP_PHONE_NO
SP_COMPADDRESS
SP_EMAIL
SP_SSM
SP_VERIFY
 -->