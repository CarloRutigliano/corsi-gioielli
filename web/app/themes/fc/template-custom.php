<?php
/**
 * Template Name: Lavori Template
 */
?>
<article class="section">
	<?php while (have_posts()) : the_post(); ?>
	  <?php get_template_part('templates/page', 'header_works'); ?>
	  <?php get_template_part('templates/content', 'works'); ?>
	<?php endwhile; ?>
</article>

