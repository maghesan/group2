
<?php
	session_start();
	require_once $_SERVER["DOCUMENT_ROOT"].'/AskRunnerSystem/Business Service Layer/Controller/Customer.php';
	require_once $_SERVER["DOCUMENT_ROOT"].'/AskRunnerSystem/Business Service Layer/Controller/Runner.php';
	require_once $_SERVER["DOCUMENT_ROOT"].'/AskRunnerSystem/Business Service Layer/Controller/ServiceProvider.php';
	require_once $_SERVER["DOCUMENT_ROOT"].'/AskRunnerSystem/Business Service Layer/Controller/Admin.php';
	date_default_timezone_set("Asia/Kuala_Lumpur");
	$customer = new customercontroller();
	$runner = new runnercontroller();
	$serviceprovider = new spcontroller();
	

	if(isset($_POST['register'])){
		$customer = new customercontroller();
		$customer->register();
	}
	if(isset($_POST['registerrunner'])){
		$runner = new runnercontroller();
		$runner->register();
	}
	if(isset($_POST['registersp'])){
		$serviceprovider = new spcontroller();
		$serviceprovider->register();
	}
	if(isset($_POST['login'])){
		$ACCOUNT_TYPE = $_POST['ACCOUNT_TYPE'];
		$USERNAME = $_POST['USERNAME'];
		$PASSWORD = $_POST['PASSWORD'];
		$_SESSION['ACCOUNT_TYPE'] = $ACCOUNT_TYPE;
		//login customer
		if ($ACCOUNT_TYPE == "Customer"){
				
				$getcust = $customer->login($USERNAME);
				//$customer->login();
				foreach ($getcust as $row ) {
					$CUST_USERNAME = $row['CUST_USERNAME'];
					$CUST_PASSWORD = $row['CUST_PASSWORD'];

					if($USERNAME == $CUST_USERNAME){
						if($PASSWORD == $CUST_PASSWORD){
							$_SESSION['CUST_ID'] = $row['CUST_ID'];
							$_SESSION['CUST_NAME'] = $row['CUST_NAME'];
							$_SESSION['CUST_USERNAME'] = $row['CUST_USERNAME'];
							$_SESSION['CUST_PASSWORD'] = $row['CUST_PASSWORD'];
							$_SESSION['CUST_GENDER'] = $row['CUST_GENDER'];
							$_SESSION['CUST_PHONE_NO'] = $row['CUST_PHONE_NO'];
							$_SESSION['CUST_EMAIL'] = $row['CUST_EMAIL'];
							$_SESSION['CUST_ADDRESS'] = $row['CUST_ADDRESS'];
							session_regenerate_id();
							$_SESSION['session_id'] = session_id();
							header("Location:../Customer Interface/CustomerIndex.php");

						}else{
							echo "<script>alert('wrong password')</script>";
							session_destroy();
							header("Location:index.php");
						}
					}else{
						echo "<script>alert('Login Fail!')</script>";
						session_destroy();
						header("Location:index.php");
					}
				}
				
			}
			//login runner
			else if($ACCOUNT_TYPE == "Runner"){
				
				$getrun = $runner->login($USERNAME);
				//$customer->login();
				foreach ($getrun as $row ) {
					$RUN_USERNAME = $row['RUN_USERNAME'];
					$RUN_PASSWORD = $row['RUN_PASSWORD'];

					if($USERNAME == $RUN_USERNAME){
						if($PASSWORD == $RUN_PASSWORD){
							$_SESSION['RUN_ID'] = $row['RUN_ID'];
							$_SESSION['RUN_NAME'] = $row['RUN_NAME'];
							$_SESSION['RUN_USERNAME'] = $row['RUN_USERNAME'];
							$_SESSION['RUN_PASSWORD'] = $row['RUN_PASSWORD'];
							$_SESSION['RUN_GENDER'] = $row['RUN_GENDER'];
							$_SESSION['RUN_EMAIL'] = $row['RUN_EMAIL'];
							$_SESSION['RUN_PHONE_NO'] = $row['RUN_PHONE_NO'];
							$_SESSION['RUN_ADDRESS'] = $row['RUN_ADDRESS'];
							$_SESSION['RUN_IC'] = $row['RUN_IC'];
							$_SESSION['RUN_LICENSE'] = $row['RUN_LICENSE'];
							$_SESSION['RUN_VERIFY'] = $row['RUN_VERIFY'];
							session_regenerate_id();
							$_SESSION['session_id'] = session_id();
							header("Location:../Runner Interface/RunnerIndex.php");

						}else{
							echo "<script>alert('wrong password')</script>";
							session_destroy();
							header("Location:index.php");
						}
					}else{
						echo "<script>alert('Login Fail!')</script>";
						session_destroy();
						header("Location:index.php");
					}
				}
			}
			//login service provider
			else if($ACCOUNT_TYPE == "ServiceProvider"){
				
				$getsp = $serviceprovider->login($USERNAME);
				//$customer->login();
				foreach ($getsp as $row ) {
					$SP_USERNAME = $row['SP_USERNAME'];
					$SP_PASSWORD = $row['SP_PASSWORD'];

					if($USERNAME == $SP_USERNAME){
						if($PASSWORD == $SP_PASSWORD){
							$_SESSION['SP_ID'] = $row['SP_ID'];
							$_SESSION['SP_OWNNAME'] = $row['SP_OWNNAME'];
							$_SESSION['SP_USERNAME'] = $row['SP_USERNAME'];
							$_SESSION['SP_PASSWORD'] = $row['SP_PASSWORD'];
							$_SESSION['SP_BUSINESS_NAME'] = $row['SP_BUSINESS_NAME'];
							$_SESSION['SP_PHONE_NO'] = $row['SP_PHONE_NO'];
							$_SESSION['SP_COMPADDRESS'] = $row['SP_COMPADDRESS'];
							$_SESSION['SP_EMAIL'] = $row['SP_EMAIL'];
							$_SESSION['SP_SSM'] = $row['SP_SSM'];
							$_SESSION['SP_VERIFY'] = $row['SP_VERIFY'];
							session_regenerate_id();
							$_SESSION['session_id'] = session_id();
							$SP_ID = $_SESSION['SP_ID'];
							header("Location:../Service Provider Interface/ServiceProviderIndex.php");

						}else{
							echo "<script>alert('wrong password')</script>";
							session_destroy();
							header("Location:index.php");
						}
					}else{
						echo "<script>alert('Login Fail!')</script>";
						session_destroy();
						header("Location:index.php");
					}
				}
			}
			//login admin
			else if($ACCOUNT_TYPE == "Admin"){
				$admin = new admincontroller();
				$get = $admin->login();
				//$customer->login();
				foreach ($get as $row ) {
					$ADMIN_NAME = $row['ADMIN_NAME'];
					$ADMIN_PASSWORD = $row['ADMIN_PASSWORD'];

					if($USERNAME == $ADMIN_NAME){
						if($PASSWORD == $ADMIN_PASSWORD){
							$_SESSION['ADMIN_ID'] = $row['ADMIN_ID'];
							$_SESSION['ADMIN_NAME'] = $row['ADMIN_NAME'];
							$_SESSION['ADMIN_PASSWORD'] = $row['ADMIN_PASSWORD'];
							session_regenerate_id();
							$_SESSION['session_id'] = session_id();
							$ADMIN_ID = $_SESSION['ADMIN_ID'];
							header("Location:../Admin Interface/AdminIndex.php");

						}else{
							echo "<script>alert('wrong password')</script>";
							session_destroy();
							header("Location:index.php");
						}
					}else{
						echo "<script>alert('Login Fail!')</script>";
						session_destroy();
						header("Location:index.php");
					}
				}
			}
			
		
	}
