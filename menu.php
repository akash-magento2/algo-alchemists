<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">Selecao</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#portfolio">Portfolio</a></li>
          <li><a href="#team">Team</a></li>
          <?php if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true) { ?>
            <li><a href="/algo-alchemists/logout.php"><?php echo $_SESSION['name']; ?></a></li>
          <?php } else {?>
            <li><a href="/algo-alchemists/forms/otpLogin.php">Login</a></li>
          <?php } ?>
          <li><a href="blog.html">Blog</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
      <!-- Bell Icon with Notification Popup -->
      <div class="notifications">
        <a href="#" id="bellIcon" data-bs-toggle="modal" data-bs-target="#notificationModal">
          <i class="bi bi-bell" style="font-size: 24px; color: #555;"></i>
        </a>
      </div>
    </div>
  </header>

  <!-- Modal for Notifications -->
<div class="modal fade" id="notificationModal" tabindex="-1" aria-labelledby="notificationModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="notificationModalLabel">Notifications</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Notifications will be dynamically inserted here -->
        <ul id="notificationList">
          <!-- Example of static content -->
          <li>You have 3 unread notifications</li>
          <li>New comment on your post</li>
          <li>Your profile was updated</li>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

<!-- JavaScript to dynamically populate modal with notification content -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const notificationData = [
      'You have 3 unread notifications',
      'New comment on your post',
      'Your profile was updated'
    ];

    // Find the modal's list
    const notificationList = document.getElementById('notificationList');

    // Function to populate the modal with dynamic content
    function populateNotifications() {
      // Clear existing notifications
      notificationList.innerHTML = '';

      // Add new notifications dynamically
      notificationData.forEach(function(notification) {
        const listItem = document.createElement('li');
        listItem.textContent = notification;
        notificationList.appendChild(listItem);
      });
    }

    // Event listener for bell icon click
    const bellIcon = document.getElementById('bellIcon');
    bellIcon.addEventListener('click', function () {
      populateNotifications(); // Populate notifications when the bell icon is clicked
    });
  });
</script>