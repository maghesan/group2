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
  $data2 = $runner->viewaccepted($userid);
	if (isset($_POST['delete'])) {
		$runner->delete();
	}

  if(isset($_POST['accept'])){
    $orderid = $_POST['ORDER_ID'];
    $editStatus = $runner->editStatus();
  }

  if(isset($_POST['delivered'])){

    $deliStatus = $runner->deliStatus();
  }
?>

<!--    utk content    -->
	<div class="container-fluid content mb-5">
		<div class="col-lg-12 py-4" align="center">
      <!-- utk accept jobs -->
      <?php
        if (isset($_GET['jobs2'])) {
          # code...

      ?>


			<table id="example" class="table table-striped table-sm">
          		<thead>
            		<tr>
              			<th>No</th>
              			<th>Customer Name</th>
              			<th>Customer Address</th>
              			<th>Customer Phone Number</th>
              			<th>Order date</th>
              			<th>Order Price</th>
                    <th>Status</th>
              			<th>Action</th>
            		</tr>
            	</thead>
            	<tbody>
                <form method="post" action="">
            		<?php
            		$i =1;
                $data = $runner->viewAllOrder();

            		foreach($data as $row){

            			echo "<tr>"
                            ."<td>".$row['ORDER_ID']."</td>"
            			."<td>".$row['ORDER_NAME']."</td>"
            			."<td>".$row['ORDER_ADD']."</td>"
            			."<td>".$row['ORDER_PHONE_NO']."</td>"
            			."<td>".$row['ORDER_DATE']."</td>"
            			."<td>".$row['ORDER_PROD_PRICE']."</td>"
                  ."<td>".$row['deliveryStatus']."</td>";
            		?>

            			<td>

                        <input type="text" name="ORDER_ID" value="<?php echo $row['ORDER_ID']; ?>" hidden>
                        <input type="text" name="deliveryStatus" value="pending" hidden>
                        <input type="text" name="RUN_ID" value="<?php echo $_SESSION['RUN_ID']?>" hidden>
                        <input type="submit" name="accept" value="Accept">

                    <!--
            				<form action="" method="POST">
            					<button style="background-color: #4CAF50; color: black; border-radius: 12px; padding: 10px 24px" name="jobs2" value="pending" onclick="window.location.href='../Runner Interface/RunnerDeliveryJobs.php?jobs2&orderid=<?php echo $row['ORDER_ID']?>'">Accept Jobs</button>

            				</form>
                  -->
            			</td>

            		<?php
              		$i++;
              		echo "</tr>";
           		 	}

            		?> </form>
            	</tbody>
            </table>

            <?php
                }

                // <!-- tamat utk accept jobs -->
                //<!-- utk view jobs that accept by runner -->

                else if (isset($_GET['jobs1'])) {


            ?>
                    <table id="example" class="table table-striped table-sm">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Customer Name</th>
                            <th>Customer Address</th>
                            <th>Customer Phone Number</th>
                            <th>Order date</th>
                            <th>Order Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <form method="post" action="">
                            <?php
                            $i =1;


                            foreach($data2 as $row){

                                echo "<tr>"
                                    ."<td>".$row['ORDER_ID']."</td>"
                                    ."<td>".$row['ORDER_NAME']."</td>"
                                    ."<td>".$row['ORDER_ADD']."</td>"
                                    ."<td>".$row['ORDER_PHONE_NO']."</td>"
                                    ."<td>".$row['ORDER_DATE']."</td>"
                                    ."<td>".$row['ORDER_PROD_PRICE']."</td>"
                                    ."<td>".$row['deliveryStatus']."</td>";
                                ?>

                                <td>

                                    <input type="text" name="ORDER_ID" value="<?php echo $row['ORDER_ID']; ?>" hidden>
                                    <input type="text" name="deliveryStatus" value="pending" hidden>
                                    <input type="text" name="RUN_ID" value="<?php echo $_SESSION['RUN_ID']?>" hidden>
                                    <input type="submit" name="delivered" value="Delivered">

                                    <!--
            				<form action="" method="POST">
            					<button style="background-color: #4CAF50; color: black; border-radius: 12px; padding: 10px 24px" name="jobs2" value="pending" onclick="window.location.href='../Runner Interface/RunnerDeliveryJobs.php?jobs2&orderid=<?php echo $row['ORDER_ID']?>'">Accept Jobs</button>

            				</form>
                  -->
                                </td>

                                <?php
                                $i++;
                                echo "</tr>";
                            }

                            ?> </form>
                        </tbody>
                    </table>

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