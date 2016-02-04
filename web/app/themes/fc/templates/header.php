<header>
  <div class="top">
        <ul class="menuin">
           <li><a href="/it/">Ita</a></li>
           <li><a href="/en/">Eng</a></li>
         </ul>
        <div id="trigger-overlay" type="button" class="mobile-toggle">
              <span></span>
              <span></span>
              <span></span>
        </div>
    </div>
    <div class="overlay overlay-slidedown">
          <button class="overlay-close"></button> 
          <nav class="nav-primary">
            <?php
            if (has_nav_menu('primary_navigation')) :
              wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
            endif;
            ?>
          </nav>
    </div>
  </header>