<?php session_start(); ?>
<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">Algo Therapist</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#about">Our Offerings</a></li>
          <li><a href="#services">AI-Powered Therapist</a></li>
          <li><a href="#portfolio">Goal Tracker</a></li>
          <li><a href="#team">Reminders</a></li>
          <li><a href="#team">Mindfulness</a></li>
          <?php if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true) { ?>
            <li><a href="/algo-alchemists/logout.php"><?php echo $_SESSION['name']; ?></a></li>
          <?php } else {?>
            <li><a href="/algo-alchemists/forms/otpLogin.php" class="active">Login</a></li>
          <?php } ?>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>
