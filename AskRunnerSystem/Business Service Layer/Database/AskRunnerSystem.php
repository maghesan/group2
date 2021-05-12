<?php

//$con = mysqli_connect("localhost","root","","AskRunnerSystem");
	/**
	 * for admin
	 */
	class adminaccount{
		public  $ADMIN_ID,$ADMIN_NAME,$ADMIN_PASSWORD;

		function connect(){
		$con = new PDO('mysql:host=localhost;dbname=askrunnersystem','root','');
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $con;
		}

		function adminlogin(){
			$loginsql = "select * from admin";
			return adminaccount::connect()->query($loginsql);
		}
		function admindata(){
		$sql = "select * from admin where ADMIN_ID=:ADMIN_ID";
		$args = [':ADMIN_ID' => $this->ADMIN_ID];
		$send = adminaccount::connect()->prepare($sql);
		$send->execute($args);
		return $send;
	}
	function adminupdate(){
		 
		$sql = "update admin set  ADMIN_NAME=:ADMIN_NAME , ADMIN_PASSWORD=:ADMIN_PASSWORD where ADMIN_ID=:ADMIN_ID";
		$args = [':ADMIN_ID' => $this->ADMIN_ID, ':ADMIN_NAME' => $this->ADMIN_NAME, ':ADMIN_PASSWORD' => $this->ADMIN_PASSWORD];
		$send = adminaccount::connect()->prepare($sql);
		$send->execute($args);
		return $send;
	}
	}

//for customer account database connect to customer table
class customeraccount{
	public  $CUST_NAME,$CUST_USERNAME,$CUST_PASSWORD,$CUST_GENDER,$CUST_PHONE_NO,$CUST_EMAIL,$CUST_ADDRESS;

	function connect(){
		$con = new PDO('mysql:host=localhost;dbname=askrunnersystem','root','');
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $con;
	}

	function customerregister(){
		$regissql = "insert into customeraccount(  CUST_NAME, CUST_USERNAME, CUST_PASSWORD, CUST_GENDER, CUST_PHONE_NO, CUST_EMAIL, CUST_ADDRESS) values ( :CUST_NAME, :CUST_USERNAME, :CUST_PASSWORD, :CUST_GENDER, :CUST_PHONE_NO, :CUST_EMAIL, :CUST_ADDRESS)";
		$regisarg = [':CUST_NAME'=>$this->CUST_NAME, ':CUST_USERNAME'=>$this->CUST_USERNAME, ':CUST_PASSWORD'=>$this->CUST_PASSWORD, ':CUST_GENDER'=>$this->CUST_GENDER, ':CUST_PHONE_NO'=>$this->CUST_PHONE_NO, ':CUST_EMAIL'=>$this->CUST_EMAIL, ':CUST_ADDRESS'=>$this->CUST_ADDRESS];
		$regisend = customeraccount::connect()->prepare($regissql);
		$regisend->execute($regisarg);
		return $regisend;
	}

	function customerlogin(){
		$loginsql = "select * from customeraccount where CUST_USERNAME=:CUST_USERNAME";
		$args = [':CUST_USERNAME' => $this->CUST_USERNAME];
		$send = customeraccount::connect()->prepare($loginsql);
		$send->execute($args);
		return $send;
	}
	function custdata(){
		$sql = "select * from customeraccount where CUST_ID=:CUST_ID";
		$args = [':CUST_ID' => $this->CUST_ID];
		$send = customeraccount::connect()->prepare($sql);
		$send->execute($args);
		return $send;
	}
	function custdataall(){
		$sql = "select * from customeraccount";
		return customeraccount::connect()->query($sql);
	}
	function custupdate(){
		 
		$sql = "update customeraccount set  CUST_NAME=:CUST_NAME , CUST_USERNAME=:CUST_USERNAME ,  CUST_PASSWORD=:CUST_PASSWORD , CUST_GENDER=:CUST_GENDER , CUST_PHONE_NO=:CUST_PHONE_NO , CUST_EMAIL=:CUST_EMAIL , CUST_ADDRESS=:CUST_ADDRESS where CUST_ID=:CUST_ID";
		$args = [':CUST_ID' => $this->CUST_ID, ':CUST_NAME' => $this->CUST_NAME, ':CUST_USERNAME' => $this->CUST_USERNAME,':CUST_PASSWORD' => $this->CUST_PASSWORD,':CUST_GENDER' => $this->CUST_GENDER, ':CUST_PHONE_NO' => $this->CUST_PHONE_NO, ':CUST_EMAIL' => $this->CUST_EMAIL, ':CUST_ADDRESS' => $this->CUST_ADDRESS];
		$send = customeraccount::connect()->prepare($sql);
		$send->execute($args);
		return $send;
	}
	function custdataOrder()
	{
		$sql = "select ORDER_NAME, ORDER_ADD, ORDER_PHONE_NO from ordertable where CUST_ID=:CUST_ID";
		$args = [':CUST_ID' => $this->CUST_ID];
		$send = customeraccount::connect()->prepare($sql);
		$send->execute($args);
		return $send;
	}

	function custOrderdata()
	{
		$sql = "select * from ordertable where CUST_ID=:CUST_ID";
		$args = [':CUST_ID' => $this->CUST_ID];
		$send = customeraccount::connect()->prepare($sql);
		$send->execute($args);
		return $send;
	}

	function custupdateOrder()
	{
		$sql = "update ordertable set  ORDER_ADD=:ORDER_ADD , ORDER_NAME=:ORDER_NAME , ORDER_PHONE_NO=:ORDER_PHONE_NO , ORDER_PROD_NAME=:ORDER_PROD_NAME , ORDER_PROD_PRICE=:ORDER_PROD_PRICE , ORDER_FINAL_PRICE=:$ORDER_FINAL_PRICE where ORDER_ID=:ORDER_ID";
		$args = [':ORDER_ID' => $this->ORDER_ID, ':ORDER_ADD' => $this->ORDER_ADD, ':ORDER_PHONE_NO' => $this->ORDER_PHONE_NO,':ORDER_PROD_NAME' => $this->ORDER_PROD_NAME,':ORDER_PROD_PRICE' => $this->ORDER_PROD_PRICE, ':ORDER_FINAL_PRICE' => $this->ORDER_FINAL_PRICE ];
		return customeraccount::connect()->prepare($sql);
		//$send->execute($args);
		//return $send;
	}

