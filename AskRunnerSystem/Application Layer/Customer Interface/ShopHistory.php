<!DOCTYPE html>
<html>
<head>
    <title>ORDER HISTORY | ASKRUNNER</title>
</head>
<style type="text/css">
    input[type=number]{
        width: 80px;
    }


    .form-style-10{
        font: 95% Arial, Helvetica, sans-serif;
        max-width: 800px;
        margin: 10px auto;
        padding: 16px;
        background: #F7F7F7;
    }
    .form-style-10 th, .form-style-10 td, {
        border: 1px solid black;
    }
    .form-style-10 h1{
        background: #FF4E50;
        background: -webkit-linear-gradient(to right, #F9D423, #FF4E50);
        background: linear-gradient(to right, #F9D423, #FF4E50);
        padding: 10px 0;
        font-size: 140%;
        font-weight: 300;
        text-align: center;
        color: #fff;
        margin: -16px -16px 16px -16px;
    }
    .form-style-10 input[type="text"],.form-style-10 input[type="date"]
    {
        -webkit-transition: all 0.30s ease-in-out;
        -moz-transition: all 0.30s ease-in-out;
        -ms-transition: all 0.30s ease-in-out;
        -o-transition: all 0.30s ease-in-out;
        outline: none;
        box-sizing: border-box;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        width: 100%;
        background: #fff;
        margin-bottom: 4%;
        border: 1px solid #ccc;
        padding: 3%;
        color: #555;
        font: 20px Arial, Helvetica, sans-serif;
    }
    .form-style-10 input[type="text"]:focus,.form-style-10 input[type="date"]:focus,.form-style-10 input[type="number"]:focus
    {
        box-shadow: 0 0 5px #43D1AF;
        padding: 3%;
        border: 1px solid #43D1AF;
    }

    .form-style-10 input[type="submit"],.form-style-10 input[type="button"]{
        box-sizing: border-box;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        width: 100%;
        padding: 3%;
        background: #43D1AF;
        border-bottom: 2px solid #30C29E;
        border-top-style: none;
        border-right-style: none;
        border-left-style: none;
        color: #fff;
    }
    .form-style-10 input[type="submit"]:hover,.form-style-10 input[type="button"]:hover{
        background: #2EBC99;
    }
</style>
<body>

<?php
include '../View Interface/Header.php';
require_once $_SERVER["DOCUMENT_ROOT"].'/AskRunnerSystem/Business Service Layer/Controller/Product.php';
require_once $_SERVER["DOCUMENT_ROOT"].'/AskRunnerSystem/Business Service Layer/Controller/Customer.php';

$custid = $_SESSION['CUST_ID'];
$customer = new customercontroller();

$pet = new productcontroller();
$goods = new productcontroller();
$food = new productcontroller();
$medical = new productcontroller();
$customer = new customercontroller();

if (isset($_POST['editOrder'])) {
    $ORDER_FINAL_PRICE=$ORDER_PROD_PRICE*$_POST['ORDER_QUANTITY'];
    $custeditOrder = $customer->custeditOrder($custid);
}

if(isset($_GET['deleteOrder'])){
    $term = $_GET['deleteOrder'];
    $orderid = $_GET['orderid'];
    if ($term == "delete"){

        $deleteOrder = $customer->deleteOrder($orderid);

    }
}

if(isset($_GET['checkout'])){
    $term = $_GET['checkout'];
    $orderid = $_GET['orderid'];
    if ($term == "checkout"){

        $checkoutOrder = $customer->checkoutOrder($orderid);

    }
}

?>

<!--    utk content    -->
<div class="container-fluid content mb-5">
    <div class="col-lg-12 py-4" align="center">
        <div class="col-lg  form-style-10">
            <fieldset>
                <!--    view order details   -->
                <?php
                $custview = $customer->custview($custid);
                foreach ($custview as $row) {
                ?>
                <legend><h1><?php echo $row['CUST_USERNAME'];?> Order History</h1></legend>
                <br>
                <form action="" method="POST">
                    <table class="custdetails" style="font-size: 18px;">
                        <input type="text" name="CUST_ID" value="<?php echo $row['CUST_ID']; ?>" hidden>
                        <?php
                        }

                        $orderhistory = $customer->orderhistory($custid);
                        foreach ($orderhistory as $row) {
                            $ORDER_NAME=$row['ORDER_PROD_NAME'];
                            $ORDER_ADD=$row['ORDER_ADD'];

                        }
                        ?>


                    </table>
                    <br>
                    <table class="orderdetails" style="font-size: 18px; " >


                        <input type="text" name="ORDER_PROD_PRICE" value="<?php echo $row['ORDER_PROD_PRICE']; ?>" hidden>
                        <tr>
                            <th>Order ID.</th>
                            <th>Order Date.</th>
                            <th>   Product</th>

                            <th>Price</th>
                            <th>Delivery Address</th>
                            <th>Delivery Status</th>

                        </tr>
                        <?php
                        //}
                        $i=1;

                        $ORDER_TOTAL_PRICE=0;
                        $orderhistory = $customer->orderhistory($custid);
                        foreach ($orderhistory as $row) {


                            ?>
                            <tr>
                                <td><center><?php echo $row['ORDER_ID']; ?></center></td>
                                <td><center><?php echo $row['ORDER_DATE']; ?></center></td>
                                <td><center><?php echo $row['ORDER_PROD_NAME']; ?></center></td>

                                <td><center>RM <?php echo $row['ORDER_PROD_PRICE']; ?></center></td>
                                <td><center> <?php echo $row['ORDER_ADD']; ?></center></td>
                                <td><center> <?php echo $row['deliveryStatus']; ?></center></td>
                                <td>

                                </td>
                            </tr>
                            <?php


                            $i++;
                        }
                        ?>

                    </table>

                </form>
                <!--    end view order details   -->
            </fieldset>
        </div>
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
