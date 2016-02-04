<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <div class="section">
      <nav class="col span_1_of_9">
        <?php the_category( ' ' ); ?>
      </nav>
      <div class="entry-content col span_6_of_9">
        <?php $featured_meta = get_post_meta( $post->ID );

              if(isset($featured_meta['cpi-type-intera'][0])){
              $featured_meta_image = wp_get_attachment_image_src( $featured_meta['cpi-type-intera'][0], 'full' ); ?>

              <div class="image" style="max-width:<?php echo $featured_meta_image[1] ?>px">
              <img id="singleimg" alt="<?php the_title(); ?>" width="<?php echo $featured_meta_image[1] ?>" height="<?php echo $featured_meta_image[2] ?>" src="<?php echo $featured_meta_image[0] ?>" />
              <?php the_category( ' ' ); ?>
              </div>
              
              <?php } else { 
                echo '<p>Immagine mancante</p>';
              } ?>
      </div>
      <div class="col span_2_of_9">
        <header>
          <h1 class="entry-title"><?php the_title(); ?></h1>
        </header>
        <div class="description">
          <?php the_content(); ?>
        </div>
      </div>
    </div>
  </article>
<?php endwhile; ?>
