{% extends "main.php" %}
{% 
set scripts = [
'plugins/input-mask/jquery.inputmask',
'plugins/input-mask/jquery.inputmask.date.extensions',
'plugins/input-mask/jquery.inputmask.extensions',
'dist/js/patient_management/transaction/form',
'dist/js/patient_management/transaction/files'
]
%}
{% set page_title = 'Update Visit' %}
{% block content %}
<div class="row">
   <div class="col-lg-8">
      <div class="box">
         <div class="box-header with-border">
            <h3 class="box-title">Update Lab Order</h3>
         </div>
         <!-- /.box-header -->
         <!-- form start -->
         <div class="row">
            <div class="col-lg-12">
               <div class="box-body">
                  {{ form_open_multipart("patient_management/lab_order/save/edit/#{ record.patient_id }/#{ lab_order.lab_order_id }", {"class": "xrx-form"}) }}
                  <div class="row">
                     <!-- This is the patient's information -->
                     <div class="xrx-info">
                        <input type="hidden" name="patient_id" value="{{ record.patient_id }}">
                        <input type="hidden" name="lab_order_id" value="{{ lab_order.lab_order_id }}">
                        <input type="hidden" class="{{ lab_order.lab_file|replace({'"': ''})|replace({'[': ''})|replace({']': ''})|replace({'.': ''})|replace({'(': ''})|replace({')': ''})|replace({',': ''}) }}" name="lab_file" value="{{ lab_order.lab_file }}">
                        <div class="col-lg-6">
                           <p class="lead"><span>Patient Name: </span> {{ record.patient_name }}</p>
                        </div>
                        <div class="col-lg-6">
                           <p class="lead"><span>Medicare: </span> {{ record.patient_medicareNum }}</p>
                        </div>
                     </div>
                     <div class="form-container">
                      
                           <div style="margin-bottom: 15px !important;" class="col-md-6 form-group {{ form_error('provider_id') ? 'has-error' : '' }}">
                              <label class="control-label">Provider <span>*</span></label>
                              <div class="dropdown mobiledrs-autosuggest-select">
                                 <input type="hidden" required="true" name="pt_providerID"  value="{{ lab_order.provider_id }}">
                                 <input {{ lab_order.from_visit ? 'readonly' : '' }} class="form-control" 
                                    type="text" 
                                    data-mobiledrs_autosuggest 
                                    data-mobiledrs_autosuggest_url="{{ site_url('ajax/provider_management/profile/search') }}"
                                    data-mobiledrs_autosuggest_dropdown_id="pt_providerID_dropdown"
                                    value="{{ lab_order.get_provider_fullname() }}">
                                 <div data-mobiledrs_autosuggest_dropdown id="pt_providerID_dropdown" style="width: 100%;">
                                 </div>
                              </div>
                           </div>

                           <div style="margin-bottom: 15px !important;" class="col-md-6 form-group {{ form_error('date_referral') ? 'has-error' : '' }}">
                              <label class="control-label">Date Referral was Emailed <span>*</span></label>
                              <input type="text" required="true" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask readonly name="pt_dateRefEmailed" {{ lab_order.from_visit ? 'readonly' : '' }} value="{{ set_value('pt_dateRefEmailed', lab_order.get_date_format(lab_order.date_referral)) }}">
                           </div>
                      

                          <div class="col-md-12 form-group">
                              <label class="control-label">Status <span>*</span></label>
                              <select class="form-control" style="width: 100%;" required="true" name="pt_status">
                                 <option value="" selected="true">Select</option>
                                 <option value="Complete" {{ lab_order.status == 'Complete' ? 'selected=true' : '' }}>Complete</option>
                                 <option value="Incomplete" {{ lab_order.status == 'Incomplete' ? 'selected=true' : '' }}>Incomplete</option>
                                 <option value="Partially Complete" {{ lab_order.status == 'Partially Complete' ? 'selected=true' : '' }}>Partially Complete</option>
                              </select>
                              <br>
                           </div>

                           <div class="col-md-12 form-check" style="margin-bottom: 10px;">
										<label class="control-label">Upload File</label>
									    <input type="file" class="form-check-input" id="userfile" name="userfile" accept=".pdf,.jpg,.jpeg,.png,.gif">
									    <!-- <label class="form-check-label" for="labOrdes">Files</label> -->
									  </div>

                             {% if lab_order.lab_file %}
									  <div class="col-md-12 form-check" style="margin-top: 5px;">
										<label class="form-check-label" > {{ lab_order.lab_file }}<i class="fa fa-fw fa-remove remove-file" id="{{ lab_order.lab_file|replace({'"': ''})|replace({'[': ''})|replace({']': ''})|replace({'.': ''})|replace({'(': ''})|replace({')': ''})|replace({',': ''}) }}" style="cursor: pointer;"></i></label>
										</div>

										{% endif %}

                        <div class="col-md-12 form-group">
                           <label class="control-label">Notes</label>
                           <textarea class="form-control" rows="5" name="pt_notes">{{ set_value('notes', lab_order.notes) }}</textarea>
                        </div>
                     </div>
                     <div class="col-md-12 form-group xrx-btn-handler">
                        <a href="{{ site_url("patient_management/profile/details/#{ record.patient_id }") }}" class="btn btn-default xrx-btn cancel">
                        Cancel
                        </a>
                        <button type="submit" class="btn btn-primary xrx-btn">
                        <i class="fa fa-check"></i> Update Lab Order
                        </button>
                     </div>
                  </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <!-- /.box -->
   </div>
</div>
{% endblock %}