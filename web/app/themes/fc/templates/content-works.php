<div class="col span_2_of_9">
	<div id="fix" class="fixed">
		<nav id="pagenav" class="text-nav">
			<ul>
			<?php wp_list_categories( array('title_li' => '') ); ?>
			</ul> 
		</nav>
	</div>
</div>
<div class="col span_4_of_9">
	<div class="text-column">
		<?php the_content(); ?>
	</div>
</div>