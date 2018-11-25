{% extends "main.html" %}

{% 
  set scripts = [
    'dist/js/home'
  ]
%}

{% block content %}
  <div class="row">   
    <div class="col-xs-12">
      <div class="box">
      
        <div class="box-header with-border">
          <h3 class="box-title">Recently Added Patients</h3>
          <?php include("inc/box-tools.php");?>
        </div>
        <!-- /.box-header -->
        
        <div class="box-body">
          <table id="" class="table no-margin table-hover">
            <thead>
              <tr>
                <th>Patient Name</th>
                <th>Referral Date</th>
                <th>ICD10 - Code Diagnoses</th>
                <th>Date of Service</th>
                <th width="200px">Actions</th>
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
              </tbody>
            </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer text-center">
          <a href="patients.php">View All Patients</a>
        </div>
      </div>
      <!-- /.box -->
      
    <div class="row">
    <!-- Left col -->
    <div class="col-md-6">
      <!-- TABLE: PATIENT LIST -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">List of Providers</h3>
    <?php include("inc/box-tools.php");?>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table class="table no-margin table-hover">
              <thead>
              <tr>
                <th>Provider Name</th>
                <th>Phone</th>
                <th width="150px">Actions</th>
              </tr>
              </thead>
              
              <tbody>
              <tr>
                <td>Alexandra Kirtchik</td>
                <td>818.909.2599</td>
                <td>
                  <a href="details-provider.php"><span class="label label-primary">View Details</span></a>
        <a href="update-provider.php" title=""><span class="label label-primary">Update</span></a>
      </td>
              </tr>
              <tr>
                <td>Henry Barraza</td>
                <td>818.909.2599</td>
                <td>
                  <a href="details-provider.php"><span class="label label-primary">View Details</span></a>
        <a href="update-provider.php" title=""><span class="label label-primary">Update</span></a>
      </td>
              </tr>
              <tr>
                <td>Shohreh Nourollah</td>
                <td>818.909.2599</td>
                <td>
                  <a href="details-provider.php"><span class="label label-primary">View Details</span></a>
        <a href="update-provider.php" title=""><span class="label label-primary">Update</span></a>
      </td>
              </tr>
              <tr>
                <td>Lilibeth Ramirez</td>
                <td>818.909.2599</td>
                <td>
                  <a href="details-provider.php"><span class="label label-primary">View Details</span></a>
        <a href="update-provider.php" title=""><span class="label label-primary">Update</span></a>
      </td>
              </tr>
              <tr>
                <td>Fidelia NNchetam</td>
                <td>818.909.2599</td>
                <td>
                  <a href="details-provider.php"><span class="label label-primary">View Details</span></a>
        <a href="update-provider.php" title=""><span class="label label-primary">Update</span></a>
      </td>
              </tr>
              <tr>
                <td>Grace Adeagbo</td>
                <td>818.909.2599</td>
                <td>
                  <a href="details-provider.php"><span class="label label-primary">View Details</span></a>
        <a href="update-provider.php" title=""><span class="label label-primary">Update</span></a>
      </td>
              </tr>
              <tr>
                <td>Kaixuan Luo</td>
                <td>818.909.2599</td>
                <td>
                  <a href="details-provider.php"><span class="label label-primary">View Details</span></a>
        <a href="update-provider.php" title=""><span class="label label-primary">Update</span></a>
      </td>
              </tr>
              <tr>
                <td>Reynaldo Salcedo</td>
                <td>818.909.2599</td>
                <td>
                  <a href="details-provider.php"><span class="label label-primary">View Details</span></a>
        <a href="update-provider.php" title=""><span class="label label-primary">Update</span></a>
      </td>
              </tr>
              <tr>
                <td>Zaydee Mercado</td>
                <td>818.909.2599</td>
                <td>
                  <a href="details-provider.php"><span class="label label-primary">View Details</span></a>
        <a href="update-provider.php" title=""><span class="label label-primary">Update</span></a>
      </td>
              </tr>
              <tr>
                <td>Katherine Chin</td>
                <td>818.909.2599</td>
                <td>
                  <a href="details-provider.php"><span class="label label-primary">View Details</span></a>
        <a href="update-provider.php" title=""><span class="label label-primary">Update</span></a>
      </td>
              </tr>
              </tbody>
            </table>
          </div>
          <!-- /.table-responsive -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer text-center">
          <a href="providers.php" class="uppercase">View All Providers</a>
        </div>
        <!-- /.box-footer -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->

     <div class="col-md-6">
      

      <!-- HOME HEALTH CARE -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">List of Home Health Care</h3>
    <?php include("inc/box-tools.php");?>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          
          <div class="table-responsive">
            <table class="table no-margin table-hover">
              <thead>
              <tr>
                <th>Home Health Care</th>
                <th>Phone</th>
                <th width="150">Actions</th>
              </tr>
              </thead>
              
              <tbody>
              <tr>
                <td>GMO Home Health</td>
                <td>+1 22313198786</td>
                <td>
                  <a href="details-home-health.php"><span class="label label-primary">View Details</span></a>
        <a href="update-home-health.php" title=""><span class="label label-primary">Update</span></a>
      </td>
              </tr>
              
              <tr>
                <td>Faith and Hope</td>
                <td>+1 22313198786</td>
                <td>
                  <a href="details-home-health.php"><span class="label label-primary">View Details</span></a>
        <a href="update-home-health.php" title=""><span class="label label-primary">Update</span></a>
      </td>
              </tr>
              
              <tr>
                <td>Divine Care Home Health</td>
                <td>+1 22313198786</td>
                <td>
                  <a href="details-home-health.php"><span class="label label-primary">View Details</span></a>
        <a href="update-home-health.php" title=""><span class="label label-primary">Update</span></a>
      </td>
              </tr>
              
              <tr>
                <td>White Shield Home Health</td>
                <td>+1 22313198786</td>
                <td>
                  <a href="details-home-health.php"><span class="label label-primary">View Details</span></a>
        <a href="update-home-health.php" title=""><span class="label label-primary">Update</span></a>
      </td>
              </tr>
              
              <tr>
                <td>Millenium Home Health</td>
                <td>+1 22313198786</td>
                <td>
                  <a href="details-home-health.php"><span class="label label-primary">View Details</span></a>
        <a href="update-home-health.php" title=""><span class="label label-primary">Update</span></a>
      </td>
              </tr>
              
              <tr>
                <td>Nightingle Home Health</td>
                <td>+1 22313198786</td>
                <td>
                  <a href="details-home-health.php"><span class="label label-primary">View Details</span></a>
        <a href="update-home-health.php" title=""><span class="label label-primary">Update</span></a>
      </td>
              </tr>
              
              <tr>
                <td>Prestige Home Health</td>
                <td>+1 22313198786</td>
                <td>
                  <a href="details-home-health.php"><span class="label label-primary">View Details</span></a>
        <a href="update-home-health.php" title=""><span class="label label-primary">Update</span></a>
      </td>
              </tr>
              
              <tr>
                <td>Advance Home Care</td>
                <td>+1 22313198786</td>
                <td>
                  <a href="details-home-health.php"><span class="label label-primary">View Details</span></a>
        <a href="update-home-health.php" title=""><span class="label label-primary">Update</span></a>
      </td>
              </tr>
              
              <tr>
                <td>Healthy Choice Home Care</td>
                <td>+1 22313198786</td>
                <td>
                  <a href="details-home-health.php"><span class="label label-primary">View Details</span></a>
        <a href="update-home-health.php" title=""><span class="label label-primary">Update</span></a>
      </td>
              </tr>
              
              <tr>
                <td>R &amp; G Home Health Care</td>
                <td>+1 22313198786</td>
                <td>
                  <a href="details-home-health.php"><span class="label label-primary">View Details</span></a>
        <a href="update-home-health.php" title=""><span class="label label-primary">Update</span></a>
      </td>
              </tr>
              
              </tbody>
            </table>
          </div>
          <!-- /.table-responsive -->
          
        </div>
        <!-- /.box-body -->
        <div class="box-footer text-center">
          <a href="home-health.php">View All Home Health Care</a>
        </div>
        <!-- /.box-footer -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
{% endblock %}