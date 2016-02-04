<!--<div class="half rel">
    <div class="abs"></div>
</div>
<div class="half"></div>-->
<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header_front'); ?>
  		
        <?php $currentlang = get_bloginfo('language');
            if($currentlang=="it-IT"){ ?>
                <div class="half rel">
                  <ul class="oggetti abs cf">
                    <li class="pos1">
                        <a title="Raccolta dei testi" href="/it/parole">
                            <span>Parole</span>
                            <div class="penna"></div>
                        </a>
                    </li>
                    <li class="pos2">
                        <a title="Raccolta dei lavori" href="/it/lavori">
                            <span>Lavori</span>
                            <div class="lima"></div>
                        </a>
                    </li>
                    <li class="pos3">
                        <a title="Contatti" href="/it/contatti">
                            <span class="cont">Contatti</span>
                            <div class="contatti"></div>
                        </a>
                    </li>
                    
                  </ul>
                </div> 
           <?php }else { ?>
            <div class="half rel">
                  <ul class="oggetti abs cf">
                    <li class="pos1">
                        <a title="Raccolta dei testi" href="/en/words">
                            <span>Words</span>
                            <div class="penna"></div>
                        </a>
                    </li>
                    <li class="pos2">
                        <a title="Raccolta dei lavori" href="/en/works">
                            <span>Works</span>
                            <div class="lima"></div>
                        </a>
                    </li>
                    <li class="pos3">
                        <a title="Contatti" href="/en/contacts">
                            <span class="cont">Contacts</span>
                            <div class="contatti"></div>
                        </a>
                    </li>
                    
                  </ul>
            </div> 
           <?php } ?>
        
<?php endwhile; ?>