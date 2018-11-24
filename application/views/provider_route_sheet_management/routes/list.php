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
              <h3 class="box-title">Route Sheet</h3>
              <?php include("inc/box-tools.php");?>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="" class="table no-margin table-hover">
				<thead>
					<tr>
						<th>Date of Service</th>
						<th>Provider</th>
						<th width="160px">Action</th>
					</tr>
				</thead>
                  
				<tbody>
					<tr>
						<td>Nov 23, 2018</td>
						<td>Alexandra Kirtchik</td>
						<td>
							<a href="details-route-sheet.php"><span class="label label-primary">View Details</span></a>
							<a href="update-route-sheet.php" title="Edit"><span class="label label-primary">Update</span></a>
						</td>
					</tr>
					
					<tr>
						<td>Nov 23, 2018</td>
						<td>Henry Barraza</td>
						<td>
							<a href="details-route-sheet.php"><span class="label label-primary">View Details</span></a>
							<a href="update-route-sheet.php" title="Edit"><span class="label label-primary">Update</span></a>
						</td>
					</tr>
					
					<tr>
						<td>Nov 24, 2018</td>
						<td>Shohreh Nourollah</td>
						<td>
							<a href="details-route-sheet.php"><span class="label label-primary">View Details</span></a>
							<a href="update-route-sheet.php" title="Edit"><span class="label label-primary">Update</span></a>
						</td>
					</tr>
					
					<tr>
						<td>Nov 25, 2018</td>
						<td>Lilibeth Ramirez</td>
						<td>
							<a href="details-route-sheet.php"><span class="label label-primary">View Details</span></a>
							<a href="update-route-sheet.php" title="Edit"><span class="label label-primary">Update</span></a>
						</td>
					</tr>
					
					<tr>
						<td>Nov 25, 2018</td>
						<td>Fidelia Nchetam</td>
						<td>
							<a href="details-route-sheet.php"><span class="label label-primary">View Details</span></a>
							<a href="update-route-sheet.php" title="Edit"><span class="label label-primary">Update</span></a>
						</td>
					</tr>
					
					<tr>
						<td>Nov 27, 2018</td>
						<td>Grace Adeagbo</td>
						<td>
							<a href="details-route-sheet.php"><span class="label label-primary">View Details</span></a>
							<a href="update-route-sheet.php" title="Edit"><span class="label label-primary">Update</span></a>
						</td>
					</tr>
					
					<tr>
						<td>Nov 27, 2018</td>
						<td>Kaixuan Luo</td>
						<td>
							<a href="details-route-sheet.php"><span class="label label-primary">View Details</span></a>
							<a href="update-route-sheet.php" title="Edit"><span class="label label-primary">Update</span></a>
						</td>
					</tr>
					
				</tbody>
				
				<tfoot>
					<tr>
						<th>Date of Service</th>
						<th>Provider</th>
						<th>Actions</th>
					</tr>
				</tfoot>
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
</body>
</html>
