<?php
/*
 * Template Name: Startsiden
 * Description: Custom startpage
 */

get_header(); 

?>

			<?php // Start Query Intro
			$args_intro = "post_type=intro&posts_per_page=1&orderby=date&order=DESC";
				
			// The Query
			$query_intro = new WP_Query( $args_intro );
				
			// The Loop
			while ( $query_intro->have_posts() ) {
				$query_intro->the_post();				
				$intro_custom_link 		= get_post_custom_values('pt_link');
				$intro_custom_link 		= $intro_custom_link[0];
				$intro_custom_link_2	= get_post_custom_values('pt_link_2');
				$intro_custom_link_2 	= $intro_custom_link_2[0];
			} ?>

			<!-- start: intro -->
			<div class="intro-outer" style="background-image: url('<?php $thumb_id = get_post_thumbnail_id(); $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); echo $thumb_url[0]; ?>')">
				<div class="intro-inner">
					<!-- start: container-fluid -->
					<div class="container-fluid">
						<div class="row">
							<div class="col-xs-12">
								<h1 class="intro-title" itemprop="name">
									<?php echo get_the_title( $query_intro->post->ID ); ?>
									<span class="border-bottom"></span>
								</h1>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12" itemprop="description">
								<p><?php echo get_the_content( $query_intro->post->ID ); ?></p>
							</div>
						</div>
						<div class="row intro-btn">
							<div class="col-xs-12 col-sm-6 btn-right">
								<a class="btn large" href="<?php echo $intro_custom_link ?>" title="Bar">
									Bar
									<span class="border-bottom"></span>
								</a>
							</div>
							<div class="col-xs-12 col-sm-6 btn-left">
								<a class="btn large" href="<?php echo $intro_custom_link_2 ?>" title="Dinner">
									Diner
									<span class="border-bottom"></span>
								</a>
							</div>
						</div>
					</div>
					<!-- end: container-fluid -->
					<div class="arrow-down">
						<span class="glyphicon glyphicon-chevron-down"></span>
					</div>
				</div>				
			</div>
			<!-- end: intro -->
			
			<!-- start: about -->
			<?php get_template_part( 'part', 'about' ); ?>
			<!-- end: about -->
			
			<!-- start: news -->
			<?php get_template_part( 'part', 'news' ); ?>
			<!-- end: news -->
			
			<div id="dinner" class="container dinner">
				<div class="row">
					dinner
				</div>
			</div>

<?php get_footer(); ?>