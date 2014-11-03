<div id="about" class="container-fluid about">
	<div class="row">
		<div class="container">
			<?php 
			$page_id = 16;
			$page_data = get_page( $page_id );
			
			echo '<div class="content"><h2>'. $page_data->post_title .'</h2>';
			echo ''.apply_filters('the_content', $page_data->post_content).'</div>';
			
			?>
			
			<div class="social clearfix">
				<ul>
					<li>Sjekk oss på sosiale medier:</li>
					<li><a href="">Facebook</a></li>
					<li><a href="">Instagram</a></li>
					<li><a href="">Vimeo</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>