	function custOrderhistory()
	{
		$sql = "select * from ordertable where CUST_ID=:CUST_ID && deliveryStatus = 'Completed'";
		$args = [':CUST_ID' => $this->CUST_ID];
		$send = customeraccount::connect()->prepare($sql);
		$send->execute($args);
		return $send;
	}

	function deletecustOrder()
	{
		$sql = "delete from ordertable where ORDER_ID=:ORDER_ID";
        $args = [':ORDER_ID'=>$this->ORDER_ID];
        $stmt = customeraccount::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
	}

	function checkoutdata()
	{
		$sql = "select * from ordertable where CUST_ID=:CUST_ID";
		$args = [':CUST_ID' => $this->CUST_ID];
		$send = customeraccount::connect()->prepare($sql);
		$send->execute($args);
		return $send;
	}

	function custpay(){
		$sql = "insert into customerpayment( custid, fullname, email, amount) values ( :custid, :fullname, :email, :amount)";
		$arg = [ ':custid'=>$this->custid, ':fullname'=>$this->fullname, ':email'=>$this->email, ':amount'=>$this->amount];
		$send = customeraccount::connect()->prepare($sql);
		$send->execute($arg);
		return $send;
	}
}

//for runner account database connect to runner table
class runneraccount{
	public  $RUN_USERNAME,$RUN_PASSWORD,$RUN_NAME,$RUN_GENDER,$RUN_EMAIL,$RUN_PHONE_NO,$RUN_ADDRESS,$RUN_IC ,$RUN_LICENSE ,$RUN_VERIFY ;

	function connect(){
		$con = new PDO('mysql:host=localhost;dbname=askrunnersystem','root','');
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $con;
	}

	function runnerregister(){
		$regissql = "insert into runneraccount( RUN_USERNAME, RUN_NAME, RUN_ADDRESS, RUN_EMAIL, RUN_PHONE_NO, RUN_GENDER, RUN_PASSWORD, RUN_IC, RUN_LICENSE, RUN_VERIFY) values ( :RUN_USERNAME, :RUN_NAME, :RUN_ADDRESS, :RUN_EMAIL, :RUN_PHONE_NO, :RUN_GENDER, :RUN_PASSWORD, :RUN_IC, :RUN_LICENSE, :RUN_VERIFY)";
		$regisarg = [':RUN_USERNAME'=>$this->RUN_USERNAME, ':RUN_NAME'=>$this->RUN_NAME, ':RUN_ADDRESS'=>$this->RUN_ADDRESS, ':RUN_EMAIL'=>$this->RUN_EMAIL, ':RUN_PHONE_NO'=>$this->RUN_PHONE_NO, ':RUN_GENDER'=>$this->RUN_GENDER, ':RUN_PASSWORD'=>$this->RUN_PASSWORD, ':RUN_IC'=>$this->RUN_IC, ':RUN_LICENSE'=>$this->RUN_LICENSE, ':RUN_VERIFY'=>$this->RUN_VERIFY];
		$regisend = runneraccount::connect()->prepare($regissql);
		$regisend->execute($regisarg);
		return $regisend;
	}

	function runnerlogin(){
		$loginsql = "select * from runneraccount where RUN_USERNAME=:RUN_USERNAME";
		$args = [':RUN_USERNAME' => $this->RUN_USERNAME];
		$send = runneraccount::connect()->prepare($loginsql);
		$send->execute($args);
		return $send;
	}
	function dataRunner(){
		$sql = "select * from runneraccount where RUN_ID=:RUN_ID";
		$args = [':RUN_ID' => $this->RUN_ID];
		 if (!$args) // if no parameter
        {
          // run the query straight away without parameter binding
             return runneraccount::connect()->query($sql);
        }
        // prepare the sql query
        $stmt = runneraccount::connect()->prepare($sql);
        // execute the query with bind parameter values
        try {
            $stmt->execute($args);
            return $stmt;
        }
        catch (PDOException $e){
            echo $e->getMessage();
            die();
        }   
	}
	function runviewall(){
		$sql = "select * from runneraccount";
		return runneraccount::connect()->query($sql);
	}

	function motifyRunner(){
		
		$sql = "update runneraccount set RUN_USERNAME=:RUN_USERNAME, RUN_NAME=:RUN_NAME, RUN_ADDRESS=:RUN_ADDRESS, RUN_EMAIL=:RUN_EMAIL, RUN_PHONE_NO=:RUN_PHONE_NO, RUN_GENDER=:RUN_GENDER, RUN_PASSWORD=:PASSWORD, RUN_IC=:RUN_IC, RUN_LICENSE=:RUN_LICENSE where RUN_ID=:RUN_ID";
		$args = [':RUN_ID'=>$this->RUN_ID, ':RUN_USERNAME'=>$this->RUN_USERNAME, ':RUN_NAME'=>$this->RUN_NAME, ':RUN_ADDRESS'=>$this->RUN_ADDRESS, ':RUN_EMAIL'=>$this->RUN_EMAIL, ':RUN_PHONE_NO'=>$this->RUN_PHONE_NO, ':RUN_GENDER'=>$this->RUN_GENDER, ':RUN_PASSWORD'=>$this->RUN_PASSWORD, ':RUN_IC'=>$this->RUN_IC, ':RUN_LICENSE'=>$this->RUN_LICENSE];
		
        if (!$args) // if no parameter
        {
          // run the query straight away without parameter binding
             return runneraccount::connect()->query($sql);
        }
        // prepare the sql query
        $stmt = runneraccount::connect()->prepare($sql);
        // execute the query with bind parameter values
        try {
            $stmt->execute($args);
            return $stmt;
        }
        catch (PDOException $e){
            echo $e->getMessage();
            die();
        }   
     

	}
	function allorder(){
		$sql = "select * from ordertable where deliveryStatus='Ready' ";
		$send = runneraccount::connect()->prepare($sql);
		$send->execute();
		return $send;
	}

	function allaccept(){
		$sql = "select * from ordertable where RUN_ID=:RUN_ID and deliveryStatus='Delivering'";
		$args = [':RUN_ID' => $this->RUN_ID];
		$send = runneraccount::connect()->prepare($sql);
		$send->execute($args);
		return $send;

	}

