<?php

	$options = array();
	$options[0] = "New Item . . ."; 
	foreach ($result as $row) {
		
	$options[$row->id] = $row->achivement;
		}	
	echo form_dropdown("achivement", $options, "", "class=\"dropdowns\"");
	echo "<div class='ajax_output'><table><tr><td>";
	echo form_open("profil_insert_c/achivement");

	echo form_label("Achivement: ", "achivement");
	echo "</td><td>";
	echo form_textarea("achivement");
	echo "</td></tr><tr><td>";
	echo form_label("Location: ", "location");
	echo "</td><td>";
	echo form_input("location");
	echo "</td></tr><tr><td>";
	echo form_label("Year: ", "year");
	echo "</td><td>";
	echo form_input("year");
	echo "</td></tr><tr><td>";
	$data = array (
			"type"  => "submit",
			"name"  => "achivement_submit",
			"value" => "Save",
			"id"    => "button_submit"
		);
	echo form_submit($data);
	echo "</td></tr>";
	echo form_close();
	echo "</table></div>";
?>