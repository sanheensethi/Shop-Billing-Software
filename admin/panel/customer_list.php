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
            Bills Table
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Bills</a></li>
            <li class="active">See Bills</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Total Number Of Bills : <span id="total"></span></h3>
                </div><!-- /.box-header -->
                <div class="box-body" style="">
                <div class="table-responsive" style="padding:10px">
                <br>
                <div id="show"></div>
                 
                </div><!-- /.box-body -->
                </div>
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
      </footer>
    </div><!-- ./wrapper -->

   <!-- jQuery 2.1.3 -->
    <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- DATA TABES SCRIPT -->
    <script src="plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
    <!-- SlimScroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js" type="text/javascript"></script>
    <!-- page script -->

	<script>
		$(document).ready(function(){
			$.ajax({
				url:'../../system/ajax/ajax.php',
				type:'POST',
				data:{page:'customer',action:'fetch'},
				success:function(dat){
					$('#show').html(dat);
				}
			});
			
			$.ajax({
				url:'../../system/ajax/ajax.php',
				type:'POST',
				data:{page:'customer',action:'total'},
				success:function(dat){
					$('#total').html(dat);
				}
			});
			
		});
		
	</script>
  </body>
</html>