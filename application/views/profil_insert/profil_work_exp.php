<?php
	$options = array();
	$options[0] = "New Item . . ."; 
	foreach ($result as $row) {
		
	$options[$row->id] = $row->company;
		}	
	echo form_dropdown("work_expience", $options, "", "class=\"dropdowns\"");
	echo "<div class='ajax_output'><table><tr><td>";
	echo form_open("profil_insert_c/work_exp");

	echo form_label("Company: ", "company");
	echo "</td><td>";
	echo form_input("company");
	echo "</td></tr><tr><td>";
	echo form_label("Position: ", "we_position");
	echo "</td><td>";
	echo form_input("we_position");
	echo "</td></tr><tr><td>";
	echo form_label("Responsibilities: ", "we_responsibilities");
	echo "</td><td>";
	echo form_textarea("we_responsibilities");
	echo "</td></tr><tr><td>";
	echo form_label("Location: ", "we_location");
	echo "</td><td>";
	echo form_input("we_location");
	echo "</td></tr><tr><td>";
	echo form_label("Year Start: ", "year_start");
	echo "</td><td>";
	echo form_input('year_start');
	echo "</td></tr><tr><td>";
	echo form_label("Month Start: ", "month_start");
	echo "</td><td>";
	echo form_input('month_start');
	echo "</td></tr><tr><td>";
	echo form_label("Year Finish: ", "year_finish");
	echo "</td><td>";
	echo form_input('year_finish');
	echo "</td></tr><tr><td>";
	echo form_label("Month Finish: ", "month_finish");
	echo "</td><td>";
	echo form_input('month_finish');
	echo "</td></tr><tr><td>";
	echo form_label("Company Contact: ", "company_contact");
	echo "</td><td>";
	echo form_input("company_contact");
	echo "</td></tr><tr><td>";$data = array (
			"type"  => "submit",
			"name"  => "work_exp_submit",
			"value" => "Save",
			"id"    => "button_submit"
		);
	echo form_submit($data);
	echo "</td></tr>";
	echo form_close();
	echo "</table></div>";
?>