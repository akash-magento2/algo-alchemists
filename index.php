
  <?php 
    require_once('header.php');
    require_once('menu.php'); 
  ?>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      <div id="hero-carousel" data-bs-interval="5000" class="container carousel carousel-fade" data-bs-ride="carousel">

        <!-- Slide 1 -->
      <div class="carousel-item active">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">Welcome to <span>Algo Therapists</span></h2>
          <p class="animate__animated animate__fadeInUp">
            Explore our Gen AI-powered therapists, take mental health questionnaires, set monthly goals, receive ergonomics reminders, and practice mindfulness\u2014all in one place. Prioritize your health today!
          </p>
          <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
        </div>
      </div>

      <!-- Slide 2 -->
      <div class="carousel-item">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">Track Your Goals with Ease</h2>
          <p class="animate__animated animate__fadeInUp">
            Set and monitor your monthly goals effortlessly. Use our tools to log daily activities and ensure you stay on track towards achieving a balanced and productive lifestyle.
          </p>
          <a href="#features" class="btn-get-started animate__animated animate__fadeInUp scrollto">Learn More</a>
        </div>
      </div>

      <!-- Slide 3 -->
      <div class="carousel-item">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">Build Healthy Habits</h2>
          <p class="animate__animated animate__fadeInUp">
            Visualize your progress with our habit tracker. Stay consistent and improve your wellbeing with intuitive calendar views and gentle reminders to maintain healthy routines.
          </p>
          <a href="#habit-tracker" class="btn-get-started animate__animated animate__fadeInUp scrollto">Discover More</a>
        </div>
      </div>

      <!-- Slide 4 -->
      <div class="carousel-item">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">Relax with Mindfulness Videos</h2>
          <p class="animate__animated animate__fadeInUp">
            Access our curated library of mindfulness and relaxation videos. Rejuvenate your mind and reduce stress with guided sessions tailored to your needs.
          </p>
          <a href="#mindfulness" class="btn-get-started animate__animated animate__fadeInUp scrollto">Start Now</a>
        </div>
      </div>


        <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

      </div>

      <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
        <defs>
          <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"></path>
        </defs>
        <g class="wave1">
          <use xlink:href="#wave-path" x="50" y="3"></use>
        </g>
        <g class="wave2">
          <use xlink:href="#wave-path" x="50" y="0"></use>
        </g>
        <g class="wave3">
          <use xlink:href="#wave-path" x="50" y="9"></use>
        </g>
      </svg>

    </section><!-- /Hero Section -->

    <!-- About Section -->
      <section id="about" class="about section">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>About</h2>
        <p>Who We Are</p>
      </div><!-- End Section Title -->
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
            <p>
              At Algo Therapists, we are committed to revolutionizing workplace wellbeing. Our platform seamlessly integrates mental health support, physical wellness tracking, and habit-building tools into a single user-friendly solution.
            </p>
            <ul>
              <li><i class="bi bi-check2-circle"></i> <span>Gen-AI powered virtual therapists for mental health support.</span></li>
              <li><i class="bi bi-check2-circle"></i> <span>Customizable tools to set and track your goals with ease.</span></li>
              <li><i class="bi bi-check2-circle"></i> <span>Ergonomic reminders to encourage healthy habits daily.</span></li>
            </ul>
          </div>
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <p>
              Whether it is improving your posture, maintaining mindfulness, or hitting your monthly milestones, we are here to help you achieve a balanced and productive lifestyle. Join us and prioritize your wellbeing at work and beyond.
            </p>
            <a href="#" class="read-more"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
          </div>
        </div>
      </div>
      </section><!-- /About Section -->

    <!-- Features Section -->
    <section id="features" class="features section">
      <div class="container">
        <ul class="nav nav-tabs row d-flex" data-aos="fade-up" data-aos-delay="100">
          <li class="nav-item col-3">
            <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#features-tab-1">
              <i class="fa-solid fa-brain"></i>
              <h4 class="d-none d-lg-block">AI-Powered Therapist</h4>
            </a>
          </li>
          <li class="nav-item col-3">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-2">
              <i class="fa-solid fa-chart-line"></i>
              <h4 class="d-none d-lg-block">Goal Tracking</h4>
            </a>
          </li>
          <li class="nav-item col-3">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-3">
              <i class="fa-solid fa-calendar-check"></i>
              <h4 class="d-none d-lg-block">Habit Tracker</h4>
            </a>
          </li>
          <li class="nav-item col-3">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-4">
              <i class="fa-solid fa-bell"></i>
              <h4 class="d-none d-lg-block">Wellness Reminders</h4>
            </a>
          </li>
        </ul><!-- End Tab Nav -->

        <div class="tab-content" data-aos="fade-up" data-aos-delay="200">
          <!-- AI-Powered Therapist -->
          <div class="tab-pane fade active show" id="features-tab-1">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                <h3>AI-Powered Virtual Therapist</h3>
                <p class="fst-italic">
                  Connect with an AI-enabled virtual therapist for personalized support and actionable recommendations to improve mental health.
                </p>
                <ul>
                  <li><i class="bi bi-check2-all"></i> <span>24/7 availability for mental health support.</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>Personalized coping mechanisms and stress management techniques.</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>Encourages self-reflection and mindfulness practices.</span></li>
                </ul>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
              <img src="assets/img/working-1.jpg" alt="" class="img-fluid">
              </div>
            </div>
          </div><!-- End Tab Content Item -->

          <!-- Goal Tracking -->
          <div class="tab-pane fade" id="features-tab-2">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                <h3>Set and Achieve Monthly Goals</h3>
                <p>
                  Track and achieve your monthly goals with intuitive progress insights and activity logs.
                </p>
                <ul>
                  <li><i class="bi bi-check2-all"></i> <span>Define clear, actionable goals for personal and professional growth.</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>Monitor progress with real-time insights.</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>Boost productivity and stay focused on priorities.</span></li>
                </ul>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
              <img src="assets/img/working-2.jpg" alt="" class="img-fluid">
              </div>
            </div>
          </div><!-- End Tab Content Item -->

          <!-- Habit Tracker -->
          <div class="tab-pane fade" id="features-tab-3">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                <h3>Track and Build Healthy Habits</h3>
                <p>
                  Use our habit tracker to stay consistent and motivated in building healthier routines.
                </p>
                <ul>
                  <li><i class="bi bi-check2-all"></i> <span>Visual calendar to track daily progress.</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>Customizable habits tailored to your lifestyle.</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>Insights into habit patterns to keep you on track.</span></li>
                </ul>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
              <img src="assets/img/working-3.jpg" alt="" class="img-fluid">
              </div>
            </div>
          </div><!-- End Tab Content Item -->

          <!-- Wellness Reminders -->
          <div class="tab-pane fade" id="features-tab-4">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                <h3>Timely Wellness Reminders</h3>
                <p>
                  Stay mindful of your physical and mental health with automated wellness reminders.
                </p>
                <ul>
                  <li><i class="bi bi-check2-all"></i> <span>Hydration and posture reminders to avoid physical strain.</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>Encourages regular breaks to reduce fatigue.</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>Supports balance between work and personal wellbeing.</span></li>
                </ul>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
              <img src="assets/img/working-4.jpg" alt="" class="img-fluid">
              </div>
            </div>
          </div><!-- End Tab Content Item -->
        </div>
      </div>
    </section><!-- /Features Section -->

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Be Here Now</h2>
        <p>Mindfulness</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

          <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
            <li data-filter="*" class="filter-active">All</li>
            <li data-filter=".filter-app">Meditation</li>
            <li data-filter=".filter-product">Breathing</li>
            <li data-filter=".filter-branding">Movement</li>
          </ul><!-- End Portfolio Filters -->

          <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
            <img src="https://img.youtube.com/vi/2FnFXq6Z13Q/maxresdefault.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Body Scan</h4>
                <p>15 Minutes Guided Body Scan</p>
                <a href="https://www.youtube.com/embed/2FnFXq6Z13Q" title="Play Video" data-gallery="portfolio-gallery-app" class="glightbox preview-link">
                  <i class="bi bi-zoom-in"></i>
                </a>
                <a href="https://www.youtube.com/watch?v=2FnFXq6Z13Q&ab_channel=Dr.AdamRosen-KneePain%26ArthritisInformation" title="More Details" class="details-link" target="_blank">
                <i class="bi bi-link-45deg"></i>
              </div>
            </div>
            <!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
              <img src="https://img.youtube.com/vi/DbDoBzGY3vo/hqdefault.jpg" class="img-fluid" alt="Take a Deep Breath Thumbnail">
              <div class="portfolio-info">
                <h4>Product 1</h4>
                <p>Lorem ipsum, dolor sit</p>
                <a href="https://www.youtube.com/embed/DbDoBzGY3vo" title="Play Video" data-gallery="portfolio-gallery-product" class="glightbox preview-link">
                  <i class="bi bi-zoom-in"></i>
                </a>
                <a href="https://www.youtube.com/watch?v=DbDoBzGY3vo&ab_channel=TAKEADEEPBREATH" title="More Details" class="details-link" target="_blank">
                  <i class="bi bi-link-45deg"></i>
                </a>
              </div>
            </div>
            <!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
              <img src="https://img.youtube.com/vi/B_SiNDBr3L8/maxresdefault.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Observing Thoughts</h4>
                <p>15 Minutes Guided Meditation for Aware of Thoughts</p>
                <a href="https://www.youtube.com/embed/B_SiNDBr3L8" title="Play Video" data-gallery="portfolio-gallery-app" class="glightbox preview-link">
                  <i class="bi bi-zoom-in"></i>
                </a>
                <a href="https://www.youtube.com/watch?v=B_SiNDBr3L8&ab_channel=MindfulPeace" title="More Details" class="details-link" target="_blank">
                <i class="bi bi-link-45deg"></i>
              </div>
            </div>
            <!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
              <img src="https://i.ytimg.com/vi/g2wo2Impnfg/hq720.jpg?sqp=-oaymwEnCNAFEJQDSFryq4qpAxkIARUAAIhCGAHYAQHiAQoIGBACGAY4AUAB&rs=AOn4CLA6QCtNg1J_j_2v6tj0IDNGTEZQTg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Product 2</h4>
                <p>Lorem ipsum, dolor sit</p>
                <a href="assets/img/masonry-portfolio/masonry-portfolio-5.jpg" title="Product 2" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
              <img src="https://img.youtube.com/vi/-d_AA9H4z9U/hqdefault.jpg" class="img-fluid" alt="Loving Kindness Thumbnail">
              <div class="portfolio-info">
                <h4>Loving Kindness</h4>
                <p>Guided Meditation to Develop Compassion</p>
                <a href="https://www.youtube.com/embed/-d_AA9H4z9U" title="Play Video" data-gallery="portfolio-gallery-app" class="glightbox preview-link">
                  <i class="bi bi-zoom-in"></i>
                </a>
                <a href="https://www.youtube.com/watch?v=-d_AA9H4z9U&ab_channel=WiseMindBody" title="More Details" class="details-link" target="_blank">
                  <i class="bi bi-link-45deg"></i>
                </a>
              </div>
            </div>
            <!-- End Portfolio Item -->

          </div><!-- End Portfolio Container -->

        </div>

      </div>

    </section><!-- /Portfolio Section -->

    <!-- Reminder Section -->
    <section id="pricing" class="pricing section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Stay Aligned, Stay Alert</h2>
        <p>Reminders</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-3">

          <div class="col-xl-3 col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <div class="pricing-item">
              <h3>Hydration Reminder</h3>
              <!-- <h4><sup>$</sup>0<span> / month</span></h4> -->
              <ul>
                <li>Proper hydration boosts your energy levels and overall well-being. Set a reminder to drink water each hour and stay refreshed. Keeping hydrated helps with focus and sustained vitality. Your body will truly appreciate this healthy habit!</li>
              </ul>
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Set Hydration Reminder</a>
              </div>
            </div>
          </div><!-- End Pricing Item -->

          <div class="col-xl-3 col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <div class="pricing-item">
              <h3>Posture Check Reminder</h3>
              <ul>
                <li>Good posture supports your spine and enhances your confidence. Set a reminder to check your stance each hour. Maintaining good posture aids comfort and productivity. Your body will truly appreciate this habit!</li>
              </ul>
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Set Posture Check Reminder</a>
              </div>
            </div>
          </div><!-- End Pricing Item -->

          <div class="col-xl-3 col-lg-6" data-aos="fade-up" data-aos-delay="400">
            <div class="pricing-item">
              <h3>Sleep Reminder</h3>
              <ul>
                <li>Quality sleep boosts your mood and overall health. Set a reminder to wind down at night and prepare for rest. Prioritizing sleep improves focus and energy levels. Your body will truly appreciate this change!</li>
              </ul>
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Set Sleep Reminder</a>
              </div>
            </div>
          </div><!-- End Pricing Item -->

          <div class="col-xl-3 col-lg-6" data-aos="fade-up" data-aos-delay="400">
            <div class="pricing-item">
              <!-- <span class="advanced">Advanced</span> -->
              <h3>Exercise Reminder</h3>
              <ul>
                <li>Regular exercise boosts your mood and improves overall health. Set a reminder to move each hour and stay active throughout the day. Prioritizing activity enhances energy and increases focus. Your body will truly appreciate this habit!</li>
              </ul>
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Set Exercise Reminder</a>
              </div>
            </div>
          </div><!-- End Pricing Item -->

        </div>

      </div>

    </section><!-- /Pricing Section -->

      <!-- Recent Posts Section -->
      <section id="recent-posts" class="recent-posts section">
  
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
          <h2>Recent Posts</h2>
          <p>Recent Blog Posts<br></p>
        </div><!-- End Section Title -->
  
        <div class="container">
  
          <div class="row gy-4">
  
            <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
              <article>
  
                <div class="post-img">
                  <img src="assets/img/blog/work_life_balance__1_.webp" alt="" class="img-fluid">
                </div>
  
                <p class="post-category">Self Help</p>
  
                <h2 class="title">
                  <a href="https://thehappinessindex.com/blog/importance-work-life-balance/">Importance of Work-Life Balance</a>
                </h2>
  
                <div class="d-flex align-items-center">
                  <img src="assets/img/blog/Joe.webp" alt="" class="img-fluid post-author-img flex-shrink-0">
                  <div class="post-meta">
                    <p class="post-author">Joe Wedgwood</p>
                    <p class="post-date">
                      <time datetime="2022-01-01">Sept 21, 2022</time>
                    </p>
                  </div>
                </div>
  
              </article>
            </div><!-- End post list item -->
  
            <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
              <article>
  
                <div class="post-img">
                  <img src="assets/img/blog/abc.webp" alt="" class="img-fluid">
                </div>
  
                <p class="post-category">Ergonomics</p>
  
                <h2 class="title">
                  <a href="blog-details.html">10 Impressive Benefits of Ergonomics in the Workplace</a>
                </h2>
  
                <div class="d-flex align-items-center">
                  <img src="assets/img/blog/images.jpeg" alt="" class="img-fluid post-author-img flex-shrink-0">
                  <div class="post-meta">
                    <p class="post-author">Nina Neuschuetz</p>
                    <p class="post-date">
                      <time datetime="2022-01-01">Apr 5, 2024</time>
                    </p>
                  </div>
                </div>
  
              </article>
            </div><!-- End post list item -->
 
          <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <article>
 
              <div class="post-img">
                <img src="assets/img/blog/img.jpg" alt="" class="img-fluid">
              </div>
 
              <p class="post-category">Meditation</p>
 
              <h2 class="title">
                <a href="https://www.healthline.com/nutrition/12-benefits-of-meditation">How Meditation Benefits Your Mind and Body</a>
              </h2>
 
              <div class="d-flex align-items-center">
                <img src="assets/img/blog/Joslyn.webp" alt="" class="img-fluid post-author-img flex-shrink-0">
                <div class="post-meta">
                  <p class="post-author">Joslyn Jelinek</p>
                  <p class="post-date">
                    <time datetime="2022-01-01">Aug 15, 2024</time>
                  </p>
                </div>
              </div>
 
            </article>
          </div><!-- End post list item -->
 
        </div><!-- End recent posts list -->
 
      </div>
 
    </section><!-- /Recent Posts Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p>Contact Us</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-4">
            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
              <i class="bi bi-geo-alt flex-shrink-0"></i>
              <div>
                <h3>Address</h3>
                <p>A108 Adam Street, New York, NY 535022</p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-telephone flex-shrink-0"></i>
              <div>
                <h3>Call Us</h3>
                <p>+1 5589 55488 55</p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
              <i class="bi bi-envelope flex-shrink-0"></i>
              <div>
                <h3>Email Us</h3>
                <p>info@example.com</p>
              </div>
            </div><!-- End Info Item -->

          </div>

          <div class="col-lg-8">
            <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
              <div class="row gy-4">

                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
                </div>

                <div class="col-md-6 ">
                  <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
                </div>

                <div class="col-md-12">
                  <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>

                  <button type="submit">Send Message</button>
                </div>

              </div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>

    </section><!-- /Contact Section -->

  </main>
  <?php 
    require_once('footer.php');
  ?>