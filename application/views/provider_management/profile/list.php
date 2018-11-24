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
              <h3 class="box-title">Providers</h3>
              <?php include("inc/box-tools.php");?>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
				<table id="all-patient-list" class="table no-margin table-hover">
					<thead>
						<tr>
							<th>Provider Name</th>
							<th>Phone</th>
							<th>Email</th>
							<th>Address</th>
							<th width="50px">Action</th>
						</tr>
					</thead>
	                  
					<tbody>
						<tr>
							<td>Alexandra Kirtchik</td>
							<td>202-555-0162</td>
							<td>alexandra.kirtchik@email.com</td>
							<td>38 Poplar St., Watsonville, CA 95076</td>
							<td>
								<a href="update-provider.php" title="Edit"><span class="label label-primary">Update</span></a>
							</td>
						</tr>
						
						<tr>
							<td>Henry Barraza</td>
							<td>202-555-0166</td>
							<td>henry.arraza@email.com</td>
							<td>567 Longbranch Drive, Daly City, CA 94015</td>
							<td>
								<a href="update-provider.php" title="Edit"><span class="label label-primary">Update</span></a>
							</td>
						</tr>
						
						<tr>
							<td>Shohreh Nourollah</td>
							<td>202-555-0145</td>
							<td>henry.arraza@email.com</td>
							<td>7234 Del Monte Street, Oxnard, CA 93030</td>
							<td>
								<a href="update-provider.php" title="Edit"><span class="label label-primary">Update</span></a>
							</td>
						</tr>
						
						<tr>
							<td>Lilibeth Ramirez</td>
							<td>202-555-0128</td>
							<td>lilibeth.ramirez@email.com</td>
							<td>9433 East Glenridge Drive, San Francisco, CA 94109</td>
							<td>
								<a href="update-provider.php" title="Edit"><span class="label label-primary">Update</span></a>
							</td>
						</tr>
						
						<tr>
							<td>Fidelia Nchetam</td>
							<td>202-555-0119</td>
							<td>fidelia.nchetam@email.com</td>
							<td>26 Arlington Drive, Spring Valley, CA 91977</td>
							<td>
								<a href="update-provider.php" title="Edit"><span class="label label-primary">Update</span></a>
							</td>
						</tr>
						
						<tr>
							<td>Grace Adeagbo</td>
							<td>202-555-0159</td>
							<td>gracea.adeagbo@email.com</td>
							<td>520 Berkshire Drive, Alameda, CA 94501</td>
							<td>
								<a href="update-provider.php" title="Edit"><span class="label label-primary">Update</span></a>
							</td>
						</tr>
						
						<tr>
							<td>Kaixuan Luo</td>
							<td>202-535-0551</td>
							<td>kaixuan.luo@email.com</td>
							<td>9690 Grandrose Street, Ontario, CA 91762</td>
							<td>
								<a href="update-provider.php" title="Edit"><span class="label label-primary">Update</span></a>
							</td>
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
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
