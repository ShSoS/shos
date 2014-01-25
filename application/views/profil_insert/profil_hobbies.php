<?php
	$options = array();
	$options[0] = "New Item . . ."; 
	foreach ($result as $row) {
		
	$options[$row->id] = $row->hobbies;
		}	
	echo form_dropdown("hobbies", $options, "", "class=\"dropdowns\"");
	echo "<div class='ajax_output'><table><tr><td>";
	echo form_open("profil_insert_c/hobbies");

	echo form_label("Hobbies: ", "hobbies");
	echo "</td><td>";
	echo form_textarea("hobbies");
	echo "</td></tr><tr><td>";
	$data = array (
			"type"  => "submit",
			"name"  => "hobbies_submit",
			"value" => "Save",
			"id"    => "button_submit"
		);
	echo form_submit($data);
	echo "</td></tr>";
	echo form_close();
	echo "</table></div>";
?>