
<!DOCTYPE html>
<html>
<head>
	<title>SERVICE PROVIDER | ASKRUNNER</title>
</head>
<body>
				
<?php
	include '../View Interface/Header.php';

?>

<!--    utk content    -->
	<div class="container-fluid content mb-5">
		<div class="col-lg-12 py-4" align="center">

		   <div class="row">
		    	<legend><h1><strong><?php echo $_SESSION['SP_USERNAME'];?> Homepage</strong></h1></legend>
			    <div class="col kotakkedai text-center py-4 m-4">
			    	<a href="../Service Provider Interface/ServiceProviderProduct.php?views">
		    			<legend><h1 ><strong>View your product</strong></h1></legend>
			    	</a>
			    </div>
			    <div class="col kotakkedai text-center py-4 m-4">
			    	<a href="../Service Provider Interface/ServiceProviderProduct.php?Add">
			    		<legend><h1 ><strong>Add new Product</strong></h1></legend>
			    	</a>
			    </div>
			    <div class="col kotakkedai text-center py-4 m-4">
			    	<a href="../Service Provider Interface/ServiceProviderAccount.php">
			    		<legend><h1 ><strong><?php echo $_SESSION['SP_USERNAME'];?> Account</strong></h1></legend>
			    	</a>
			    </div>
			    <div class="col kotakkedai text-center py-4 m-4">
			    	<a href="../Service Provider Interface/ServiceProviderIncome.php">
			    		<legend><h1><strong><?php echo $_SESSION['SP_USERNAME'];?> Income</strong></h1></legend>
			    	</a>
			   
			  </div>

			</div>

		</div>
	
	</div>

	<!--     tamat utk content   -------------------- -->
<?php
	include "../View Interface/Footer.php";
?>
</body>

</html>