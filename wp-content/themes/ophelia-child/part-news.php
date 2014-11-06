<div id="news" class="news wrapper">
	<div class="container-fluid">
		<div class="row">
			
			<!-- start, new loop -->
			<?php
				$args = array( 'posts_per_page' => 4 );
				$lastposts = get_posts( $args );
				foreach ( $lastposts as $post ) :
			setup_postdata( $post ); ?>
			
			<div class="col-xs-12 col-md-6 col-lg-3" style="background: #fff;">
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<?php the_content(); ?>
			</div>
	
			<?php endforeach; 
			wp_reset_postdata(); ?>
			<!-- end, news loop -->
			
		</div>
	</div>
</div>