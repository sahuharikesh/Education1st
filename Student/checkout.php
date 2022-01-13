<!-- header part -->
<?php 
session_start();
include('../admin/database/dbconfig.php'); 


$sEmail= $_SESSION['sEmail'];
$sql ="SELECT * FROM `newstudent` WHERE email ='".$sEmail."'";
 $result= $connection->query($sql);
 if($result->num_rows > 0){
     while($row = $result->fetch_assoc()){
		$userId= $row["id"];
		$mobile= $row["S_mobile"];
		$name= $row["S_name"];
     }
  }
?>
<html lang="en">
<head>
  <title>Education1st</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container py-5 shadow-lg mt-5">
    <p class="text-white text-center  p-2" style="background-color: #4e73df !important;">Payment Details</p>
     <div class=" text-center  card bg-light">	 
		<form method="post" action="Paytm/PaytmKit/pgRedirect.php">
			<table class="table table-boardered ">
		<tbody>
			<tr>
				<td><label>PAYMENT ID:</label></td>
				<td><input id="ORDER_ID" tabindex="1" maxlength="20" size="20"
					name="ORDER_ID" autocomplete="off"
					value="<?php echo  "PMT" . rand(10000,99999999).'_'.$userId?>" class="form-control" readonly>
				</td>
			</tr>
			<tr>
				<td><label>STUDENT ID :</label></td>
				<td><input id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?php echo $userId;?>" class="form-control"></td>
			</tr>
			<tr>
				<td><label>STUDENT Name :</label></td>
				<td><input id="CUST_NAME" tabindex="2" maxlength="12" size="12" name="CUST_NAME" autocomplete="off" value="<?php echo $name;?>" class="form-control"></td>
			</tr>
			<tr>
				<td><label>STUDENT MOBILE:</label></td>
				<td><input id="MSISDN" tabindex="4" maxlength="12" size="12" name="MSISDN" autocomplete="off" value="<?php echo $mobile;?>" class="form-control"></td>
			</tr>
			<tr>
				<td><label>STUDENT EMAIL:</label></td>
				<td><input id="EMAIL" tabindex="4" maxlength="12" size="12" name="EMAIL" autocomplete="off" value="<?php echo $sEmail; ?>" class="form-control"></td>
			</tr>
			<tr>
				<td><label> Amount :</label></td>
				<td><input title="TXN_AMOUNT" tabindex="10"
					type="text" name="TXN_AMOUNT"
					value="100" class="form-control" readonly>
					<input id="INDUSTRY_TYPE_ID" type="hidden"  name="INDUSTRY_TYPE_ID"  value="Retail" >
					<input id="CHANNEL_ID" type="hidden" name="CHANNEL_ID" autocomplete="off" value="WEB" >
				</td>
			</tr>

		</tbody>
		</table>
		<button type="submit" name="pay" class="btn text-white" style="background-color: #4e73df !important;">Pay Now</button>
  		<a href="../index.php" class="btn btn-danger">Cancel</a>
		</form><br>
	 </div> 
 	</div>  
</body>
</html>