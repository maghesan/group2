
<!DOCTYPE html>
<html>
<head>
	<title>SERVICE PROVIDER | ASKRUNNER</title>
</head>
<body>
				
<?php
	include '../View Interface/Header.php';
	require_once $_SERVER["DOCUMENT_ROOT"].'/AskRunnerSystem/Business Service Layer/Controller/Product.php';
	$pet = new productcontroller();
	$goods = new productcontroller();
	$food = new productcontroller();
	$medical = new productcontroller();
	if(isset($_POST['AddPet'])){
		if(isset($_POST['PET_IMAGE'])){
   			$file = $_FILES['PETGD_IMAGE'];
			$file_name = $_FILES['PETGD_IMAGE']['name'];
   			$file_tmpname = $_FILES['PETGD_IMAGE']['tmp_name'];
   			$file_destination = '../IMG/'. $file_name;
			if (file_exists($file_destination)) {

			}else{
   			    move_uploaded_file($file_tmpname, $file_destination);
   			}
		}
		$addpet = $pet->addpet();

	}else if(isset($_POST['AddGoods'])){
		if(isset($_POST['GD_IMAGE'])){
   			$file = $_FILES['GD_IMAGE'];
			$file_name = $_FILES['GD_IMAGE']['name'];
   			$file_tmpname = $_FILES['GD_IMAGE']['tmp_name'];
   			$file_destination = '../IMG/'. $file_name;
			if (file_exists($file_destination)) {

			}else{
   			    move_uploaded_file($file_tmpname, $file_destination);
   			}
		}
		$addgoods = $goods->addgoods();

	}else if(isset($_POST['AddFood'])){
		if(isset($_POST['FD_IMAGE'])){
   			$file = $_FILES['FD_IMAGE'];
			$file_name = $_FILES['FD_IMAGE']['name'];
   			$file_tmpname = $_FILES['FD_IMAGE']['tmp_name'];
   			$file_destination = '../IMG/'. $file_name;
			if (file_exists($file_destination)) {

			}else{
   			    move_uploaded_file($file_tmpname, $file_destination);
   			}
		}
		$addfood = $food->addfood();

	}else if(isset($_POST['AddMedical'])){
		if(isset($_POST['MD_IMAGE'])){
   			$file = $_FILES['MD_IMAGE'];
			$file_name = $_FILES['MD_IMAGE']['name'];
   			$file_tmpname = $_FILES['MD_IMAGE']['tmp_name'];
   			$file_destination = '../IMG/'. $file_name;
			if (file_exists($file_destination)) {

			}else{
   			    move_uploaded_file($file_tmpname, $file_destination);
   			}
		}
		
		$addmedical = $medical->addmedical();
	}

 if(isset($_POST['editpet'])){
 	$id = $_POST['PET_PROID'];
 	$editpet = $pet->editpet($id);

 }else if(isset($_POST['editgoods'])){
 	$id = $_POST['GD_PROID'];
 	$editgoods = $goods->editgoods($id);

 }else if(isset($_POST['editmedical'])){
 	$id = $_POST['MD_PROID'];
 	$editmedical = $medical->editmedical($id);

 }else if(isset($_POST['editfood'])){
 	$id = $_POST['FD_PROID'];
 	$editfood = $food->editfood($id);

 }

  if(isset($_GET['delete'])){
 		$type = $_GET['delete'];
 		$proid = $_GET['proid'];
 		if ($type == "food"){
 			
 			$deletefood = $food->deletefood($proid);

 		}else if ($type == "goods"){
 			
 			$deletegoods = $goods->deletegoods($proid);

 		}else if ($type == "medical"){
 			
 			$deletemedical = $medical->deletemedical($proid);

 		}else if ($type == "pet"){
 			
 			$deletepet = $pet->deletepet($proid);

 		}
	}
?>