	function runnerincomedata(){
		$sql = "select * from runnerincome where RUN_ID=:RUN_ID order by RUN_INDATE";
		$args = [':RUN_ID' => $this->RUN_ID];
		$send = runneraccount::connect()->prepare($sql);
		$send->execute($args);
		return $send;
	}

	function updateStatus(){
		$sql = "update ordertable set RUN_ID=:RUN_ID, deliveryStatus=:deliveryStatus where ORDER_ID=:ORDER_ID";
		$args = [':RUN_ID'=>$this->RUN_ID, ':deliveryStatus'=>$this->deliveryStatus, ':ORDER_ID'=>$this->ORDER_ID];
		$send = runneraccount::connect()->prepare($sql);
		$send->execute($args);
		return $send;
	}
	function deliveredStatus(){
		$sql = "update ordertable set deliveryStatus=:deliveryStatus where ORDER_ID=:ORDER_ID";
		//$sqlrun = "insert into spincome()";
		//$sqlsp = "update ordertable set deliveryStatus=:deliveryStatus where ORDER_ID=:ORDER_ID";
		$args = [ ':deliveryStatus'=>$this->deliveryStatus, ':ORDER_ID'=>$this->ORDER_ID];
		$send = runneraccount::connect()->prepare($sql);
		$send->execute($args);
		return $send;
	}
	function runverify(){
		$sql = "update runneraccount set RUN_VERIFY=:RUN_VERIFY  where RUN_ID=:RUN_ID";
		$args = [':RUN_ID' => $this->RUN_ID,':RUN_VERIFY' => $this->RUN_VERIFY];
		$send = runneraccount::connect()->prepare($sql);
		$send->execute($args);
		return $send;
	}
	function history(){
		$sql = "select * from ordertable where RUN_ID=:RUN_ID and deliveryStatus='Completed'";
		$args = [':RUN_ID' => $this->RUN_ID];
		$send = runneraccount::connect()->prepare($sql);
		$send->execute($args);
		return $send;

	}


}

//for sp account database connect to sp table
class spaccount{
	public  $SP_USERNAME , $SP_OWNNAME , $SP_BUSINESS_NAME , $SP_PASSWORD , $SP_PHONE_NO , $SP_COMPADDRESS , $SP_EMAIL , $SP_SSM , $SP_VERIFY;
	function connect(){
		$con = new PDO('mysql:host=localhost;dbname=askrunnersystem','root','');
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $con;
	}

	function spregister(){
		$regissql = "insert into spaccount(SP_OWNNAME, SP_USERNAME, SP_PASSWORD, SP_BUSINESS_NAME, SP_COMPADDRESS, SP_EMAIL, SP_PHONE_NO,  SP_SSM, SP_VERIFY) values ( :SP_OWNNAME, :SP_USERNAME, :SP_PASSWORD, :SP_BUSINESS_NAME, :SP_COMPADDRESS, :SP_EMAIL, :SP_PHONE_NO,  :SP_SSM, :SP_VERIFY)";
		$regisarg =  [':SP_OWNNAME'=>$this->SP_OWNNAME, ':SP_USERNAME'=>$this->SP_USERNAME, ':SP_PASSWORD'=>$this->SP_PASSWORD, ':SP_BUSINESS_NAME'=>$this->SP_BUSINESS_NAME, ':SP_COMPADDRESS'=>$this->SP_COMPADDRESS, ':SP_EMAIL'=>$this->SP_EMAIL, ':SP_PHONE_NO'=>$this->SP_PHONE_NO, ':SP_SSM'=>$this->SP_SSM, ':SP_VERIFY'=>$this->SP_VERIFY];
		$regisend = spaccount::connect()->prepare($regissql);
		$regisend->execute($regisarg);
		return $regisend;
	}

	function splogin(){
		$loginsql = "select * from spaccount where SP_USERNAME=:SP_USERNAME";
		$args = [':SP_USERNAME' => $this->SP_USERNAME];
		$send = runneraccount::connect()->prepare($loginsql);
		$send->execute($args);
		return $send;
	}
	function spdata(){
		$sql = "select * from spaccount where SP_ID=:SP_ID";
		$args = [':SP_ID' => $this->SP_ID];
		$send = spaccount::connect()->prepare($sql);
		$send->execute($args);
		return $send;
	}
	function spdataall(){
		$sql = "select * from spaccount";
		return spaccount::connect()->query($sql);
	}
	function spupdate(){
		 
		$sql = "update spaccount set  SP_OWNNAME=:SP_OWNNAME ,  SP_PASSWORD=:SP_PASSWORD , SP_BUSINESS_NAME=:SP_BUSINESS_NAME , SP_COMPADDRESS=:SP_COMPADDRESS , SP_EMAIL=:SP_EMAIL , SP_PHONE_NO=:SP_PHONE_NO ,  SP_SSM=:SP_SSM where SP_ID=:SP_ID";
		$args = [':SP_ID' => $this->SP_ID, ':SP_OWNNAME' => $this->SP_OWNNAME,':SP_PASSWORD' => $this->SP_PASSWORD,':SP_BUSINESS_NAME' => $this->SP_BUSINESS_NAME,':SP_COMPADDRESS' => $this->SP_COMPADDRESS,':SP_EMAIL' => $this->SP_EMAIL,':SP_PHONE_NO' => $this->SP_PHONE_NO,':SP_SSM' => $this->SP_SSM];
		$send = spaccount::connect()->prepare($sql);
		$send->execute($args);
		return $send;
	}
	function spincomedata()
	{
		$sql = "select * from spincome where SP_ID=:SP_ID order by SP_INDATE";
		$args = [':SP_ID' => $this->SP_ID];
		$send = spaccount::connect()->prepare($sql);
		$send->execute($args);
		return $send;
	}
		function spincomingorderdata(){
			$sql = "select * from ordertable where SP_ID=:SP_ID && deliveryStatus = 'Pending'";
			$args = [':SP_ID' => $this->SP_ID];
			$send = spaccount::connect()->prepare($sql);
			$send->execute($args);
			return $send;

	}
	function spallincomedata(){
		$sql = "select * from spincome order by SP_INDATE";
		return spaccount::connect()->query($sql);
	}
	function spverify(){
		$sql = "update spaccount set SP_VERIFY=:SP_VERIFY  where SP_ID=:SP_ID";
		$args = [':SP_ID' => $this->SP_ID,':SP_VERIFY' => $this->SP_VERIFY];
		$send = spaccount::connect()->prepare($sql);
		$send->execute($args);
		return $send;
	}

}

