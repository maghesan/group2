<!DOCTYPE html>
<html>
<head>
	<title>ADMIN | ASKRUNNER</title>
</head>
<body>
<?php
	include '../View Interface/Header.php';
	require_once $_SERVER["DOCUMENT_ROOT"].'/AskRunnerSystem/Business Service Layer/Controller/Customer.php';
	$customer = new customercontroller();
	require_once $_SERVER["DOCUMENT_ROOT"].'/AskRunnerSystem/Business Service Layer/Controller/ServiceProvider.php';
	$serviceprovider = new spcontroller();
	require_once $_SERVER["DOCUMENT_ROOT"].'/AskRunnerSystem/Business Service Layer/Controller/Runner.php';
	$runner = new runnercontroller();


	if(isset($_POST['spverify'])){
		$spverify = $serviceprovider->spverify();
	}
	if(isset($_POST['runverify'])){
		$runverify = $runner->runverify();
	}
?>
	<div class="container-fluid content mb-5">
        <div class="col-lg-12 py-4" align="center">
        	<?php
        		if(isset($_GET['user'])){
        			$user = $_GET['user'];
        			if($user == "customer"){
        				$viewall = $customer->custviewall();

        	?>
        		<div class="row ">
	        		<div class="col-lg " >
		        		<a href="../Admin Interface/UserAccount.php?user=customer"><legend><h1><strong>Customer Account</strong></h1></legend></a>
			        		<form action="" method="POST">
							<table class="table " style="font-size: 20px;">
								
								<thead >
									<tr>
										<th >
											<h3 style="color: #061161;">No</h3>
										</th >
										<th >
											<h3 style="color: #061161;">ID</h3>
										</th >
										<th >
											<h3 style="color: #061161;">Name</h3>
										</th >
										<th >
											<h3 style="color: #061161;">Username</h3>
										</th >
										<th >
											<h3 style="color: #061161;">Password</h3>
										</th >
										<th >
											<h3 style="color: #061161;">Gender</h3>
										</th >
										<th >
											<h3 style="color: #061161;">Phone No</h3>
										</th >
										<th >
											<h3 style="color: #061161;">Email</h3>
										</th >
										<th >
											<h3 style="color: #061161;">Address</h3>
										</th >
									</tr>
									
								</thead>
								
								<?php 
									$i=0;
									foreach ($viewall as $row) {
									$i++;
								?>
								<tr>
									<td>
										<?php echo $i; ?>
										
									</td>
									<td>
										<?php echo $row['CUST_ID']; ?>
										
									</td>
									<td>
										<?php echo $row['CUST_NAME']; ?>
										
									</td>	
									<td>
										<?php echo $row['CUST_USERNAME']; ?>
										
									</td>
									<td>
										<?php echo $row['CUST_PASSWORD']; ?>
										
									</td>
									<td>
										<?php echo $row['CUST_GENDER']; ?>
										
									</td>
									<td>
										<?php echo $row['CUST_PHONE_NO']; ?>
										
									</td>
									<td>
										<?php echo $row['CUST_EMAIL']; ?>
										
									</td>
									<td>
										<?php echo $row['CUST_ADDRESS']; ?>
										
									</td>
								</tr>
								
								<?php
									
									}
								?>
								
							</table>
						</form>
		        	</div>
		        	
	        	</div>
        	<?php
        		}else if($user == "serviceprovider"){
    				$viewall = $serviceprovider->spviewall();
        	?>
        		<div class="row ">
	        		<div class="col-lg " >
		        		<a href="../Admin Interface/UserAccount.php?user=customer"><legend><h1><strong>Service Provider Account</strong></h1></legend></a>
			        		<form action="" method="POST">
							<table class="table " style="font-size: 20px;">
								
								<thead >
									<tr>
										<th >
											<h3 style="color: #061161;">No</h3>
										</th >
										<th >
											<h3 style="color: #061161;">ID</h3>
										</th >
										<th >
											<h3 style="color: #061161;">OwnerName</h3>
										</th >
										<th >
											<h3 style="color: #061161;">Username</h3>
										</th >
										<th >
											<h3 style="color: #061161;">Password</h3>
										</th >
										<th >
											<h3 style="color: #061161;">Bussiness Name</h3>
										</th >
										<th >
											<h3 style="color: #061161;">Address</h3>
										</th >
										<th >
											<h3 style="color: #061161;">Email</h3>
										</th >
										<th >
											<h3 style="color: #061161;">Phone No</h3>
										</th >
										<th >
											<h3 style="color: #061161;">SSM</h3>
										</th >
										<th >
											<h3 style="color: #061161;">Verification</h3>
										</th >
										<th >
											<h3 style="color: #061161;">Action</h3>
										</th >
									</tr>
									
								</thead>
								
								<?php 
									$i=0;
									foreach ($viewall as $row) {
									$i++;
								?>
								<tr>
									<td>
										<?php echo $i; ?>
										
									</td>
									<td>
										<?php echo $row['SP_ID']; ?>
										
									</td>
									<td>
										<?php echo $row['SP_OWNNAME']; ?>
										
									</td>	
									<td>
										<?php echo $row['SP_USERNAME']; ?>
										
									</td>
									<td>
										<?php echo $row['SP_PASSWORD']; ?>
										
									</td>
									<td>
										<?php echo $row['SP_BUSINESS_NAME']; ?>
										
									</td>
									<td>
										<?php echo $row['SP_COMPADDRESS']; ?>
										
									</td>
									<td>
										<?php echo $row['SP_EMAIL']; ?>
										
									</td>
									<td>
										<?php echo $row['SP_PHONE_NO']; ?>
										
									</td>
									<td>
										<?php echo $row['SP_SSM']; ?>
										
									</td>
									<td>
										<?php echo $row['SP_VERIFY']; ?>
										
									</td>
									<td>
										<input type="text" name="SP_ID" value="<?php echo $row['SP_ID']; ?>" hidden>
										<input type="text" name="SP_VERIFY" value="Verified" hidden>
										<input type="submit" name="spverify" value="Verify" class="btn2">
										
									</td>
								</tr>
								
								<?php
									
									}
								?>
							
							</table>
						</form>
		        	</div>
		        	
	        	</div>
	        	<?php
	        		}else if($user == "runner"){
    				$viewall = $runner->runviewall();
	        	?>
	        		<div class="row ">
	        		<div class="col-lg " >
		        		<a href="../Admin Interface/UserAccount.php?user=customer"><legend><h1><strong>Runner Account</strong></h1></legend></a>
			        		<form action="" method="POST">
							<table class="table " style="font-size: 20px;">
								
								<thead >
									<tr>
										<th >
											<h3 style="color: #061161;">No</h3>
										</th >
										<th >
											<h3 style="color: #061161;">ID</h3>
										</th >
										<th >
											<h3 style="color: #061161;">Username</h3>
										</th >
										<th >
											<h3 style="color: #061161;">Name</h3>
										</th >
										<th >
											<h3 style="color: #061161;">Address</h3>
										</th >
										<th >
											<h3 style="color: #061161;">Email</h3>
										</th >
										<th >
											<h3 style="color: #061161;">Phone No</h3>
										</th >
										<th >
											<h3 style="color: #061161;">Gender</h3>
										</th >
										<th >
											<h3 style="color: #061161;">Phone No</h3>
										</th >
										<th >
											<h3 style="color: #061161;">Password</h3>
										</th >
										<th >
											<h3 style="color: #061161;">IC</h3>
										</th >
										<th >
											<h3 style="color: #061161;">License</h3>
										</th >
										<th >
											<h3 style="color: #061161;">Action</h3>
										</th >
									</tr>
									
								</thead>
								
								<?php 
									$i=0;
									foreach ($viewall as $row) {
									$i++;
								?>
								<tr>
									<td>
										<?php echo $i; ?>
										
									</td>
									<td>
										<?php echo $row['RUN_ID']; ?>
										
									</td>
									<td>
										<?php echo $row['RUN_USERNAME']; ?>
										
									</td>	
									<td>
										<?php echo $row['RUN_NAME']; ?>
										
									</td>
									<td>
										<?php echo $row['RUN_ADDRESS']; ?>
										
									</td>
									<td>
										<?php echo $row['RUN_EMAIL']; ?>
										
									</td>
									<td>
										<?php echo $row['RUN_PHONE_NO']; ?>
										
									</td>
									<td>
										<?php echo $row['RUN_GENDER']; ?>
										
									</td>
									<td>
										<?php echo $row['RUN_PASSWORD']; ?>
										
									</td>
									<td>
										<?php echo $row['RUN_IC']; ?>
										
									</td>
									<td>
										<?php echo $row['RUN_LICENSE']; ?>
										
									</td>
									<td>
										<?php echo $row['RUN_VERIFY']; ?>
										
									</td>
									<td>
										<input type="text" name="RUN_ID" value="<?php echo $row['RUN_ID']; ?>" hidden>
										<input type="text" name="RUN_VERIFY" value="Verified" hidden>
										<input type="submit" name="runverify" value="Verify" class="btn2">
										
									</td>
								</tr>
								
								<?php
									
									}
								?>
							
							</table>
						</form>
		        	</div>
		        	
	        	</div>
        	<?php			
        			}
        		}else{
        	?>
        	<div class="row ">
        		<div class="col-lg " >
	        		<a href="../Admin Interface/UserAccount.php?user=customer"><legend><h1><strong>Customer Account</strong></h1></legend></a>
	        	</div>
	        	<div class="col-lg ">
	        		<a href="../Admin Interface/UserAccount.php?user=serviceprovider"><legend><h1><strong>Service Provider Account</strong></h1></legend></a>
	        	</div>
	        	<div class="col-lg ">
	        		<a href="../Admin Interface/UserAccount.php?user=runner"><legend><h1><strong>Runner Account</strong></h1></legend></a>
	        	</div>
        	</div>
        	<?php			
    			}
    		
        	?>
    	</div>
    </div>
    
<?php


include "../View Interface/Footer.php";
?>
</body>
</html>