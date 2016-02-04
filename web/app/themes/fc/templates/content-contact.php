<div class="col span_2_of_9">
	<div id="fix" class="fixed">
		<nav id="pagenav" class="text-nav">
			<?php wp_nav_menu( array( 'theme_location' => 'secondary_navigation', 'before' => '<h3>', 'after' => '</h3>' ) ); ?> 
		</nav>
	</div>
</div>
<div class="col span_4_of_9">
	<div class="text-column">
		<?php the_content(); ?>
	</div>
</div>
