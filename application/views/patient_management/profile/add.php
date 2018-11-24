<?php include("inc/tmd-config.php");?>

<!DOCTYPE html>
<html>
<head>
  
  <?php include("inc/head-tag.php");?>
  
</head>
<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">

  <header class="main-header">

    <?php include("inc/header.php");?>
    
  </header>
  
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    
    <?php include("inc/sidebar.php");?>
    
  </aside>

  <!-- Content Wrapper. Contains page content -->
  
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
    
      <div class="row">

		  <div class="col-lg-8">
          <div class="box">
          
            <div class="box-header with-border">
              <h3 class="box-title">Add Patient</h3>
              <?php include("inc/box-tools.php");?>
            </div>
            <!-- /.box-header -->
				
				<!-- form start -->
	            <form class="form-horizontal">
	              <div class="box-body">
	              
	              	<div class="form-group xrx-form-subheader">
	              		<div class="col-sm-3"></div>
	              		<div class="col-sm-7"><p class="lead">Personal Information</p></div>
	              	</div>
	              	
	              	<div class="form-group">
	                  <label for="" class="col-sm-3 control-label">Date of Referral</label>
	                  
	                  <div class="col-sm-7">
	                  	<div class="input-group date">
		                  <input type="text" class="form-control" id="dateofreferral">
		                </div>
	                  </div>
	                </div>
	                
	                <div class="form-group">
	                  <label for="" class="col-sm-3 control-label">First Name</label>
	                  
	                  <div class="col-sm-7">
	                  	<input type="text" class="form-control" id="" placeholder="">
	                  </div>
	                  
	                </div>
	                
	                <div class="form-group">
	                  <label for="" class="col-sm-3 control-label">Last Name</label>
	                  
	                  <div class="col-sm-7">
	                  	<input type="text" class="form-control" id="" placeholder="">
	                  </div>
	                </div>
	                
	                <div class="form-group">
	                  <label for="" class="col-sm-3 control-label">Date of Birth</label>
	                  
	                  <div class="col-sm-7">
	                  	<div class="input-group date">
		                  <input type="text" class="form-control" id="dateofbirth">
		                </div>
	                  </div>
	                </div>
	                
	                <div class="form-group">
	                  <label for="inputGender" class="col-sm-3 control-label">Gender</label>
	                  
	                  <div class="col-sm-7">
	                  	<select class="form-control select2" style="width: 100%;">
		                  <option selected="selected">Male</option>
		                  <option>Female</option>
		                </select>
	                  </div>
	                </div>
	                
	                <div class="form-group">
	                  <label for="inputMedicare" class="col-sm-3 control-label">Medicare</label>
	                  
	                  <div class="col-sm-7">
	                  	<input type="text" class="form-control" id="Medicare" placeholder="">
	                  </div>
	                </div>
	                
	                <div class="form-group">
	                  <label for="inputphone" class="col-sm-3 control-label">Phone No</label>
	                  
	                  <div class="col-sm-7">
	                  	<input type="text" class="form-control" id="Phone" placeholder="">
	                  </div>
	                </div>
	                
	                <div class="form-group">
	                  <label for="inputAddress1" class="col-sm-3 control-label">Address</label>
	                  
	                  <div class="col-sm-7">
	                  	<input type="text" class="form-control" id="Address1" placeholder="">
	                  </div>
	                </div>
	                
	                <div class="form-group xrx-form-subheader">
	              		<div class="col-sm-3"></div>
	              		<div class="col-sm-7"><p class="lead">Home Health Care</p></div>
	              	</div>
	              	
	              	<div class="form-group">
	                  <label for="" class="col-sm-3 control-label">Home Health</label>
	                  
	                  <div class="col-sm-7">
	                  	<select class="form-control select2" style="width: 100%;">
		                  <option selected="selected">Advance Home Care</option>
		                  <option>Divine Care Home Health</option>
		                  <option>Faith and Hope</option>
		                  <option>GMO Home Health</option>
		                  <option>Healthy Choice Home Care</option>
		                  <option>Millenium Home Health</option>
		                  <option>Nightingle Home Health</option>
		                  <option>Prestige Home Health</option>
		                  <option>R & G Home Health Care</option>
		                </select>
	                  </div>
	                </div>
	                
	                <div class="form-group xrx-btn-handler">
	              		<div class="col-sm-3"></div>
	              		<div class="col-sm-7">
		              		<button type="button" class="btn btn-primary xrx-btn">
								<i class="fa fa-check"></i> Add Patient
							</button>
	              		</div>
	              	</div>
	                
	              </div>
	              
	            </form>
            
          </div>
          <!-- /.box -->

      </div>
      <!-- /.row -->
    </section>
    
  </div>
  <!-- /.content-wrapper -->
  
  <footer class="main-footer">
  
  	<?php include("inc/footer.php");?>
  	
  </footer>

  
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Select2 -->
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- Page script -->
<script>
  $(function () {

    //Date picker
    $('#dateofreferral').datepicker({
      autoclose: true
    });
    
    $('#dateofbirth').datepicker({
      autoclose: true
    })

  })
</script>
</body>
</html>
