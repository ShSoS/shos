<?php
	$options = array();
	$options[0] = "New Item . . ."; 
	foreach ($result as $row) {
		
	$options[$row->id] = $row->language;
		}	
	echo form_dropdown("language", $options, "", "class=\"dropdowns\"");
	echo "<div class='ajax_output'><table><tr><td>";
	echo form_open("profil_insert_c/language");

	$speaking = array('a1' => 'A1', 'a2' => 'A2', 'b1' => 'B1', 'b2' => 'B2', 'c1' => 'C1', 'c2' => 'C2');
	$listening = array('a1' => 'A1', 'a2' => 'A2', 'b1' => 'B1', 'b2' => 'B2', 'c1' => 'C1', 'c2' => 'C2');
	$reading = array('a1' => 'A1', 'a2' => 'A2', 'b1' => 'B1', 'b2' => 'B2', 'c1' => 'C1', 'c2' => 'C2');
	$writing = array('a1' => 'A1', 'a2' => 'A2', 'b1' => 'B1', 'b2' => 'B2', 'c1' => 'C1', 'c2' => 'C2');

	echo form_label("Language: ", "language");
	echo "</td><td>";
	echo form_input('language');
	echo "</td></tr><tr><td>";
	echo form_label("Speaking: ", "speaking");
	echo "</td><td>";
	echo form_dropdown('speaking', $speaking, 'a1');
	echo "</td></tr><tr><td>";
	echo form_label("Listening: ", "listening");
	echo "</td><td>";
	echo form_dropdown('listening', $listening, 'a1');
	echo "</td></tr><tr><td>";
	echo form_label("Reading: ", "reading");
	echo "</td><td>";
	echo form_dropdown('reading', $reading, 'a1');
	echo "</td></tr><tr><td>";
	echo form_label("Writing: ", "writing");
	echo "</td><td>";
	echo form_dropdown('writing', $writing, 'a1');
	echo "</td></tr><tr><td>";
	$data = array (
			"type"  => "submit",
			"name"  => "language_submit",
			"value" => "Save",
			"id"    => "button_submit"
		);
	echo form_submit($data);
	echo "</td></tr>";
	echo form_close();
	echo "</table></div>";
?>