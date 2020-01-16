$(function () {	
	var holidayDates = [];
	var holidayNotes = {};
	var sunday = 0;

	$.ajax({
		method: 'GET',
		url: window.location.origin + $('#scheduledHolidayList').attr('value'),
		dataType: 'json',
		success: function(data) {
			$.each(data.data, function(index, value) {
				holidayDates.push(value.date);
				holidayNotes[value.date] = value.description;
			});
		}
	});

	$('.holiday-date').datepicker({
	  	dateFormat: 'mm/dd',
	  	changeYear:false,
	  	beforeShowDay: function(date) {
		   	var month = date.getMonth();
		   	var monthDay = date.getDate();
		   	var year = date.getFullYear();
		   	var weekDay = date.getDay();
		    
		   	var dateFormat = year+'-'+(parseInt(month) + 1)+'-'+monthDay;
		   	
		   	var dateExists = null;
		   	if (weekDay == sunday) {
	     		dateExists = false;
		   	} else {
		    	dateExists = holidayDates.indexOf(dateFormat) === -1;  
		   	}
		   
		    var highlightClass = '';
		    if (dateExists === false || weekDay == sunday) {
	    		highlightClass = 'holiday-date-color';
		    }
		    
		    return [
	     		dateExists,
		     	highlightClass,
		     	dateExists ? '' : holidayNotes[dateFormat]
		    ];
	  	}
	});
});