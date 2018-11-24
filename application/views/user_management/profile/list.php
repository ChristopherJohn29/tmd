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
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Users</h3>
              <?php include("inc/box-tools.php");?>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="all-patient-list" class="table no-margin table-hover">
				<thead>
					<tr>
						<th>Email</th>
						<th>Full Name</th>
						<th>Type of Access</th>
						<th width="80px">Actions</th>
					</tr>
				</thead>
                  
				<tbody>
					<tr>
						<td>jayson.arcayna@gmail.com</td>
						<td>Jayson Arcayna</td>
						<td>Administrator</td>
						<td><a href="update-user.php" title="Edit"><span class="label label-primary">Update</span></a></td>
					</tr>
					
					
					
				</tbody>
                </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          
        
    </section>
    <!-- /.content -->
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
<!-- page script -->
<script>
  $(function () {
    $('#all-patient-list').DataTable({
      'paging'      : false,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : false,
      'info'        : false,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
