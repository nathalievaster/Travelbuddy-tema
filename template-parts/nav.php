<nav class="nav">

  <button class="nav-toggle" aria-label="Öppna meny" aria-expanded="false">
    <span></span>
    <span></span>
    <span></span>
  </button>

  <?php
    wp_nav_menu([
      'theme_location' => 'primary',
      'container'      => false,
    ]);
  ?>

</nav>
