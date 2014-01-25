<?php
	foreach ($result as $row) {
		echo "<table><tr><td>";
		echo form_open("profil_insert_c/general_info_save");

		echo form_hidden("id", $row->id);
		echo form_label("First Name: ", "first_name");
		echo "</td><td>";
		echo form_input("first_name", $row ->first_name);
		echo "</td></tr><tr><td>";
		echo form_label("Last Name: ", "last_name");
		echo "</td><td>";
		echo form_input("last_name", $row ->last_name);
		echo "</td></tr><tr><td>";
		echo form_label("Short Biography: ", "biography");
		echo "</td><td>";
		echo form_input("bio", $row ->bio);
		echo "</td></tr><tr><td>";
		echo form_label("Gender: ", "gender");
		echo "</td><td>";		
		$gender = array (
				'male'   => 'MALE',
				'female' => 'FEMALE'
			);
		echo form_dropdown('gender', $gender, $row->gender, 'id=gender');
		echo "</td></tr><tr><td>";
		echo form_label("Birth Date: ", "birth_date");
		echo "</td><td>";
		echo form_input("birth_date", $row ->birth_date);
		echo "</td></tr><tr><td>";
		echo form_label("Country: ", "country");
		echo "</td><td>";
		echo form_input("country", $row ->country);
		echo "</td></tr><tr><td>";
		echo form_label("City: ", "city");
		echo "</td><td>";
		echo form_input("city", $row ->city);
		echo "</td></tr><tr><td>";
		echo form_label("Address: ", "address");
		echo "</td><td>";
		echo form_input("address", $row ->address);
		echo "</td></tr><tr><td>";
		echo form_label("Citizenship: ", "citizenship");
		echo "</td><td>";
		echo form_input("citizenship", $row ->citizenship);
		echo "</td></tr><tr><td>";
		echo form_label("Martial Status: ", "martial_status");
		echo "</td><td>";
		echo form_input("marital_status", $row ->marital_status);
		echo "</td></tr><tr><td>";
		echo form_label("Phone Number: ", "phone");
		echo "</td><td>";
		echo form_input("phone", $row ->phone);
		echo "</td></tr><tr><td>";
		echo form_label("E-mail: ", "email");
		echo "</td><td>";
		echo form_input("email", $row ->email);
		echo "</td></tr><tr><td>";

		$data = array (
				"type"  => "submit",
				"name"  => "general_submit",
				"value" => "Save",
				"id"    => "button_submit"
			);
		echo form_submit($data);
		echo "</td></tr>";
		echo form_close();
		echo "</table>";
	}
?>