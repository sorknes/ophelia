<?php
/*
 * Template Name: Startsiden
 * Description: Custom startpage
 */

get_header(); 

?>

			<!-- start: intro -->
			<div class="intro-outer">
				<div class="intro-inner">
					<div class="container-fluid">
						<div class="row">
							<div class="col-xs-12">
								<h1 class="intro-title"><?php bloginfo('name'); ?></h1>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<div class="title">
									<h2><?php echo get_bloginfo('description'); ?></h2>
								</div>
							</div>
						</div>
						<div class="row intro-btn">
							<div class="col-xs-12 col-sm-6 btn-right">
								<a class="btn large" href="" title="Bar">
									Bar
									<span></span>
								</a>
							</div>
							<div class="col-xs-12 col-sm-6 btn-left">
								<a class="btn large" href="" title="Dinner">
									Dinner
									<span></span>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end: intro -->
			
			<div class="container news">
				<div class="row">
					news
				</div>
			</div>

<?php get_footer(); ?>