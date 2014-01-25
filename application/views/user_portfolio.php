<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Okej je</title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="<?php echo base_url(); ?>style/port.css" type="text/css"/>
		
		<meta name="viewport" content="width= device-width, initial-scale=1.0">
	</head>
	<body>
		<div class = "main_content">
			<article class = "content_left">
				<header class="navigation_header">
					<a href="<?php echo base_url(); ?>consilium/index"><img src = "<?php echo base_url(); ?>/style/img/profil_links/home_link.jpg" alt="Home" class="navigation_img"></a>
					<a href="<?php echo base_url(); ?>consilium/user_profil"><img src = "<?php echo base_url(); ?>/style/img/profil_links/profil_link.png" alt="Profile" class="navigation_img"></a>
					<a href="<?php echo base_url(); ?>consilium/user_settings"><img src = "<?php echo base_url(); ?>/style/img/profil_links/user_settings_link.png" alt="Settings" class="navigation_img"></a>
					<a href="<?php echo base_url(); ?>consilium/logout"><img src = "<?php echo base_url(); ?>/style/img/profil_links/logout_link.png" alt="Logout" class="navigation_img"></a>
				</header>
				<div class="user_info">
					<div class = "profil_img">
						<img src="<?php echo base_url(); ?>/style/img/lh.jpg">
					</div>
					<div class = "profil_info">	
					<?php foreach ($general_info as $row):?>
						<p class="profil_name"><?php echo $row->first_name . ' ' .$row->last_name;?></p>
						<p><?php echo $row->bio;?></p>
					<?php endforeach ?>	
					<?php foreach ($hobbies as $row):?>
						<p><?php echo $row->hobbies;?></p>
					<?php endforeach ?>
						<div class="pdf_button">
						<a href="<?php echo base_url(); ?>consilium/pdf" class="pdf_button"><img src="<?php echo base_url(); ?>style/img/download-button.png"/></a>
						</div>
					</div>

				</div>
			</article>
			<article class = "content_middle">	
			<?php foreach ($project as $row): ?> 
				<div class="project">
					<div class="project_pic">
						<img src="<?php echo base_url(); ?>/style/img/project_img.jpg">
					</div>
					<div class="project_info">			
						<h4><?php echo $row->project_name." ( ".$row->project_month_start."/".$row->project_year_start." - ".$row->project_month_finish."/".$row->project_year_finish." ) ";?></h4>
						<p><?php echo $row->project_position;?></p>
						<p><?php echo $row->description;?></p>
						<p><?php echo $row->website;?></p>					
					</div>
				</div>
			<?php endforeach ?>
			</article>
			<article class = "content_right">
				<header class="social_header">
					<a href="#"><img src = "<?php echo base_url(); ?>/style/img/social/facebook.png" class="social_img"></a>
					<a href="#"><img src = "<?php echo base_url(); ?>/style/img/social/g.png" class="social_img"></a>
					<a href="#"><img src = "<?php echo base_url(); ?>/style/img/social/twitter.png" class="social_img"></a>
				</header>
				<div class="more_info">
					<div id="education" class = "tab tabNoSelected">
						<h3 id="education_show">Education<img src="<?php echo base_url(); ?>style/img/+list.png"/></h3>
					</div> 
					<div id="educationBody" class="tabBody">
						<?php foreach ($education as $row):?>
							<ul class="tabBodyOptions">
								<li><p><?php echo $row->department; ?></p></li>
								<li><h4><?php echo $row->institution." ( ".$row->education_year_start." - ".$row->education_year_finish." ) ";?></h4></li>
								<li><p><?php echo $row->education_location; ?></p></li>
								<li><p><?php echo $row->qualification; ?></p></li>
							</ul>
						<?php endforeach ?>
					</div>
					<div id="achivement" class = "tab tabNoSelected">
						<h3 id="achivement_show">Achivement<img src="<?php echo base_url(); ?>style/img/+list.png"/></h3>
					</div>
					<div id="achivementBody" class="tabBody">
						<?php foreach($achivement as $row): ?>
							<ul class="tabBodyOptions">
								<li><p><?php echo $row->achivement; ?> </p></li>
								<li><p><?php echo $row->ach_location." - ".$row->ach_year; ?></p></li>
							</ul>
						<?php endforeach ?>
					</div>
					<div id="courses" class = "tab tabNoSelected">
						<h3 id="courses_show">Courses<img src="<?php echo base_url(); ?>style/img/+list.png"/></h3>	
					</div>
					<div id="coursesBody" class="tabBody">
						<?php foreach($courses as $row): ?>
							<ul class="tabBodyOptions">
								<li><h4><?php echo $row->courses_name; ?></h4></li>
								<li><p><?php echo $row->institution." ( ".$row->courses_location." )"; ?></p></li>
								<li><p><?php echo "( ".$row->courses_month_start."/".$row->courses_year_start." - ".$row->courses_month_finish."/".$row->courses_year_finish." ) ";?></p></li>
								<li><p><?php echo $row->courses_additional;?></p></li>
							</ul>
						<?php endforeach ?>
					</div>
					<div id="work_experience" class = "tab tabNoSelected">
						<h3 id="work_experience_show">Work Experience<img src="<?php echo base_url(); ?>style/img/+list.png"/></h3>
					</div>
					<div id="work_experienceBody" class="tabBody">
							<ul class="tabBodyOptions">
								<li>bice bice</li>
							</ul>
					</div>
					<div id="language" class = "tab tabNoSelected">
						<h3 id="language_show">Language<img src="<?php echo base_url(); ?>style/img/+list.png"/></h3>
					</div>
					<div id="languageBody" class="tabBody">
							<ul class="tabBodyOptions">
								<li>kita</li>
							</ul>	
					</div>
				</div>
			</article>
		</div>

		<script type="text/javascript" src="<?php echo base_url(); ?>script/jquery-1.10.2.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>script/show.js"></script>
	</body>
</html>