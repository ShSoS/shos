<?php
	
	$options = array();
	$options[0] = "New Item . . ."; 
	foreach ($result as $row) {
		
	$options[$row->id] = $row->project_name;
		}	
	echo form_dropdown("project", $options, "", "class=\"dropdowns\"");

	echo "<div class='ajax_output'><table><tr><td>";
	echo "<img border='1' src='' width='200' height='250'></td><td>";
	echo form_open_multipart("profil_insert_c/project");
	$data = array (
			'type' => 'file',
			'name' =>'userfile',
			'id'   => 'userfile'
		);
	echo form_upload($data);
	echo "</td></tr><tr><td>";
	echo form_label("Project Name: ", "project_name");
	echo "</td><td>";
	echo form_input("project_name");
	echo "</td></tr><tr><td>";
	echo form_label("Description: ", "descrition");
	echo "</td><td>";
	echo form_textarea("descrition");
	echo "</td></tr><tr><td>";
	echo form_label("Position: ", "position");
	echo "</td><td>";
	echo form_input("position");
	echo "</td></tr><tr><td>";
	echo form_label("Responsibilities: ", "responsibilities");
	echo "</td><td>";
	echo form_input("responsibilities");
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
	echo form_label("Website: ", "website");
	echo "</td><td>";
	echo form_input("website");
	echo "</td></tr><tr><td>";
	echo form_label("Additionnal Info: ", "additionnal_info");
	echo "</td><td>";
	echo form_textarea("additionnal_info");
	echo "</td></tr><tr><td>";
	$data = array (
			"type"  => "submit",
			"name"  => "project_submit",
			"value" => "Save",
			"id"    => "button_submit"
		);
	echo form_submit($data);
	echo "</td></tr>";
	echo form_close();
	echo "</table></div>";
?>