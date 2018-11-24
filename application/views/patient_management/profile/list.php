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
              <h3 class="box-title">Patients</h3>
              <?php include("inc/box-tools.php");?>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="all-patient-list" class="table no-margin table-hover">
                <thead>
                  <tr>
                    <th>Patient Name</th>
                    <th>Referral Date</th>
                    <th>ICD10 - Code Diagnoses</th>
                    <th>Date of Service</th>
                    <th width="170px">Actions</th>
                  </tr>
                  </thead>
                  
                  <tbody>
	                  <tr>
	                    <td>Tolentino, Lorna</td>
	                    <td>10/29/18</td>
	                    <td>J45.51, R06.02, M54.5, R42, R60.1, M79.1, R26.81</td>
	                    <td>11/06/18</td>
	                    <td>
							<a href="details-patient.php"><span class="label label-primary">View Details</span></a>
							<a href="add-transaction.php" title=""><span class="label label-primary">Add Transaction</span></a>
						</td>
	                  </tr>
	                  <tr>
	                    <td>Concepcion, Gabby</td>
	                    <td>10/29/18</td>
	                    <td>J45.51, R06.02, M54.5, R42, R60.1, M79.1, R26.81</td>
	                    <td>11/06/18</td>
	                    <td>
							<a href="details-patient.php"><span class="label label-primary">View Details</span></a>
							<a href="add-transaction.php" title=""><span class="label label-primary">Add Transaction</span></a>
						</td>
	                  </tr>
	                  <tr>
	                    <td>Soriano, Maricel</td>
	                    <td>10/29/18</td>
	                    <td>J45.51, R06.02, M54.5, R42, R60.1, M79.1, R26.81</td>
	                    <td>11/06/18</td>
	                    <td>
							<a href="details-patient.php"><span class="label label-primary">View Details</span></a>
							<a href="add-transaction.php" title=""><span class="label label-primary">Add Transaction</span></a>
						</td>
	                  </tr>
	                  <tr>
	                    <td>Bautista, Herbert</td>
	                    <td>10/29/18</td>
	                    <td>J45.51, R06.02, M54.5, R42, R60.1, M79.1, R26.81</td>
	                    <td>11/06/18</td>
	                    <td>
							<a href="details-patient.php"><span class="label label-primary">View Details</span></a>
							<a href="add-transaction.php" title=""><span class="label label-primary">Add Transaction</span></a>
						</td>
	                  </tr>
	                  <tr>
	                    <td>Cuneta, Sharon</td>
	                    <td>10/29/18</td>
	                    <td>J45.51, R06.02, M54.5, R42, R60.1, M79.1, R26.81</td>
	                    <td>11/06/18</td>
	                    <td>
							<a href="details-patient.php"><span class="label label-primary">View Details</span></a>
							<a href="add-transaction.php" title=""><span class="label label-primary">Add Transaction</span></a>
						</td>
	                  </tr>
	                  <tr>
	                    <td>Bonnevie, Dina</td>
	                    <td>10/29/18</td>
	                    <td>J45.51, R06.02, M54.5, R42, R60.1, M79.1, R26.81</td>
	                    <td>11/06/18</td>
	                    <td>
							<a href="details-patient.php"><span class="label label-primary">View Details</span></a>
							<a href="add-transaction.php" title=""><span class="label label-primary">Add Transaction</span></a>
						</td>
	                  </tr>
	                  <tr>
	                    <td>Muhlach, Aga</td>
	                    <td>10/29/18</td>
	                    <td>J45.51, R06.02, M54.5, R42, R60.1, M79.1, R26.81</td>
	                    <td>11/06/18</td>
	                    <td>
							<a href="details-patient.php"><span class="label label-primary">View Details</span></a>
							<a href="add-transaction.php" title=""><span class="label label-primary">Add Transaction</span></a>
						</td>
	                  </tr>
	                  <tr>
	                    <td>Salonga, Lea</td>
	                    <td>10/29/18</td>
	                    <td>J45.51, R06.02, M54.5, R42, R60.1, M79.1, R26.81</td>
	                    <td>11/06/18</td>
	                    <td>
							<a href="details-patient.php"><span class="label label-primary">View Details</span></a>
							<a href="add-transaction.php" title=""><span class="label label-primary">Add Transaction</span></a>
						</td>
	                  </tr>
	                  <tr>
	                    <td>Fernandez, Rudy</td>
	                    <td>10/29/18</td>
	                    <td>J45.51, R06.02, M54.5, R42, R60.1, M79.1, R26.81</td>
	                    <td>11/06/18</td>
	                    <td>
							<a href="details-patient.php"><span class="label label-primary">View Details</span></a>
							<a href="add-transaction.php" title=""><span class="label label-primary">Add Transaction</span></a>
						</td>
	                  </tr>
	                  <tr>
	                    <td>Quizon, Dolphy</td>
	                    <td>10/29/18</td>
	                    <td>J45.51, R06.02, M54.5, R42, R60.1, M79.1, R26.81</td>
	                    <td>11/06/18</td>
	                    <td>
							<a href="details-patient.php"><span class="label label-primary">View Details</span></a>
							<a href="add-transaction.php" title=""><span class="label label-primary">Add Transaction</span></a>
						</td>
	                  </tr>
	                  	                  <tr>
	                    <td>Tolentino, Lorna</td>
	                    <td>10/29/18</td>
	                    <td>J45.51, R06.02, M54.5, R42, R60.1, M79.1, R26.81</td>
	                    <td>11/06/18</td>
	                    <td>
							<a href="details-patient.php"><span class="label label-primary">View Details</span></a>
							<a href="add-transaction.php" title=""><span class="label label-primary">Add Transaction</span></a>
						</td>
	                  </tr>
	                  <tr>
	                    <td>Concepcion, Gabby</td>
	                    <td>10/29/18</td>
	                    <td>J45.51, R06.02, M54.5, R42, R60.1, M79.1, R26.81</td>
	                    <td>11/06/18</td>
	                    <td>
							<a href="details-patient.php"><span class="label label-primary">View Details</span></a>
							<a href="add-transaction.php" title=""><span class="label label-primary">Add Transaction</span></a>
						</td>
	                  </tr>
	                  <tr>
	                    <td>Soriano, Maricel</td>
	                    <td>10/29/18</td>
	                    <td>J45.51, R06.02, M54.5, R42, R60.1, M79.1, R26.81</td>
	                    <td>11/06/18</td>
	                    <td>
							<a href="details-patient.php"><span class="label label-primary">View Details</span></a>
							<a href="add-transaction.php" title=""><span class="label label-primary">Add Transaction</span></a>
						</td>
	                  </tr>
	                  <tr>
	                    <td>Bautista, Herbert</td>
	                    <td>10/29/18</td>
	                    <td>J45.51, R06.02, M54.5, R42, R60.1, M79.1, R26.81</td>
	                    <td>11/06/18</td>
	                    <td>
							<a href="details-patient.php"><span class="label label-primary">View Details</span></a>
							<a href="add-transaction.php" title=""><span class="label label-primary">Add Transaction</span></a>
						</td>
	                  </tr>
	                  <tr>
	                    <td>Cuneta, Sharon</td>
	                    <td>10/29/18</td>
	                    <td>J45.51, R06.02, M54.5, R42, R60.1, M79.1, R26.81</td>
	                    <td>11/06/18</td>
	                    <td>
							<a href="details-patient.php"><span class="label label-primary">View Details</span></a>
							<a href="add-transaction.php" title=""><span class="label label-primary">Add Transaction</span></a>
						</td>
	                  </tr>
	                  <tr>
	                    <td>Bonnevie, Dina</td>
	                    <td>10/29/18</td>
	                    <td>J45.51, R06.02, M54.5, R42, R60.1, M79.1, R26.81</td>
	                    <td>11/06/18</td>
	                    <td>
							<a href="details-patient.php"><span class="label label-primary">View Details</span></a>
							<a href="add-transaction.php" title=""><span class="label label-primary">Add Transaction</span></a>
						</td>
	                  </tr>
	                  <tr>
	                    <td>Muhlach, Aga</td>
	                    <td>10/29/18</td>
	                    <td>J45.51, R06.02, M54.5, R42, R60.1, M79.1, R26.81</td>
	                    <td>11/06/18</td>
	                    <td>
							<a href="details-patient.php"><span class="label label-primary">View Details</span></a>
							<a href="add-transaction.php" title=""><span class="label label-primary">Add Transaction</span></a>
						</td>
	                  </tr>
	                  <tr>
	                    <td>Salonga, Lea</td>
	                    <td>10/29/18</td>
	                    <td>J45.51, R06.02, M54.5, R42, R60.1, M79.1, R26.81</td>
	                    <td>11/06/18</td>
	                    <td>
							<a href="details-patient.php"><span class="label label-primary">View Details</span></a>
							<a href="add-transaction.php" title=""><span class="label label-primary">Add Transaction</span></a>
						</td>
	                  </tr>
	                  
					  </tbody>
					  <tfoot>
		                <tr>
		                  	<th>Patient Name</th>
		                    <th>Referral Date</th>
		                    <th>ICD10 - Code Diagnoses</th>
		                    <th>Date of Service</th>
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
