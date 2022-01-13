<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");
require_once('../../../admin/database/dbconfig.php');


$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg
//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	// echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		// echo "<b>Transaction status is success</b>" . "<br/>";
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
	}
	else {
		echo "<b>Transaction status is failure</b>" . "<br/>";
	}

	if (isset($_POST) && count($_POST)>0 )
	{ 
		$tid=$_POST['ORDERID'];
		$sid=explode("_",$tid)[1];
		$amt=$_POST['TXNAMOUNT'];
		$status=$_POST['STATUS'];
		$date=$_POST['TXNDATE'];

		$query="INSERT INTO `transaction`(`s_id`, `amount`, `status`, `date`) VALUES ('$sid','$amt','$status','$date')";
		if ($connection->query($query) === TRUE)
		{
			$query1 = "UPDATE newstudent SET add_status='yes' WHERE id='$sid' ";
			mysqli_query($connection, $query1);

		echo "<center> <div style='color:blue;
							text-align:center;
							font-size:40px; 
							padding:5% ; 
							margin-top:7%;
							border: 1px solid;
							box-shadow: 5px 10px green;
							width:50%'>
							<h2>Transaction done <br>Successfully..!</h2>
							<a href='../../../index.php'>GO HOME!</a>
							</div></center>";
		}
		else{
			echo "<center> <div style='color:red;
			text-align:center;
			font-size:40px; 
			padding:5% ; 
			margin-top:6%;
			border: 1px solid;
			box-shadow: 5px 10px red;
			width:50%'>
			<h2>Transaction <br>Faild..!</h2>
			<a href='../../../index.php'>GO HOME!</a>
			</div></center>";
		}
	}
	
}
else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}
?>