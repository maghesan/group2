<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Payment</title>
</head>
<body>
<?php
    include "../View Interface/Header.php";
    
?>
<div class="container-fluid content mb-5">
		<div class="col-lg-12 py-4" align="center">
        <fieldset>
            <legend><h1>Order Payment</h1></legend>

            <form action="charge.php" method="post" id="payment-form">

            <div class="form-style-6" style="font-size:20px;">

                <input type="text" name="fullname" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Full Name">

                <input type="email" name="email" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Email">
                <label>Amount</label>
                <input type="text" name="amount" class="form-control mb-3 StripeElement StripeElement--empty" value="<?php echo $_GET['amount'];?>" readonly>

               

                <input type="text" name="CUST_ID" class="form-control mb-3 StripeElement StripeElement--empty" value="<?php echo $_GET['CUST_ID'];?>" hidden>

                <div id="card-element">
                <!-- A Stripe Element will be inserted here. -->
                </div>

                <!-- Used to display Element errors. -->
                <div id="card-errors" role="alert"></div>
            

            <button >Submit Payment</button>
            
            </div>
            </form>
            </fieldset>
        </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="./js/charge.js"></script>
</body>
</html>