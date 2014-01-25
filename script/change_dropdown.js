$(document).ready(function() {
	$('.dropdowns').change(function() {
		var id = $(this).val();
		var table = $(this).attr('name');
		var data = {id:id, table:table};
		$.post('http://localhost/Consilium/ajax_controller/on_change', data, function(output) {
			$('.ajax_output').html(output);
		})
	});
});