<article class="content_right">
	<div class="portfolios">
		<?php foreach ($general_info as $row): ?>
			<div class="user_portfolio">
				<div class="user_info">
					<span id="profil_pic">
						<?php foreach ($user_img as $img) {
							if($img->user_id == $row->user_id){ ?>
							<img src="<?php echo $img->img_path; ?>">								
							<a href="">View my portfolio</a>
						<?php }} ?>
					</span>
					<p class="full_name"><?php echo $row->first_name . ' ' .$row->last_name. ' ( '. $row->birth_date.' )';?></p>
					<p class="live_place"><?php echo $row->city.", ".$row->country;?></p>
					<p class="email"><?php echo $row->email;?></p>
				</div>
				<div class="user_projects">		
					<div id="slider-nav">
						<button data-dir="prev" class="arrow_left arrow_sldier"></button>
						<div class="slider">
							<ul>
							<?php 					
								foreach ($projects as $project) {
									if($project->user_id === $row->user_id)
									echo '<li><img src="http://localhost/Consilium'. $project->project_pic.'"></li>';
								}
							?>
							</ul>
						</div>
						<button data-dir="next" class="arrow_right arrow_sldier"></button>
					</div>
				</div>
			</div>
		<?php endforeach ?>
		<div id="pages">
			<?=$pages?>
		</div>
	</div>
	<div class="clear_both"></div>