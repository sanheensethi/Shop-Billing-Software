<?php
	session_start();
	if(!isset($_SESSION['admin_id'])){
		echo "<script>window.location.href='../'</script>";
	}
	include "header.php";
?>

<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Bill Creator !
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Bills</a></li>
      <li class="active">Create Bill</li>
    </ol>
  </section>
  <section class="content" id="main-message">
  	<div class='row' >
  	<div class='col-md-12'>
  	<div class='box'>
  	<div class='box-header'>
  	<h3 class='box-title' id='type-msg'></h3>
  	</div>
  	</div>
  	</div>
  	</div>
  </section>
  <section class="content" id='main-bill'>

    <div class='row'>
      <div class='col-md-12'>
        <div class='box'>
          <div class='box-header'>
            <h3 class='box-title'>[ Bill ]<small></small></h3>
            <!-- tools box -->
<div class="form-group">
	<label>Number Of Clothes Types : <span style="color:#f00;">*</span></label>
	<input type="number" id="c-type" class="form-control" placeholder="Type Number" required/>
</div>
      	      <div class="pull-right box-tools">
              <button class="btn btn-default btn-sm" data-widget='remove' data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            	</div><!-- /. tools -->
  	        </div><!-- /.box-header -->
   	       <div class='box-body pad'>
   	       
   	       <div id="showBillForm">
   	       	
   	       </div>
   	       
   	       <!--<button id="Billsubmit" class="btn btn-success">Submit</button>
   	       -->
            </div>
        </div>
      </div><!-- /.col-->
 	   </div><!-- ./row -->
 	   
 	   <div class='row' >
 	   <div class='col-md-12'>
 	   <div class='box'>
 	   <div class='box-header'>
 	   <h3 class='box-title'>[ TOTAL Bill CALCULATE ]<small></small></h3>
 	   <!-- tools box -->
 	   <div class="pull-right box-tools">
 	   <button class="btn btn-default btn-sm" data-widget='remove' data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
 	   </div><!-- /. tools -->
 	   </div><!-- /.box-header -->
 	   <div class='box-body pad'>
 	   
 	   <div id="totalBill">
 	   
 	   </div>
 	   
 	   <button id='Billsubmit' class='btn btn-success'>Submit</button>
 	   
 	   </div>
 	   </div>
 	   </div><!-- /.col-->
 	   </div><!-- ./row -->
 	   
 	 </section><!-- /.content -->
 	 
  <?php
  include "footer.php";
  ?>
  <script>
  	$('#main-message').hide();
  $(document).ready(function(){
  	$('#Billsubmit').hide('slow','linear');
  	
  	$('#c-type').on('keyup',function(){
  		$.ajax({
  			url:'../../system/ajax/ajax.php',
  			type:'POST',
  			data:{'page':'bill','action':'create_form','number':$(this).val()},
  			success:function(data){
  				$('#showBillForm').html(data);
  			}
  		});
  	});
  	
  });
  </script>
 <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
  