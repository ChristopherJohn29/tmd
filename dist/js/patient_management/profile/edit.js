$(function () {
  jQuery('.patient_spouse_selector').change(function(){
    str = jQuery(this).val();
    if(str === null || str.match(/^ *$/) !== null){
      jQuery('.patient_spouse_input').attr('value', '');
    }
  })

});