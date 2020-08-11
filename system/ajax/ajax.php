<?php
/*AJAX MODEL CALLER*/

	include "../db/myDataBase.php";
	include "../datetime/dt.php";
	
	$shop = new myDataBase;
	
	if(isset($_POST['page'])){
		
		/* Init Page Form */
		if($_POST['page']=='initialize'){
			if($_POST['action']=='create_form'){
				
				$step1_addonClass = ['gear','database','lock','key'];
				$step1_ids = ['dbserver','dbname','dbuser','dbpass'];
				$step1_type = ['text','text','text','text'];
				$step1_placeholder = ['Database Server','Database Name','Database User','Database Password'];
				
				$data .= "<div id='step1'>";
				$data .= "<h3>STEP 1 : \n</h3>\n";
					for($i=0;$i<count($step1_addonClass);$i++){
						$data .= "<div class='form-group'>\n
									<div class='input-group'>\n
										<span class='input-group-addon'><i class='fa fa-".$step1_addonClass[$i]."'></i></span>\n
										<input id='".$step1_ids[$i]."' type='".$step1_type[$i]."' class='form-control' name='' placeholder = '".$step1_placeholder[$i]."' required>\n
									</div>\n
								</div>\n\n";
					}
				$data .= "
						<div class='form-group'>
						<div class='input-group'>
						<input id='step1submit' type='submit' class='btn btn-success' value='Init' required>
						</div>
						</div>
						</div>
						
						<script>
						$('#step1submit').on('click',function(){
						var server     = $('#dbserver').val();
						var dbuser     = $('#dbuser').val();
						var dbname     = $('#dbname').val();
						var dbpass     = $('#dbpass').val();
						$.ajax({
						url:'system/ajax/ajax.php',
						type:'POST',
						data:{'page':'initialize','action':'step1','server':server,'dbuser':dbuser,'dbname':dbname,'dbpass':dbpass},
						success:function(data){
							$('#show').html(data);
							$('#step1').hide('slow','linear');
							$('#step2').show('slow','linear');
							$('#step3').hide('slow','linear');
							$('#step4').hide('slow','linear');
						}
						});
						});	
						</script>
						
				";
				
				$step2_addonClass = ['user','key'];
				$step2_ids = ['username','password'];
				$step2_type = ['text','password'];
				$step2_placeholder = ['Login Username','Login Password'];
				
$data .= "<div id='step2'>";
$data .= "<h3>STEP 2 : \n</h3>\n";
	for($i=0;$i<count($step2_addonClass);$i++){
		$data .= "<div class='form-group'>\n
					<div class='input-group'>\n
						<span class='input-group-addon'><i class='fa fa-".$step2_addonClass[$i]."'></i></span>\n
						<input id='".$step2_ids[$i]."' type='".$step2_type[$i]."' class='form-control' name='' placeholder = '".$step2_placeholder[$i]."' required>\n
					</div>\n
				</div>\n\n";
	}
$data .= "
		<div class='form-group'>
		<div class='input-group'>
		<input id='step2submit' type='submit' class='btn btn-success' value='Init' required>
		</div>
		</div>
		</div>
		
		<script>
		$('#step2submit').on('click',function(){
		var user     = $('#username').val();
		var pass     = $('#password').val();
		$.ajax({
		url:'system/ajax/ajax.php',
		type:'POST',
		data:{'page':'initialize','action':'step2','username':user,'password':pass},
		success:function(data){
		$('#show').html(data);
		var last_admin_id = $('#last_id').val();
		$('#admin_id').val(last_admin_id);
		$('#step1').hide('slow','linear');
		$('#step2').hide('slow','linear');
		$('#step3').show('slow','linear');
		$('#step4').hide('slow','linear');
		}
		});
		});	
		</script>
		
";
				$step3_addonClass = ['briefcase','building','home','user','mobile','mobile','bank','cogs','cogs'];
				$step3_ids = ['admin_id','companyname','address','name','contact1','contact2','gstNum','cgstPer','sgstPer'];
				$step3_type = ['number','text','text','text','number','number','text','number','number'];
				$step3_placeholder = ['Admin ID','Shop Name','Address','Prop. Name','Contact','Alternative Contact','GST Number','CGST Percentage','SGST Percentage'];
				
					$data .= "<div id='step3'>";
					$data .= "<h3>STEP 3 : \n</h3>\n";
					for($i=0;$i<count($step3_addonClass);$i++){
					$data .= "<div class='form-group'>\n
					<div class='input-group'>\n
					<span class='input-group-addon'><i class='fa fa-".$step3_addonClass[$i]."'></i></span>\n
					<input id='".$step3_ids[$i]."' type='".$step3_type[$i]."' class='form-control' name='' placeholder = '".$step3_placeholder[$i]."' required>\n
					</div>\n
					</div>\n\n";
					}
					$data .= "
					<div class='form-group'>
					<div class='input-group'>
					<input id='step3submit' type='submit' class='btn btn-success' value='Init' required>
					</div>
					</div>
					</div>
					
					<script>
					$('#step3submit').on('click',function(){
					var admin_id     = $('#admin_id').val();
					var companyname  = $('#companyname').val();
					var address      = $('#address').val();
					var name         = $('#name').val();
					var contact1     = $('#contact1').val();
					var contact2     = $('#contact2').val();
					var gstNum       = $('#gstNum').val();
					var cgstPer      = $('#cgstPer').val();
					var sgstPer      = $('#sgstPer').val();
					
					$.ajax({
					url:'system/ajax/ajax.php',
					type:'POST',
					data:{'page':'initialize','action':'step3','admin_id':admin_id,'companyname':companyname,'address':address,'name':name,'contact1':contact1,'contact2':contact2,'gstNum':gstNum,'cgstPer':cgstPer,'sgstPer':sgstPer},
					success:function(data){
					$('#show').html(data);
					$('#step1').hide('slow','linear');
					$('#step2').hide('slow','linear');
					$('#step3').hide('slow','linear');
					$('#step4').show('slow','linear');
					}
					});
					});	
					</script>
					
					
					";
				
				echo $data;
				
			}
		}
		/* Init Page STEP 1 */
		if($_POST['page']=='initialize'){
			if($_POST['action']=='step1'){
				extract($_POST);
				if(!file_exists('../db/inidb.php')){
				$handle = fopen('../db/inidb.php','w');
				$data2 .= '<?php';
				$data2 .= '\n';
				$data2 .= "\$server='".$server."';\n";
				$data2 .= "\$dbname='".$dbname."';\n";
				$data2 .= "\$username='".$dbuser."';\n";
				$data2 .= "\$pass='".$dbpass."';\n";
				$data2 .= "?>";
				if(fwrite($handle,$data2)){
					echo "<h4 class='text-success'>File Created Successfully.</h4>";
				}
				}else{
					echo "<h4 class='text-danger'>File is Already There. SYSTEM>DB>INIDB.PHP</h4>";
				}
			}
		}
		
		/*Init Page Step 2*/
		if($_POST['page']=='initialize'){
			if($_POST['action']=='step2'){
				extract($_POST);
				$shop->data = array(
					'',
					$username,
					$password
				);
				$shop->query = "INSERT INTO admin(admin_id,username,password) VALUES (?,?,?)";
				$message = $shop->execute_query();
				echo "<h4 class='text-success'>".$message."</h4>";
				echo  "<input type='hidden' id='last_id' value='".$shop->lastID()."'>";
			}
		}
		
		/* Init Page Step 3*/
		if($_POST['page']=='initialize'){
			if($_POST['action']=='step3'){
				extract($_POST);
				$shop->data = array(
					'',
					$admin_id,
					$companyname,
					$contact1,
					$contact2,
					$address,
					$name,
					$gstNum,
					$cgstPer,
					$sgstPer
				);
				$shop->query = "INSERT INTO shop_details VALUES (?,?,?,?,?,?,?,?,?,?)";
				$message = $shop->execute_query();
				echo "<span class='text-success'>".$message."</span>";
				
			}
		}
		
		if($_POST['page']=='admin'){
			if($_POST['action']=='login'){
				extract($_POST);
				$shop->data = array(
					$username,
					$password
				);
				$shop->query = "SELECT * FROM admin WHERE username = ? and password = ?";
				if($shop->total_row()==1){
					$data = $shop->query_result();
					session_start();
					$_SESSION['admin_id'] = $data[0]['admin_id'];
					//echo $data[0]['admin_id'];
					echo "<script>window.location.href='../admin/panel/dashboard.php'</script>";
				}else{
					echo "<span class='text-danger'>USERNAME OR PASSWORD WRONG.</span>";
				}
			}
		}
		
		if($_POST['page']=='adminapp'){
			if($_POST['action']=='loginapp'){
				extract($_POST);
				$shop->data = array(
					$username,
					$password
				);
				$shop->query = "SELECT * FROM admin WHERE username = ? and password = ?";
				if($shop->total_row()==1){
					$data = $shop->query_result();
					session_start();
					$_SESSION['admin_id'] = $data[0]['admin_id'];
					$cookie_name = "user_login";
					$cookie_value= $data[0]['admin_id'];
					setcookie($cookie_name, $cookie_value, time() + (86400 * 365), "/");
					echo "LOGIN SUCCESS. GO TO DASHBOARD TAB.";
				}else{
					echo "<span class='text-danger'>USERNAME OR PASSWORD WRONG.</span>";
				}
			}
		}
		
		if($_POST['page']=='bill'){
			if($_POST['action']=='create_form'){
				extract($_POST);
				session_start();
						
				$data = "
					<div class='form-group'>
						<input type='text' id='customername' class='form-control' placeholder='Customer Name'>
					</div>
					<div class='form-group'>
						<input type='text' id='customeraddress' class='form-control' placeholder='Customer Address'>
					</div>
					<div class='form-group'>
						<input type='number' id='customercontact' class='form-control' placeholder='Customer Contact'>
					</div>
					<div class='form-group'>
						<input type='number' id='customeraltcontact' class='form-control' placeholder='Customer Alternative Contact'>
					</div>
				<div class='table table-responsive'>
					<table  id='cloth_form' class='table table-bordered table-striped'>
					<thead>
					<tr>
					<th>Sr. No.</th>
					<th>Cloth</th>
					<th>Pieces</th>
					<th>Price/Piece</th>
					<th>Total</th>
					</tr>
					</thead>
					<tbody>
				";
				
				for($i=1;$i<=$number;$i++){
					$data .= "
						<tr>
						<td><h3>".$i."</h3></td>
						<td style='width:250px;'>
								<input type='text' id='cloth_data".$i."' class='form-control' style='width:250px' placeholder='..' required/>
						</td>
						<td>
							<input type='number' id='cloth_piece".$i."' class='form-control' style='width:50px' placeholder='..' required/>
						</td>
						<td>
							<input type='number' id='cloth_price_piece".$i."' class='form-control' style='width:70px' placeholder='..' required/>
						</td>
						<td><input type='number' id='cloth_price_total".$i."' class='form-control' style='width:100px; background-color:#fff;' placeholder='..' disabled/> </td>
						</tr>
						
						<script>
						
							$('#cloth_price_piece".$i."').on('keyup',function(){
								var cloth_price_piece = $('#cloth_price_piece".$i."').val();
								var cloth_piece       = $('#cloth_piece".$i."').val();
								var cloth_price_total = cloth_price_piece * cloth_piece;
								$('#cloth_price_total".$i."').val(cloth_price_total);
							});
							
							$('#cloth_piece".$i."').on('keyup',function(){
							var cloth_price_piece = $('#cloth_price_piece".$i."').val();
							var cloth_piece       = $('#cloth_piece".$i."').val();
							var cloth_price_total = cloth_price_piece * cloth_piece;
							$('#cloth_price_total".$i."').val(cloth_price_total);
							});
							
						</script>
						
					";
				}
				$data .= "
				</tbody>
				</table>
				</div>";
				
				$shop->query = "SELECT * FROM paidAs";
				$paidAsDatas = $shop->query_result();
				$data .= "<div class='form-group'>
					<label>Paid By</lable>
					<select id='paidAs' class='form-control'>
				";
					foreach($paidAsDatas as $paidAs){
					$data .= "
						<option id='paidAs' class='form-control' value='".$paidAs['paidAsID']."'>".$paidAs['paidAsName']."</option>
					";
					}
				$data .= "</select>
					<label>Payment Status</label>
					<select id='status' class='form-control'>
						<option value='0'>None</option>
						<option value='paid'>Paid</option>
						<option value='pending'>Pending</option>
					</select>
					<div id='paidDate'>
						<div class='form-group'>
						<label>Date : </label>
							<input type='date' id='paidDateData' class='form-control' placeholder='Select Date'>
						</div>
						<div class='form-group'>
						<label>Time : </label>
							<input type='time' id='paidTimeData' class='form-control' placeholder='Select Time'>
						</div>
					</div>
					<script>
						$('#paidDate').hide();
						$('#status').change(function(){
							if($(this).val()=='paid'){
								$('#paidDate').show('slow','linear');
							}
							if($(this).val()=='pending'){
								$('#paidDate').hide('slow','linear');
							}
						});
					</script>
					</div>
						<div class='form-group'>
						<input type='text' id='transaction_id' class='form-control' placeholder='Transaction ID'>
					</div>
					<div class='form-group'>
						<textarea type='text' id='comment' class='form-control' placeholder='Comment / Add Extra Words'></textarea>
					</div>
				</div>";
				
				
				echo $data;
				
				$admin_id = $_SESSION['admin_id'];
				
				$shop->data = [$admin_id];
				$shop->query = "SELECT shop_id,company_name FROM shop_details WHERE admin_id = ?";
				$getData = $shop->query_result();
				echo "<div class='form-group'>
				<input type='hidden' id='number_of_inputs' value='".$number."'>
				<input type='hidden' id='shop_id_hidden'>
				<select id = 'selectShop' class='form-control'>";
					echo "<option value='0'>NONE</>";
				foreach($getData as $data){
					echo "<option id='selectShop' value='".$data['shop_id']."'>".$data['company_name']."</option>";
				}
				echo "</select>
				</div>
				<script>
				$('#selectShop').on('change',function(){
					var shop_id = $('#selectShop').val();
					$('#shop_id_hidden').val(shop_id);
					var numberofinputs = $('#number_of_inputs').val();
					var customername = $('#customername').val();
					var customeraddress = $('#customeraddress').val();
					var customercontact = $('#customercontact').val();
					var customeraltcontact = $('#customeraltcontact').val();
					var paidAs = $('#paidAs').val();
					var status = $('#status').val();
					var pDate = $('#paidDateData').val();
					var pTime = $('#paidTimeData').val();
					var transaction_id = $('#transaction_id').val();
					var comment = $('#comment').val();
					
					dataCloth = [];
					dataPiece = [];
					dataTotal = [];
					for(var i=1;i<=numberofinputs;i++){
						dataPiece[i] = $('#cloth_piece'+i).val();
						dataTotal[i] = $('#cloth_price_total'+i).val();
						dataCloth[i] = $('#cloth_data'+i).val();
					}
					
					$.ajax({
					 url:'../../system/ajax/ajax.php',
					 type:'POST',
					 data:{
					 'page':'bill',
					 'action':'totalCalculate',
					 'shop_id':shop_id,
					 'pieceData':dataPiece,
					 'totalData':dataTotal,
					 'clothData':dataCloth,
					 'customername':customername,
					 'customeraddress':customeraddress,
					 'customercontact':customercontact,
					 'customeraltcontact':customeraltcontact,
					 'paidAs':paidAs,
					 'status':status,
					 'paidDate':pDate,
					 'paidTime':pTime,
					 'transaction_id':transaction_id,
					 'comment':comment
					 },
					 success:function(data){
					 	$('#totalBill').html(data);
					 }
					});
				});
				</script>
				";
			}
		}
		
		if($_POST['page']=='bill'){
			if($_POST['action']=='totalCalculate'){
				extract($_POST);
				$shop->data = [$shop_id];
				$shop->query = "SELECT sgstPer,cgstPer FROM shop_details WHERE shop_id = ?";
				$data = $shop->query_result();
				$sgst = $data[0]['sgstPer'];
				$cgst = $data[0]['cgstPer'];
				$totalPiece = array_sum($_POST['pieceData']);
				$totalMoney = array_sum($_POST['totalData']);
				$sgstMoney = ($sgst * $totalMoney)/100;
				$cgstMoney = ($cgst * $totalMoney)/100;
				$totalAmount = $totalMoney + $sgstMoney + $cgstMoney;
				
				session_start();
				$_SESSION['pieceData'] = $_POST['pieceData'];
				$_SESSION['totalData'] = $_POST['totalData'];
				$_SESSION['clothData'] = $_POST['clothData'];
				
				$dataIdsForAjaxSubmit = ['countInputs','shop_id','sgstMoney','cgstMoney','totalAmount','customername','customeraddress','customercontact','customeraltcontact','status','comment','paidAs','transaction_id','paidD','paidT'];
				$dataForAjaxSubmit = [count($dataIdsForAjaxSubmit),$shop_id,$sgstMoney,$cgstMoney,$totalAmount,$customername,$customeraddress,$customercontact,$customeraltcontact,$status,$comment,$paidAs,$transaction_id,$paidDate,$paidTime];
				for($i=0;$i<count($dataIdsForAjaxSubmit);$i++){
					echo "<input type='hidden' id='".$dataIdsForAjaxSubmit[$i]."' value='".$dataForAjaxSubmit[$i]."'>";
				}
				echo "<br>
				<div class='table table-responsive'>
				<table  class='table table-bordered table-striped'>
				<thead>
				<tr>
				<th>Total Piece</th>
				<th>Money ( Without GST )</th>
				<th>CGST [".$sgst."%]</th>
				<th>SGST [".$cgst."%]</th>
				<th>Total Amount</th>
				</tr>
				</thead>
				<tbody>
					<tr>
						<td><h3>".$totalPiece."</h3></td>
						<td><h3>".$totalMoney."</h3></td>
						<td><h3>".$cgstMoney."</h3></td>
						<td><h3>".$sgstMoney."</h3></td>
						<td><h3 class='text-success'>".$totalAmount."</h3></td>
					</tr>
				</tbody>
				</table>
				</div>";
				echo "<script>
					$('#Billsubmit').show('slow','linear');
					
					
					$('#Billsubmit').on('click',function(){
						all_data = [];
						all_data_ids = ['shop_id','sgstMoney','cgstMoney','totalAmount','customername','customeraddress','customercontact','customeraltcontact','status','comment','paidAs','transaction_id','paidD','paidT'];
						var num = $('#countInputs').val();
						for(i=0;i<num;i++){
							all_data[i] = $('#'+all_data_ids[i]).val();
						}
						
						$.ajax({
						url:'../../system/ajax/ajax.php',
						type:'POST',
						data:{
						'page':'bill',
						'action':'create',
						'all_data':all_data
						},
						success:function(data){
							$('#main-bill').hide('slow','linear');
							$('#main-message').show('slow','linear');
							$('#type-msg').html(data);
							$('#showBillCreating').show('slow','linear');
							
						}
						});
					});
					
				</script>
				";
			}
		}
		
		if($_POST['page']=='bill'){
			if($_POST['action']=='create'){
				session_start();
				$_SESSION['all_data']=$_POST;
					if(!$_SESSION['bill_no']){
						$buttonid='finalCreate';
						$buttonname='CreateBill';
						$btnMsg='Creating Bill...';
					}else{
						$buttonid='UpdateBill';
						$buttonname='UpdateBill';
						$btnMsg='Updating Bill...';
					}
				echo "
				<button id='showTable' class='btn btn-info'>Check Again</button>
				<button id='hideTable' class='btn btn-danger'>Hide Form</button>
				<br><hr>
				<button id='".$buttonid."' class='btn btn-success'>".$buttonname."</button>
				<h3 id='showBillCreating' class='text-danger'>".$btnMsg."<span id='dots'>...</span></h3>
					<script>
						$('#hideTable').hide('slow','linear');
						interval = setInterval(function(){
						 	$('#showBillCreating').fadeOut(500);
						 	$('#showBillCreating').fadeIn(500);
						 }, 1000);
						 
						 $('#showTable').on('click',function(e){
						 	e.preventDefault();
						 	$('#main-bill').show('slow','linear');
						 	$('#hideTable').show('slow','linear');
						 });
						 
						 $('#hideTable').on('click',function(e){
						 e.preventDefault();
						 $('#main-bill').hide('slow','linear');
						 $('#hideTable').hide('slow','linear');
						 });
						 
						 $('#finalCreate').on('click',function(e){
						 	$('#showTable').hide('slow','linear');
						 	$.ajax({
						 		url:'../../system/ajax/ajax.php',
						 		type:'POST',
						 		data:{'page':'bill','action':'final_create','data':'callfunction'},
						 		success:function(data){
						 			$('#showBillCreating').html(data);
						 		}
						 	});
						 });
						 
						 $('#UpdateBill').on('click',function(e){
						 	$('#showTable').hide('slow','linear');
						 	$.ajax({
						 		url:'../../system/ajax/ajax.php',
						 		type:'POST',
						 		data:{'page':'bill','action':'update','data':'callfunction'},
						 		success:function(data){
						 			$('#showBillCreating').html(data);
						 		}
						 	});
						 });
					</script>
				";
			}
		}
		
		if($_POST['page']=='bill'){
			if($_POST['action']=='final_create'){
				if($_POST['data']=='callfunction'){
					session_start();
					extract($_SESSION);
					
					$shop->data = array(
						'',
						$all_data['all_data'][0],
						($all_data['all_data'][3]-($all_data['all_data'][1] + $all_data['all_data'][2])),
						$all_data['all_data'][1],
						$all_data['all_data'][2],
						$all_data['all_data'][3],
						$all_data['all_data'][4],
						$all_data['all_data'][5],
						$all_data['all_data'][6],
						$all_data['all_data'][7],
						$shop->date,
						$shop->time,
						$all_data['all_data'][8],
						$all_data['all_data'][10],
						$all_data['all_data'][11],
						$all_data['all_data'][12],
						$all_data['all_data'][13],
						$all_data['all_data'][9],
					);
					$shop->query = "INSERT INTO billing_details(bill_number,shop_id,money_without_gst,cgstMoney,sgstMoney,TotalAmount,CustomerName,CustomerAddress,CustomerContact,CustomerAlternativeContact,Date,Time,Status,paid_as,transaction_id,PaidDate,PaidTime,Comment) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
					$message1 = $shop->execute_query();
					$lastID = $shop->lastID();
					for($i=1;$i<count($clothData);$i++){
						$shop->data = array(
							$lastID,
							$clothData[$i],
							$pieceData[$i],
							(((int)$totalData[$i])/((int)$pieceData[$i]))
						);
							$shop->query = "INSERT INTO bill_data(bill_number,bill_cdata,piece,price_per_piece) VALUES (?,?,?,?)";
							$message = $shop->execute_query();
						}
					
				
						echo "<h3 class='text-success'>Bill Created Successfully.</h3>
							<a href='create_bill.php'><button id='new-bill' class='btn btn-success'>Create New Bill</button></a>
							<script>
								$('#finalCreate').hide('slow','linear');
								clearInterval(interval);
							</script>
						";
					
				}
			}
		}
		
		if($_POST['page']=='bill'){
			if($_POST['action']=='update'){
				if($_POST['data']=='callfunction'){
					session_start();
					extract($_SESSION);
					
					$shop->data = array(
						$all_data['all_data'][0],
						$totalData[1],
						$all_data['all_data'][1],
						$all_data['all_data'][2],
						$all_data['all_data'][3],
						$all_data['all_data'][4],
						$all_data['all_data'][5],
						$all_data['all_data'][6],
						$all_data['all_data'][7],
						$shop->date,
						$shop->time,
						$all_data['all_data'][8],
						$all_data['all_data'][10],
						$all_data['all_data'][11],
						$all_data['all_data'][12],
						$all_data['all_data'][13],
						$all_data['all_data'][9],
					);
					$shop->query = "UPDATE billing_details SET shop_id=?,money_without_gst=?,cgstMoney=?,sgstMoney=?,TotalAmount=?,CustomerName=?,CustomerAddress=?,CustomerContact=?,CustomerAlternativeContact=?,Date=?,Time=?,Status=?,paid_as=?,transaction_id=?,PaidDate=?,PaidTime=?,Comment=? WHERE bill_number =".$_SESSION['bill_no'];
					$message1 = $shop->execute_query();
					//$lastID = $shop->lastID();
					$shop->query = "DELETE FROM bill_data WHERE bill_number = ".$_SESSION['bill_no'];
					$message = $shop->execute_query();
					for($i=1;$i<count($clothData);$i++){
						$shop->data = array(
							$_SESSION['bill_no'],
							$clothData[$i],
							$pieceData[$i],
							(((int)$totalData[$i])/((int)$pieceData[$i]))
						);
							
							$shop->query = "INSERT INTO bill_data(bill_number,bill_cdata,piece,price_per_piece) VALUES (?,?,?,?)";
							$shop->execute_query();
							
						}
						$_SESSION['bill_no']=FALSE;
						
					
				
						echo "<h3 class='text-success'>Bill Updated Successfully.</h3>
							<a href='create_bill.php'><button id='new-bill' class='btn btn-success'>Create New Bill</button></a>
							<script>
								$('#finalCreate').hide('slow','linear');
								$('#UpdateBill').hide('slow','linear');
								clearInterval(interval);
							</script>
						";
					
				}
			}
		}
		
		
		/***** FETCH  Bills List [DATATABLE]******/
		if($_POST['page']=='bills'){
			if($_POST['action']=='fetch'){
				$shop->query = "SELECT * FROM billing_details";
				$datas = $shop->query_result();
		$showndata = "
		<table  id='example1' class='table table-bordered table-striped'>
		<thead>
		<tr>
		<th>Bill Number</th>
		<th>Status</th>
		<th>Total Amount</th>
		<th>Customer Name</th>
		<th>Customer Contact</th>
		<th>Bill Date Time</th>
		<th>View Bill</th>
		<th>Print Bill</th>
		<th>Edit Bill</th>
		</tr>
		</thead>
		<tbody>
		";
		foreach($datas as $data){
			if($data['Status']=='paid'){
				$data['Status'] = '<span class="text-success">PAID</span>';
			}else{
				$data['Status'] = '<span class="text-warning">PENDING</span>';
			}
		$showndata.= "
		<tr>
		<td>".$data['bill_number']."</td>
		<td>".$data['Status']."</td>
		<td class='text-danger'>".$data['TotalAmount']."</td>
		<td>".$data['CustomerName']."</td>
		<td>".$data['CustomerContact']."</td>
		<td>".$data['Date']." ".$data['Time']."</td>
		<td><a href='view_bill.php?id=".$data['bill_number']."'><span class='fa fa-eye'></span></a></td>
		<td><a href='print_bill.php?id=".$data['bill_number']."'><span class='fa fa-print'></span></a></td>
		<td><a href='edit_bill.php?id=".$data['bill_number']."'><span class='fa fa-edit'></span></a></td>
		</tr>
		";
		}
		
		$showndata.= "
		</tbody>
		<tfoot>
		<tr>
	<th>Bill Number</th>
	<th>Status</th>
	<th>Total Amount</th>
	<th>Customer Name</th>
	<th>Customer Contact</th>
	<th>Bill Date Time</th>
	<th>View Bill</th>
	<th>Print Bill</th>
	<th>Edit Bill</th>
		</tr>
		</tfoot>
		</table>
		<script type='text/javascript'>
		$(function () {
		$('#example1').dataTable();
	/*	$('#example1').dataTable({
		
		});*/
		});
		</script>
		";
		
		echo $showndata;
		}
		}
		
		if($_POST['page']=='edit_bill'){
			if($_POST['action']=='fetch_data'){
				$bill_id = $_POST['qid'];
				
				session_start();
				$_SESSION['bill_no'] = $bill_id;
				
				$shop->data = array(
					':qid'=>$bill_id
				);
				$shop->query = "
					SELECT * FROM billing_details
					WHERE bill_number= :qid
				";
				
				$total_row = $shop->total_row();
				
				if($total_row==1){
					$result1 = $shop->query_result();
					
					$shop->data = array(
						':qid'=>$bill_id
					);
					$shop->query = "SELECT * FROM bill_data WHERE bill_number = :qid";
					$result2 = $shop->query_result();
					$result3 = [count($result2)];
					$result = array_merge($result1,$result2,$result3);
					//print_r($result);
					echo json_encode($result,JSON_HEX_QUOT | JSON_HEX_TAG);
					}
				else{
					echo "Can Not Find The Bill.";
				
				}
				
			}
		}
		
		/***** FETCH  Bills List [DATATABLE]******/
		if($_POST['page']=='customer'){
			if($_POST['action']=='fetch'){
				$shop->query = "SELECT *,count(*) FROM billing_details group by CustomerContact";
				$datas = $shop->query_result();
		$showndata = "
		<table  id='example1' class='table table-bordered table-striped'>
		<thead>
		<tr>
		<th>Customer Name</th>
		<th>No. Of Bills</th>
		<th>Mobile Number</th>
		<th>Alternative Mobile </th>
		<th>View Details</th>
		</tr>
		</thead>
		<tbody>
		";
		
		
		foreach($datas as $data){
		$showndata.= "
		<tr>
		<td>".$data['CustomerName']."</td>
		<td>".$data['count(*)']."</td>
		<td>".$data['CustomerContact']."</td>
		<td>".$data['CustomerAlternativeContact']."</td>
		<td><a href='see_bills.php?contact=".$data['CustomerContact']."'><span class='fa fa-eye'></span></a></td>
		</tr>
		";
		}
		
		$showndata.= "
		</tbody>
		<tfoot>
		<tr>
			<th>Customer Name</th>
			<th>No. Of Bills</th>
			<th>Mobile Number</th>
			<th>Alternative Mobile </th>
			<th>View Details</th>
		</tr>
		</tfoot>
		</table>
		<script type='text/javascript'>
		$(function () {
		$('#example1').dataTable();
			/*	$('#example1').dataTable({
		
		});*/
		});
		</script>
		";
		
		echo $showndata;
		}
		}
		
		if($_POST['page']=='dashboard'){
			if($_POST['action']=='total_bills'){
				$shop->query = "SELECT count(*) FROM billing_details";
				$res = $shop->query_result();
				echo $res[0][0];
			}
		}
		
		if($_POST['page']=='dashboard'){
			if($_POST['action']=='total_today_bills'){
				$shop->query = "SELECT count(*) FROM billing_details WHERE Date = '".$shop->date."'";
				$res = $shop->query_result();
				echo $res[0][0];
			}
		}
		
		if($_POST['page']=='dashboard'){
			if($_POST['action']=='pending_fetch'){
				$shop->query = "SELECT * FROM billing_details WHERE Status = 'pending' LIMIT 5";
				$results = $shop->query_result();
				foreach($results as $result){
					echo '
						<li>
						<!-- checkbox -->
						<a href="view_bill.php?id='.$result['bill_number'].'"><span class="fa fa-eye"></span></a>
						<!-- todo text -->&nbsp;&nbsp;
						<span class="text">Bill No. : '.$result['bill_number'].' { AMOUNT : '.$result['TotalAmount'].'}</span>
						<!-- Emphasis label -->
						<!-- General tools such as edit or delete-->
						</div>
						</li>
					';
				}
			}
		}
	}