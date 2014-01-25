<div class="about_me"><!--START ABOUT ME-->
		<div class="slide" id="slide5" data-slide="5" data-stellar-background-ratio="0.5">
			<div class="container clearfix">
				<div class="content grid_2 contactype active" id="contact-mapClick">
					<div class="icon-contact"><img src="<?php echo base_url(); ?>/style/img/about_me/email.png"></div>
					<p>Contact me</p>
				</div>
				<div class="content grid_2 contactype" id="contact-carClick">
					<div class="icon-skills"><img src="<?php echo base_url(); ?>/style/img/about_me/aboutme.png"></div>
					<p>About me</p>
				</div>
				<div class="content grid_2 contactype" id="contact-busClick">
					<div class="icon-education"><img src="<?php echo base_url(); ?>/style/img/about_me/education.png"></div>
					<p>Education</p>
				</div>

				<div class="content grid_2 contactype" id="contact-bikeClick">
					<div class="icon-projects"><img src="<?php echo base_url(); ?>/style/img/about_me/email.png"></div>
					<p>Projects</p>
				</div>
				<div class="content grid_2 contactype" id="contact-phoneClick">
					<div class="icon-phone"><img src="<?php echo base_url(); ?>/style/img/about_me/email.png"></div>
					<p>Telephone</p>
				</div>
				<div class="content grid_2 contactype omega" id="contact-mailClick">
					<div class="icon-mail"><img src="<?php echo base_url(); ?>/style/img/about_me/email.png"></div>
					<p>Skills</p>
				</div>
				<div class="content grid_12 contactmap" id="contact-map">
					<div class="grid_4">
						<div class="contact">
							<?php
								//echo $message;
								//echo validation_errors();
								echo form_open("consilium/send_email");
								echo "<div id='envelope'>
								  <div id='back'></div>
								  <div class='letters centered untucked'>
								    <span class='question'>What's your name?</span>";
								    $data = array(
											'name' => 'full_name',
											'id'   => 'name'
										);
									echo form_input($data);
								echo "</div><!-- End .letter -->
								  <div class='letters centered'>
								    <span class='question'>What's your email?</span>";
								    $data = array(
											"name" => "email",
											"id"   => "name"
										);
									echo form_input($data);
								 echo "</div><!-- End .letter -->
								  <div class='letters centered'>";
								    $data = array(
											"name" => "message",
											"id"   => "message",
											"rows" => "3",
											"cols" => "20"
										);
									echo form_textarea($data);
								  echo "</div><!-- End .letter -->
								  
								  <div id='letter_cover' class='centered'>
								    <span id='prev_question'></span>
								    <span id='question_tracker'></span>
								    <span id='next_question'></span>
								    
								    <div id='question_counter' class='centered'>
								      <span id='cur_count'>1</span> of
								      <span id='total_count'>1</span>
								    </div><!-- End #question_counter -->
								  </div><!-- End #letter_cover -->
								  
								  <div id='front'>";	
								  	 $data = array(
											"name"  => "contact_submit",
											"id"    => "contact_submit",
											"value" => "Send"
										); 	
									echo form_submit($data);

									echo form_close();
								  echo"</div>
								</div><!-- End #envelope -->";

								?>
							</div>
					</div>
					<div class="grid_8 omega">
						<div id="map_canvas" class="bilokoja"style="height: 92%; width: 96%; float:left; margin: 2%;"></div>
					</div>
				</div>

				<div class="content grid_12 contactmap dn" id="contact-car">
					<div class="grid_4">
						<div class="contenitore">
							<div class="poster ora">
							    <div class="left"></div>
							    <div class="right"></div>
							    <div class="info_about_me">
							    	<ul>
							    		<li>Name: Bojan Antonijevic</li>
							    		<li>Age: 22 years old</li>
							    		<li></li>
							    		<li></li>
							    		<li></li>
							    	</ul>
							    
				<!-- <tr><td><h2>Name: </h2></td><td><p>Bojan Antonijevic</p></td></tr>
				<tr><td><h2>Age: </h2></td><td><p>22 years old</p></td></tr>
				<tr><td><h2>Address: </h2></td><td><p>Beograd, Srbija</p></td></tr>
				<tr><td><h2>Phone: </h2></td><td><p>+381 658 516 781</p></td></tr>
				<tr><td><h2>Email: </h2></td><td><p>bojan91ue@gmail.com</p></td></tr> -->
							  </div>
							</div>
						</div>
					</div>
					<div class="grid_8 omega">
						<div class="grid_6 omega">
							about me
						</div>
					</div>
				</div>

				<div class="content grid_12 contactmap dn" id="contact-bus">
					
					<div class="grid_8 omega">
						<div class="grid_6 omega">
							education
						</div>
					</div>
				</div>

				<div class="content grid_12 contactmap dn" id="contact-bike">
					
					<div class="grid_8 omega">
						<div class="grid_6 omega">projects
						</div>
					</div>
				</div>


				<div class="content grid_12 contactmap dn" id="contact-phone">
					
					<div class="grid_8 omega">
						<div class="grid_6 omega">0 (123) 456 789</div>
					</div>
				</div>


				<div class="content grid_12 contactmap dn" id="contact-mail">
					
					<div class="grid_8 omega">
						<div class="grid_6 omega"><a href="mailto:mail@loremipsum.com?Subject=Hello" class="btn">mail@loremipsum.com</a></div>
					</div>
				</div>

				<div class="clear"></div>

			</div>
		</div>
		      
	</div><!--END ABOUT ME-->
	
</article>
</article>