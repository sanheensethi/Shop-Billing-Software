<?php
	include "../../system/db/myDataBase.php";
	$shop = new myDataBase;
	
	$shop->query = "SELECT * FROM billing_details INNER JOIN shop_details ON billing_details.shop_id = shop_details.shop_id WHERE bill_number = ".$_GET['id'];
	$result = $shop->query_result();
	$mainresult = $result[0];
//	print_r($mainresult);
	extract($mainresult);
	
?>
<!doctype html>
<html>
<head>
<html>
	<head>
		<meta charset="utf-8">
		<title>Invoice</title>
	<style>
/* reset */

*
{
	border: 0;
	box-sizing: content-box;
	color: inherit;
	font-family: inherit;
	font-size: inherit;
	font-style: inherit;
	font-weight: inherit;
	line-height: inherit;
	list-style: none;
	margin: 0;
	padding: 0;
	text-decoration: none;
	vertical-align: top;
}

/* content editable */

/**[contenteditable] { border-radius: 0.25em; min-width: 1em; outline: 0; }

*[contenteditable] { cursor: pointer; }

*[contenteditable]:hover, *[contenteditable]:focus, td:hover *[contenteditable], td:focus *[contenteditable], img.hover { background: #DEF; box-shadow: 0 0 1em 0.5em #DEF; }

span[contenteditable] { display: inline-block; }

/* heading */

h1 { font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; }

/* table */

