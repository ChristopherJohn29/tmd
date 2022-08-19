var Mobiledrs = {} || Mobiledrs;

Mobiledrs.PT_trans_files = (function() {


	var init = function() {
		typeFiles();

	
	};

	var typeFiles = function() {

        jQuery('.remove-file').click(function(){
            id = jQuery(this).attr('id');
            jQuery('.'+id).remove();
            jQuery(this).parent().remove();
        });
	
	};

	return {
		init: init
	};
})();

Mobiledrs.PT_trans_files.init();