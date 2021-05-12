<!DOCTYPE html>
<html>
<head>
	<title>RUNNER | ASKRUNNER</title>
</head>
<body>
				
<?php
	include '../View Interface/Header.php';
	require_once $_SERVER["DOCUMENT_ROOT"].'/AskRunnerSystem/Business Service Layer/Controller/Runner.php';

	$runner = new runnercontroller();
	$userid = $_SESSION['RUN_ID'];
  	$data = $runner->viewHistory($userid);
  

?>

<!--    utk content    -->
	<div class="container-fluid content mb-5">
		<div class="col-lg-12 py-4" align="center">
			<legend><h1><?php echo $_SESSION['RUN_USERNAME'];?> Delivery History</h1></legend>

      <table id="example" class="table table-striped table-sm" style="font-size: 20px;">
              <thead>
                <tr>
                    <th>No</th>
                    <th>Customer Name</th>
                    <th>Customer Address</th>
                    <th>Customer Phone Number</th>
                    <th>Order date</th>
                    <th>Order Price</th>
                    <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i =1;
                foreach($data as $row){
                  echo "<tr>"
                  ."<td>".$i."</td>"
                  ."<td>".$row['ORDER_NAME']."</td>"
                  ."<td>".$row['ORDER_ADD']."</td>"
                  ."<td>".$row['ORDER_PHONE_NO']."</td>"
                  ."<td>".$row['ORDER_DATE']."</td>"
                  ."<td>".$row['ORDER_PROD_PRICE']."</td>"
                  ."<td>".$row['deliveryStatus']."</td>";

                $i++;
                echo "</tr>";
                }

                ?>
              </tbody>
            </table>

		</div>
	
	</div>

	<!--     tamat utk content   -------------------- -->
<?php
	include "../View Interface/Footer.php";
?>
</body>

</html>