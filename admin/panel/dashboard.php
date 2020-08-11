<?php
	include "header.php";
?>
      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3 id="total_bills"></h3>
                  <p>Total Bills</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                	<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3 id="total_today_bills"><sup style="font-size: 20px"></sup></h3>
                  <p>Today Bills</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <section class="col-lg-7 connectedSortable">
              <!-- TO DO List -->
              <div class="box box-primary">
                <div class="box-header">
                  <i class="ion ion-clipboard"></i>
                  <h3 class="box-title">Pending Bills</h3>
                  
                </div><!-- /.box-header -->
                <div class="box-body">
                  <ul class="todo-list">
                  	<div id="pending_result"></div>
                  </ul>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix no-border">
                  <a href="see_bills.php"><button class="btn btn-default pull-right"><i class="fa fa-plus"></i> Check More </button></a>
                </div>
              </div><!-- /.box -->

            </section><!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->

          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
   <?php
   	include "footer.php";
   ?>
   <script>
   $(document).ready(function(){
   $.ajax({
   url:'../../system/ajax/ajax.php',
   type:'POST',
   data:{page:'dashboard',action:'total_bills'},
   success:function(dat){
   $('#total_bills').html(dat);
   }
   }); 
   
   $.ajax({
   url:'../../system/ajax/ajax.php',
   type:'POST',
   data:{page:'dashboard',action:'total_today_bills'},
   success:function(dat){
   $('#total_today_bills').html(dat);
   }
   }); 
   
   $.ajax({
   url:'../../system/ajax/ajax.php',
   type:'POST',
   data:{page:'dashboard',action:'pending_fetch'},
   success:function(dat){
   $('#pending_result').html(dat);
   }
   }); 
   
   });
   
   </script>
   