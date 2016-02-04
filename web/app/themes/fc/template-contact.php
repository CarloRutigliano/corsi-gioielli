<?php
/**
 * Template Name: Contatti
 */
?>
<article class="section contact">
	<?php while (have_posts()) : the_post(); ?>  
	  <?php get_template_part('templates/content', 'contact'); ?>
	  <?php get_template_part('templates/page', 'header'); ?>
	<?php endwhile; ?>
</article>
