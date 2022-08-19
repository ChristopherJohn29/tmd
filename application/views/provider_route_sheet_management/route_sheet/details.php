{% extends "main.php" %}

{% set page_title = 'Route Details' %}

{% block content %}
	 <div class="row">
        <div class="col-md-12">
          <div class="box">

            <!-- /.box-header -->
            <div class="box-body">

                {{ form_open("provider_route_sheet_management/route_sheet/form/#{ record.prs_id }") }}

                 	<section class="xrx-info">

                 		<div class="row">
                            <div class="col-xs-12">
                              {% if states %}
                                {{ include('commons/alerts.php') }}
                              {% endif %}
                            </div>

                 			<div class="col-md-12">
                 				<h1 class="name rs">{{ record.get_provider_fullname() }}<small>Provider Name</small></h1>
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
    										<th width="12%">Time</th>
    										<th width="22%">Patient's Info</th>
    										<th width="22%">Home Health Info</th>
    										<th>Notes</th>
    									</tr>
    								</thead>

    								<tbody>

    									{% for list in lists %}

    										<tr>
    											<td>{{ list.get_combined_time() }}</td>
    											<td>
                              <p>
                                  {{ list.patient_name }}
                                  <span>
                                      <strong>DOB:</strong> {{ list.get_date_format(list.patient_dateOfBirth) }}<br>
                                      <strong>Medicare:</strong> {{ list.patient_medicareNum }}<br>
                                      <strong>Address:</strong> {{ list.patient_address }}<br>
                                      <strong>Phone:</strong> {{ list.patient_phoneNum }}<br><br>
                                      <strong>Caregiver/Family:</strong> {{ list.patient_caregiver_family }}<br>
                                      <strong>Spouse:</strong> <a target="_blank" href="{{ site_url("patient_management/profile/details/") }}{{ list.patient_spouse }}">{{ spouse[list.patient_spouse][0].patient_name }}</a><br>
                                      <strong>Supervising MD:</strong> {{ list.supervisingMD_firstname ~ ' ' ~ list.supervisingMD_lastname }}
                                  </span>
                              </p>
                            </td>
                          <td><p>{{ list.hhc_name }}<span>{{ list.hhc_contact_name }}<br>{{ list.hhc_phoneNumber }}</span></p></td>
    											<td>
                            <p>Reason for Visit : {{ list.pt_reasonForVisit }}</p>
                            <p>Type of Visit : {{ list.tov_name }}
                            
                            
                            {{ list.pt_aw_ippe_code == 'G0402' ? '<br>With IPPE <br>' : ''}}
                            {{ list.pt_aw_ippe_code == 'G0438' ? '<br>With AW <br>' : ''}}
                            {{ list.pt_aw_ippe_code == 'G0439' ? '<br>With AW <br>' : ''}}
                            {{ list.pt_aw_ippe_code ? '' : '<br>No AW / IPPE <br>'}}
                            
                          

                              <span> Other Notes: <br>{{ list.prsl_notes|nl2br }}</span>
                          </p></td>
    										</tr>

    									{% endfor %}

    								</tbody>
    							</table>
                                </div>
                 			</div>
                 		</div>


    					<div class="row no-print">

        					<div class="col-xs-12 xrx-btn-handler">

                                {% if roles_permission_entity.has_permission_name(['print_prs']) %}

                                  <a href="{{ site_url("provider_route_sheet_management/route_sheet/print/#{ record.prs_id }") }}" target="_blank" class="btn btn-primary xrx-btn"><i class="fa fa-print"></i> Print</a>

                                {% endif %}

                                {% if roles_permission_entity.has_permission_name(['download_prs']) %}

                                    <button type="submit" name="submit_type" value="pdf" class="btn btn-primary xrx-btn" style="margin-right: 5px;">
        				                <i class="fa fa-download"></i> Generate PDF
        				            </button>

                                {% endif %}

                                {% if roles_permission_entity.has_permission_name(['email_prs']) %}

                                    <button type="submit" name="submit_type" value="email" class="btn btn-primary xrx-btn" style="margin-right: 5px;">
                                    	<i class="fa fa-envelope-o"></i> Email to Provider
                                    </button>

                                {% endif %}

        					</div>

        		        </div>

                 	</section>

                </form>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          </div>

      </div>
{% endblock %}