//$CUST_NAME, $CUST_USERNAME, $CUST_PASSWORD, $CUST_GENDER, $CUST_PHONE_NO, $CUST_EMAIL, $CUST_ADDRESS

	if(isset($_GET['logout'])){
		if($_SESSION['ACCOUNT_TYPE'] == "Customer"){
			$customer->logout();
		}
		else if($_SESSION['ACCOUNT_TYPE'] == "Runner"){
			$runner->logout();
		}
		else if($_SESSION['ACCOUNT_TYPE'] == "ServiceProvider"){
			$serviceprovider->logout();
		}
		
	}



?>
<!DOCTYPE html>
<html>
<head>


<meta name="viewport" content="width=device-width, initial-scale=1">
	  <scheme://ubung.ijat/index.html>
	  <!--link 1-->
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	  <!--link 2-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="../CSS/font-awesome/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="../CSS/style.css">
</head>

<body>

	<!--    utk header     -->
<div class="fixed-top">
	<div class="jumbotron text-center header m-0 p-0">
		<div class="col-sm-3 p-0 m-0 ">
			 <img src="../IMG/logo.png" style="width: 150px;height: 65px;margin-top: 5px;">
		</div>
		<div class="col-sm-6 p-0 m-0 ">
			<?php
				if(!empty($_SESSION['ACCOUNT_TYPE'])){
	 			$actor = $_SESSION['ACCOUNT_TYPE'] ;

	  			if ($actor =='Customer'){
			?>
			<a href="../Customer Interface/CustomerIndex.php"><h2 class="display-4" style="margin-top: 10px;"> ASKRUNNER</h2></a>
			<?php
				}else if ($actor == 'Runner'){

			?>
			<a href="../Runner Interface/RunnerIndex.php"><h2 class="display-4" style="margin-top: 10px;"> ASKRUNNER</h2></a>
			<?php
				}else if ($actor == 'ServiceProvider'){

			?>
			<a href="../Service Provider Interface/ServiceProviderIndex.php"><h2 class="display-4" style="margin-top: 10px;"> ASKRUNNER</h2></a>
			<?php
				}else if ($actor == 'Admin'){

			?>
			<a href="../Admin Interface/AdminIndex.php"><h2 class="display-4" style="margin-top: 10px;"> ASKRUNNER</h2></a>
			<?php
				}
			}else{

			?>
			<a href="../View Interface/Index.php"><h2 class="display-4" style="margin-top: 10px;"> ASKRUNNER</h2></a>
			<?php
				}
			?>
		</div>
		<div class="col-sm-3 p-0 m-0 ">
			<h2 style="margin-top: 20px;"><?php echo date("d/m/Y h:i:sa D");?></h2>
		</div>
		
	

	</div>
	  <!--     tamat utk header      -->



	  <!--    utk menu index    -->
	<nav class="navbar fixed menu1 text-center navbar-expand-lg navbar-toggler" data-toggle="collapse" data-target="#navbarnav" aria-controls="navbarnav" aria-expended="false" aria-label="Toggle navigation">
		<a class="navbar-brand" href="#">
         <img class = "img-responsive logo" src = "~/Content/Images/ogo__160x36.png" alt = "" />
     </a>
		<span class="navbar-toggler-icon"></span>

	  <!--     menu customer    -->

	 <?php
	 	if(!empty($_SESSION['ACCOUNT_TYPE'])){
	 		$actor = $_SESSION['ACCOUNT_TYPE'] ;

	  	if ($actor =='Customer'){
	  	
	  ?>
		<div class="collapse navbar-collapse" id="navbarnav">	
			<div class="col-sm button-1 border-left nav-item">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#" ><h2>Product Category</h2></a>
				<ul class="nav navbar-nav ">
					<li class="dropdown">
						<ul class="dropdown-menu partnerbox">
				          <li class="partnerbox2"><a href="../Customer Interface/CustomerIndex.php?food"><h3>Food Product</h3></a></li>
				          <li class="partnerbox2"><a href="../Customer Interface/CustomerIndex.php?goods"><h3>Goods Product</h3></a></li>
				          <li class="partnerbox2"><a href="../Customer Interface/CustomerIndex.php?medical"><h3>Medical Product</h3></a></li>
				          <li class="partnerbox2"><a href="../Customer Interface/CustomerIndex.php?pet"><h3>Pet Assist Product</h3></a></li>
				          <!-- <li class="partnerbox2"><a href="../Service Provider Interface/ServiceProviderProduct.php?Add"><h3></h3></a></li> -->
				          <!-- <li class="partnerbox2"><a href="admincustomer.php"><h3>Customer</h3></a></li> -->
				        </ul>
			   		</li>
		   		</ul>

			</div>	
				 
			<div class="col-sm button-1 border-left nav-item" >
				<a class="dropdown-toggle" data-toggle="dropdown" href="#" ><h2><?php echo 
				$_SESSION['CUST_USERNAME'] ; ?> - <?php echo $_SESSION['ACCOUNT_TYPE'] ; ?>  </h2></a>
				<ul class="nav navbar-nav ">
					<li class="dropdown">
						<ul class="dropdown-menu partnerbox">
				          <li class="partnerbox2"><a href="../Customer Interface/CustomerAccount.php"><h3>My Account</h3></a></li>
				          <li class="partnerbox2"><a href="../Customer Interface/CustomerOrder.php"><h3>Order Details</h3></a></li>
				          <!-- <li class="partnerbox2"><a href="../Customer Interface/ShopHistory.php"><h3>Order History</h3></a></li> -->
				          <li class="partnerbox2"><a href="../View Interface/Logout.php"><h3>Log Out</h3></a></li>
				        </ul>
			   		</li>
		   		</ul>

			</div>				
	  <?php
  		} else if ($actor == 'Runner'){
	  
	  	//<!--   tamat menu customer    -->
	  	// <!--     menu runner    -->

	 
	 	
	  	
	  ?>
		<div class="collapse navbar-collapse" id="navbarnav">	
			<div class="col-sm button-1 border-left nav-item" >
				<a class="dropdown-toggle" data-toggle="dropdown" href="#" ><h2>Service</h2></a>
				<ul class="nav navbar-nav ">
					<li class="dropdown">
						<ul class="dropdown-menu partnerbox">
				          <li class="partnerbox2"><a href="../Runner Interface/RunnerDeliveryJobs.php?jobs1"><h3>Add Service</h3></a></li>
				          <li class="partnerbox2"><a href="../Runner Interface/RunnerDeliveryJobs.php?jobs2"><h3>My Service</h3></a></li>
				        </ul>
			   		</li>
		   		</ul>

			</div>	
			

			<div class="col-sm button-1 border-left nav-item" >
				<a class="dropdown-toggle" data-toggle="dropdown" href="#" ><h2><?php echo 
				$_SESSION['RUN_USERNAME'] ; ?> -  <?php echo $_SESSION['ACCOUNT_TYPE'] ; ?></h2></a>
				<ul class="nav navbar-nav ">
					<li class="dropdown">
						<ul class="dropdown-menu partnerbox">
				          <li class="partnerbox2"><a href="../Runner Interface/RunnerAccount.php"><h3>My Account</h3></a></li>
				          <li class="partnerbox2"><a href="../Runner Interface/RunnerDeliveryHistory.php"><h3>My History</h3></a></li>
				           <li class="partnerbox2"><a href="../Runner Interface/RunnerIncome.php"><h3>My Income Report</h3></a></li>
				          <li class="partnerbox2"><a href="../View Interface/Logout.php"><h3>Log Out</h3></a></li>
				        </ul>
			   		</li>
		   		</ul>

			</div>	
	  <?php
  		}else if ($actor == 'ServiceProvider'){

	  	//<!--   tamat menu runner    -->

	  	 //<!--     menu service provider    -->
	  	
	  	
	  ?>
		<div class="collapse navbar-collapse" id="navbarnav">	
			<div class="col-sm-6 button-1 border-left nav-item">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#" ><h2>Product</h2></a>
				<ul class="nav navbar-nav ">
					<li class="dropdown">
						<ul class="dropdown-menu partnerbox">
				          <li class="partnerbox2"><a href="../Service Provider Interface/ServiceProviderProduct.php?views"><h3>View All Product</h3></a></li>
				          <li class="partnerbox2"><a href="../Service Provider Interface/ServiceProviderProduct.php?Add"><h3>Add New Product</h3></a></li>
				          <!-- <li class="partnerbox2"><a href="admincustomer.php"><h3>Customer</h3></a></li> -->
				        </ul>
			   		</li>
		   		</ul>

			</div>	
			<!-- <div class="col-sm-4 button-1 border-left nav-item">
				<a href="#"><h2>Cart</h2></a>
			</div>	 -->
			<div class="col-sm-6 button-1 border-left nav-item" >
				<a class="dropdown-toggle" data-toggle="dropdown" href="#" ><h2><?php echo 
				$_SESSION['SP_USERNAME'] ; ?> - <?php echo $_SESSION['ACCOUNT_TYPE'] ; ?>  </h2></a>
				<ul class="nav navbar-nav ">
					<li class="dropdown">
						<ul class="dropdown-menu partnerbox">
				          <li class="partnerbox2"><a href="../Service Provider Interface/ServiceProviderAccount.php"><h3>My Account</h3></a></li>
				          <li class="partnerbox2"><a href="../Service Provider Interface/ServiceProviderProduct.php"><h3>Order List</h3></a></li>
				          <li class="partnerbox2"><a href="../Service Provider Interface/ServiceProviderIncome.php"><h3>My Income</h3></a></li>
				          <li class="partnerbox2"><a href="../View Interface/Logout.php"><h3>Log Out</h3></a></li>
				        </ul>
			   		</li>
		   		</ul>

			</div>	
	  <?php
	 	}else if ($actor == "Admin"){
	 		//menu admin
	 		?>
	 		<div class="collapse navbar-collapse" id="navbarnav">	
			<div class="col-sm-6 button-1 border-left nav-item">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#" ><h2>Payment</h2></a>
				<ul class="nav navbar-nav ">
					<li class="dropdown">
						<ul class="dropdown-menu partnerbox">
				          <li class="partnerbox2"><a href="../Admin Interface/IncomePayment.php?runner"><h3>Runner</h3></a></li>
				          <li class="partnerbox2"><a href="../Admin Interface/IncomePayment.php?serviceprovider"><h3>Service Provider</h3></a></li>
				          <!-- <li class="partnerbox2"><a href="admincustomer.php"><h3>Customer</h3></a></li> -->
				        </ul>
			   		</li>
		   		</ul>

			</div>	
			<!-- <div class="col-sm-4 button-1 border-left nav-item">
				<a href="#"><h2>Cart</h2></a>
			</div>	 -->
			<div class="col-sm-6 button-1 border-left nav-item" >
				<a class="dropdown-toggle" data-toggle="dropdown" href="#" ><h2>Account  </h2></a>
				<ul class="nav navbar-nav ">
					<li class="dropdown">
						<ul class="dropdown-menu partnerbox">
				          <li class="partnerbox2"><a href="../Admin Interface/UserAccount.php"><h3>User Account</h3></a></li>
				          <li class="partnerbox2"><a href="../Admin Interface/AdminAccount.php"><h3>My Account</h3></a></li>
				          <li class="partnerbox2"><a href="../View Interface/Logout.php"><h3>Log Out</h3></a></li>
				        </ul>
			   		</li>
		   		</ul>

			</div>


 		<?php
 			}
  			}else{
	  	?>
	  	<!--   tamat menu admin    -->
	  	<!--   mula menu index    -->
		<div class="collapse navbar-collapse" id="navbarnav">	
			

			<div class="col-sm button-1 border-left nav-item">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#" ><h2>Be Our Partner</h2></a>
				<ul class="nav navbar-nav">
					<li class="dropdown">
						<ul class="dropdown-menu partnerbox">
				          <li class="partnerbox2"><a href="index.php?regisrunner"><h3>As Runner</h3></a></li>
				          <li class="partnerbox2"><a href="index.php?regissp"><h3>As Service Provider</h3></a></li>
				        </ul>
			   		</li>
		   		</ul>

			</div>	

			<div class="col-sm button-1 border-left nav-item" >
				<a href="#" onclick="openForm()"><h2>Login</h2></a>
			</div>	
		</div>
		<?php
			}
		?>
	</nav>