//for product database connect to product table
class pet{
	public $SP_ID, $PET_NAME, $PET_TYPE, $PET_PRICE, $PET_BRAND, $PET_FUNCTION, $PET_DESCRIPTIONS, $PET_STOCK, $PET_LIFE_STAGE, $PET_EXPIRY_DATE, $PET_SHIPS_FROM , $PET_SHIP_FEE, $PET_ORIGIN, $PET_IMAGE, $PET_PUBLISH;

	function connect(){
		$con = new PDO('mysql:host=localhost;dbname=askrunnersystem','root','');
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $con;
	}

	function addpro(){
		$petsql = "insert into petproduct(SP_ID, PET_NAME, PET_TYPE, PET_FUNCTION, PET_BRAND, PET_LIFE_STAGE, PET_PRICE, PET_STOCK, PET_EXPIRY_DATE, PET_SHIP_FEE, PET_ORIGIN, PET_SHIPS_FROM , PET_IMAGE, PET_PUBLISH, PET_DESCRIPTIONS) values (:SP_ID, :PET_NAME, :PET_TYPE, :PET_FUNCTION, :PET_BRAND, :PET_LIFE_STAGE, :PET_PRICE, :PET_STOCK, :PET_EXPIRY_DATE, :PET_SHIP_FEE, :PET_ORIGIN, :PET_SHIPS_FROM , :PET_IMAGE, :PET_PUBLISH, :PET_DESCRIPTIONS)";
		$petargs = [':SP_ID'=>$this->SP_ID , ':PET_NAME'=>$this->PET_NAME , ':PET_TYPE'=>$this->PET_TYPE , ':PET_FUNCTION'=>$this->PET_FUNCTION , ':PET_BRAND'=>$this->PET_BRAND , ':PET_LIFE_STAGE'=>$this->PET_LIFE_STAGE , ':PET_PRICE'=>$this->PET_PRICE , ':PET_STOCK'=>$this->PET_STOCK , ':PET_EXPIRY_DATE'=>$this->PET_EXPIRY_DATE , ':PET_SHIP_FEE'=>$this->PET_SHIP_FEE , ':PET_ORIGIN'=>$this->PET_ORIGIN , ':PET_SHIPS_FROM'=>$this->PET_SHIPS_FROM , ':PET_IMAGE'=>$this->PET_IMAGE , ':PET_PUBLISH'=>$this->PET_PUBLISH , ':PET_DESCRIPTIONS'=>$this->PET_DESCRIPTIONS];
		$petsend = pet::connect()->prepare($petsql);
		$petsend->execute($petargs);
		

		return $petsend;
	}
	function petdata(){
		$petsql = "select * from petproduct where SP_ID=:SP_ID";
		$petargs = [':SP_ID' => $this->SP_ID];
		$petsend = pet::connect()->prepare($petsql);
		$petsend->execute($petargs);
		return $petsend;
	}
	function allpetdata(){
		$petsql = "select * from petproduct";
		return pet::connect()->query($petsql);
	}
	function updatepet(){
		 
		$sql = "update petproduct set  PET_NAME=:PET_NAME ,  PET_TYPE=:PET_TYPE , PET_FUNCTION=:PET_FUNCTION , PET_BRAND=:PET_BRAND , PET_LIFE_STAGE=:PET_LIFE_STAGE , PET_PRICE=:PET_PRICE ,  PET_PRICE=:PET_PRICE,  PET_STOCK=:PET_STOCK,  PET_STOCK=:PET_STOCK,  PET_EXPIRY_DATE=:PET_EXPIRY_DATE,  PET_SHIP_FEE=:PET_SHIP_FEE,  PET_ORIGIN=:PET_ORIGIN,  PET_SHIPS_FROM=:PET_SHIPS_FROM,  PET_IMAGE=:PET_IMAGE,  PET_PUBLISH=:PET_PUBLISH,  PET_DESCRIPTIONS=:PET_DESCRIPTIONS where PET_PROID=:PET_PROID";
		$args = [':PET_PROID'=>$this->PET_PROID , ':PET_NAME'=>$this->PET_NAME , ':PET_TYPE'=>$this->PET_TYPE , ':PET_FUNCTION'=>$this->PET_FUNCTION , ':PET_BRAND'=>$this->PET_BRAND , ':PET_LIFE_STAGE'=>$this->PET_LIFE_STAGE , ':PET_PRICE'=>$this->PET_PRICE , ':PET_STOCK'=>$this->PET_STOCK , ':PET_EXPIRY_DATE'=>$this->PET_EXPIRY_DATE , ':PET_SHIP_FEE'=>$this->PET_SHIP_FEE , ':PET_ORIGIN'=>$this->PET_ORIGIN , ':PET_SHIPS_FROM'=>$this->PET_SHIPS_FROM , ':PET_IMAGE'=>$this->PET_IMAGE , ':PET_PUBLISH'=>$this->PET_PUBLISH , ':PET_DESCRIPTIONS'=>$this->PET_DESCRIPTIONS];
		$send = pet::connect()->prepare($sql);
		$send->execute($args);
		return $send;
	}
	function deletepet(){
		$sql = "delete from petproduct where PET_PROID=:PET_PROID";
        $args = [':PET_PROID'=>$this->PET_PROID];
        $stmt = pet::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
	}
	function petDetailsdata(){
		$petsql = "select * from petproduct where PET_PROID=:PET_PROID";
		$petargs = [':PET_PROID' => $this->PET_PROID];
		$petsend = pet::connect()->prepare($petsql);
		$petsend->execute($petargs);
		return $petsend;
	}
	function addorderpet(){
		$petsql = "insert into ordertable(CUST_ID, ORDER_PRO_ID, ORDER_TYPE, ORDER_ADD, ORDER_NAME, ORDER_PHONE_NO, ORDER_DATE, ORDER_PROD_NAME , ORDER_PROD_PRICE, deliveryStatus) values (:CUST_ID, :ORDER_PRO_ID,  :ORDER_TYPE, :ORDER_ADD, :ORDER_NAME, :ORDER_PHONE_NO, :ORDER_DATE, :ORDER_PROD_NAME, :ORDER_PROD_PRICE, :deliveryStatus)";
		$petargs = [':CUST_ID'=>$this->CUST_ID , ':ORDER_PRO_ID'=>$this->ORDER_PRO_ID , ':ORDER_TYPE'=>$this->ORDER_TYPE , ':ORDER_ADD'=>$this->ORDER_ADD  , ':ORDER_PHONE_NO'=>$this->ORDER_PHONE_NO  ,':ORDER_NAME'=>$this->ORDER_NAME , ':ORDER_DATE'=>$this->ORDER_DATE , ':ORDER_PROD_NAME'=>$this->ORDER_PROD_NAME  , ':ORDER_PROD_PRICE'=>$this->ORDER_PROD_PRICE, ':deliveryStatus'=>$this->deliveryStatus];
		$petsend = food::connect()->prepare($petsql);
		$petsend->execute($petargs);
		$updatepetsql = "UPDATE ordertable SET SP_ID = ( SELECT SP_ID FROM petproduct WHERE ordertable.ORDER_PROD_NAME = petproduct.PET_NAME ORDER BY ORDER_ID DESC LIMIT 1 )";
		return pet::connect()->query($updatepetsql);
	}
	function dstatuspet(){
		$dpet = "UPDATE ordertable SET deliveryStatus='Ready' WHERE ORDER_ID=:ORDER_ID ";
		$dpetargs = [':ORDER_ID'=>$this->ORDER_ID ];
		$dpetsend = pet::connect()->prepare($dpet);
		$dpetsend->execute($dpetargs);
		return $dpet;
	}
}
	

