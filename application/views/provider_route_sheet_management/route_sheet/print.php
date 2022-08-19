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
                                                    <strong>DOB:</strong> {{ list.get_date_format(list.patient_dateOfBirth) }}<br>
                                                    <strong>Medicare:</strong> {{ list.patient_medicareNum }}<br>
                                                    <strong>Address:</strong> {{ list.patient_address }}<br>
                                                    <strong>Phone:</strong> {{ list.patient_phoneNum }}<br><br>
                                                    <strong>Caregiver/Family:</strong> {{ list.patient_caregiver_family }}<br>
                                                    <strong>Spouse:</strong> {{ spouse[list.patient_spouse][0].patient_name }}<br>
                                                    <strong>Supervising MD:</strong> {{ list.supervisingMD_firstname ~ ' ' ~ list.supervisingMD_lastname }}
                                                </span>
                                            </p>
                                        </td>
                                        <td><p>{{ list.hhc_name }}<span>{{ list.hhc_contact_name }}<br>{{ list.hhc_phoneNumber }}</span></p></td>
                                        <td><p>Reason for Visit : {{ list.pt_reasonForVisit }}</p><p>Type of Visit : {{ list.tov_name }}
                                        {{ list.pt_aw_ippe_code == 'G0402' ? '<br>With IPPE <br>' : ''}}
                            {{ list.pt_aw_ippe_code == 'G0438' ? '<br>With AW <br>' : ''}}
                            {{ list.pt_aw_ippe_code == 'G0439' ? '<br>With AW <br>' : ''}}
                            {{ list.pt_aw_ippe_code ? '' : '<br>No AW / IPPE <br>'}}    
                                        <span>Other Notes: <br>{{ list.prsl_notes|nl2br }}</span></p></td>
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