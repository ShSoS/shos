<?php
	$options = array();
	$options[0] = "New Item . . ."; 
	foreach ($result as $row) {
		
	$options[$row->id] = $row->qualities;
		}	
	echo form_dropdown("qualities", $options, "", "class=\"dropdowns\"");
	echo "<div class='ajax_output'><table><tr><td>";
	echo form_open("profil_insert_c/qualities");

	echo form_label("Qualities: ", "qualities");
	echo "</td><td>";
	echo form_textarea("qualities");
	echo "</td></tr><tr><td>";
	$data = array (
			"type"  => "submit",
			"name"  => "qualities_submit",
			"value" => "Save",
			"id"    => "button_submit"
		);
	echo form_submit($data);
	echo "</td></tr>";
	echo form_close();
	echo "</table></div>";
?>
