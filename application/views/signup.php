<?php
	echo form_open('consilium/create_member');

	echo validation_errors();

	echo "<p>Username: ";
	echo form_input('username', $this->input->post('username'));
	echo "</p>";
	echo "<p>Email: ";
	echo form_input('email', $this->input->post('email'));
	echo "</p>";
	echo "<p>Password: ";
	echo form_input('password', $this->input->post('password'));
	echo "</p>";
	echo "<p>Retype password: ";
	echo form_input('password2', $this->input->post('password2'));
	echo "</p>";

	echo form_submit('submit', 'Sign Up');

	echo form_close();
?>