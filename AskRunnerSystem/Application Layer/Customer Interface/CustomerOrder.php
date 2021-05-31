<!DOCTYPE html>
<html>
<head>
    <title>ORDER | ASKRUNNER</title>
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
                    <legend><h1><?php echo $row['CUST_USERNAME'];?> Order Details</h1></legend>
                    <br>
                    <form action="" method="POST">
                        <table class="custdetails" style="font-size: 18px;">
                            <input type="text" name="CUST_ID" value="<?php echo $row['CUST_ID']; ?>" hidden>
                            <?php 
                        }       
                                
                                $orderviewdata = $customer->orderviewdata($custid);
                                foreach ($orderviewdata as $row) {
                                    $ORDER_NAME=$row['ORDER_NAME'];
                                    $ORDER_ADD=$row['ORDER_ADD'];
                                    $ORDER_PHONE_NO=$row['ORDER_PHONE_NO'];
                                }
                            ?>
                            <tr>
                                <td>Customer Name: </td>
                                <td><input type="text" name="ORDER_NAME" value="<?php echo $ORDER_NAME; ?>"></td>
                            </tr>
                            <tr>
                                <td>Delivery Address: </td>
                                <td><input type="text" name="ORDER_ADD" value="<?php echo $ORDER_ADD; ?>"></td>
                            </tr>
                            <tr>
                                <td>Delivery Phone Number: </td>
                                <td><input type="text" name="ORDER_PHONE_NO" value="<?php echo $ORDER_PHONE_NO; ?>"></td>
                            </tr>
                        </table>
                        <br>
                        <table class="orderdetails" style="font-size: 18px; " >
                            
                           
                            <input type="text" name="ORDER_ID" value="<?php echo $row['ORDER_ID']; ?>" hidden>
                            <input type="text" name="ORDER_PROD_PRICE" value="<?php echo $row['ORDER_PROD_PRICE']; ?>" hidden>
                            <tr>
                                <th>No.</th>
                                
                                <th>Order Product</th>
                                
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                            <?php 
                        //}       
                                $i=1;
                                
                                $ORDER_TOTAL_PRICE=0;
                                $orderview = $customer->orderview($custid);
                                foreach ($orderview as $row) {
                                    $orderid=$row['ORDER_ID'];
                                    $ORDER_FINAL_PRICE=$row['ORDER_PROD_PRICE'];
                                    
                            ?>
                            <tr>
                                <td><center><?php echo $i; ?></center></td>
                                <!--<td><center><?php echo $row['ORDER_ID']; ?></center></td>-->
                                <td><center><?php echo $row['ORDER_PROD_NAME']; ?></center></td>
                                
                                <td><center>RM <?php echo $row['ORDER_PROD_PRICE']; ?></center></td>
                                <td>
                                    <div class="form-style-6">
                                        <button class="btn btn-danger button2 btn-block mt-2" onclick="window.location.href='../Customer Interface/CustomerOrder.php?deleteOrder=delete&orderid=<?php echo $orderid?>'"><h3>Delete</h3></button>
                                    </div>
                                </td>
                            </tr>
                            <?php 

                               $ORDER_TOTAL_PRICE= $ORDER_TOTAL_PRICE+$ORDER_FINAL_PRICE;
                               $i++;
                                } 
                            ?>
                            <tr>
                                
                                
                                <th colspan="2">TOTAL PRICE :</th>
                                <td>RM <?php echo $ORDER_TOTAL_PRICE;?></td>
                                <td><a href="../Payment/payment.php?amount=<?php echo $ORDER_TOTAL_PRICE;?>" class="btn btn-success button2 btn-block mt-2">Checkout</a></td>
                            </tr>
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
