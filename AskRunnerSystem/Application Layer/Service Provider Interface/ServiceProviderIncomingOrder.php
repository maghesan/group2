
<!DOCTYPE html>
<html>
<head>
    <title>SERVICE PROVIDER | ASKRUNNER</title>
</head>
<body>

<?php
include '../View Interface/Header.php';
require_once $_SERVER["DOCUMENT_ROOT"].'/AskRunnerSystem/Business Service Layer/Controller/Product.php';
require_once $_SERVER["DOCUMENT_ROOT"].'/AskRunnerSystem/Business Service Layer/Controller/ServiceProvider.php';
$serviceprovider = new spcontroller();
$spid = $_SESSION['SP_ID'];
$spincoming = $serviceprovider->spincomingorder($spid);
$username = $_SESSION['SP_USERNAME'];
$pet = new productcontroller();
$goods = new productcontroller();
$food = new productcontroller();
$medical = new productcontroller();

if(isset($_POST['Accept'])){

    $dstatuspet = $pet->dstatuspet();
    $dstatusgoods = $goods->dstatusgoods();
    $dstatusfood = $food->dstatusfood();
    $dstatusmedical = $medical->dstatusmedical();
}

?>

<!--    utk content    -->
<div class="container-fluid content mb-5">
    <div class="col-lg-12 py-4" align="center">

        <div style="width: 80%;font-size: 20px; text-align: center">
            <fieldset>
                <legend><h1><?php echo $username;?> Incoming Order</h1></legend>


                <form action="" method="post">
                    <table class="table ">

                        <thead >
                        <tr>
                            <th >
                                <h3 style="color: #061161;">No</h3>
                            </th >
                            <th >
                                <h3 style="color: #061161;">Food Name</h3>
                            </th >
                            <th >
                                <h3 style="color: #061161;">Price (RM)</h3>
                            </th >


                        </tr>

                        </thead>

                        <?php
                        $total = 0;
                        $i=0;
                        foreach ($spincoming as $row) {
                            $i++;
                            ?>
                            <tr>

                                <td><input type="hidden" name="ORDER_ID" value="<?php echo $row['ORDER_ID']?>"</td>
                                    <?php echo $row['ORDER_ID']; ?>

                                <td>

                                    <?php echo $row['ORDER_PROD_NAME']; ?>

                                </td>
                                <td>
                                    <?php echo $row['ORDER_PROD_PRICE']; ?>

                                </td>
                               <td>
                                <input type="submit" name="Accept" value="Accept">
                                </td>

                            </tr>

                            <?php
                            $income = $row['ORDER_PROD_PRICE'];
                            $total=$total+$income;
                        }
                        ?>


                        <tr>

                            <td colspan="2">
                                Total

                            </td>
                            <td>
                                <?php echo $total; ?>

                            </td>

                        </tr>
                    </table>
                </form>
            </fieldset>
        </div>
    </div>

</div>

<!--     tamat utk content   -------------------- -->
<?php
include "../View Interface/Footer.php";
?>
</body>

</html>