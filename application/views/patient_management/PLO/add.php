{% extends "main.php" %}
{% 
set scripts = [
'plugins/input-mask/jquery.inputmask',
'plugins/input-mask/jquery.inputmask.date.extensions',
'plugins/input-mask/jquery.inputmask.extensions',
'dist/js/patient_management/transaction/form'
]
%}
{% set page_title = 'Add Visit' %}
{% block content %}
<div class="row">
   <div class="col-lg-8">
      <div class="box">
         <div class="box-header with-border">
            <h3 class="box-title">Add Lab Orders and Results</h3>
         </div>
         <!-- /.box-header -->
         <!-- form start -->
         <div class="row">
            <div class="col-lg-12">
               <div class="box-body">
                  {{ form_open_multipart("patient_management/lab_order/save/add/#{ record.patient_id }", {"class": "xrx-form"}) }}
                  <div class="row">
                     <!-- This is the patient's information -->
                     <div class="xrx-info">
                        <input type="hidden" name="pt_patientID" value="{{ record.patient_id }}">
                        <div class="col-lg-6">
                           <p class="lead"><span>Patient Name: </span> {{ record.patient_name }}</p>
                        </div>
                        <div class="col-lg-6">
                           <p class="lead"><span>Medicare: </span> {{ record.patient_medicareNum }}</p>
                        </div>
                     </div>
                     <div class="form-container">
                        <div style="margin-bottom: 15px !important;" class="col-md-6 form-group {{ form_error('pt_providerID') ? 'has-error' : '' }}">
                           <label class="control-label">Provider <span>*</span></label>
                           <div class="dropdown mobiledrs-autosuggest-select">
                              <input type="hidden" name="pt_providerID" required="true">
                              <input class="form-control" 
                                 type="text" 
                                 data-mobiledrs_autosuggest 
                                 data-mobiledrs_autosuggest_url="{{ site_url('ajax/provider_management/profile/search') }}"
                                 data-mobiledrs_autosuggest_dropdown_id="pt_providerID_dropdown">
                              <div data-mobiledrs_autosuggest_dropdown id="pt_providerID_dropdown" style="width: 100%;">
                              </div>
                           </div>
                        </div>
                        
                        <div style="margin-bottom: 15px !important;" class="col-md-6 form-group {{ form_error('pt_dateRefEmailed') ? 'has-error' : '' }}">
                           <label class="control-label">Date Referral was Emailed <span>*</span></label>
                           <input type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask name="pt_dateRefEmailed" value="" required="true">
                        </div>

                        <div style="margin-bottom: 0px;" class="col-md-12 form-group">
                           <label class="control-label">Status <span>*</span></label>
                           <select class="form-control" style="width: 100%;" required="true" name="pt_status">
                              <option value="" selected="true">Select</option>
                              <option value="Complete">Complete</option>
                              <option value="Incomplete">Incomplete</option>
                              <option value="Partially Complete">Partially Complete</option>
                           </select>
                           <br>
                        </div>

                        <div class="col-md-6 form-check" style="margin-bottom: 10px;">
                           <label class="control-label">Upload File</label>
                           <input type="file" class="form-check-input" id="userfile" name="userfile" accept=".pdf,.jpg,.jpeg,.png,.gif">
                        </div>

                        
                        <div class="col-md-12 form-group">
                           <label class="control-label">Notes</label>
                           <textarea class="form-control" rows="5" name="pt_notes">{{ set_value('pt_notes') }}</textarea>
                        </div>
                     </div>
                     <div class="col-md-12 form-group xrx-btn-handler">
                        <a href="{{ site_url("patient_management/profile/details/#{ record.patient_id }") }}" class="btn btn-default xrx-btn cancel">
                        Cancel
                        </a>
                        <button type="submit" class="btn btn-primary xrx-btn">
                        <i class="fa fa-check"></i> Add Lab Orders
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