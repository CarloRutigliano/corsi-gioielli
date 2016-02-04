<?php use Roots\Sage\Titles; ?>

<div class="half rel">
	<header class="front-page-header abs">
	  <h1><?= Titles\title(); ?></h1>
		<div class="logo" itemscope itemtype="http://schema.org/Organization">            
	            <a itemprop="url" href="<?php echo esc_url( home_url( '/' ) ); ?>">
	              <img title="Francesco Corsi Gioielli" alt="Francesco Corsi Gioielli" itemprop="logo" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/logohome.png" />
	            </a>
	           
	    </div>
    </header>  
</div>