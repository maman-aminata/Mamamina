<?php
$page_courante = basename($_SERVER['PHP_SELF']);
?>
<header>
   
  <div class="nav-search">
    <input type="text" class="search-bar" placeholder="Rechercher...">
  </div>
   <h1>Mon Portfolio</h1>
  <nav>
    <a href='index.php' <?php if ($page_courante === 'index.php') echo 'class="actif"'; ?>>Accueil</a>
    <a href='about.php' <?php if ($page_courante === 'about.php') echo 'class="actif"'; ?>>À propos</a>
    <a href='projets.php' <?php if ($page_courante === 'projets.php') echo 'class="actif"'; ?>>Projets</a>
    <a href='contact.php' <?php if ($page_courante === 'contact.php') echo 'class="actif"'; ?>>Contact</a>
  </nav>
</header>

