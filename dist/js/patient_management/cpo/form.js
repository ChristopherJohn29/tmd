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
		   	var month = date.getMonth() + 1;
		   	var monthDay = date.getDate();
		   	var year = date.getFullYear();
		   	var weekDay = date.getDay();
	    	
	    	var formattedMonth = month.toString().length === 1 ? '0'+month : month;
	    	var formattedMonthDay = monthDay.toString().length === 1 ? '0'+monthDay : monthDay;
		   	var dateFormat = year+'-'+formattedMonth+'-'+formattedMonthDay;
		   	
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