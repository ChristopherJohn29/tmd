{% extends "basic.php" %}

{% set page_title = 'Print Provider Route sheet' %}
{% set body_class = 'print' %}

{% block content %}
 
 <script type="text/javascript">
 	window.print();
 </script>

<div class="row">
    <div class="col-md-12">
      <div class="box">

        <!-- /.box-header -->
        <div class="box-body">

            <section class="xrx-info">

                <div class="row">
                    <div class="col-md-12">
                        <h3 class="name rs">{{ record.get_provider_fullname() }}</h3>
                    </div>
                </div>

                <div class="row spacer-bottom">
                    <div class="col-md-12">
                        <h4>Date of Service: {{ record.get_date_format(record.prs_dateOfService) }}</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">

                        <p class="lead">Route Sheet</p>

                        <div class="table-responsive">
                           <table id="" class="table no-margin table-striped route-sheet">
                            <thead>
                                <tr>
                                    <th>Time</th>
                                    <th>Patient's Info</th>
                                    <th>Home Health Info</th>
                                    <th>Notes</th>
                                </tr>
                            </thead>

                            <tbody>

                                {% for list in lists %}

                                    <tr>
                                        <td>{{ list.get_combined_time() }}</td>
                                        <td>
                                            <p>{{ list.patient_name }}
                                                <span>
                                                    {{ list.patient_address }}<br>
                                                    {{ list.patient_phoneNum }}<br><br>
                                                    <strong>Supervising MD:</strong> {{ list.supervisingMD_firstname ~ ' ' ~ list.supervisingMD_lastname }}
                                                </span>
                                            </p>
                                        </td>
                                        <td><p>{{ list.hhc_name }}<span>{{ list.hhc_contact_name }}<br>{{ list.hhc_phoneNumber }}</span></p></td>
                                        <td><p>Type of Visit : {{ list.tov_name }}<span>Other Notes: {{ list.prsl_notes }}</span></p></td>
                                    </tr>

                                {% endfor %}

                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            
            </section>

        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
      </div>

</div>

{% endblock %}