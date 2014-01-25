<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Okej je</title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="<?php echo base_url(); ?>style/style.css" type="text/css"/>
		<meta name="viewsettings" content="width= device-width, initial-scale=1.0">
	</head>
	<body>
		
		<article class="main_content">
			<div class="change_profile_pictures">
				<h3>Change your profil pictures</h3>
				<?php 
					if( sizeof($img) == 0 ) { ?>
						<table>
							<tr>
								<td>
									<img src="">
								</td>
								<td>
									<div id="upload">
										<?php
											echo form_open_multipart('upload/upload_user_pic');
											echo form_upload('userfile', 'userfile', 'class=userfile');
											$data = array(
													'type' => 'submit',
													'name' => 'insert_submit',
													'value' => 'Upload',
													'id' => 'insert_submit'
												);
											echo form_submit($data);
											echo form_close();
										?>
									</div>
								</td>
							</tr>
						</table>
				<?php 
					} else {
				?>
				<?php foreach ($img as $row): ?>
				<table>
					<tr>
						<td>
							<img src="<?php echo $row->img_path;?>">
							<?php endforeach ?>
						</td>
						<td>
							<div id="upload">
								<?php
									echo form_open_multipart('upload/upload_user_pic');
									echo form_upload('userfile', 'userfile', 'class=userfile');
									$data = array(
											'type' => 'submit',
											'name' => 'update_submit',
											'value' => 'Upload',
											'id' => 'update_submit'
										);
									echo form_submit($data);
									echo form_close();
								?>
							</div>
						</td>
					</tr>
				</table>
				<?php } ?>
			</div>
			<div class="recovery_pass">
				<h3>Change your password</h3>
					<?php
						echo form_open("consilium/user_settings");
						echo "<table><tr><td>";
						echo form_label("Old password: ", "old_pass");
						echo "</td><td>";
						echo form_input("old_pass");
						echo "</td></tr><tr><td>";
						echo form_label("New password: ", "new_pass");
						echo "</td><td>";
						echo form_input("new_pass");
						echo "</td></tr><tr><td>";
						echo form_label("Retype password: ", "re_pass");
						echo "</td><td>";
						echo form_input("re_pass");
						echo "</td></tr><tr><td>";
						echo form_submit("recovery_pass_submit", "Save", "id=submit");
						echo "</td></tr></table>";

						echo form_close();
					?>
			</div>
			<div class="social_network">
				<h3>Social network</h3>
				<?php if(sizeof($result) != 0) {?>
				<p>Please type a home page link to your social network: </p></br>
					<?php
					foreach ($result as $row) {
						
						echo form_open("consilium/user_settings");
						echo "<table><tr><td>";
						echo form_label("Facebook: ", "facebook");
						echo "</td><td>";
						echo form_input("facebook", $row->facebook);
						echo "</td></tr><tr><td>";
						echo form_label("Twitter: ", "twitter");
						echo "</td><td>";
						echo form_input("twitter", $row->twitter);
						echo "</td></tr><tr><td>";
						echo form_label("Google+: ", "google_plus");
						echo "</td><td>";
						echo form_input("google_plus", $row->google_plus);
						echo "</td></tr><tr><td>";
						echo form_submit("social_network_submit", "Save", "id=submit");
						echo "</td></tr></table>";
						echo form_close();
					}
				} else {
					echo form_open("consilium/user_settings");
						echo "<table><tr><td>";
						echo form_label("Facebook: ", "facebook");
						echo "</td><td>";
						echo form_input("facebook");
						echo "</td></tr><tr><td>";
						echo form_label("Twitter: ", "twitter");
						echo "</td><td>";
						echo form_input("twitter");
						echo "</td></tr><tr><td>";
						echo form_label("Google+: ", "google_plus");
						echo "</td><td>";
						echo form_input("google_plus");
						echo "</td></tr><tr><td>";
						echo form_submit("social_network_insert", "Save", "id=submit");
						echo "</td></tr></table>";
						echo form_close();
				}
					?>
			</div>
		</article>
	</body>
</html>