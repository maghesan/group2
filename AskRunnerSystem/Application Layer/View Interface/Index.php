
<!DOCTYPE html>
<html>
<head>
	<title>HOME | ASKRUNNER</title>
</head>
<body>
				

<?php

?>
<?php
	include 'Header.php';

?>

<!--    utk content    -->
	<div class="container-fluid content mb-5">
		<div class="col-lg-12 py-4" align="center">
		   	<!-- utk register runner-->
		   	<?php
		   		if(isset($_GET['regisrunner'])){


		   	?>
		   	<div class="col-lg  form-style-6">
				<fieldset>
					<legend><h1>Be Our Runner</h1></legend>
					<form action="index.php" method="POST">
						<table>
							
							<tr>
								<td><input type="text" name="RUN_USERNAME"  class="form-control input-lg col-xs-4" placeholder="Account Username" required></td>
							</tr>
							<tr>
								<td><input type="password" name="RUN_PASSWORD"  class="form-control input-lg" placeholder="Password" minlength="5" maxlength="12" required></td>
							</tr>
							<tr>
								<td><input type="text" name="RUN_NAME"  class="form-control input-lg col-xs-4" placeholder="Full Name" required></td>
							</tr>
							
							<tr>
								<td>
									<select name="RUN_GENDER" class="form-control input-lg">
										<option value="Male">Male</option>
										<option value="Female">Female</option>
									</select>
								</td>
							</tr>
							<tr>
								<td><input type="text" name="RUN_EMAIL"  class="form-control input-lg" placeholder="Email" required></td>
							</tr>
							<tr>
								<td><input type="text" name="RUN_PHONE_NO"  class="form-control input-lg" placeholder="Phone Number" required></td>
								
							</tr>
							<tr>
								<td><textarea cols="50" rows="4" name="RUN_ADDRESS" class="form-control input-lg" required placeholder="Address"></textarea></td>
							
							</tr>
							
							<tr>
								<td><input type="text" name="RUN_IC"  class="form-control input-lg" placeholder="I/C Or Passport" required></td>
							</tr>
							<tr>
								<td><input type="text" name="RUN_LICENSE"  class="form-control input-lg" placeholder="License Number" required></td>
							</tr>

							<input type="text" name="RUN_VERIFY"  class="form-control input-lg" placeholder="Pending" value="Pending" hidden>
						</table>
						<div class="form-style-6">
							<input type="submit" name="registerrunner" value="Submit" >
						</div>
						

					</form>
				</fieldset>
			</div>
			
		  	<?php
		   		}
		   
		  
		   //	<!-- tamat utk register runner-->
		  // 	<!-- utk register service provider-->
		 	
		   		else if(isset($_GET['regissp'])){


		   	?>
	   		<div class="col-lg  form-style-6">
				<fieldset>
					<legend><h1>Be Our Service Provider</h1></legend>
					<form action="index.php" method="POST">
						<table>
							
							<tr>
								<td><input type="text" name="SP_USERNAME"  class="form-control input-lg col-xs-4" placeholder="Account Username" required></td>
							</tr>
							<tr>
								<td><input type="text" name="SP_OWNNAME"  class="form-control input-lg col-xs-4" placeholder="Owner Full Name" required></td>
							</tr>
							<tr>
								<td><input type="text" name="SP_BUSINESS_NAME"  class="form-control input-lg" placeholder="Business Name" required></td>
							</tr>
							<tr>
								<td><input type="password" name="SP_PASSWORD"  class="form-control input-lg" placeholder="Password" minlength="5" maxlength="12" required></td>
							</tr>
							<tr>
								<td><input type="text" name="SP_PHONE_NO"  class="form-control input-lg" placeholder="Phone Number" required></td>
								
							</tr>
							<tr>
								<td><textarea cols="50" rows="4" name="SP_COMPADDRESS" class="form-control input-lg" required placeholder="Company Address"></textarea></td>
							
							</tr>
							<tr>
								<td><input type="text" name="SP_EMAIL"  class="form-control input-lg" placeholder="Email" required></td>
							</tr>
							<tr>
								<td><input type="text" name="SP_SSM"  class="form-control input-lg" placeholder="SSM Registration Number" required></td>
							</tr>
							<input type="text" name="SP_VERIFY"  class="form-control input-lg" placeholder="Pending" value="Pending" hidden>

						</table>
						<div class="form-style-6">
							<input type="submit" name="registersp" value="Submit" >
						</div>
						

					</form>
				</fieldset>
			</div>
			
		
		  	<?php
		   		}else{
		  	?>
		   	<!-- tamat utk register service provider-->


			<!-- utk index biasa-->
		    <div class="row">
			    <div class="col kotakkedai text-center py-4 m-4">
			    	<a href="">
		    			<legend><h1>Food Section</h1></legend>
			    		<img src="../IMG/food.jpg"   style="width: 100%;height: 70%;margin-top: 10px;border-radius: 10px;">
				    <button class="btn btn-info button2 btn-block mt-2"><h4>View</h4></button>
			    	</a>
			    </div>
			    <div class="col kotakkedai text-center py-4 m-4">
			    	<a href="">
			    		<legend><h1>Goods Section</h1></legend>
				    	<img src="../IMG/goods.jpg"   style="width: 100%;height: 70%;margin-top: 10px;border-radius: 10px;">
				    	<button class="btn btn-info button2 btn-block mt-2"><h4>View</h4></button>
			    	</a>
			    </div>
			    <div class="col kotakkedai text-center py-4 m-4">
			    	<a href="">
			    		<legend><h1>Medical Section</h1></legend>
			    		<img src="../IMG/medical.jpg"   style="width: 100%;height: 70%;margin-top: 10px;border-radius: 10px;">
				    <button class="btn btn-info button2 btn-block mt-2"><h4>View</h4></button>
			    	</a>
			    </div>
			    <div class="col kotakkedai text-center py-4 m-4">
			    	<a href="">
			    		<legend><h1>Pet Assist Section</h1></legend>
			    		<img src="../IMG/petassist.jpg"   style="width: 100%;height: 70%;margin-top: 10px;border-radius: 10px;">
			    		<button class="btn btn-info button2 btn-block mt-2"><h4>View</h4></button>
			    	</a>
			   
			  </div>

			</div>
			<?php
		   		}
		  	?>
			<!--tamat utk index biasa-->

		</div>
	
	</div>

	<!--     tamat utk content   -------------------- -->
<?php
	include "Footer.php";
?>
</body>

</html>