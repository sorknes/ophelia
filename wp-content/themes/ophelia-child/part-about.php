<div id="about" class="about wrapper">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
			<?php 
			$page_id = 16;
			$page_data = get_page( $page_id );
			
			echo '<h2>'. $page_data->post_title .'</h2>';
			echo '<div class="content">'.apply_filters('the_content', $page_data->post_content).'</div>';
			
			?>
			
			<div class="social clearfix">
				<ul>
					<li>Sjekk oss på sosiale medier:</li>
					<li><a class="facebook" href="" title="Besøk vår Facebook side">Facebook</a></li>
					<li><a class="instagram" href="" title="Besøk vår Instagram side">Instagram</a></li>
					<li><a class="vimeo" href="" title="Besøk vår Viemo side">Vimeo</a></li>
				</ul>
			</div>
			
			</div>
		</div>
	</div>
</div>