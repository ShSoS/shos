<article class="content_left">
	<div id="login">
		  <div class="flip">
		    <div class="form-signup">
		      <h1>Consilium</h1>
		      <fieldset>
		      <?php
					echo form_open('consilium/create_member');

					
					$data = array(
							'type'        => 'email',
							'placeholder' => 'Enter your email address',
							'name'        => 'email'
						);
					echo form_input($data, $this->input->post('email'), 'required');
					$data = array(
							'type'        => 'text',
							'placeholder' => 'Create a display name',
							'name'        => 'username'
						);
					echo form_input($data, $this->input->post('username'), 'required');								
					$data = array(
							'type'        => 'password',
							'placeholder' => 'Create a password',
							'name'        => 'password'
						);
					echo form_input($data, $this->input->post('password'), 'required');								
					$data = array(
							'type'        => 'password',
							'placeholder' => 'Confirm password',
							'name'        => 'password2'
						);
					echo form_input($data, $this->input->post('password2'), 'required');

					echo form_submit('submit', 'Sign Up');

					echo form_close();
				?>
				
		        
		        <a href="#" class="flipper">Already signed up? Log in.</a>
		      </fieldset>
		    </div>
		    <div class="form-login">
		      <h1>Consilium</h1>
		      <fieldset>
			      <?php
				     	echo form_open("consilium/validate_credentials");
			      		$data = array(
				      			'type' => 'email',
				      			'name' => 'email',
				      			'placeholder' => 'Enter your emal address',
				      			'required' => 'required'
				      		);
				      	echo form_input($data);
				      	echo form_open("consilium/validate_credentials");
				      	$data = array(
				      			'type' => 'password',
				      			'name' => 'password',
				      			'placeholder' => 'Create a password',
				      			'required' => 'required'
				      		);
				      	echo form_input($data);
				      	echo form_submit("submit", "Login");
				      	echo form_close();
			       ?>
		        <a href="#" class="flipper">Not signed up? Create an account.</a><br>
		        <a href="#">Forgot Password?</a>
		      </fieldset>
		    </div>
		  </div>
		</div>
</article>