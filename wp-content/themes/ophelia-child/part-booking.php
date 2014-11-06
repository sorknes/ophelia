<div id="booking" class="booking wrapper">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				
			<?php 
			$page_id = 38;
			$page_data = get_page( $page_id );
			
			echo '<h2>'. $page_data->post_title .'</h2>';
			echo '<div class="content">'.apply_filters('the_content', $page_data->post_content).'</div>';
			
			?>
				
			</div>
		</div>
	</div>
</div>