//for product database connect to product table
class goods{
	public $SP_ID, $GD_NAME, $GD_TYPE, $GD_CATEGORY, $GD_BRAND, $GD_PRICE, $GD_STOCK, $GD_SHIPS_FEE, $GD_ORIGIN, $GD_SHIPS_FROM , $GD_IMAGE, $GD_PUBLISH, $GD_DESCRIPTIONS;

	function connect(){
		$con = new PDO('mysql:host=localhost;dbname=askrunnersystem','root','');
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $con;
	}

	function addpro(){
		$goodssql = "insert into goodproduct(SP_ID, GD_NAME, GD_TYPE, GD_CATEGORY, GD_BRAND, GD_PRICE, GD_STOCK, GD_SHIPS_FEE, GD_ORIGIN, GD_SHIPS_FROM, GD_IMAGE, GD_PUBLISH , GD_DESCRIPTIONS) values (:SP_ID, :GD_NAME, :GD_TYPE, :GD_CATEGORY, :GD_BRAND, :GD_PRICE, :GD_STOCK, :GD_SHIPS_FEE, :GD_ORIGIN, :GD_SHIPS_FROM, :GD_IMAGE, :GD_PUBLISH , :GD_DESCRIPTIONS)";
		$goodsargs = [':SP_ID'=>$this->SP_ID , ':GD_NAME'=>$this->GD_NAME , ':GD_TYPE'=>$this->GD_TYPE , ':GD_CATEGORY'=>$this->GD_CATEGORY , ':GD_BRAND'=>$this->GD_BRAND , ':GD_PRICE'=>$this->GD_PRICE , ':GD_STOCK'=>$this->GD_STOCK , ':GD_SHIPS_FEE'=>$this->GD_SHIPS_FEE , ':GD_ORIGIN'=>$this->GD_ORIGIN , ':GD_SHIPS_FROM'=>$this->GD_SHIPS_FROM , ':GD_IMAGE'=>$this->GD_IMAGE , ':GD_PUBLISH'=>$this->GD_PUBLISH , ':GD_DESCRIPTIONS'=>$this->GD_DESCRIPTIONS  ];
		$goodssend = goods::connect()->prepare($goodssql);
		$goodssend->execute($goodsargs);
		return $goodssend;
	}
	function goodsdata(){
		$goodssql = "select * from goodproduct where SP_ID=:SP_ID";
		$goodsargs = [':SP_ID' => $this->SP_ID];
		$goodssend = goods::connect()->prepare($goodssql);
		$goodssend->execute($goodsargs);
		return $goodssend;
	}
	function allgoodsdata(){
		$goodssql = "select * from goodproduct";
		return goods::connect()->query($goodssql);
	}
	function updategoods(){
		 
		$sql = "update goodproduct set  GD_NAME=:GD_NAME ,  GD_TYPE=:GD_TYPE , GD_CATEGORY=:GD_CATEGORY , GD_BRAND=:GD_BRAND , GD_PRICE=:GD_PRICE , GD_STOCK=:GD_STOCK ,  GD_SHIPS_FEE=:GD_SHIPS_FEE  ,  GD_ORIGIN=:GD_ORIGIN ,  GD_SHIPS_FROM=:GD_SHIPS_FROM ,  GD_IMAGE=:GD_IMAGE ,  GD_PUBLISH=:GD_PUBLISH ,  GD_DESCRIPTIONS=:GD_DESCRIPTIONS where GD_PROID=:GD_PROID";
		$args = [':GD_PROID'=>$this->GD_PROID , ':GD_NAME'=>$this->GD_NAME , ':GD_TYPE'=>$this->GD_TYPE , ':GD_CATEGORY'=>$this->GD_CATEGORY , ':GD_BRAND'=>$this->GD_BRAND , ':GD_PRICE'=>$this->GD_PRICE , ':GD_STOCK'=>$this->GD_STOCK , ':GD_SHIPS_FEE'=>$this->GD_SHIPS_FEE , ':GD_ORIGIN'=>$this->GD_ORIGIN , ':GD_SHIPS_FROM'=>$this->GD_SHIPS_FROM , ':GD_IMAGE'=>$this->GD_IMAGE , ':GD_PUBLISH'=>$this->GD_PUBLISH , ':GD_DESCRIPTIONS'=>$this->GD_DESCRIPTIONS  ];
		$send = goods::connect()->prepare($sql);
		$send->execute($args);
		return $send;
	}
	function deletegoods(){
		$sql = "delete from goodproduct where GD_PROID=:GD_PROID";
        $args = [':GD_PROID'=>$this->GD_PROID];
        $stmt = goods::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
	}
	function goodsDetailsdata(){
		$gdsql = "select * from goodproduct where GD_PROID=:GD_PROID";
		$gdargs = [':GD_PROID' => $this->GD_PROID];
		$gdsend = goods::connect()->prepare($gdsql);
		$gdsend->execute($gdargs);
		return $gdsend;
	}
	function addordergoods(){
		$goodssql = "insert into ordertable(CUST_ID, ORDER_PRO_ID, ORDER_TYPE, ORDER_ADD, ORDER_NAME, ORDER_PHONE_NO, ORDER_DATE, ORDER_PROD_NAME , ORDER_PROD_PRICE, deliveryStatus) values (:CUST_ID, :ORDER_PRO_ID,  :ORDER_TYPE, :ORDER_ADD, :ORDER_NAME, :ORDER_PHONE_NO, :ORDER_DATE, :ORDER_PROD_NAME, :ORDER_PROD_PRICE, :deliveryStatus)";
		$goodsargs = [':CUST_ID'=>$this->CUST_ID , ':ORDER_PRO_ID'=>$this->ORDER_PRO_ID , ':ORDER_TYPE'=>$this->ORDER_TYPE , ':ORDER_ADD'=>$this->ORDER_ADD  , ':ORDER_PHONE_NO'=>$this->ORDER_PHONE_NO  ,':ORDER_NAME'=>$this->ORDER_NAME , ':ORDER_DATE'=>$this->ORDER_DATE , ':ORDER_PROD_NAME'=>$this->ORDER_PROD_NAME  , ':ORDER_PROD_PRICE'=>$this->ORDER_PROD_PRICE, ':deliveryStatus'=>$this->deliveryStatus];
		$goodssend = food::connect()->prepare($goodssql);
		$goodssend->execute($goodsargs);
		$updategoodsql = "UPDATE ordertable SET SP_ID = ( SELECT SP_ID FROM goodproduct WHERE ordertable.ORDER_PROD_NAME = goodproduct.GD_NAME ORDER BY ORDER_ID DESC LIMIT 1 )";
		return goods::connect()->query($updategoodsql);
	}

