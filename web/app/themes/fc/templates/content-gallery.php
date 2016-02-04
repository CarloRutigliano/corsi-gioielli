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
	<div class="grid">
		<ul>
			<?php while (have_posts()) : the_post(); ?>
				<li class="thumb"><a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
			<?php	  
			  
			  $featured_meta = get_post_meta( $post->ID );
          
	          if(isset($featured_meta['cpi-type-miniatura'][0])){
	          $featured_meta_image = wp_get_attachment_url( $featured_meta['cpi-type-miniatura'][0] );
	          echo '<img width="100" height="100" src="'.$featured_meta_image.'" />' ;
	          } else {
	            echo '<img width="100" height="100" src="http://placehold.it/100x100" />';
	          } ?>
				
				</li></a>
			<?php endwhile; ?>
		</ul>
		<div id="paging" class="paginate">
			<?php echo paginate_links( array('prev_text' => __('<'), 'next_text' => __('>')) ); ?>
		</div>
	</div>
</div>