<div id="diner" class="diner wrapper">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
		
			<?php query_posts(array('posts_per_page' => 1, 'page_id' => 33, 'post_type' => 'page')); while (have_posts()) {  the_post(); ?>
				
				<h2><?php the_title(); ?></h2>
				<div class="row img-wrap">
					<div class="col-xs-12 col-sm-6 col-md-3">
						<?php the_post_thumbnail( 'medium' ); ?>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3">
						<?php if (class_exists('MultiPostThumbnails')):
							MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'second-image', NULL,  'medium');
						endif; ?>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3">
						<?php if (class_exists('MultiPostThumbnails')):
							MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'third-image', NULL,  'medium');
						endif; ?>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3">
						<?php if (class_exists('MultiPostThumbnails')):
							MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'fourth-image', NULL,  'medium');
						endif; ?>
					</div>
				</div>
				<div class="content">
					<?php the_content(); ?>
				</div>
    
			<?php }; wp_reset_query();?>
				
			</div>
		</div>
	</div>
</div>