	function dstatusgoods(){
		$dgood = "UPDATE ordertable SET deliveryStatus='Ready' WHERE ORDER_ID=:ORDER_ID ";
		$dgoodargs = [':ORDER_ID'=>$this->ORDER_ID ];
		$dgoodsend = good::connect()->prepare($dgood);
		$dgoodsend->execute($dgoodargs);
		return $dgood;
	}

	function addorder2history(){
		$hoodssql = "insert into orderhistory(CUST_ID, cname, fname, price, address, id) values (:CUST_ID, :cname,  :price, :address, :id)";
		$hoodsargs = [':CUST_ID'=>$this->CUST_ID , ':cname'=>$this->cname , ':fname'=>$this->fname , ':price'=>$this->price  , ':address'=>$this->address  ,'5'=>$this->id];
		$hoodssend = food::connect()->prepare($hoodssql);
		$hoodssend->execute($hoodsargs);

	}
	
}
//food 
class food{
	public $ORDER_ID, $SP_ID, $FD_NAME, $FD_TYPE, $FD_BRAND, $FD_PRICE, $FD_STOCK, $FD_EXPIRY_DATE, $FD_CERTIFICATIONS, $FD_SHIP_FEE, $FD_ORIGIN , $FD_SHIPS_FROM, $FD_IMAGE, $FD_PUBLISH, $FD_DESCRIPTIONS,$CUST_ID, $deliveryStatus;

	function connect(){
		$con = new PDO('mysql:host=localhost;dbname=askrunnersystem','root','');
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $con;
	}