</div>
<!--   tamat utk menu index   -->


<!--    form login    -->
	<div class="form-popup form-style-6" id="myForm">
	  <form action="" class="form-container " method="post">
	  	<fieldset>
	    <legend><h1>Login</h1></legend>
	    <input type="text" placeholder="Enter Username" name="USERNAME" required>

	    <input type="password" placeholder="Enter Password" name="PASSWORD" required>

	    <select name="ACCOUNT_TYPE" id="accdrop" >
	    	<option value="Customer">Customer</option>
	    	<option value="Runner">Runner</option>
	    	<option value="ServiceProvider">Service Provider</option>
	    	<option value="Admin">Admin</option>
	    	
	    	
	    	
	    </select>
		</fieldset>
	   <center> <button onclick="openregis()" style="margin-bottom: 2px;background-color: #33b5e5" class="btn2">Not have account yet? Register here</button></center><br>
	    <button type="submit" class="btn2" name="login"><h3>Login</h3></button>
	    <button type="submit" class="btn2 cancel" onclick="closeForm()"><h3>Close</h3></button>
	  </form>
	</div>
	
	<!--    tamat form login     -->


	<!--    form register    -->
	<div class="form-popup form-style-6" id="regisform">
	  <form action="" class="form-container" method="POST">
	  	<fieldset>
	    <legend><h1>Customer Registration</h1></legend>
	  	

	    <!-- <label for="customerName"><h3>Username</h3></label> -->
	    <input type="text" placeholder="Enter Username" name="CUST_USERNAME" required>

	   <!--  <label for="customerPassword"><h3>Password</h3></label> -->
	    <input type="password" placeholder="Enter Password" name="CUST_PASSWORD" required>
	    <input type="text" placeholder="Enter Full Name" name="CUST_NAME" required>
	    <select name="CUST_GENDER">
	    	<option value="Male">Male</option>
	    	<option value="Female">Female</option>
	    </select>

	    <input type="text" placeholder="Enter Email" name="CUST_EMAIL" required>

	  <!--  	<label for="customerPhone"><h3>Phone Number</h3></label> -->
	    <input type="text" placeholder="Phone Number" name="CUST_PHONE_NO" required>

	   <!--  <label for="address"><h3>Address</h3></label> -->
	    <textarea cols="50" rows="4" name="CUST_ADDRESS" required placeholder="Enter Address"></textarea>

	    
	    <button type="submit" class="btn2" name="register"><h3>Register</h3></button>
 		<button type="submit" class="btn2 cancel" onclick="closeForm()"><h3>Close</h3></button>
	    <br>
	  <!-- <center> <button onclick="openForm()" style="margin-top: 2px;">Login</button></button></center> -->
	</fieldset>
	  </form>

	</div>


	<script type="text/javascript">
		function openForm() {
	  document.getElementById("myForm").style.display = "block";
	}

	function closeForm() {
	  document.getElementById("myForm").style.display = "none";
	  document.getElementById("regisform").style.display = "none";
	}
	function openregis() {
		document.getElementById("myForm").style.display = "none";
		document.getElementById("regisform").style.display="block";

	}
	</script>
	<!--    tamat form register     -->
</body>
</html>