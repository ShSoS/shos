<?php
//var_dump($sdf);
	echo form_open("consilium/validate_credentials");
	echo "<br>";
	echo form_input("email", "Email");
	echo "<br>";
	echo form_password("password", "Password");
	echo "<br>";
	echo form_submit("submit", "Login");
?>