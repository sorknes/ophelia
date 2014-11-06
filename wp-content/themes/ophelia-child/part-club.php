<div id="club" class="club wrapper">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				
			<?php 
			$page_id = 36;
			$page_data = get_page( $page_id );
			
			echo '<h2>'. $page_data->post_title .'</h2>';
			echo '<div class="row img-wrap"><div class="col-xs-12 col-sm-6 col-md-3" style="background: red;">bilde 1</div>';
			echo '<div class="col-xs-12 col-sm-6 col-md-3" style="background: green;">bilde 2</div>';
			echo '<div class="col-xs-12 col-sm-6 col-md-3" style="background: blue;">bilde 3</div>';
			echo '<div class="col-xs-12 col-sm-6 col-md-3" style="background: pink;">bilde 4</div></div>';
			echo '<div class="content">'.apply_filters('the_content', $page_data->post_content).'</div>';
			
			?>
				
			</div>
		</div>
	</div>
</div>