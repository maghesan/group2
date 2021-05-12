<?php
	require_once $_SERVER["DOCUMENT_ROOT"].'/AskRunnerSystem/Business Service Layer/Database/AskRunnerSystem.php';
	
	class runnercontroller{

		function register(){
			$runner = new runneraccount();
			$runner->RUN_USERNAME = $_POST['RUN_USERNAME'];
			$runner->RUN_PASSWORD = $_POST['RUN_PASSWORD'];
			$runner->RUN_NAME = $_POST['RUN_NAME'];
			$runner->RUN_GENDER = $_POST['RUN_GENDER'];
			$runner->RUN_EMAIL = $_POST['RUN_EMAIL'];
			$runner->RUN_PHONE_NO = $_POST['RUN_PHONE_NO'];
			$runner->RUN_ADDRESS = $_POST['RUN_ADDRESS'];
			$runner->RUN_IC = $_POST['RUN_IC'];
			$runner->RUN_LICENSE = $_POST['RUN_LICENSE'];
			$runner->RUN_VERIFY = $_POST['RUN_VERIFY'];
			if($runner->runnerregister()){
				$message = "Register Successfuly, You can login now!";
				echo "<script type='text/javascript'>alert('$message'); window.location = 'Index.php';</script>";
			}
		}
		function login($RUN_USERNAME){
			$runner = new runneraccount();
			$runner->RUN_USERNAME = $RUN_USERNAME;
			return $runner->runnerlogin();
		}
		function logout(){
			session_start();
			session_destroy();
			header("Location:index.php");

		}
		function viewRunner($RUN_ID){
			$runner = new runneraccount();
			$runner->RUN_ID = $RUN_ID;
			return $runner-> dataRunner();
		}
		function runviewall(){
			$runner = new runneraccount();
			return $runner-> runviewall();
		}
    	function editRunner($RUN_ID){

	    	$runner = new runneraccount();
	    	$runner->RUN_USERNAME = $_POST['username'];
	    	$runner->RUN_NAME = $_POST['name'];
	    	$runner->RUN_ADDRESS = $_POST['address'];
	    	$runner->RUN_EMAIL = $_POST['email'];
	    	$runner->RUN_PHONE_NO = $_POST['phoneNum'];
	    	$runner->RUN_GENDER = $_POST['gender'];
	    	$runner->RUN_PASSWORD = $_POST['password'];
	    	$runner->RUN_IC = $_POST['runIC'];
	    	$runner->RUN_LICENSE = $_POST['runLicense'];
	    	$runner->RUN_ID = $_POST['RUN_ID'];
	    	if ($runner-> motifyRunner()) {
	    		# code...
	    		$message = "Update Successfuly";
				echo "<script type='text/javascript'>alert('$message'); window.location = '../Application Layer/Runner Interface/RunnerIndex.php';</script>";
	    	}

    	}
    	function viewHistory($RUN_ID){
    		$runner = new runneraccount();
    		$runner->RUN_ID = $RUN_ID;
    		return $runner->history();
    	}

    	function viewAllOrder(){
    		$runner = new runneraccount();
    		return $runner->allorder();

    	}

    	function viewaccepted($RUN_ID){
    		$runner = new runneraccount();
    		$runner->RUN_ID = $RUN_ID;
    		return $runner->allaccept();
    	}

    	function runnerincome($RUN_ID){
			$runner = new runneraccount();
			$runner->RUN_ID = $RUN_ID;
			return $runner-> runnerincomedata();

		}

		function editStatus(){

			$runner =  new runneraccount();
			$runner->ORDER_ID = $_POST['ORDER_ID'];
			$runner->RUN_ID = $_POST['RUN_ID'];
			$runner->deliveryStatus = "Delivering";
			if ($runner-> updateStatus()) {
	    		# code...
	    		$message = "Jobs accept Successfuly";
				echo "<script type='text/javascript'>alert('$message'); window.location = '../Runner Interface/RunnerDeliveryJobs.php?jobs2';</script>";
	    	}
		}
		function deliStatus(){


			$runner =  new runneraccount();
			$runner->ORDER_ID = $_POST['ORDER_ID'];
			$runner->deliveryStatus = "Completed";
			$runner->runincome = $_POST['runincome'];
			$runner->spincome = $_POST['spincome'];
			if ($runner-> deliveredStatus()) {
	    		# code...
	    		$message = "Jobs Delivered Successfuly";
				echo "<script type='text/javascript'>alert('$message'); window.location = '../Runner Interface/RunnerDeliveryJobs.php?jobs1';</script>";
	    	}
		}
		function runverify(){
			$runner = new runneraccount();
			$runner->RUN_ID = $_POST['RUN_ID'];
			$runner->RUN_VERIFY = $_POST['RUN_VERIFY'];
			if($runner->runverify()){
				$message = "Verified Successfuly";
				echo "<script type='text/javascript'>alert('$message'); window.location = '../Admin Interface/UserAccount.php?user=runner';</script>";
			}
		}
	}
?>
<!-- RUN_USERNAME
RUN_PASSWORD
RUN_NAME
RUN_GENDER
RUN_EMAIL
RUN_PHONE_NO
RUN_ADDRESS
RUN_IC
RUN_LICENSE
RUN_VERIFY -->