<!--    utk content    -->
	<div class="container-fluid content mb-5">
		<div class="col-lg-12 py-4" align="center">

			<!-- utk view product by service provider-->
			<?php

			//insert product choose product type
				if(isset($_GET['views'])){
			?>
		    <div class="row">
		    	<legend><h1>Choose Product Type to view</h1></legend>
			    <div class="col kotakkedai text-center py-4 m-4">
			    	<a href="../Service Provider Interface/ServiceProviderProduct.php?view=food">
		    			<legend><h1>Food Section</h1></legend>
			    		<img src="../IMG/food.jpg"   style="width: 100%;height: 70%;margin-top: 10px;border-radius: 10px;">
				    <button class="btn btn-info button2 btn-block mt-2"><h4>View</h4></button>
			    	</a>
			    </div>
			    <div class="col kotakkedai text-center py-4 m-4">
			    	<a href="../Service Provider Interface/ServiceProviderProduct.php?view=goods">
			    		<legend><h1>Goods Section</h1></legend>
				    	<img src="../IMG/goods.jpg"   style="width: 100%;height: 70%;margin-top: 10px;border-radius: 10px;">
				    	<button class="btn btn-info button2 btn-block mt-2"><h4>View</h4></button>
			    	</a>
			    </div>
			    <div class="col kotakkedai text-center py-4 m-4">
			    	<a href="../Service Provider Interface/ServiceProviderProduct.php?view=medical">
			    		<legend><h1>Medical Section</h1></legend>
			    		<img src="../IMG/medical.jpg"   style="width: 100%;height: 70%;margin-top: 10px;border-radius: 10px;">
				    <button class="btn btn-info button2 btn-block mt-2"><h4>View</h4></button>
			    	</a>
			    </div>
			    <div class="col kotakkedai text-center py-4 m-4">
			    	<a href="../Service Provider Interface/ServiceProviderProduct.php?view=pet">
			    		<legend><h1>Pet Assist Section</h1></legend>
			    		<img src="../IMG/petassist.jpg"   style="width: 100%;height: 70%;margin-top: 10px;border-radius: 10px;">
			    		<button class="btn btn-info button2 btn-block mt-2"><h4>View</h4></button>
			    	</a>
			   
			  </div>

			</div>
			<?php
//view and update food product 
				}
				$spid = $_SESSION['SP_ID'];
				if(!empty($_GET['view'])){
					$view = $_GET['view'];
					if($view == "food"){
						$view = $food->viewfood($spid);
						foreach ($view as $row) {
							$proid = $row['FD_PROID'];
						?>

								<div class="col-lg-4 form-style-6 ml-5">
								<fieldset>
									<legend><h1><?php echo $row['FD_NAME'];?></h1></legend>
									<form action="../Service Provider Interface/ServiceProviderProduct.php?view=food&proid=<?php echo $proid?>" method="POST">
										<table>
							<input type="text" name="FD_PROID" value="<?php echo $row['FD_PROID'];?>" hidden>
							<tr>
								<td>
									<h3 style="color: #061161">Product Name</h3>
								</td>
								<td>
									<input type="text" name="FD_NAME"  class="form-control input-lg col-xs-4"value="<?php echo $row['FD_NAME'];?>"required>
								</td>
							</tr>
							<tr>
								<td>
									<h3 style="color: #061161">Product Type</h3>
								</td>
								<td>
									<input type="text" name="FD_TYPE"  class="form-control input-lg col-xs-4" value="<?php echo $row['FD_TYPE'];?>"required>
								</td>
							</tr>
							<tr>
								<td>
									<h3 style="color: #061161">Product Price</h3>
								</td>
								<td><input type="number" name="FD_PRICE"  class="form-control input-lg" value="<?php echo $row['FD_PRICE'];?>" required></td>
							</tr>
							<tr>
								<td>
									<h3 style="color: #061161">Product Brand</h3>
								</td>
								<td>
									<input type="text" name="FD_BRAND"  class="form-control input-lg col-xs-4" value="<?php echo $row['FD_BRAND'];?>" required>
								</td>
							</tr>
							<tr>
								<td>
									<h3 style="color: #061161">Product Certification</h3>
								</td>
								<td>
									<input type="text" name="FD_CERTIFICATIONS"  class="form-control input-lg col-xs-4" value="<?php echo $row['FD_CERTIFICATIONS'];?>"  required>
								</td>
							</tr>
							<tr>
								<td>
									<h3 style="color: #061161">Product Description</h3>
								</td>
								<td>
									<textarea cols="50" rows="4" name="FD_DESCRIPTIONS" class="form-control input-lg"><?php echo $row['FD_DESCRIPTIONS'];?></textarea>
								</td>
							</tr>
							<tr>
								<td>
									<h3 style="color: #061161">Product Stock</h3>
								</td>
								<td><input type="number" name="FD_STOCK"  class="form-control input-lg" value="<?php echo $row['FD_STOCK'];?>" required></td>
							</tr>
							<tr>
								<td>
									<h3 style="color: #061161">Product Expire Date</h3>
								</td>
								<td>
									<input type="date" name="FD_EXPIRY_DATE"  class="form-control input-lg col-xs-4" value="<?php echo $row['FD_EXPIRY_DATE'];?>" required>
								</td>
							</tr>
							<tr>
								<td>
									<h3 style="color: #061161">Product Shipping Fee</h3>
								</td>
								<td><input type="number" name="FD_SHIP_FEE"  class="form-control input-lg" value="<?php echo $row['FD_SHIP_FEE'];?>" required></td>
							</tr>
							<tr>
								<td>
									<h3 style="color: #061161">Product Shipping From</h3>
								</td>
								<td><input type="text" name="FD_SHIPS_FROM"  class="form-control input-lg" value="<?php echo $row['FD_SHIPS_FROM'];?>" required></td>
							</tr>
							<tr>
								<td>
									<h3 style="color: #061161">Product Origin</h3>
								</td>
								<td><input type="text" name="FD_ORIGIN"  class="form-control input-lg" value="<?php echo $row['FD_ORIGIN'];?>" required></td>
							</tr>
							<tr>
								<td>
									<h3 style="color: #061161">Choose Image</h3>
								</td>
								<td>
									<input type="text" name="image" class="form-control input-lg" value="<?php echo $row['FD_IMAGE'];?>">
									<input type="file" name="FD_IMAGE"  class="form-control input-lg" required></td><br>
							</tr>
							<tr>
								<td></td>
							</tr>
							<tr>
								<td>
									<h3 style="color: #061161">Publish</h3>
								</td>
								<td>
									
									<input type="text" name="FD_PUBLISH"  class="form-control input-lg" value="<?php echo $row['FD_PUBLISH'];?>" required>
								</td>
							</tr>

						</table>
										<div class="form-style-6">
											<input type="submit" name="editfood" value="Update" >
											<button class="btn btn-danger button2 btn-block mt-2" onclick="window.location.href='../Service Provider Interface/ServiceProviderProduct.php?delete=food&proid=<?php echo $proid?>'"><h3>Delete</h3></button>
										</div>
										

									</form>
								</fieldset>
							</div>

					    <?php
					    	}
					  
					}
//view and update goods
					else if($view == "goods"){
						$view = $goods->viewgoods($spid);
						foreach ($view as $row) {
							$proid = $row['GD_PROID'];
							$GD_DESCRIPTIONS = $row['GD_DESCRIPTIONS'];
						?>

								<div class="col-lg-4 form-style-6 ml-5">
								<fieldset>
									<legend><h1><?php echo $row['GD_NAME'];?></h1></legend>
									<form action="../Service Provider Interface/ServiceProviderProduct.php?view=goods&proid=<?php echo $proid?>" method="POST">
										<table>
											<input type="text" name="GD_PROID" value="<?php echo $row['GD_PROID']; ?>" hidden>
											<tr>
												<td>
													<h3 style="color: #061161">Product Name</h3>
												</td>
												<td>
													<input type="text" name="GD_NAME"  class="form-control input-lg col-xs-4" value="<?php echo $row['GD_NAME'];?>" required>
												</td>
											</tr>
											<tr>
												<td>
													<h3 style="color: #061161">Product Type</h3>
												</td>
												<td>
													<input type="text" name="GD_TYPE"  class="form-control input-lg col-xs-4"  value="<?php echo $row['GD_TYPE'];?>"  required>
												</td>
											</tr>
											<tr>
												<td>
													<h3 style="color: #061161">Product Price</h3>
												</td>
												<td><input type="number" name="GD_PRICE"  class="form-control input-lg" value="<?php echo $row['GD_PRICE'];?>"  required></td>
											</tr>
											<tr>
												<td>
													<h3 style="color: #061161">Product Brand</h3>
												</td>
												<td>
													<input type="text" name="GD_BRAND"  class="form-control input-lg col-xs-4"  value="<?php echo $row['GD_BRAND'];?>"  required>
												</td>
											</tr>
											<tr>
												<td>
													<h3 style="color: #061161">Product Function</h3>
												</td>
												<td>
													<input type="text" name="GD_CATEGORY"  class="form-control input-lg col-xs-4" value="<?php echo $row['GD_CATEGORY'];?>" required>
												</td>
											</tr>
											<tr>
												<td>
													<h3 style="color: #061161">Product Description</h3>
												</td>
												<td>
													<textarea cols="50" rows="4" name="GD_DESCRIPTIONS" class="form-control input-lg"><?php echo $GD_DESCRIPTIONS;?></textarea>
												</td>
											</tr>
											<tr>
												<td>
													<h3 style="color: #061161">Product Stock</h3>
												</td>
												<td><input type="number" name="GD_STOCK"  class="form-control input-lg" value="<?php echo $row['GD_STOCK'];?>"  required></td>
											</tr>
											<tr>
												<td>
													<h3 style="color: #061161">Product Shipping Fee</h3>
												</td>
												<td><input type="number" name="GD_SHIPS_FEE"  class="form-control input-lg" value="<?php echo $row['GD_SHIPS_FEE'];?>"  required></td>
											</tr>
											<tr>
												<td>
													<h3 style="color: #061161">Product Shipping From</h3>
												</td>
												<td><input type="text" name="GD_SHIPS_FROM"  class="form-control input-lg" value="<?php echo $row['GD_SHIPS_FROM'];?>" required></td>
											</tr>
											<tr>
												<td>
													<h3 style="color: #061161">Product Origin</h3>
												</td>
												<td><input type="text" name="GD_ORIGIN"  class="form-control input-lg" value="<?php echo $row['GD_ORIGIN'];?>" required></td>
											</tr>
											<tr>
												<td>
													<h3 style="color: #061161">Choose Image</h3>
												</td>
												<td>
													<input type="text" name="image" class="form-control input-lg" value="<?php echo $row['GD_IMAGE'];?>">
													<input type="file" name="GD_IMAGE"  class="form-control input-lg" required></td><br>
											</tr>
											<tr>
												<td></td>
											</tr>
											<tr>
												<td>
													<h3 style="color: #061161">Publish</h3>
												</td>
												<td>
													<select name="GD_PUBLISH" required="">
														<option value="Yes">Yes</option>
														<option value="No">No</option>
													</select>
												</td>
											</tr>

										</table>
										<div class="form-style-6">
											<input type="submit" name="editgoods" value="Update" >
											<button class="btn btn-danger button2 btn-block mt-2" onclick="window.location.href='../Service Provider Interface/ServiceProviderProduct.php?delete=goods&proid=<?php echo $proid?>'"><h3>Delete</h3></button>
										</div>
										

									</form>
								</fieldset>
							</div>

						<?php
					}
					}
//view and update medical
					else if($view == "medical"){
						$view = $medical->viewmedical($spid);
						foreach ($view as $row) {
							$proid = $row['MD_PROID'];
						?>

								<div class="col-lg-4 form-style-6 ml-5">
								<fieldset>
									<legend><h1><?php echo $row['MD_NAME'];?></h1></legend>
									<form action="../Service Provider Interface/ServiceProviderProduct.php?view=medical&proid=<?php echo $proid?>" method="POST">
										<table>
											<input type="text" name="MD_PROID" value="<?php echo $row['MD_PROID']; ?>" hidden>
											<tr>
												<td>
													<h3 style="color: #061161">Product Name</h3>
												</td>
												<td>
													<input type="text" name="MD_NAME"  class="form-control input-lg col-xs-4" value="<?php echo $row['MD_NAME'];?>" required>
												</td>
											</tr>
											<tr>
												<td>
													<h3 style="color: #061161">Product Type</h3>
												</td>
												<td>
													<input type="text" name="MD_TYPE"  class="form-control input-lg col-xs-4"  value="<?php echo $row['MD_TYPE'];?>"  required>
												</td>
											</tr>
											<tr>
												<td>
													<h3 style="color: #061161">Product Price</h3>
												</td>
												<td><input type="number" name="MD_PRICE"  class="form-control input-lg" value="<?php echo $row['MD_PRICE'];?>"  required></td>
											</tr>
											<tr>
												<td>
													<h3 style="color: #061161">Product SKIN TYPE</h3>
												</td>
												<td>
													<input type="text" name="MD_SKIN_TYPE"  class="form-control input-lg col-xs-4"  value="<?php echo $row['MD_SKIN_TYPE'];?>"  required>
												</td>
											</tr>
											<tr>
												<td>
													<h3 style="color: #061161">Product Function</h3>
												</td>
												<td>
													<input type="text" name="MD_FUNCTION"  class="form-control input-lg col-xs-4" value="<?php echo $row['MD_FUNCTION'];?>" required>
												</td>
											</tr>
											<tr>
												<td>
													<h3 style="color: #061161">Product Description</h3>
												</td>
												<td>
													<textarea cols="50" rows="4" name="MD_DESCRIPTIONS" class="form-control input-lg"  ><?php echo $row['MD_DESCRIPTIONS'];?></textarea>
												</td>
											</tr>
											<tr>
												<td>
													<h3 style="color: #061161">Product Stock</h3>
												</td>
												<td><input type="number" name="MD_STOCK"  class="form-control input-lg" value="<?php echo $row['MD_STOCK'];?>"  required></td>
											</tr>
											<tr>
												<td>
													<h3 style="color: #061161">Product Skin Concern</h3>
												</td>
												<td>
													<input type="text" name="MD_SKIN_CONCERN"  class="form-control input-lg col-xs-4" value="<?php echo $row['MD_SKIN_CONCERN'];?>" required>
												</td>
											</tr>
											<tr>
												<td>
													<h3 style="color: #061161">Product Expire Date</h3>
												</td>
												<td>
													<input type="date" name="MD_EXPIRY_DATE"  class="form-control input-lg col-xs-4" value="<?php echo $row['MD_EXPIRY_DATE'];?>" required>
												</td>
											</tr>
											<tr>
												<td>
													<h3 style="color: #061161">Product Shipping Fee</h3>
												</td>
												<td><input type="number" name="MD_SHIP_FEE"  class="form-control input-lg" value="<?php echo $row['MD_SHIP_FEE'];?>"  required></td>
											</tr>
											<tr>
												<td>
													<h3 style="color: #061161">Product Shipping From</h3>
												</td>
												<td><input type="text" name="MD_SHIPS_FROM"  class="form-control input-lg" value="<?php echo $row['MD_SHIPS_FROM'];?>" required></td>
											</tr>
											<tr>
												<td>
													<h3 style="color: #061161">Product Origin</h3>
												</td>
												<td><input type="text" name="MD_ORIGIN"  class="form-control input-lg" value="<?php echo $row['MD_ORIGIN'];?>" required></td>
											</tr>
											<tr>
												<td>
													<h3 style="color: #061161">Choose Image</h3>
												</td>
												<td>
													<input type="text" name="image" class="form-control input-lg" value="<?php echo $row['MD_IMAGE'];?>">
													<input type="file" name="MD_IMAGE"  class="form-control input-lg" required></td><br>
											</tr>
											<tr>
												<td></td>
											</tr>
											<tr>
												<td>
													<h3 style="color: #061161">Publish</h3>
												</td>
												<td>
													<select name="MD_PUBLISH" required="">
														<option value="Yes">Yes</option>
														<option value="No">No</option>
													</select>
												</td>
											</tr>

										</table>
										<div class="form-style-6">
											<input type="submit" name="editmedical" value="Update" >
											<button class="btn btn-danger button2 btn-block mt-2" onclick="window.location.href='../Service Provider Interface/ServiceProviderProduct.php?delete=medical&proid=<?php echo $proid?>'"><h3>Delete</h3></button>
										</div>
										

									</form>
								</fieldset>
							</div>

						<?php
					}
					}
//view and update pet
					else if($view == "pet"){
						$view = $pet->viewpet($spid);
						foreach ($view as $row) {
							$proid = $row['PET_PROID'];
						?>

								<div class="col-lg-4 form-style-6 ml-5">
								<fieldset>
									<legend><h1><?php echo $row['PET_NAME'];?></h1></legend>
									<form action="../Service Provider Interface/ServiceProviderProduct.php?view=pet&proid=<?php echo $proid?>" method="POST">
										<table>
											<input type="text" name="PET_PROID" value="<?php echo $row['PET_PROID']; ?>" hidden>
											<tr>
												<td>
													<h3 style="color: #061161">Product Name</h3>
												</td>
												<td>
													<input type="text" name="PET_NAME"  class="form-control input-lg col-xs-4" value="<?php echo $row['PET_NAME'];?>" required>
												</td>
											</tr>
											<tr>
												<td>
													<h3 style="color: #061161">Product Type</h3>
												</td>
												<td>
													<input type="text" name="PET_TYPE"  class="form-control input-lg col-xs-4"  value="<?php echo $row['PET_TYPE'];?>"  required>
												</td>
											</tr>
											<tr>
												<td>
													<h3 style="color: #061161">Product Price</h3>
												</td>
												<td><input type="number" name="PET_PRICE"  class="form-control input-lg" value="<?php echo $row['PET_PRICE'];?>"  required></td>
											</tr>
											<tr>
												<td>
													<h3 style="color: #061161">Product Brand</h3>
												</td>
												<td>
													<input type="text" name="PET_BRAND"  class="form-control input-lg col-xs-4"  value="<?php echo $row['PET_BRAND'];?>"  required>
												</td>
											</tr>
											<tr>
												<td>
													<h3 style="color: #061161">Product Function</h3>
												</td>
												<td>
													<input type="text" name="PET_FUNCTION"  class="form-control input-lg col-xs-4" value="<?php echo $row['PET_FUNCTION'];?>" required>
												</td>
											</tr>
											<tr>
												<td>
													<h3 style="color: #061161">Product Description</h3>
												</td>
												<td>
													<textarea cols="50" rows="4" name="PET_DESCRIPTIONS" class="form-control input-lg" ><?php echo $row['PET_DESCRIPTIONS'];?></textarea>
												</td>
											</tr>
											<tr>
												<td>
													<h3 style="color: #061161">Product Stock</h3>
												</td>
												<td><input type="number" name="PET_STOCK"  class="form-control input-lg" value="<?php echo $row['PET_STOCK'];?>"  required></td>
											</tr>
											<tr>
												<td>
													<h3 style="color: #061161">Product Life Stage</h3>
												</td>
												<td>
													<input type="text" name="PET_LIFE_STAGE"  class="form-control input-lg col-xs-4" value="<?php echo $row['PET_LIFE_STAGE'];?>" required>
												</td>
											</tr>
											<tr>
												<td>
													<h3 style="color: #061161">Product Expire Date</h3>
												</td>
												<td>
													<input type="date" name="PET_EXPIRY_DATE"  class="form-control input-lg col-xs-4" value="<?php echo $row['PET_EXPIRY_DATE'];?>" required>
												</td>
											</tr>
											<tr>
												<td>
													<h3 style="color: #061161">Product Shipping Fee</h3>
												</td>
												<td><input type="number" name="PET_SHIP_FEE"  class="form-control input-lg" value="<?php echo $row['PET_SHIP_FEE'];?>"  required></td>
											</tr>
											<tr>
												<td>
													<h3 style="color: #061161">Product Shipping From</h3>
												</td>
												<td><input type="text" name="PET_SHIPS_FROM"  class="form-control input-lg" value="<?php echo $row['PET_SHIPS_FROM'];?>" required></td>
											</tr>
											<tr>
												<td>
													<h3 style="color: #061161">Product Origin</h3>
												</td>
												<td><input type="text" name="PET_ORIGIN"  class="form-control input-lg" value="<?php echo $row['PET_ORIGIN'];?>" required></td>
											</tr>
											<tr>
												<td>
													<h3 style="color: #061161">Choose Image</h3>
												</td>
												<td>
													<input type="text" name="image" class="form-control input-lg" value="<?php echo $row['PET_IMAGE'];?>">
													<input type="file" name="PET_IMAGE"  class="form-control input-lg" required></td><br>
											</tr>
											<tr>
												<td></td>
											</tr>
											<tr>
												<td>
													<h3 style="color: #061161">Publish</h3>
												</td>
												<td>
													<select name="PET_PUBLISH" required="">
														<option value="Yes">Yes</option>
														<option value="No">No</option>
													</select>
												</td>
											</tr>

										</table>
										<div class="form-style-6">
											<input type="submit" name="editpet" value="Update" >
											<button class="btn btn-danger button2 btn-block mt-2" onclick="window.location.href='../Service Provider Interface/ServiceProviderProduct.php?delete=pet&proid=<?php echo $proid?>'"><h3>Delete</h3></button>
										</div>
										

									</form>
								</fieldset>
							</div>

						<?php
					}
		
			    	}

			  }

		
			//<!-- tamat utk view product by service provider-->
		
				

			//insert product choose product type
				if(isset($_GET['Add'])){
			?>
		    <div class="row">
		    	<legend><h1>Choose Product Type to add</h1></legend>
			    <div class="col kotakkedai text-center py-4 m-4">
			    	<a href="../Service Provider Interface/ServiceProviderProduct.php?Food">
		    			<legend><h1>Food Section</h1></legend>
			    		<img src="../IMG/food.jpg"   style="width: 100%;height: 70%;margin-top: 10px;border-radius: 10px;">
				    <button class="btn btn-info button2 btn-block mt-2"><h4>View</h4></button>
			    	</a>
			    </div>
			    <div class="col kotakkedai text-center py-4 m-4">
			    	<a href="../Service Provider Interface/ServiceProviderProduct.php?Goods">
			    		<legend><h1>Goods Section</h1></legend>
				    	<img src="../IMG/goods.jpg"   style="width: 100%;height: 70%;margin-top: 10px;border-radius: 10px;">
				    	<button class="btn btn-info button2 btn-block mt-2"><h4>View</h4></button>
			    	</a>
			    </div>
			    <div class="col kotakkedai text-center py-4 m-4">
			    	<a href="../Service Provider Interface/ServiceProviderProduct.php?Medical">
			    		<legend><h1>Medical Section</h1></legend>
			    		<img src="../IMG/medical.jpg"   style="width: 100%;height: 70%;margin-top: 10px;border-radius: 10px;">
				    <button class="btn btn-info button2 btn-block mt-2"><h4>View</h4></button>
			    	</a>
			    </div>
			    <div class="col kotakkedai text-center py-4 m-4">
			    	<a href="../Service Provider Interface/ServiceProviderProduct.php?Pet">
			    		<legend><h1>Pet Assist Section</h1></legend>
			    		<img src="../IMG/petassist.jpg"   style="width: 100%;height: 70%;margin-top: 10px;border-radius: 10px;">
			    		<button class="btn btn-info button2 btn-block mt-2"><h4>View</h4></button>
			    	</a>
			   
			  </div>

			</div>
			<?php
			//insert food product 
				}else if(isset($_GET['Food'])){
			?>
		 <div class="col-lg  form-style-6">
				<fieldset>
					<legend><h1>Food Product</h1></legend>
					<form action="" method="POST">
						<table>
							<input type="text" name="SP_ID" value="<?php echo $_SESSION['SP_ID']; ?>" hidden>
							<tr>
								<td>
									<h3 style="color: #061161">Product Name</h3>
								</td>
								<td>
									<input type="text" name="FD_NAME"  class="form-control input-lg col-xs-4" placeholder="Name" required>
								</td>
							</tr>
							<tr>
								<td>
									<h3 style="color: #061161">Product Type</h3>
								</td>
								<td>
									<input type="text" name="FD_TYPE"  class="form-control input-lg col-xs-4" placeholder="Type" required>
								</td>
							</tr>
							<tr>
								<td>
									<h3 style="color: #061161">Product Price</h3>
								</td>
								<td><input type="number" name="FD_PRICE"  class="form-control input-lg" placeholder="Price" required></td>
							</tr>
							<tr>
								<td>
									<h3 style="color: #061161">Product Brand</h3>
								</td>
								<td>
									<input type="text" name="FD_BRAND"  class="form-control input-lg col-xs-4" placeholder="Brand" required>
								</td>
							</tr>
							<tr>
								<td>
									<h3 style="color: #061161">Product Certification</h3>
								</td>
								<td>
									<input type="text" name="FD_CERTIFICATIONS"  class="form-control input-lg col-xs-4" placeholder="Function" required>
								</td>
							</tr>
							<tr>
								<td>
									<h3 style="color: #061161">Product Description</h3>
								</td>
								<td>
									<textarea cols="50" rows="4" name="FD_DESCRIPTIONS" class="form-control input-lg" required placeholder="Description"></textarea>
								</td>
							</tr>
							<tr>
								<td>
									<h3 style="color: #061161">Product Stock</h3>
								</td>
								<td><input type="text" name="FD_STOCK"  class="form-control input-lg" placeholder="Stock" required></td>
							</tr>
							<tr>
								<td>
									<h3 style="color: #061161">Product Expire Date</h3>
								</td>
								<td>
									<input type="date" name="FD_EXPIRY_DATE"  class="form-control input-lg col-xs-4" placeholder="Expire Date" required>
								</td>
							</tr>
							<tr>
								<td>
									<h3 style="color: #061161">Product Shipping Fee</h3>
								</td>
								<td><input type="number" name="FD_SHIP_FEE"  class="form-control input-lg" placeholder="Shipping Fee" required></td>
							</tr>
							<tr>
								<td>
									<h3 style="color: #061161">Product Shipping From</h3>
								</td>
								<td><input type="text" name="FD_SHIPS_FROM"  class="form-control input-lg" placeholder="Shipping From" required></td>
							</tr>
							<tr>
								<td>
									<h3 style="color: #061161">Product Origin</h3>
								</td>
								<td><input type="text" name="FD_ORIGIN"  class="form-control input-lg" placeholder="Origin" required></td>
							</tr>
							<tr>
								<td>
									<h3 style="color: #061161">Choose Image</h3>
								</td>
								<td><input type="file" name="FD_IMAGE"  class="form-control input-lg" required></td><br>
							</tr>
							<tr>
								<td></td>
							</tr>
							<tr>
								<td>
									<h3 style="color: #061161">Publish</h3>
								</td>
								<td>
									<select name="FD_PUBLISH" required="">
										<option value="Yes">Yes</option>
										<option value="No">No</option>
									</select>
								</td>
							</tr>

						</table>
						<div class="form-style-6">
							<input type="submit" name="AddFood" value="Submit" >
						</div>
						

					</form>
				</fieldset>
			</div>
			<?php
			
			//insert Goods product 
				}else if(isset($_GET['Goods'])){
			?>
	 <div class="col-lg  form-style-6">
				<fieldset>
					<legend><h1>Goods Product</h1></legend>
						<form action="" method="POST">
						<table>
							<input type="text" name="SP_ID" value="<?php echo $_SESSION['SP_ID']; ?>" hidden>
							<tr>
								<td>
									<h3 style="color: #061161">Product Name</h3>
								</td>
								<td>
									<input type="text" name="GD_NAME"  class="form-control input-lg col-xs-4" placeholder="Name" required>
								</td>
							</tr>
							<tr>
								<td>
									<h3 style="color: #061161">Product Type</h3>
								</td>
								<td>
									<input type="text" name="GD_TYPE"  class="form-control input-lg col-xs-4" placeholder="Type" required>
								</td>
							</tr>
							<tr>
								<td>
									<h3 style="color: #061161">Product Price</h3>
								</td>
								<td><input type="number" name="GD_PRICE"  class="form-control input-lg" placeholder="Stock" required></td>
							</tr>
							<tr>
								<td>
									<h3 style="color: #061161">Product Brand</h3>
								</td>
								<td>
									<input type="text" name="GD_BRAND"  class="form-control input-lg col-xs-4" placeholder="Brand" required>
								</td>
							</tr>
							<tr>
								<td>
									<h3 style="color: #061161">Product Category</h3>
								</td>
								<td>
									<input type="text" name="GD_CATEGORY"  class="form-control input-lg col-xs-4" placeholder="Function" required>
								</td>
							</tr>
							<tr>
								<td>
									<h3 style="color: #061161">Product Description</h3>
								</td>
								<td>
									<textarea cols="50" rows="4" name="GD_DESCRIPTIONS" class="form-control input-lg" required placeholder="Description"></textarea>
								</td>
							</tr>
							<tr>
								<td>
									<h3 style="color: #061161">Product Stock</h3>
								</td>
								<td><input type="number" name="GD_STOCK"  class="form-control input-lg" placeholder="Stock" required></td>
							</tr>
							<tr>
								<td>
									<h3 style="color: #061161">Product Shipping Fee</h3>
								</td>
								<td><input type="number" name="GD_SHIPS_FEE"  class="form-control input-lg" placeholder="Shipping Fee" required></td>
							</tr>
							<tr>
								<td>
									<h3 style="color: #061161">Product Shipping From</h3>
								</td>
								<td><input type="text" name="GD_SHIPS_FROM"  class="form-control input-lg" placeholder="Shipping From" required></td>
							</tr>
							<tr>
								<td>
									<h3 style="color: #061161">Product Origin</h3>
								</td>
								<td><input type="text" name="GD_ORIGIN"  class="form-control input-lg" placeholder="Origin" required></td>
							</tr>
							<tr>
								<td>
									<h3 style="color: #061161">Choose Image</h3>
								</td>
								<td><input type="file" name="GD_IMAGE"  class="form-control input-lg" required></td><br>
							</tr>
							<tr>
								<td></td>
							</tr>
							<tr>
								<td>
									<h3 style="color: #061161">Publish</h3>
								</td>
								<td>
									<select name="GD_PUBLISH" required="">
										<option value="Yes">Yes</option>
										<option value="No">No</option>
									</select>
								</td>
							</tr>

						</table>
						<div class="form-style-6">
							<input type="submit" name="AddGoods" value="Submit" >
						</div>
						

					</form>
				</fieldset>
			</div>
			<?php
				
			//insert pet product 
				}else if(isset($_GET['Pet'])){
			?>
		   <div class="col-lg  form-style-6">
				<fieldset>
					<legend><h1>Pet Product</h1></legend>
					<form action="" method="POST">
						<table>
							<input type="text" name="SP_ID" value="<?php echo $_SESSION['SP_ID']; ?>" hidden>
							<tr>
								<td>
									<h3 style="color: #061161">Product Name</h3>
								</td>
								<td>
									<input type="text" name="PET_NAME"  class="form-control input-lg col-xs-4" placeholder="Name" required>
								</td>
							</tr>
							<tr>
								<td>
									<h3 style="color: #061161">Product Type</h3>
								</td>
								<td>
									<input type="text" name="PET_TYPE"  class="form-control input-lg col-xs-4" placeholder="Type" required>
								</td>
							</tr>
							<tr>
								<td>
									<h3 style="color: #061161">Product Price</h3>
								</td>
								<td><input type="number" name="PET_PRICE"  class="form-control input-lg" placeholder="Price" required></td>
							</tr>
							<tr>
								<td>
									<h3 style="color: #061161">Product Brand</h3>
								</td>
								<td>
									<input type="text" name="PET_BRAND"  class="form-control input-lg col-xs-4" placeholder="Brand" required>
								</td>
							</tr>
							<tr>
								<td>
									<h3 style="color: #061161">Product Function</h3>
								</td>
								<td>
									<input type="text" name="PET_FUNCTION"  class="form-control input-lg col-xs-4" placeholder="Function" required>
								</td>
							</tr>
							<tr>
								<td>
									<h3 style="color: #061161">Product Description</h3>
								</td>
								<td>
									<textarea cols="50" rows="4" name="PET_DESCRIPTIONS" class="form-control input-lg" required placeholder="Description"></textarea>
								</td>
							</tr>
							<tr>
								<td>
									<h3 style="color: #061161">Product Stock</h3>
								</td>
								<td><input type="number" name="PET_STOCK"  class="form-control input-lg" placeholder="Stock" required></td>
							</tr>
							<tr>
								<td>
									<h3 style="color: #061161">Product Life Stage</h3>
								</td>
								<td>
									<input type="text" name="PET_LIFE_STAGE"  class="form-control input-lg col-xs-4" placeholder="Life Stage" required>
								</td>
							</tr>
							<tr>
								<td>
									<h3 style="color: #061161">Product Expire Date</h3>
								</td>
								<td>
									<input type="date" name="PET_EXPIRY_DATE"  class="form-control input-lg col-xs-4" placeholder="Expire Date" required>
								</td>
							</tr>
							<tr>
								<td>
									<h3 style="color: #061161">Product Shipping Fee</h3>
								</td>
								<td><input type="number" name="PET_SHIP_FEE"  class="form-control input-lg" placeholder="Shipping Fee" required></td>
							</tr>
							<tr>
								<td>
									<h3 style="color: #061161">Product Shipping From</h3>
								</td>
								<td><input type="text" name="PET_SHIPS_FROM"  class="form-control input-lg" placeholder="Shipping From" required></td>
							</tr>
							<tr>
								<td>
									<h3 style="color: #061161">Product Origin</h3>
								</td>
								<td><input type="text" name="PET_ORIGIN"  class="form-control input-lg" placeholder="Origin" required></td>
							</tr>
							<tr>
								<td>
									<h3 style="color: #061161">Choose Image</h3>
								</td>
								<td><input type="file" name="PET_IMAGE"  class="form-control input-lg" required></td><br>
							</tr>
							<tr>
								<td></td>
							</tr>
							<tr>
								<td>
									<h3 style="color: #061161">Publish</h3>
								</td>
								<td>
									<select name="PET_PUBLISH" required="">
										<option value="Yes">Yes</option>
										<option value="No">No</option>
									</select>
								</td>
							</tr>

						</table>
						<div class="form-style-6">
							<input type="submit" name="AddPet" value="Submit" >
						</div>
						

					</form>
				</fieldset>
			</div>
			<?php
				

			//insert medical product 
				}else if(isset($_GET['Medical'])){
			?>
		   <div class="col-lg  form-style-6">
				<fieldset>
					<legend><h1>Medical Product</h1></legend>
					<form action="" method="POST">
						<table>
							<input type="text" name="SP_ID" value="<?php echo $_SESSION['SP_ID']; ?>" hidden>
							<tr>
								<td>
									<h3 style="color: #061161">Product Name</h3>
								</td>
								<td>
									<input type="text" name="MD_NAME"  class="form-control input-lg col-xs-4" placeholder="Name" required>
								</td>
							</tr>
							<tr>
								<td>
									<h3 style="color: #061161">Product Type</h3>
								</td>
								<td>
									<input type="text" name="MD_TYPE"  class="form-control input-lg col-xs-4" placeholder="Type" required>
								</td>
							</tr>
							<tr>
								<td>
									<h3 style="color: #061161">Product Price</h3>
								</td>
								<td><input type="number" name="MD_PRICE"  class="form-control input-lg" placeholder="Price" required></td>
							</tr>
							<tr>
								<td>
									<h3 style="color: #061161">Product Brand</h3>
								</td>
								<td>
									<input type="text" name="MD_BRAND"  class="form-control input-lg col-xs-4" placeholder="Brand" required>
								</td>
							</tr>
							<tr>
								<td>
									<h3 style="color: #061161">Product Function</h3>
								</td>
								<td>
									<input type="text" name="MD_FUNCTION"  class="form-control input-lg col-xs-4" placeholder="Function" required>
								</td>
							</tr>
							<tr>
								<td>
									<h3 style="color: #061161">Product Description</h3>
								</td>
								<td>
									<textarea cols="50" rows="4" name="MD_DESCRIPTIONS" class="form-control input-lg" required placeholder="Description"></textarea>
								</td>
							</tr>
							<tr>
								<td>
									<h3 style="color: #061161">Product Stock</h3>
								</td>
								<td><input type="number" name="MD_STOCK"  class="form-control input-lg" placeholder="Stock" required></td>
							</tr>
							<tr>
								<td>
									<h3 style="color: #061161">Product Skin Concern</h3>
								</td>
								<td>
									<input type="text" name="MD_SKIN_CONCERN"  class="form-control input-lg col-xs-4" placeholder="Life Stage" required>
								</td>
							</tr>
							<tr>
								<td>
									<h3 style="color: #061161">Product Skin Type</h3>
								</td>
								<td>
									<input type="text" name="MD_SKIN_TYPE"  class="form-control input-lg col-xs-4" placeholder="Life Stage" required>
								</td>
							</tr>
							<tr>
								<td>
									<h3 style="color: #061161">Product Expire Date</h3>
								</td>
								<td>
									<input type="date" name="MD_EXPIRY_DATE"  class="form-control input-lg col-xs-4" placeholder="Expire Date" required>
								</td>
							</tr>
							<tr>
								<td>
									<h3 style="color: #061161">Product Shipping Fee</h3>
								</td>
								<td><input type="number" name="MD_SHIP_FEE"  class="form-control input-lg" placeholder="Shipping Fee" required></td>
							</tr>
							<tr>
								<td>
									<h3 style="color: #061161">Product Shipping From</h3>
								</td>
								<td><input type="text" name="MD_SHIPS_FROM"  class="form-control input-lg" placeholder="Shipping From" required></td>
							</tr>
							<tr>
								<td>
									<h3 style="color: #061161">Product Origin</h3>
								</td>
								<td><input type="text" name="MD_ORIGIN"  class="form-control input-lg" placeholder="Origin" required></td>
							</tr>
							<tr>
								<td>
									<h3 style="color: #061161">Choose Image</h3>
								</td>
								<td><input type="file" name="MD_IMAGE"  class="form-control input-lg" required></td><br>
							</tr>
							<tr>
								<td></td>
							</tr>
							<tr>
								<td>
									<h3 style="color: #061161">Publish</h3>
								</td>
								<td>
									<select name="MD_PUBLISH" required="">
										<option value="Yes">Yes</option>
										<option value="No">No</option>
									</select>
								</td>
							</tr>

						</table>
						<div class="form-style-6">
							<input type="submit" name="AddMedical" value="Submit" >
						</div>
						

					</form>
				</fieldset>
			</div>
			<?php
				}
			?>
		</div>
	
	</div>

	<!--     tamat utk content   -------------------- -->
<?php
	include "../View Interface/Footer.php";
?>
</body>

</html>