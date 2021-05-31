
<!DOCTYPE html>
<html>
<head>
    <title>CUSTOMER | ASKRUNNER</title>
</head>
<body>
                
<?php
    include '../View Interface/Header.php';
    require_once $_SERVER["DOCUMENT_ROOT"].'/AskRunnerSystem/Business Service Layer/Controller/Product.php';
    require_once $_SERVER["DOCUMENT_ROOT"].'/AskRunnerSystem/Business Service Layer/Controller/Customer.php';
    $pet = new productcontroller();
    $goods = new productcontroller();
    $food = new productcontroller();
    $medical = new productcontroller();
    $customer= new customercontroller();
    $custid=$_SESSION['CUST_ID'];

    if(isset($_POST['AddOrderPet'])){
        
        $addorderpet = $pet->addorderpet();

    }else if(isset($_POST['AddOrderGoods'])){
        
        $addordergoods = $goods->addordergoods();

    }else if(isset($_POST['AddOrderFood'])){
        
        $addorderfood = $food->addorderfood();

    }else if(isset($_POST['AddOrderMedical'])){
        
        $addmedical = $medical->addordermedical();
    }

    
?>

<!--    utk content    -->
    <div class="container-fluid content mb-5">
        <div class="col-lg-12 py-4" align="center">
            
            <?php
                if(isset($_GET['food'])){
                    $view = $food->allfood();
                    foreach($view as $row) {
                        $proid=$row['FD_PROID'];
            ?>
            
            <!--    after select product type    -->
            <div class="row">
                <div class="col-md-3 kotakkedai text-center py-4 m-4">
                    <a href="CustomerIndex.php?type=food&proid=<?php echo $proid?>">
                        <legend><h1><?php echo $row['FD_NAME'];?></h1></legend>
                        <img src="../IMG/<?php echo $row['FD_IMAGE'];?>"   style="width: 100%;height: 70%;margin-top: 10px;border-radius: 10px;">
                    <button class="btn btn-info button2 btn-block mt-2"><h4>View</h4></button>
                    </a>
                </div>
            </div>
             <?php
               }
              }else if(isset($_GET['goods'])){
                    $view = $goods->allgoods();
                    foreach($view as $row) {
                        $proid=$row['GD_PROID'];
            ?>
             <div class="row">
                <div class="col-md-3 kotakkedai text-center py-4 m-4">
                    <a href="CustomerIndex.php?type=goods&proid=<?php echo $proid?>">
                        <legend><h1><?php echo $row['GD_NAME'];?></h1></legend>
                        <img src="../IMG/<?php echo $row['GD_IMAGE'];?>"   style="width: 100%;height: 70%;margin-top: 10px;border-radius: 10px;">
                    <button class="btn btn-info button2 btn-block mt-2"><h4>View</h4></button>
                    </a>
                </div>
            </div>
            <?php
              }
               }else if(isset($_GET['medical'])){
                    $view = $medical->allmedical();
                    foreach($view as $row) {
                        $proid=$row['MD_PROID'];
            ?>
             <div class="row">
                <div class="col-md-3 kotakkedai text-center py-4 m-4">
                    <a href="CustomerIndex.php?type=medical&proid=<?php echo $proid?>">
                        <legend><h1><?php echo $row['MD_NAME'];?></h1></legend>
                        <img src="../IMG/<?php echo $row['MD_IMAGE'];?>"   style="width: 100%;height: 70%;margin-top: 10px;border-radius: 10px;">
                    <button class="btn btn-info button2 btn-block mt-2"><h4>View</h4></button>
                    </a>
                </div>
            </div>
            <?php
              }
               }else if(isset($_GET['pet'])){
                    $view = $pet->allpet();
                    foreach($view as $row) {
                        $proid=$row['PET_PROID'];
            ?>
             <div class="row">
                <div class="col-md-3 kotakkedai text-center py-4 m-4">
                    <a href="CustomerIndex.php?type=pet&proid=<?php echo $proid?>">
                        <legend><h1><?php echo $row['PET_NAME'];?></h1></legend>
                        <img src="../IMG/<?php echo $row['PET_IMAGE'];?>"   style="width: 100%;height: 70%;margin-top: 10px;border-radius: 10px;">
                    <button class="btn btn-info button2 btn-block mt-2"><h4>View</h4></button>
                    </a>
                </div>
            </div>
            <!--    end after choose product type to view    -->
            <!--    view product details after choose the product to view    -->
            <?php
                    }
                }else if(isset($_GET['type']) && isset($_GET['proid'])){

                    if (!empty($_GET['type']) && !empty($_GET['proid'])) {
                        $type=($_GET['type']);
                        $proid=$_GET['proid'];
                        if ($type=="food") {
                            $details = $food->foodDetails($proid);
                            foreach($details as $row) {
            ?>
                <form action="" method="post">
                <table style="font-size: 15px;"> 
                <input type="text" name="CUST_ID" value="<?php echo $_SESSION['CUST_ID']; ?>" hidden>
                <input type="text" name="CUST_NAME" value="<?php echo $_SESSION['CUST_NAME']; ?>" hidden>
                <input type="text" name="CUST_ADDRESS" value="<?php echo $_SESSION['CUST_ADDRESS']; ?>" hidden>
                <input type="text" name="CUST_PHONE_NO" value="<?php echo $_SESSION['CUST_PHONE_NO']; ?>" hidden>
                <input type="text" name="FD_PROID" value="<?php echo $row['FD_PROID']; ?>" hidden>
                <input type="text" name="FD_NAME" value="<?php echo $row['FD_NAME']; ?>" hidden>
                
                <input type="text" name="FD_PRICE" value="<?php echo $row['FD_PRICE']; ?>" hidden>
                <!--<input type="text" name="FD_PROID" value="<?php //echo $row['FD_PROID']; ?>" hidden> -->            
                    <tr>
                        <td rowspan="13"><img style="width: 300px; " src="../IMG/<?php echo $row['FD_IMAGE'];?>" ></td>
                        <td><h2><?php echo $row['FD_NAME'];?></h2>

                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><h2>RM <?php echo $row['FD_PRICE'];?></h2></td>
                    </tr>
                    <tr>
                        <td></td>
                        
                        <td><?php echo $row['FD_STOCK'];?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>BRAND:</td>
                        <td><?php echo $row['FD_BRAND'];?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>TYPE:</td>
                        <td><?php echo $row['FD_TYPE'];?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>EXPIRY DATE:</td>
                        <td><?php echo $row['FD_EXPIRY_DATE'];?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>CERTIFICATIONS:</td>
                        <td><?php echo $row['FD_CERTIFICATIONS'];?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>ORIGIN:</td>
                        <td><?php echo $row['FD_ORIGIN'];?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>SHIPS FROM:</td>
                        <td><?php echo $row['FD_SHIPS_FROM'];?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>SHIPPING FEE:</td>
                        <td>RM <?php echo $row['FD_SHIP_FEE'];?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>PUBLISH:</td>
                        <td><?php echo $row['FD_PUBLISH'];?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>DESCRIPTION:</td>
                        <td><?php echo $row['FD_DESCRIPTIONS'];?></td>
                    </tr>
                </table>
                <div class="form-style-6">
                    <input type="submit" name="AddOrderFood" value="Add Order" >
                </div>
                </form>    
                    
            
            <?php
                            }
    
                        }
                else if ($type=="goods") {
                    $details = $goods->gooddetails($proid);
                    foreach($details as $row) {
            ?>
                <form action="" method="post"><center>
                <table style="font-size: 15px;">   
                <input type="text" name="CUST_ID" value="<?php echo $_SESSION['CUST_ID']; ?>" hidden>
                <input type="text" name="CUST_NAME" value="<?php echo $_SESSION['CUST_NAME']; ?>" hidden>
                <input type="text" name="CUST_ADDRESS" value="<?php echo $_SESSION['CUST_ADDRESS']; ?>" hidden>
                <input type="text" name="CUST_PHONE_NO" value="<?php echo $_SESSION['CUST_PHONE_NO']; ?>" hidden>
                <input type="text" name="GD_PROID" value="<?php echo $row['GD_PROID']; ?>" hidden>
                <input type="text" name="GD_NAME" value="<?php echo $row['GD_NAME']; ?>" hidden>
                
                <input type="text" name="GD_PRICE" value="<?php echo $row['GD_PRICE']; ?>" hidden>             
                    <tr>
                        <td rowspan="12"><img style="width: 300px; " src="../IMG/<?php echo $row['GD_IMAGE'];?>" ></td>
                        <td><h2><?php echo $row['GD_NAME'];?></h2></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td ><h2>RM: <?php echo $row['GD_PRICE'];?></h2></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>STOCK:</td>
                        <td><?php echo $row['GD_STOCK'];?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>BRAND:</td>
                        <td><?php echo $row['GD_BRAND'];?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>TYPE:</td>
                        <td><?php echo $row['GD_TYPE'];?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>CATEGORY:</td>
                        <td><?php echo $row['GD_CATEGORY'];?></td>
                    </tr>
                    
                    <tr>
                        <td></td>
                        <td>ORIGIN:</td>
                        <td><?php echo $row['GD_ORIGIN'];?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>SHIPS FROM:</td>
                        <td><?php echo $row['GD_SHIPS_FROM'];?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>SHIPPING FEE:</td>
                        <td>RM: <?php echo $row['GD_SHIP_FEE'];?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>PUBLISH:</td>
                        <td><?php echo $row['GD_PUBLISH'];?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>DESCRIPTION:</td>
                        <td><?php echo $row['GD_DESCRIPTIONS'];?></td>
                    </tr>
                </table>
                <div class="form-style-6">
                    <input type="submit" name="AddOrderGoods" value="Add Order" >
                </div>
                </center>
            </form>

            <?php
        }
    
            
                }else if ($type=="pet") {
                 $details = $pet->petdetails($proid);
                  foreach($details as $row) {
            ?>
                <form action="" method="post">
                <table style="font-size: 15px;">   
                <input type="text" name="CUST_ID" value="<?php echo $_SESSION['CUST_ID']; ?>" hidden>
                <input type="text" name="CUST_NAME" value="<?php echo $_SESSION['CUST_NAME']; ?>" hidden>
                <input type="text" name="CUST_ADDRESS" value="<?php echo $_SESSION['CUST_ADDRESS']; ?>" hidden>
                <input type="text" name="CUST_PHONE_NO" value="<?php echo $_SESSION['CUST_PHONE_NO']; ?>" hidden>
                <input type="text" name="PET_PROID" value="<?php echo $row['PET_PROID']; ?>" hidden>
                <input type="text" name="PET_NAME" value="<?php echo $row['PET_NAME']; ?>" hidden>
                
                <input type="text" name="PET_PRICE" value="<?php echo $row['PET_PRICE']; ?>" hidden>             
                    <tr>
                        <td rowspan="13"><img style="width: 300px; " src="../IMG/<?php echo $row['PET_IMAGE'];?>" ></td>
                        <td><h2><?php echo $row['PET_NAME'];?></h2></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><h2><?php echo $row['PET_PRICE'];?></h2></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>STOCK:</td>
                        <td><?php echo $row['PET_STOCK'];?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>BRAND:</td>
                        <td><?php echo $row['PET_BRAND'];?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>TYPE:</td>
                        <td><?php echo $row['PET_TYPE'];?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>FUNCTION:</td>
                        <td><?php echo $row['PET_FUNCTION'];?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>LIFE STAGE:</td>
                        <td><?php echo $row['PET_LIFE_STAGE'];?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>EXPIRY DATE:</td>
                        <td><?php echo $row['PET_EXPIRY_DATE'];?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>ORIGIN:</td>
                        <td><?php echo $row['PET_ORIGIN'];?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>SHIPS FROM:</td>
                        <td><?php echo $row['PET_SHIPS_FROM'];?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>SHIPPING FEE:</td>
                        <td><?php echo $row['PET_SHIP_FEE'];?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>PUBLISH:</td>
                        <td><?php echo $row['PET_PUBLISH'];?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>DESCRIPTION:</td>
                        <td><?php echo $row['PET_DESCRIPTIONS'];?></td>
                    </tr>
                </table>
                <div class="form-style-6">
                    <input type="submit" name="AddOrderPet" value="Add Order" >
                </div>
            </form>
                <?php
        }
    
            
                }else if ($type=="medical") {
                    $details = $medical->medicaldetails($proid);
                    foreach($details as $row) {
             ?>
                <form action="" method="post">
                <table style="font-size: 15px;"> 
                <input type="text" name="CUST_ID" value="<?php echo $_SESSION['CUST_ID']; ?>" hidden>
                <input type="text" name="CUST_NAME" value="<?php echo $_SESSION['CUST_NAME']; ?>" hidden>
                <input type="text" name="CUST_ADDRESS" value="<?php echo $_SESSION['CUST_ADDRESS']; ?>" hidden>
                <input type="text" name="CUST_PHONE_NO" value="<?php echo $_SESSION['CUST_PHONE_NO']; ?>" hidden>
                <input type="text" name="MD_PROID" value="<?php echo $row['MD_PROID']; ?>" hidden>
                <input type="text" name="MD_NAME" value="<?php echo $row['MD_NAME']; ?>" hidden>
                
                <input type="text" name="MD_PRICE" value="<?php echo $row['MD_PRICE']; ?>" hidden>               
                    <tr>
                        <td rowspan="13"><img style="width: 300px; " src="../IMG/<?php echo $row['MD_IMAGE'];?>" ></td>
                        <td><h2><?php echo $row['MD_NAME'];?></h2></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><h2>RM <?php echo $row['MD_PRICE'];?></h2></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>STOCK:</td>
                        <td><?php echo $row['MD_STOCK'];?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>BRAND:</td>
                        <td><?php echo $row['MD_BRAND'];?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>TYPE:</td>
                        <td><?php echo $row['MD_TYPE'];?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>FUNCTION:</td>
                        <td><?php echo $row['MD_FUNCTION'];?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>SKIN TYPE:</td>
                        <td><?php echo $row['MD_SKIN_TYPE'];?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>SKIN CONCERN:</td>
                        <td><?php echo $row['MD_SKIN_CONCERN'];?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>EXPIRY DATE:</td>
                        <td><?php echo $row['MD_EXPIRY_DATE'];?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>ORIGIN:</td>
                        <td><?php echo $row['MD_ORIGIN'];?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>SHIPS FROM:</td>
                        <td><?php echo $row['MD_SHIPS_FROM'];?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>SHIPPING FEE:</td>
                        <td><?php echo $row['MD_SHIP_FEE'];?></td>
                    </tr>
                    
                    <tr>
                        <td></td>
                        <td>DESCRIPTION:</td>
                        <td><?php echo $row['MD_DESCRIPTIONS'];?></td>
                    </tr>
                </table>
                <div class="form-style-6">
                    <input type="submit" name="AddOrderMedical" value="Add Order" >
                </div>
            </form>
            <!--    end view product details after choose the product to view    -->
            <?php
        }
    }
                    }
                }else{
                //utk view biasa
            ?>
           <!--    for normal view   -->
            <div class="row">
                <div class="col kotakkedai text-center py-4 m-4">
                    <a href="CustomerIndex.php?food">
                        <legend><h1>Food Section</h1></legend>
                        <img src="../IMG/food.jpg"   style="width: 100%;height: 70%;margin-top: 10px;border-radius: 10px;">
                    <button class="btn btn-info button2 btn-block mt-2"><h4>View</h4></button>
                    </a><br>
                </div>
                <div class="col kotakkedai text-center py-4 m-4">
                    <a href="CustomerIndex.php?goods">
                        <legend><h1>Goods Section</h1></legend>
                        <img src="../IMG/goods.jpg"   style="width: 100%;height: 70%;margin-top: 10px;border-radius: 10px;">
                        <button class="btn btn-info button2 btn-block mt-2"><h4>View</h4></button>
                    </a><br>
                </div>
                <div class="col kotakkedai text-center py-4 m-4">
                    <a href="CustomerIndex.php?medical">
                        <legend><h1>Medical Section</h1></legend>
                        <img src="../IMG/medical.jpg"   style="width: 100%;height: 70%;margin-top: 10px;border-radius: 10px;">
                    <button class="btn btn-info button2 btn-block mt-2"><h4>View</h4></button>
                    </a><br>
                </div>
                <div class="col kotakkedai text-center py-4 m-4">
                    <a href="CustomerIndex.php?pet">
                        <legend><h1>Pet Assist Section</h1></legend>
                        <img src="../IMG/petassist.jpg"   style="width: 100%;height: 70%;margin-top: 10px;border-radius: 10px;">
                        <button class="btn btn-info button2 btn-block mt-2"><h4>View</h4></button>
                    </a><br>
               
              </div>
            </div>
            
            <?php
                }
                //tamat utk view biasa
            ?>
          <!--    end normal view    -->
        </div>
    
    </div>

    <!--     tamat utk content   -------------------- -->
<?php
    include "../View Interface/Footer.php";
?>
</body>

</html>

