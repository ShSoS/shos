<?php
	$options = array();
	$options[0] = "New Item . . ."; 
	foreach ($result as $row) {
		
	$options[$row->id] = $row->courses_name;
		}	
	echo form_dropdown("courses", $options, "", "class=\"dropdowns\"");
	echo "<div class='ajax_output'><table><tr><td>";
	echo form_open("profil_insert_c/courses");

	echo form_label("Cours Name: ", "cours_name");
	echo "</td><td>";
	echo form_input("name");
	echo "</td></tr><tr><td>";
	echo form_label("Institution: ", "institution");
	echo "</td><td>";
	echo form_input("institution");
	echo "</td></tr><tr><td>";
	echo form_label("Location: ", "location");
	echo "</td><td>";
	echo form_input("location");
	echo "</td></tr><tr><td>";
	echo form_label("Year Start", "year_start");
	echo "</td><td>";
	echo form_input('year_start');
	echo "</td></tr><tr><td>";
	echo form_label("Month Start", "month_start");
	echo "</td><td>";
	echo form_input('month_start');
	echo "</td></tr><tr><td>";
	echo form_label("Year Finish:", "year_finish");
	echo "</td><td>";
	echo form_input('year_finish');
	echo "</td></tr><tr><td>";
	echo form_label("Month Finish: ", "month_finish");
	echo "</td><td>";
	echo form_input('month_finish');
	echo "</td></tr><tr><td>";
	echo form_label("Additionnal Info: ", "add_info");
	echo "</td><td>";
	echo form_textarea("additional");
	echo "</td></tr><tr><td>";
	$data = array (
			"type"  => "submit",
			"name"  => "courses_submit",
			"value" => "Save",
			"id"    => "button_submit"
		);
	echo form_submit($data);
	echo "</td></tr>";
	echo form_close();
	echo "</table></div>";
?>