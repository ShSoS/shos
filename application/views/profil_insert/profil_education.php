<?php
	$options = array();
	$options[0] = "New Item . . ."; 
	foreach ($result as $row) {
		
	$options[$row->id] = $row->institution;
		}	
	echo form_dropdown("education", $options, "", "class=\"dropdowns\"");
	echo "<div class='ajax_output'><table><tr><td>";
	echo form_open("profil_insert_c/education");

	echo form_label("Institution: ", "institution");
	echo "</td><td>";
	echo form_input("institution");
	echo "</td></tr><tr><td>";
	echo form_label("Qualification: ", "qualification");
	echo "</td><td>";
	echo form_input("qualification");
	echo "</td></tr><tr><td>";
	echo form_label("Department: ", "department");
	echo "</td><td>";
	echo form_input("department");
	echo "</td></tr><tr><td>";
	echo form_label("Location: ", "location");
	echo "</td><td>";
	echo form_input("location");
	echo "</td></tr><tr><td>";
	echo form_label("Year Start: ", "year_start");
	echo "</td><td>";
	echo form_input('year_start');
	echo "</td></tr><tr><td>";
	echo form_label("Year Finish:", "year_finish");
	echo "</td><td>";
	echo form_input('year_finish');
	echo "</td></tr><tr><td>";
	$data = array (
			"type"  => "submit",
			"name"  => "education_submit",
			"value" => "Save",
			"id"    => "button_submit"
		);
	echo form_submit($data);
	echo "</td></tr>";
	echo form_close();
	echo "</table></div>";
?>