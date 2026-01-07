<header class="site-header">
  <div class="container navbar">
    <div class="logo">
      <a href="index.php">Hôtel Sables d'Or</a>
    </div>
    <nav class="nav-links">
      <a href="index.php">Accueil</a>
      <a href="chambre.php">Chambres</a>
      <a href="restaurant.php">Restaurant</a>
      <a href="reservation.php">Réservation</a>
      <a href="contact.php">Contact</a>
    </nav>
    <div class="nav-auth">
      <?php if(session_status() === PHP_SESSION_NONE) session_start(); ?>
      <?php if(isset($_SESSION['user'])): ?>
          <a href="mes_reservations.php" class="nav-auth-login" style="margin-right: 10px;">Mes Réservations</a>
          <a href="logout.php" class="nav-auth-login">Logout</a>
          <span style="margin-left: 15px; font-weight: 500; color: var(--brand-accent);"><?php echo htmlspecialchars($_SESSION['user']['name']); ?></span>
      <?php else: ?>
          <a href="login.php" class="nav-auth-login">Log in</a>
          <a href="registre.php" class="nav-auth-register">Register</a>
      <?php endif; ?>
    </div>

  </div>
</header>
