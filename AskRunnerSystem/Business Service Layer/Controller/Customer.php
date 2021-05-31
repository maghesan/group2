<?php
	require_once $_SERVER["DOCUMENT_ROOT"].'/AskRunnerSystem/Business Service Layer/Database/AskRunnerSystem.php';
	
	class customercontroller{

		function register(){
			$customer = new customeraccount();
			$customer->CUST_NAME = $_POST['CUST_NAME'];
			$customer->CUST_USERNAME = $_POST['CUST_USERNAME'];
			$customer->CUST_PASSWORD = $_POST['CUST_PASSWORD'];
			$customer->CUST_GENDER = $_POST['CUST_GENDER'];
			$customer->CUST_PHONE_NO = $_POST['CUST_PHONE_NO'];
			$customer->CUST_EMAIL = $_POST['CUST_EMAIL'];
			$customer->CUST_ADDRESS = $_POST['CUST_ADDRESS'];
			if($customer->customerregister()){
				$message = "Register Successfuly, You can login now!";
				echo "<script type='text/javascript'>alert('$message'); window.location = 'Index.php';</script>";
			}


			//$CUST_ID, $CUST_NAME,$CUST_USERNAME,$CUST_PASSWORD,$CUST_GENDER,$CUST_PHONE_NO,$CUST_EMAIL,$CUST_ADDRESS;
		}
		function login($USERNAME){
			$customer = new customeraccount();
			$customer->CUST_USERNAME = $USERNAME;
			return $customer->customerlogin();
		}
		function logout(){
			session_start();
			session_destroy();
			header("Location:index.php");

		}
		function custview($CUST_ID){
			$customer = new customeraccount();
			$customer->CUST_ID = $CUST_ID;
			return $customer-> custdata();
		}
		function custviewall(){
			$customer = new customeraccount();
			return $customer-> custdataall();
		}
		function custedit($CUST_ID){
			$customer = new customeraccount();
			$customer->CUST_ID = $_POST['CUST_ID'];
			$customer->CUST_NAME = $_POST['CUST_NAME'];
			$customer->CUST_USERNAME = $_POST['CUST_USERNAME'];
			$customer->CUST_PASSWORD = $_POST['CUST_PASSWORD'];
			$customer->CUST_GENDER = $_POST['CUST_GENDER'];
			$customer->CUST_PHONE_NO = $_POST['CUST_PHONE_NO'];
			$customer->CUST_EMAIL = $_POST['CUST_EMAIL'];
			$customer->CUST_ADDRESS = $_POST['CUST_ADDRESS'];
			
			
			
			if($customer->custupdate()){
				$message = "Update Successfuly";
				echo "<script type='text/javascript'>alert('$message'); window.location = 'CustomerAccount.php';</script>";
			}
		}
		function checkoutOrder($CUST_ID)
		{
			$order = new customeraccount();
			$order->CUST_ID = $CUST_ID;
			/*if($order->checkoutdata()){
				$message = "Update Successfuly";
				echo "<script type='text/javascript'>alert('$message'); window.location = 'CustomerOrder.php';</script>";
			}*/

			return $order-> checkoutdata();

		
		}

        function addorder2history($ORDER_ID)
        {
            $order = new goods();
            //$order->CUST_ID = $CUST_ID;
            $order->ORDER_ID = $ORDER_ID;
            //$order->CUST_ID = $_POST['CUST_ID'];
            $order->ORDER_NAME = $_POST['ORDER_NAME'];
            $order->ORDER_QUANTITY = $_POST['ORDER_QUANTITY'];
            $order->ORDER_PROD_PRICE = $_POST['ORDER_PROD_PRICE'];
            $order->ORDER_FINAL_PRICE = $_POST['ORDER_FINAL_PRICE'];
            $order->ORDER_PROD_NAME = $_POST['ORDER_PROD_NAME'];
            //$customer->CUST_EMAIL = $_POST['CUST_EMAIL'];
            $order->ORDER_PHONE_NO = $_POST['ORDER_PHONE_NO'];
            $order->ORDER_ADD = $_POST['ORDER_ADD'];

            if($order->addorder2history()){
                $message = "Update Successfuly";
                header("Location:CustomerPayment.php");
            }
        }

		function custeditOrder($ORDER_ID)
		{
			$order = new customeraccount();
			//$order->CUST_ID = $CUST_ID;
			$order->ORDER_ID = $ORDER_ID;
			//$order->CUST_ID = $_POST['CUST_ID'];
			$order->ORDER_NAME = $_POST['ORDER_NAME'];
			$order->ORDER_QUANTITY = $_POST['ORDER_QUANTITY'];
			$order->ORDER_PROD_PRICE = $_POST['ORDER_PROD_PRICE'];
			$order->ORDER_FINAL_PRICE = $_POST['ORDER_FINAL_PRICE'];
			$order->ORDER_PROD_NAME = $_POST['ORDER_PROD_NAME'];
			//$customer->CUST_EMAIL = $_POST['CUST_EMAIL'];
			$order->ORDER_PHONE_NO = $_POST['ORDER_PHONE_NO'];
			$order->ORDER_ADD = $_POST['ORDER_ADD'];

			if($order->custupdateOrder()){
				$message = "Update Successfuly";
				echo "<script type='text/javascript'>alert('$message'); window.location = 'CustomerOrder.php';</script>";
			}
		}

		function deleteOrder($ORDER_ID)
		{
			$order = new customeraccount();
			$order->ORDER_ID = $ORDER_ID;
			if($order->deletecustOrder()){

				$message = "Delete Successfuly";
				echo "<script type='text/javascript'>alert('$message'); window.location = 'CustomerOrder.php?views';</script>";
			}
		}

		function orderviewdata($CUST_ID)
		{
			$order = new customeraccount();
			$order->CUST_ID = $CUST_ID;
			return $order-> custdataOrder();
		}

		function orderview($CUST_ID)
		{
			$order = new customeraccount();
			$order->CUST_ID = $CUST_ID;
			return $order-> custOrderdata();
		}

        function orderhistory($CUST_ID)
        {
            $order = new customeraccount();
            $order->CUST_ID = $CUST_ID;
            return $order-> custOrderhistory();
        }
		function payment($custid, $fullname, $email, $amount){
			$payment = new customeraccount();
			
			$payment->custid = $custid;
			$payment->fullname = $fullname;
			$payment->email = $email;
			$payment->amount = $amount;
			return $payment-> custpay();
		}
	}
?>