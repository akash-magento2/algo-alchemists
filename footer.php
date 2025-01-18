<div class="chatbot-floater" onclick="redirectToChatbot()" aria-label="Open Chatbot">
    💬
</div>

<style>
  :root {
    --background-color: #ffffff; /* Entire website background */
    --default-color: #444444; /* Text color */
    --heading-color: #2a2c39; /* Headings */
    --accent-color: #ef6603; /* Accent elements */
    --surface-color: #ffffff; /* Boxed elements */
    --contrast-color: #ffffff; /* High contrast elements */
  }

  /* Floater Icon Style */
  .chatbot-floater {
    position: fixed;
    bottom: 20px;
    right: 20px;
    width: 70px;
    height: 70px;
    background: var(--accent-color);
    color: var(--contrast-color);
    font-size: 24px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
    cursor: pointer;
    z-index: 1000;
    transition: transform 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease;
  }

  /* Hover Effect */
  .chatbot-floater:hover {
    transform: scale(1.1);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
    background: #d45602; /* Slightly darker shade for hover effect */
  }

  /* Smaller Screens */
  @media (max-width: 600px) {
    .chatbot-floater {
      width: 60px;
      height: 60px;
      font-size: 20px;
    }
  }

  /* General Body Styling */
  body {
    margin: 0;
    font-family: Arial, sans-serif;
    background-color: var(--background-color);
    color: var(--default-color);
  }

  /* Ensure the page feels cohesive */
  h1, h2, h3, h4, h5, h6 {
    color: var(--heading-color);
  }

  a {
    color: var(--accent-color);
    text-decoration: none;
    transition: color 0.3s;
  }

  a:hover {
    color: #d45602;
  }
</style>

<script>
  function redirectToChatbot() {
    // Replace this with your chatbot redirect logic
    window.location.href = "therapistAI/therapistai.php";
  }
</script>
<footer id="footer" class="footer dark-background">
    <div class="container">
      <h3 class="sitename">Selecao</h3>
      <p>Et aut eum quis fuga eos sunt ipsa nihil. Labore corporis magni eligendi fuga maxime saepe commodi placeat.</p>
      <div class="social-links d-flex justify-content-center">
        <a href=""><i class="bi bi-twitter-x"></i></a>
        <a href=""><i class="bi bi-facebook"></i></a>
        <a href=""><i class="bi bi-instagram"></i></a>
        <a href=""><i class="bi bi-skype"></i></a>
        <a href=""><i class="bi bi-linkedin"></i></a>
      </div>
      <div class="container">
        <div class="copyright">
          <span>Copyright</span> <strong class="px-1 sitename">Selecao</strong> <span>All Rights Reserved</span>
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you've purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
    </div>
  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="/algo-alchemists/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/algo-alchemists/assets/vendor/php-email-form/validate.js"></script>
  <script src="/algo-alchemists/assets/vendor/aos/aos.js"></script>
  <script src="/algo-alchemists/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/algo-alchemists/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="/algo-alchemists/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="/algo-alchemists/assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="/algo-alchemists/assets/js/main.js"></script>

</body>

</html>