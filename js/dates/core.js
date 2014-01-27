var menuObject = { 
	getDayMenu : function() {
	
		var year = $('#year').val();
		var month = $('#month').val();
		var date= $("#DOBdate").val();
		if(date!=''){
		  var date=date;
		}
		if (year !== '' && month !== '') {
			$.getJSON(baseUrl+'js/dates/mod/day.php', { year : year, month : month,date: date }, function(data) {
				if (!data.error) {
					$('#day').replaceWith(data.menu);
				}
			});
		} else {
			$('#day').attr('disabled', true);
		}
	}
}
$(function() {

	menuObject.getDayMenu();
	
	$('#year').bind('change', menuObject.getDayMenu);
	$('#month').bind('change', menuObject.getDayMenu);
	
});