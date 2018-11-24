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
              <h3 class="box-title">Create Route Sheet</h3>
              <?php include("inc/box-tools.php");?>
            </div>
            <!-- /.box-header -->
				
				<!-- form start -->
	            <form class="form-horizontal">
	              <div class="box-body">
	              
	              	<div class="form-group xrx-form-subheader">
	              		<div class="col-sm-3"></div>
	              		<div class="col-sm-7"><p class="lead">Provider</p></div>
	              	</div>
	              	
	              	<div class="form-group">
	                  <label for="" class="col-sm-3 control-label">Provider Name</label>
	                  
	                  <div class="col-sm-7">
	                  	<select class="form-control select2" style="width: 100%;">
		                  <option selected="selected">Alexandra Kirtchik</option>
		                  <option>Fidelia Nchetam</option>
		                  <option>Grace Adeagbo</option>
		                  <option>Henry Barraza</option>
		                  <option>Kaixuan Luo</option>
		                  <option>Lilibeth Ramirez</option>
		                  <option>Reynaldo Salcedo</option>
		                </select>
	                  </div>
	                </div>
	                
	                <div class="form-group xrx-form-subheader">
	              		<div class="col-sm-3"></div>
	              		<div class="col-sm-7"><p class="lead">Schedule</p></div>
	              	</div>
	              	
	                <div class="form-group">
	                  <label for="" class="col-sm-3 control-label">Date of Service</label>
	                  
	                  <div class="col-sm-7">
	                  	<div class="input-group date">
		                  <div class="input-group-addon">
		                    <i class="fa fa-calendar"></i>
		                  </div>
		                  <input type="text" class="form-control pull-right" id="datepicker">
		                </div>
	                  </div>
	                </div>
	                
	                <div class="form-group xrx-form-subheader">
	              		<div class="col-sm-3"></div>
	              		<div class="col-sm-7"><p class="lead">Patient</p></div>
	              	</div>
	                
	                <div class="form-group">
	                  <label for="" class="col-sm-3 control-label">Time of Visit</label>
	                  
	                  <div class="col-sm-7">
	                  	<input type="text" class="form-control" id="" placeholder="">
	                  </div>
	                </div>
	                
	                <div class="form-group">
	                  <label for="" class="col-sm-3 control-label">Name of Patient</label>
	                  
	                  <div class="col-sm-7">
	                  	<input type="text" class="form-control" id="" placeholder="">
	                  </div>
	                </div>
	                
	                <div class="form-group">
	                  <label for="" class="col-sm-3 control-label">Address</label>
	                  
	                  <div class="col-sm-7">
	                  	<input type="text" class="form-control" id="" placeholder="">
	                  </div>
	                  
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
	                
	                <div class="form-group">
	                  <label for="" class="col-sm-3 control-label">Type of Visit</label>
	                  
	                  <div class="col-sm-7">
	                  	<select class="form-control select2" style="width: 100%;">
		                  <option selected="selected">Initial Visit (Home)</option>
		                  <option>Initial Visit (Facility)</option>
		                  <option>Follow-up Visit</option>
		                </select>
	                  </div>
	                </div>
	                
	                <div class="form-group">
	                  <label for="" class="col-sm-3 control-label">Notes</label>
	                  
	                  <div class="col-sm-7">
	                  	<input type="text" class="form-control" id="" placeholder="">
	                  </div>
	                  
	                </div>
	                
	                <div class="form-group">
	                  <label for="" class="col-sm-3 control-label"></label>
	                  
	                  <div class="col-sm-7">
	                  	<button type="button" class="btn btn-default">
							<i class="fa fa-plus"></i> Add Patient
						</button>
	                  </div>
	                  
	                </div>
	                
	                
	                <div class="form-group xrx-btn-handler">
	              		<div class="col-sm-3"></div>
	              		<div class="col-sm-7">
		              		<button type="button" class="btn btn-primary xrx-btn">
								<i class="fa fa-check"></i> Create Route
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
    $('#datepicker').datepicker({
      autoclose: true
    })

  })
</script>
</body>
</html>