table { font-size: 75%; table-layout: fixed; width: 100%; }
table { border-collapse: ; border-spacing: 2px; }
th, td { border-width: 1px; padding: 0.5em; position: relative; text-align: left; }
th, td { border-radius: 0.2em; border-style: solid; }
th { background: #fff; border-color: #BBB; font-weight:bold; font-size:14px; }
td { border-color: #DDD; }

/* page */

html { font: 16px/1 'Open Sans', sans-serif; overflow: auto; padding: 0.5in; }
html { background: #999; cursor: default; }

body { box-sizing: border-box; height: 11in; margin: 0 auto; overflow: hidden; padding: 0.5in; width: 8.5in; }
body { background: #FFF; border-radius: 1px; box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5); }

/* header */

header { margin: 0 0 3em; }
header:after { clear: both; content: ""; display: table; }

header h1 { background: #000; border-radius: 0.25em; color: #FFF; margin: 0 0 1em; padding: 0.5em 0; }
header address { float: left; font-size: 75%; font-style: normal; line-height: 1.25; margin: 0 1em 1em 0; }
header address p { margin: 0 0 0.25em; }
header span, header img { display: block; float: right; }
header span { margin: 0 0 1em 1em; max-height: 25%; max-width: 60%; position: relative; }
header img { max-height: 100%; max-width: 100%; }
header input { cursor: pointer; -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)"; height: 100%; left: 0; opacity: 0; position: absolute; top: 0; width: 100%; }

/* article */

article, article address, table.meta, table.inventory { margin: 0 0 3em; }
article:after { clear: both; content: ""; display: table; }
article h1 { clip: rect(0 0 0 0); position: absolute; }

article address { float: left; font-size: 125%; font-weight: bold; }

/* table meta & balance */
.btable{display:block;}
table.meta, table.balance { float: right; width: 36%; }
table.meta:after, table.balance:after { clear: both; content: ""; display: table; }

/* table meta */

table.meta th { width: 40%; }
table.meta td { width: 60%; }

/* table items */

table.inventory { clear: both; width: 100%; }
table.inventory th { font-weight: bold; text-align: center; }

table.inventory td:nth-child(1) { width: 26%; }
table.inventory td:nth-child(2) { width: 38%; }
table.inventory td:nth-child(3) { text-align: right; width: 12%; }
table.inventory td:nth-child(4) { text-align: right; width: 12%; }
table.inventory td:nth-child(5) { text-align: right; width: 12%; }

/* table balance */

table.balance th, table.balance td { width: 50%; }
table.balance td { text-align: right; }

/* aside */

aside h1 { border: none; border-width: 0 0 1px; margin: 0 0 1em; }
aside h1 { border-color: #999; border-bottom-style: solid; }

@media print {
	* { -webkit-print-color-adjust: exact; }
	html { background: none; padding: 0; }
	body { box-shadow: none; margin: 0; }
}

@page { margin: 0; }

.mainBill {
	border:2px solid #000;
	padding:20px;
	height:95%;
}
.inline{
	display:block;
}
.inline2{
	display:block;
	border-bottom:3px solid #000;
	padding:5px;
}
.leftGST {
	position: relative;
	left:0%;
	display:inline-block;
}
.TaxInv{
	display:inline-block;
	position: relative;
	left:9%;
	border:2px solid #000;
	padding:5px;
}
.Mobile{
	position: relative;
	left:30%;
	display:inline-block;
}
.shop{
	position: relative;
	left:27%;
	font-size:38px;
	font-weight:bold;
}
.Address{
	display:block;
	margin-left:60px;
	font-size:20px;
}
.billNum{
	position: relative;
	left:0%;
	display:inline-block;
}
.Date{
	position: relative;
	left:55%;
	display:inline-block;
}
.paidBy{
	position: relative;
	left:0%;
	display:inline-block;
}
.PaidDate{
	position: relative;
	left:36%;
	display:inline-block;
}
.status{
	position: relative;
	left:0%;
	display:inline-block;
}
.transaction{
	position: relative;
	left:52%;
	display:inline-block;
}
.tandd{
	position: relative;
	left:0%;
	display:inline-block;
}
.prop{
	display:block;
}
.prop2{
	position:relative;
	left:50%;
	font-size:12px;
}
	</style>
</head>
	<body>
		<div class="mainBill">
		<div class="inline">
			<div class="leftGST">
				<span style="font-weight:bold">GSTIN:</span><? echo $gstNum; ?>
			</div>
			<div class="TaxInv">
				Tax Invoice
			</div>
			<div class="Mobile">
				M : <? echo $contact1; ?><br>
				M : <? echo $contact2; ?>
			</div>
		</div><br>
		<div class="inline2">
			<div class="shop">
				<? echo $company_name; ?>
			</div>
			<div class="Address">
				Showroom No. 2, Krishna Market, Ramgarh , Distt. Panchkula
			</div>
		</div>
		<div class="inline2">
			<div>
				<div class="billNum">
					Invoice No : <? echo $bill_number; ?>
				</div>
				<div class="Date">
					Date Of Issue : <? echo $Date; ?>
				</div>
			</div>
			<div>
			<?php $shop->query = "SELECT * FROM paidAs WHERE paidAsID = ".$paid_as; 
			extract(($shop->query_result())[0]);
			?>
				<div class="paidBy">
					Paid By : <? echo $paidAsName; ?>
				</div>
				<div class="PaidDate">
					Paid Date and Time : <? echo $PaidDate." , ".$PaidTime ?>
				</div>
			</div>
			<div>
				<div class="status">
					Status : <? echo $Status; ?>
				</div>
				<div class="transaction">
					Transaction Id : <? echo $transaction_id; ?>
				</div>
			</div>
		</div>
		<div class="inline2">
			<center style="font-weight:bold;">Details Of Receiver</center>
		<div>
			Customer Name : <? echo $CustomerName; ?>
			<br>
			Customer Address : <? echo $CustomerAddress; ?>
			<br>
			Customer Mobile No. : <? echo $CustomerContact ?>
			
		</div>
		</div>
		<br>
		<div>
		<div class="table">
			<table class="content">
				<thead>
					<th style="width:10%">Sr. No</th>
					<th style="width:40%"><center>Particulars</center></th>
					<th style="width:10%;"><center>Pieces</center></th>
					<th><center>Rate</center></th>
					<th><center>Amount</center></th>
				</thead>
				<tbody>
				<?php
				$shop->query = "SELECT * FROM bill_data WHERE bill_number=".$bill_number;
				$resultmain = $shop->query_result()
				?>
				<?php
				$i=1;
				foreach($resultmain as $resultdata){
				?>
				<tr>
				<td><center><? echo $i ?></center></td>
				<td><span><? echo $resultdata['bill_cdata'] ?></span></td>
				<td><span></span><center><? echo $resultdata['piece'] ?></center></td>
				<td><center> ₹ <? echo $resultdata['price_per_piece'] ?></center></td>
				<td><span>₹ <? echo (($resultdata['piece']) * ($resultdata['price_per_piece'])) ?></span></td>
				</tr>
				<?php 
				$i++;
				}
				?>
				</tbody>
			</table>
			<br><div class="btable">
			<table class="balance" style="display:block;">
<tr>
	<th><span>Total</span></th>
	<td><span data-prefix>₹ </span><span><? echo ($TotalAmount - ($cgstMoney + $sgstMoney )); ?></span></td>
</tr>
<tr>
	<th><span>CGST [ <? echo $cgstper; ?> % ]</span></th>
	<td><span>₹ </span><span><?php echo $cgstMoney ?></span></td>
</tr>
<tr>
	<th><span>SGST [ <? echo $sgstper; ?> % ]</span></th>
	<td><span>₹ </span><span><? echo $sgstMoney ?></span></td>
</tr>
<tr>
	<th><span>Amount</span></th>
	<td><span>₹ </span><span><? echo $TotalAmount ?></span></td>
</tr>
			</table>
			</div>
		</div>
		</div>
		<div class="tandd">
			<span style="font-weight:bold">Terms and Conditions: E. & O.E.</span><br>
			<ul>
				<li>• Goods One Sold will not be taken back or replaced.</li>
				<li>• All Disputes subject to Panchkula Jurisdiction only.</li>
				<li>• Material Sold be exchanged within a week between <br>&nbsp;&nbsp;2:00 PM to 4:00 PM<br>&nbsp;&nbsp;Afterwards we will not be responsible.</li>
				<li>• Washed clothes will neither be exchanged nor returned.</li>
			</ul>
			
		</div><br><br><br><br>
		<div class="prop">
			<div class="inline2">
				<div class="prop2">
					Certified that the Particulars given above are true and correct.<br>
					<span style="font-size:18px">For</span>
					<span style="font-size:18px;font-weight:bold">&nbsp;<? echo $company_name ?></span>
					<br><br>
					Signature : ___________________.
				</div>
			</div>
		</div>
		</div>
	</body>
	<script>
		//window.addEventListner("load",window.print());
	</script>
</html