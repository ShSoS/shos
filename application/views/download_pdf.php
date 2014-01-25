<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/style/pdf.css"/>
		<style>
			.main_pdf {
				width: 100%;
				height: 100%;
				float: left;
			}

			.general_info {
				float: left;
				width: 100%;
				height: 200px;
				border-bottom: 1px solid #918e8e;
				padding: 30px;
			}

			#general_info_left {
				float: left;
				margin-top: 30px;
				line-height: 15px;
			}

			#general_info_left p {
				color: #918e8e;
				font-style: italic;
			}

			#general_info_right {
				float: left;
				margin-top: 100px;
				color: #918e8e;
			}

			.profil_pic {
				float: right;
				width: 170px;
				height: 200px;
				border: 1px solid #8caecb;
				margin-top: 0px;
				padding: 5px;
			}

			.profil_pic img {
				width: 170px;
				height: 200px;
			}

			#education,
			#language,
			#achivement,
			#courses,
			#hobbies,
			#qualities,
			#project,
			#work_experience {
				float: left;
				padding-left: 30px;
				width: 100%;
			}

			.education_info,
			.language_info,
			.achivement_info,
			.courses_info,
			.hobbies_info,
			.qualities_info,
			.project_info,
			.work_experience_info {
				padding-left: 30px;
				line-height: 10px;
			}

			h2{
				background-color: #8caecb;
				padding-left: 15px;
				font-style: italic;
				color: #5b5858;
			}
		</style>
	</head>

	<body>
		<div class="main_pdf">
			<div class="general_info">

				<?php foreach ($general_info as $row): ?>
				<div id="general_info_left">
					<h1><?php echo $row->first_name . " " . $row->last_name;?></h1>
					<p><?php echo $row->email;?></p>
				</div>
				<i><table id="general_info_right">
					<tr>
						<td>Gender: </td>
						<td><?php echo $row->gender;?></td>
					</tr>
					<tr>
						<td>Birth date:</td>
						<td><?php echo $row->birth_date;?></td>
					</tr>
					<tr>
						<td>Address: </td>
						<td><?php echo $row->city.", ".$row->country.", ".$row->address;?></td>
					</tr>
					<tr>
						<td>Phone: </td>
						<td><?php echo $row->phone;?></td>
					</tr>
				<?php endforeach ?>
					<div class="profil_pic">
						<?php foreach ($user_img as $row): ?>
							<img src="<?php echo $row->img_path; ?>" />
							
						<?php endforeach ?>
					</div>
				</table></i>
			</div>
			<?php if(sizeof($education) != 0) {?>
			<div id="education">			
				<h2>Education</h2>
				<div class="education_info">
					<?php foreach ($education as $row):?>
						<h3><?php echo $row->institution ." ( ". $row->education_year_start ." - ".$row->education_year_finish." )";?></h3>
						<p><?php echo $row->education_location;?></p>
						<p><?php echo $row->department .", ".$row->qualification;?></p>
						
					<?php endforeach ?>
				</div>
			</div>
			<?php } ?>
			<?php if(sizeof($language) != 0) {?>
			<div id="language">
			<h2>Language</h2>
				<div class="language_info">
					<table id="">
					<?php foreach ($language as $row): ?>
						<tr><th><?php echo $row->language;?></th></tr>
						<tr>
							<td>Speaking: </td>
							<td><?php echo $row->speaking;?></td>
						</tr>
						<tr>
							<td>Listening: </td>
							<td><?php echo $row->listening;?></td>
						</tr>
						<tr>
							<td>Reading: </td>
							<td><?php echo $row->reading;?></td>
						</tr>
						<tr>
							<td>Writing: </td>
							<td><?php echo $row->writing;?></td>
						</tr>
					<?php endforeach ?>
					</table>
				</div>
			</div>
			<?php } ?>
			<?php if(sizeof($achivement) != 0) {?>
			<div id="achivement">
			<h2>Achivement</h2>
				<div class="achivement_info">
					<?php foreach ($achivement as $row): ?>
						<h3><?php echo $row->achivement ." ( ". $row->ach_year." )";?></h3>
						<p><?php echo $row->ach_year;?></p>
					<?php endforeach ?>
				</div>
			</div>
			<?php } ?>
			<?php if(sizeof($courses) != 0) {?>
			<div id="courses">
			<h2>Courses</h2>
				<div class="courses_info">
					<?php foreach ($courses as $row): ?>
						<h3><?php echo $row->courses_name ." ( ".$row->courses_month_start."/".$row->courses_year_start."-".$row->courses_month_finish."/".$row->courses_year_finish ." )";?></h3>
						<p><?php echo $row->institution.", ".$row->courses_location;?></p>
						<p><?php echo $row->courses_additional;?></p>
					<?php endforeach ?>
				</div>
			</div>
			<?php } ?>
			<?php if(sizeof($hobbies) > 0) { ?>
			<div id="hobbies">
			<h2>Hobbies</h2>
				<div class="hobbies_info">
					<?php foreach ($hobbies as $row): ?>
						<?php echo $row->hobbies;?>
					<?php endforeach ?>
				</div>
			</div>
			<?php } ?>
			<?php if(sizeof($qualities) != 0) {?>
			<div id="qualities">
			<h2>Qualities</h2>
				<div class="qualities_info">
					<?php foreach ($qualities as $row): ?>
						<?php echo $row->qualities;?>
					<?php endforeach ?>
				</div>
			</div>
			<?php } ?>
			<?php if(sizeof($project) != 0) {?>
			<div id="project">
			<h2>Projects</h2>
				<div class="project_info">
					<?php foreach ($project as $row): ?>
						<h3><?php echo $row->project_name ." ( ".$row->project_month_start."/".$row->project_year_start."-".$row->project_month_finish."/".$row->project_year_finish.")";?></h3>
						<p><?php echo $row->website;?></p>
						<p><?php echo $row->project_position;?></p>
						<p><?php echo $row->project_responsibilities;?></p>
						<p><?php echo $row->description;?></p>
						<p><?php echo $row->project_additional_info;?></p>
					<?php endforeach ?>
				</div>
			</div>
			<?php } ?>
			<?php if(sizeof($work_expience) != 0) {?>
			<div id="work_experience">
			<h2>Work Expirience</h2>
				<div class="work_experience_info">
					<?php foreach ($work_expience as $row): ?>
						<h3><?php echo $row->company." ( ". $row->we_month_start."/".$row->we_year_start ." - ".$row->we_month_finish."/".$row->we_year_finish." )";?></h3>
						<p><?php echo $row->we_location .", ". $row->company_contact?></p>
						<p><?php echo $row->we_position; ?></p>
						<p><?php echo $row->we_responsibilities; ?></p>
					<?php endforeach ?>
				</div>
			</div>
			<?php } ?>
		</div>
	</body>
</html>