	function addpro(){
		$foodsql = "insert into foodproduct(SP_ID, FD_NAME, FD_TYPE, FD_BRAND, FD_PRICE, FD_STOCK, FD_EXPIRY_DATE, FD_CERTIFICATIONS, FD_SHIP_FEE, FD_ORIGIN, FD_SHIPS_FROM, FD_IMAGE , FD_PUBLISH, FD_DESCRIPTIONS) values (:SP_ID, :FD_NAME, :FD_TYPE, :FD_BRAND, :FD_PRICE, :FD_STOCK, :FD_EXPIRY_DATE, :FD_CERTIFICATIONS, :FD_SHIP_FEE, :FD_ORIGIN, :FD_SHIPS_FROM, :FD_IMAGE , :FD_PUBLISH , :FD_DESCRIPTIONS)";
		$foodargs = [':SP_ID'=>$this->SP_ID , ':FD_NAME'=>$this->FD_NAME , ':FD_TYPE'=>$this->FD_TYPE , ':FD_BRAND'=>$this->FD_BRAND , ':FD_PRICE'=>$this->FD_PRICE , ':FD_STOCK'=>$this->FD_STOCK , ':FD_EXPIRY_DATE'=>$this->FD_EXPIRY_DATE , ':FD_CERTIFICATIONS'=>$this->FD_CERTIFICATIONS , ':FD_SHIP_FEE'=>$this->FD_SHIP_FEE , ':FD_ORIGIN'=>$this->FD_ORIGIN , ':FD_SHIPS_FROM'=>$this->FD_SHIPS_FROM , ':FD_IMAGE'=>$this->FD_IMAGE , ':FD_PUBLISH'=>$this->FD_PUBLISH ,':FD_DESCRIPTIONS'=>$this->FD_DESCRIPTIONS  ];
		$foodsend = food::connect()->prepare($foodsql);
		$foodsend->execute($foodargs);
		

		return $foodsend;
	}
	function fooddata(){
		$foodsql = "select * from foodproduct where SP_ID=:SP_ID";
		$foodargs = [':SP_ID' => $this->SP_ID];
		$foodsend = food::connect()->prepare($foodsql);
		$foodsend->execute($foodargs);
		return $foodsend;
	}
	function allfooddata(){
		$foodsql = "select * from foodproduct";
		return food::connect()->query($foodsql);
	}
	function updatefood(){
		 
		$sql = "update foodproduct set  FD_NAME=:FD_NAME ,  FD_TYPE=:FD_TYPE , FD_BRAND=:FD_BRAND , FD_PRICE=:FD_PRICE , FD_STOCK=:FD_STOCK , FD_EXPIRY_DATE=:FD_EXPIRY_DATE ,  FD_CERTIFICATIONS=:FD_CERTIFICATIONS,  FD_SHIP_FEE=:FD_SHIP_FEE,  FD_ORIGIN=:FD_ORIGIN,  FD_SHIPS_FROM=:FD_SHIPS_FROM,  FD_IMAGE=:FD_IMAGE, FD_PUBLISH=:FD_PUBLISH, FD_DESCRIPTIONS=:FD_DESCRIPTIONS where FD_PROID=:FD_PROID";
		$args = [':FD_PROID'=>$this->FD_PROID , ':FD_NAME'=>$this->FD_NAME , ':FD_TYPE'=>$this->FD_TYPE , ':FD_BRAND'=>$this->FD_BRAND , ':FD_PRICE'=>$this->FD_PRICE , ':FD_STOCK'=>$this->FD_STOCK , ':FD_EXPIRY_DATE'=>$this->FD_EXPIRY_DATE , ':FD_CERTIFICATIONS'=>$this->FD_CERTIFICATIONS , ':FD_SHIP_FEE'=>$this->FD_SHIP_FEE , ':FD_ORIGIN'=>$this->FD_ORIGIN , ':FD_SHIPS_FROM'=>$this->FD_SHIPS_FROM , ':FD_IMAGE'=>$this->FD_IMAGE , ':FD_PUBLISH'=>$this->FD_PUBLISH ,':FD_DESCRIPTIONS'=>$this->FD_DESCRIPTIONS ];
		$send = food::connect()->prepare($sql);
		$send->execute($args);
		return $send;
	}
	function deletefood(){
		$sql = "delete from foodproduct where FD_PROID=:FD_PROID";
        $args = [':FD_PROID'=>$this->FD_PROID];
        $stmt = food::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
	}
	function foodDetailsdata(){
		$foodsql = "select * from foodproduct where FD_PROID=:FD_PROID";
		$foodargs = [':FD_PROID' => $this->FD_PROID];
		$foodsend = food::connect()->prepare($foodsql);
		$foodsend->execute($foodargs);
		return $foodsend;
	}
	function addorderfood(){
		$foodsql = "insert into ordertable(CUST_ID, ORDER_PRO_ID, ORDER_TYPE, ORDER_ADD, ORDER_NAME, ORDER_PHONE_NO, ORDER_DATE, ORDER_PROD_NAME , ORDER_PROD_PRICE , deliveryStatus, SP_ID) values (:CUST_ID, :ORDER_PRO_ID,  :ORDER_TYPE, :ORDER_ADD, :ORDER_NAME, :ORDER_PHONE_NO, :ORDER_DATE, :ORDER_PROD_NAME, :ORDER_PROD_PRICE, :deliveryStatus)";
		$foodargs = [':CUST_ID'=>$this->CUST_ID , ':ORDER_PRO_ID'=>$this->ORDER_PRO_ID , ':ORDER_TYPE'=>$this->ORDER_TYPE , ':ORDER_ADD'=>$this->ORDER_ADD  , ':ORDER_PHONE_NO'=>$this->ORDER_PHONE_NO  ,':ORDER_NAME'=>$this->ORDER_NAME , ':ORDER_DATE'=>$this->ORDER_DATE , ':ORDER_PROD_NAME'=>$this->ORDER_PROD_NAME  , ':ORDER_PROD_PRICE'=>$this->ORDER_PROD_PRICE, ':deliveryStatus'=>$this->deliveryStatus];
		$foodsend = food::connect()->prepare($foodsql);
		$foodsend->execute($foodargs);

		$updatefoodsql = "UPDATE ordertable SET SP_ID = ( SELECT SP_ID FROM foodproduct WHERE ordertable.ORDER_PROD_NAME = foodproduct.FD_NAME ORDER BY ORDER_ID DESC LIMIT 1 )";
		return food::connect()->query($updatefoodsql);
		return $foodsend;
	}

	function dstatusfood(){
		$dfood = "UPDATE ordertable SET deliveryStatus='Ready' WHERE ORDER_ID=:ORDER_ID ";
		$dfoodargs = [':ORDER_ID'=>$this->ORDER_ID];
		$dfoodsend = food::connect()->prepare($dfood);
		$dfoodsend->execute($dfoodargs);
		return $dfood;
	}

	
}
//medical 
class medical{
	public $SP_ID, $MD_NAME, $MD_TYPE, $MD_FUNCTION, $MD_SKIN_CONCERN, $MD_SKIN_TYPE, $MD_BRAND, $MD_PRICE, $MD_STOCK, $MD_EXPIRY_DATE , $MD_SHIP_FEE, $MD_ORIGIN, $MD_SHIPS_FROM, $MD_IMAGE ,$MD_PUBLISH ,$MD_DESCRIPTIONS;

	function connect(){
		$con = new PDO('mysql:host=localhost;dbname=askrunnersystem','root','');
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $con;
	}

