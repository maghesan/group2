<!DOCTYPE html>
<html>
<head>
	<title>ADMIN | ASKRUNNER</title>
</head>
<body>
<?php
    include '../View Interface/Header.php';
    
    
?>
	<div class="container-fluid content mb-5">
        <div class="col-lg-12 py-4" align="center">
        	<div class="row ">
        		<div class="col-lg " >
	        		<a href="../Admin Interface/IncomePayment.php?runner"><legend><h1><strong>Runner Payment</strong></h1></legend></a>
	        	</div>
	        	<div class="col-lg ">
	        		<a href="../Admin Interface/IncomePayment.php?serviceprovider"><legend><h1><strong>Service Provider Payment</strong></h1></legend></a>
	        	</div>
	        	<div class="col-lg ">
	        		<a href="../Admin Interface/UserAccount.php"><legend><h1><strong>All User Account</strong></h1></legend></a>
	        	</div>
        	</div>
        	
    	</div>
    </div>

<?php
    include "../View Interface/Footer.php";
?>
</body>
</html>