	function addpro(){
		$medicalsql = "insert into medicalproduct(SP_ID, MD_NAME, MD_TYPE, MD_FUNCTION, MD_SKIN_CONCERN, MD_SKIN_TYPE, MD_BRAND, MD_PRICE, MD_STOCK, MD_EXPIRY_DATE, MD_SHIP_FEE, MD_ORIGIN , MD_SHIPS_FROM, MD_IMAGE, MD_PUBLISH , MD_DESCRIPTIONS) values (:SP_ID, :MD_NAME, :MD_TYPE, :MD_FUNCTION, :MD_SKIN_CONCERN, :MD_SKIN_TYPE, :MD_BRAND, :MD_PRICE, :MD_STOCK, :MD_EXPIRY_DATE, :MD_SHIP_FEE, :MD_ORIGIN , :MD_SHIPS_FROM , :MD_IMAGE , :MD_PUBLISH , :MD_DESCRIPTIONS)";
		$medicalargs = [':SP_ID'=>$this->SP_ID , ':MD_NAME'=>$this->MD_NAME , ':MD_TYPE'=>$this->MD_TYPE , ':MD_FUNCTION'=>$this->MD_FUNCTION , ':MD_SKIN_CONCERN'=>$this->MD_SKIN_CONCERN , ':MD_SKIN_TYPE'=>$this->MD_SKIN_TYPE , ':MD_BRAND'=>$this->MD_BRAND , ':MD_PRICE'=>$this->MD_PRICE , ':MD_STOCK'=>$this->MD_STOCK , ':MD_EXPIRY_DATE'=>$this->MD_EXPIRY_DATE , ':MD_SHIP_FEE'=>$this->MD_SHIP_FEE , ':MD_ORIGIN'=>$this->MD_ORIGIN , ':MD_SHIPS_FROM'=>$this->MD_SHIPS_FROM ,':MD_IMAGE'=>$this->MD_IMAGE ,':MD_PUBLISH'=>$this->MD_PUBLISH ,':MD_DESCRIPTIONS'=>$this->MD_DESCRIPTIONS  ];
		$medicalsend = medical::connect()->prepare($medicalsql);
		$medicalsend->execute($medicalargs);
		

		return $medicalsend;
	}
	function medicaldata(){
		$medicalsql = "select * from medicalproduct where SP_ID=:SP_ID";
		$medicalargs = [':SP_ID' => $this->SP_ID];
		$medicalsend = medical::connect()->prepare($medicalsql);
		$medicalsend->execute($medicalargs);
		return $medicalsend;
	}
	function allmedicaldata(){
		$medicalsql = "select * from medicalproduct";
		return medical::connect()->query($medicalsql);
	}
	function updatemedical(){
		 
		$sql = "update medicalproduct set  MD_NAME=:MD_NAME ,  MD_TYPE=:MD_TYPE , MD_FUNCTION=:MD_FUNCTION , MD_SKIN_CONCERN=:MD_SKIN_CONCERN , MD_SKIN_TYPE=:MD_SKIN_TYPE , MD_BRAND=:MD_BRAND ,  MD_PRICE=:MD_PRICE,  MD_STOCK=:MD_STOCK,  MD_EXPIRY_DATE=:MD_EXPIRY_DATE,  MD_SHIP_FEE=:MD_SHIP_FEE,  MD_ORIGIN=:MD_ORIGIN,  MD_SHIPS_FROM=:MD_SHIPS_FROM,  MD_IMAGE=:MD_IMAGE,  MD_PUBLISH=:MD_PUBLISH,  MD_DESCRIPTIONS=:MD_DESCRIPTIONS where MD_PROID=:MD_PROID";
		$args = [':MD_PROID' => $this->MD_PROID,  ':MD_NAME'=>$this->MD_NAME , ':MD_TYPE'=>$this->MD_TYPE , ':MD_FUNCTION'=>$this->MD_FUNCTION , ':MD_SKIN_CONCERN'=>$this->MD_SKIN_CONCERN , ':MD_SKIN_TYPE'=>$this->MD_SKIN_TYPE , ':MD_BRAND'=>$this->MD_BRAND , ':MD_PRICE'=>$this->MD_PRICE , ':MD_STOCK'=>$this->MD_STOCK , ':MD_EXPIRY_DATE'=>$this->MD_EXPIRY_DATE , ':MD_SHIP_FEE'=>$this->MD_SHIP_FEE , ':MD_ORIGIN'=>$this->MD_ORIGIN , ':MD_SHIPS_FROM'=>$this->MD_SHIPS_FROM ,':MD_IMAGE'=>$this->MD_IMAGE ,':MD_PUBLISH'=>$this->MD_PUBLISH ,':MD_DESCRIPTIONS'=>$this->MD_DESCRIPTIONS];
		$send = medical::connect()->prepare($sql);
		$send->execute($args);
		return $send;
	}
	function deletemedical(){
		$sql = "delete from medicalproduct where MD_PROID=:MD_PROID";
        $args = [':MD_PROID'=>$this->MD_PROID];
        $stmt = medical::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
	}
	function medicalDetailsdata(){
		$medsql = "select * from medicalproduct where MD_PROID=:MD_PROID";
		$medargs = [':MD_PROID' => $this->MD_PROID];
		$medsend = medical::connect()->prepare($medsql);
		$medsend->execute($medargs);
		return $medsend;
	}
	

	function addordermedical(){
		$medsql = "insert into ordertable(CUST_ID, ORDER_PRO_ID, ORDER_TYPE, ORDER_ADD, ORDER_NAME, ORDER_PHONE_NO, ORDER_DATE, ORDER_PROD_NAME , ORDER_PROD_PRICE,deliveryStatus) values (:CUST_ID, :ORDER_PRO_ID,  :ORDER_TYPE, :ORDER_ADD, :ORDER_NAME, :ORDER_PHONE_NO, :ORDER_DATE, :ORDER_PROD_NAME, :ORDER_PROD_PRICE, :deliveryStatus)";
		$medargs = [':CUST_ID'=>$this->CUST_ID , ':ORDER_PRO_ID'=>$this->ORDER_PRO_ID , ':ORDER_TYPE'=>$this->ORDER_TYPE , ':ORDER_ADD'=>$this->ORDER_ADD  , ':ORDER_PHONE_NO'=>$this->ORDER_PHONE_NO  ,':ORDER_NAME'=>$this->ORDER_NAME , ':ORDER_DATE'=>$this->ORDER_DATE , ':ORDER_PROD_NAME'=>$this->ORDER_PROD_NAME  , ':ORDER_PROD_PRICE'=>$this->ORDER_PROD_PRICE, ':deliveryStatus'=>$this->deliveryStatus];
		$medsend = food::connect()->prepare($medsql);
		$medsend->execute($medargs);
		$updatemedsql = "UPDATE ordertable SET SP_ID = ( SELECT SP_ID FROM medicalproduct WHERE ordertable.ORDER_PROD_NAME = medicalproduct.MD_NAME ORDER BY ORDER_ID DESC LIMIT 1)";
		return medical::connect()->query($updatemedsql);
		return $medsend;
	}

	function dstatusmedical(){
		$dmed = "UPDATE ordertable SET deliveryStatus='Ready' WHERE ORDER_ID=:ORDER_ID ";
		$dmedargs = [':ORDER_ID'=>$this->ORDER_ID ];
		$dmedsend = medical::connect()->prepare($dmed);
		$dmedsend->execute($dmedargs);
		return $dmed;
	}

	
}

?> 