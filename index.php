<!DOCTYPE html>
<html lang="en">

<head>
  <title>CoursPresso-A course comparison website</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="css/animate.css">

  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">

  <link rel="stylesheet" href="css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="css/jquery.timepicker.css">


  <link rel="stylesheet" href="css/flaticon.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <script>
    $(document).ready(function () {
      // hide the login form on page load
      $("#login-form").hide();
      $("#signout-button").hide();
      $("#search-form").hide();
      <?php
      session_start();
      if (isset($_SESSION['StudentId'])) {
        echo "$(\"#signup-form\").hide();";
        echo "$(\"#signout-button\").show();";
        echo '$("#search-form").show();';
      }
      ?>

      // show the login form when the login button is clicked
      $("#login-btn").click(function () {
        $("#signup-form").hide();
        $("#login-form").show();
      });

      // show the signup form when the signup button is clicked
      $("#signup-btn").click(function () {
        $("#login-form").hide();
        $("#signup-form").show();
      });
    });
  </script>
  

</head>

<body>


  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.php"><span>Cours</span>Presso</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
        aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <!-- <?php
          if (isset($_SESSION['StudentId'])) {
            $userName = $_SESSION['name'];
            echo "<li class\"nav-item\"><a href=\"index.html\" class=\"nav-link\">" . $userName . "</a></li>";
          }
          ?> -->
          <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
          <li class="nav-item"><a href="course.php" class="nav-link">Course</a></li>
          <!-- <li class="nav-item"><a href="instructor.html" class="nav-link">Instructor</a></li> -->
          <!-- <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li> -->
          <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
          <li class="nav-item " id="signout-button"><a href="signout.php" class="nav-link">Sign Out</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- END nav -->

  <div class="hero-wrap js-fullheight" style="background-image: url('images/bg_1.jpg');">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-center" data-scrollax-parent="true">
        <div class="col-md-7 ftco-animate">
          <span class="subheading">Welcome to Courspresso</span>
          <h1 class="mb-4">We Are Online Platform that make course selection easy</h1>
          <!-- <p class="caps">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p> -->
          <p class="mb-0"><a href="course.php" class="btn btn-primary">Our Courses</a> </p>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section ftco-no-pb ftco-no-pt">
    <div class="container">
      <div class="row">
        <div class="col-md-7"></div>
        <div class="col-md-5 order-md-last">
          <class="login-wrap p-4 p-md-5">
            <div id="signup-form" class="login-wrap p-4 p-md-5">
              <h3 class="mb-4">Register Now</h3>
              <form action="signup.php" method="post" class="signup-form">
                <div class="form-group">
                  <label class="label" for="name" name="name">Full Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
                </div>
                <div class="form-group">
                  <label class="label" for="email" name="email">Email Address</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                </div>
                <div class="form-group">
                  <label class="label" for="password" name="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                    required>
                </div>
                <div class="form-group">
                  <label class="label" for="password">Confirm Password</label>
                  <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password">
                </div>
                <div class="form-group d-flex justify-content-end mt-4">
                  <button type="submit" class="btn btn-primary submit">SignUp</button>
                </div>
              </form>
              <button class="btn btn-link btn-block mt-2" id="login-btn">Already have an account? Login</button>
            </div>

            <div id="login-form" class="login-wrap p-4 p-md-5">
              <h3 class="mb-4">Log In</h3>
              <form action="login.php" method="post" class="login-form">
                <div class="form-group">
                  <label class="label" for="email">Email Address</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                </div>
                <div class="form-group">
                  <label class="label" for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                    required>
                </div>
                <div class="form-group d-flex justify-content-end mt-4">
                  <button type="submit" class="btn btn-primary submit">Log In</button>
                </div>
              </form>
              <button class="btn btn-link btn-block mt-2" id="signup-btn">Don't have an account? Sign up</button>
            </div>
            <div class="login-wrap p-4 p-md-5" id="search-form">
              <h3 class="mb-4">Search Courses</h3>
              <form action="course.php" method="get" class="search-form">
                <div class="form-group">
                  <label class="label" for="search" name="search">Search</label>
                  <input type="text" class="form-control" id="category" name="category" placeholder="Enter your search"
                    required>
                </div>
                <div class="form-group d-flex justify-content-end mt-4">
                  <button type="submit" class="btn btn-primary submit">Search</button>
                </div>
              </form>
            </div>
        </div>
  </section>

  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center pb-4">
        <div class="col-md-12 heading-section text-center ftco-animate">
          <span class="subheading">Start Learning Today</span>
          <h2 class="mb-4">Browse Online Course Category</h2>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-3 col-lg-2">
          <a href="course.php?category=web%20development"
            class="course-category img d-flex align-items-center justify-content-center"
            style="background-image: url(images/webdev.jpg);">
            <div class="text w-100 text-center">
              <h3>Web Development</h3>
            </div>
          </a>
        </div>
        <div class="col-md-3 col-lg-2">
          <a href="course.php?category=mobile%20development"
            class="course-category img d-flex align-items-center justify-content-center"
            style="background-image: url(images/androiddev.jpg);">
            <div class="text w-100 text-center">
              <h3>Android Development</h3>
            </div>
          </a>
        </div>
        <div class="col-md-3 col-lg-2">
          <a href="course.php?category=algorithm"
            class="course-category img d-flex align-items-center justify-content-center"
            style="background-image: url(images/algo.webp);">
            <div class="text w-100 text-center">
              <h3>Algorithms</h3>
            </div>
          </a>
        </div>
        <div class="col-md-3 col-lg-2">
          <a href="course.php?category=data%20analysis"
            class="course-category img d-flex align-items-center justify-content-center"
            style="background-image: url(images/datasci.webp);">
            <div class="text w-100 text-center">
              <h3>Data Science</h3>
            </div>
          </a>
        </div>
        <div class="col-md-3 col-lg-2">
          <a href="course.php?category=ai" class="course-category img d-flex align-items-center justify-content-center"
            style="background-image: url(images/ai.webp);">
            <div class="text w-100 text-center">
              <h3>AI &amp; ML</h3>
            </div>
          </a>
        </div>
        <div class="col-md-3 col-lg-2">
          <a href="course.php?category=cybersecurity"
            class="course-category img d-flex align-items-center justify-content-center"
            style="background-image: url(images/iot.jpg)">
            <span class="text w-100 text-center">
              <h3>Cybersecurity</h3>
            </span>
          </a>
        </div>
        <div class="col-md-12 text-center mt-5">
          <a href="course.php" class="btn btn-secondary">See All Courses</a>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section bg-light">
    <div class="container">
      <div class="row justify-content-center pb-4">
        <div class="col-md-12 heading-section text-center ftco-animate">
          <span class="subheading">Start Learning Today</span>
          <h2 class="mb-4">Recently Viewed Courses</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 ftco-animate">
          <div class="project-wrap">
            <a href="#" class="img" style="background-image: url(images/work-1.jpg);">
              <span class="price">Software</span>
            </a>
            <div class="text p-4">
              <h3><a href="#">Design for the web with adobe photoshop</a></h3>
              <p class="advisor">Advisor <span>Tony Garret</span></p>
              <ul class="d-flex justify-content-between">
                <li><span class="flaticon-shower"></span>2300</li>
                <li class="price">$199</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-4 ftco-animate">
          <div class="project-wrap">
            <a href="#" class="img" style="background-image: url(images/work-2.jpg);">
              <span class="price">Software</span>
            </a>
            <div class="text p-4">
              <h3><a href="#">Design for the web with adobe photoshop</a></h3>
              <p class="advisor">Advisor <span>Tony Garret</span></p>
              <ul class="d-flex justify-content-between">
                <li><span class="flaticon-shower"></span>2300</li>
                <li class="price">$199</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-4 ftco-animate">
          <div class="project-wrap">
            <a href="#" class="img" style="background-image: url(images/work-3.jpg);">
              <span class="price">Software</span>
            </a>
            <div class="text p-4">
              <h3><a href="#">Design for the web with adobe photoshop</a></h3>
              <p class="advisor">Advisor <span>Tony Garret</span></p>
              <ul class="d-flex justify-content-between">
                <li><span class="flaticon-shower"></span>2300</li>
                <li class="price">$199</li>
              </ul>
            </div>
          </div>
        </div>

        <div class="col-md-4 ftco-animate">
          <div class="project-wrap">
            <a href="#" class="img" style="background-image: url(images/work-4.jpg);">
              <span class="price">Software</span>
            </a>
            <div class="text p-4">
              <h3><a href="#">Design for the web with adobe photoshop</a></h3>
              <p class="advisor">Advisor <span>Tony Garret</span></p>
              <ul class="d-flex justify-content-between">
                <li><span class="flaticon-shower"></span>2300</li>
                <li class="price">$199</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-4 ftco-animate">
          <div class="project-wrap">
            <a href="#" class="img" style="background-image: url(images/work-5.jpg);">
              <span class="price">Software</span>
            </a>
            <div class="text p-4">
              <h3><a href="#">Design for the web with adobe photoshop</a></h3>
              <p class="advisor">Advisor <span>Tony Garret</span></p>
              <ul class="d-flex justify-content-between">
                <li><span class="flaticon-shower"></span>2300</li>
                <li class="price">$199</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-4 ftco-animate">
          <div class="project-wrap">
            <a href="#" class="img" style="background-image: url(images/work-6.jpg);">
              <span class="price">Software</span>
            </a>
            <div class="text p-4">
              <h3><a href="#">Design for the web with adobe photoshop</a></h3>
              <p class="advisor">Advisor <span>Tony Garret</span></p>
              <ul class="d-flex justify-content-between">
                <li><span class="flaticon-shower"></span>2300</li>
                <li class="price">$199</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(images/bg_4.jpg);">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
          <div class="block-18 d-flex align-items-center">
            <div class="icon"><span class="flaticon-online"></span></div>
            <div class="text">
              <strong class="number" data-number="400">0</strong>
              <span>Online Courses</span>
            </div>
          </div>
        </div>
        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
          <div class="block-18 d-flex align-items-center">
            <div class="icon"><span class="flaticon-graduated"></span></div>
            <div class="text">
              <strong class="number" data-number="4500">0</strong>
              <span>Students Enrolled</span>
            </div>
          </div>
        </div>
        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
          <div class="block-18 d-flex align-items-center">
            <div class="icon"><span class="flaticon-instructor"></span></div>
            <div class="text">
              <strong class="number" data-number="1200">0</strong>
              <span>Experts Instructors</span>
            </div>
          </div>
        </div>
        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
          <div class="block-18 d-flex align-items-center">
            <div class="icon"><span class="flaticon-tools"></span></div>
            <div class="text">
              <strong class="number" data-number="300">0</strong>
              <span>Hours Content</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section ftco-about img">
    <div class="container">
      <div class="row d-flex">
        <div class="col-md-12 about-intro">
          <div class="row">
            <div class="col-md-6 d-flex">
              <div class="d-flex about-wrap">
                <div class="img d-flex align-items-center justify-content-center"
                  style="background-image:url(images/about-1.jpg);">
                </div>
                <div class="img-2 d-flex align-items-center justify-content-center"
                  style="background-image:url(images/about.jpg);">
                </div>
              </div>
            </div>
            <div class="col-md-6 pl-md-5 py-5">
              <div class="row justify-content-start pb-3">
                <div class="col-md-12 heading-section ftco-animate">
                  <span class="subheading">Unlock Your Future: Compare, Choose, Excel!</span>
                  <h2 class="mb-4">Tired of scrolling through courses?</h2>
                  <p>We aim to tackle the problem of choosing courses from the many sources available on the internet.
                    Abundance of choices often causes
                    confusion leads to inefficiency, especially while trying to learn.
                  </p>
                  <p>Well, fret no more! We are here to help. Compare courses within seconds and make an informed
                    choice. Learn without regret!</p>
                  <p><a href="#" class="btn btn-primary">Get in touch with us</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!--<section class="ftco-section testimony-section bg-light">
    <div class="overlay" style="background-image: url(images/bg_2.jpg);"></div>
    <div class="container">
      <div class="row pb-4">
        <div class="col-md-7 heading-section ftco-animate">
          <span class="subheading">Testimonial</span>
          <h2 class="mb-4">What Are Students Says</h2>
        </div>
      </div>
    </div>
    <div class="container container-2">
      <div class="row ftco-animate">
        <div class="col-md-12">
          <div class="carousel-testimony owl-carousel">
            <div class="item">
              <div class="testimony-wrap py-4">
                <div class="text">
                  <p class="star">
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                  </p>
                  <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and
                    Consonantia, there live the blind texts.</p>
                  <div class="d-flex align-items-center">
                    <div class="user-img" style="background-image: url(images/person_1.jpg)"></div>
                    <div class="pl-3">
                      <p class="name">Roger Scott</p>
                      <span class="position">Marketing Manager</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="testimony-wrap py-4">
                <div class="text">
                  <p class="star">
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                  </p>
                  <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and
                    Consonantia, there live the blind texts.</p>
                  <div class="d-flex align-items-center">
                    <div class="user-img" style="background-image: url(images/person_2.jpg)"></div>
                    <div class="pl-3">
                      <p class="name">Roger Scott</p>
                      <span class="position">Marketing Manager</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="testimony-wrap py-4">
                <div class="text">
                  <p class="star">
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                  </p>
                  <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and
                    Consonantia, there live the blind texts.</p>
                  <div class="d-flex align-items-center">
                    <div class="user-img" style="background-image: url(images/person_3.jpg)"></div>
                    <div class="pl-3">
                      <p class="name">Roger Scott</p>
                      <span class="position">Marketing Manager</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="testimony-wrap py-4">
                <div class="text">
                  <p class="star">
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                  </p>
                  <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and
                    Consonantia, there live the blind texts.</p>
                  <div class="d-flex align-items-center">
                    <div class="user-img" style="background-image: url(images/person_1.jpg)"></div>
                    <div class="pl-3">
                      <p class="name">Roger Scott</p>
                      <span class="position">Marketing Manager</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="testimony-wrap py-4">
                <div class="text">
                  <p class="star">
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                  </p>
                  <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and
                    Consonantia, there live the blind texts.</p>
                  <div class="d-flex align-items-center">
                    <div class="user-img" style="background-image: url(images/person_2.jpg)"></div>
                    <div class="pl-3">
                      <p class="name">Roger Scott</p>
                      <span class="position">Marketing Manager</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>-->

  <section class="ftco-intro ftco-section ftco-no-pb">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12 text-center">
          <div class="img" style="background-image: url(images/bg_4.jpg);">
            <div class="overlay"></div>
            <h2>This is CoursPresso-a Couse comparison website.</h2>
            <p>We offer an interactive way to compare courses so you can make the better choice</p>
            <p class="mb-0"><a href="course.php" class="btn btn-primary px-4 py-3">Enroll Now</a></p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section services-section">
    <div class="container">
      <div class="row d-flex">
        <div class="col-md-6 heading-section pr-md-5 ftco-animate d-flex align-items-center">
          <div class="w-100 mb-4 mb-md-0">
            <span class="subheading">Welcome to CoursPresso</span>
            <h2 class="mb-4">We Are CoursPresso A course comparison website</h2>
            <p>We offer an interactive way to get rid of the hassle of searching for the course that is just right for you!</p>
            <p>Abundance of choices often causes confusion and this confusion leads to inefficiency, especially while trying to learn. So we help you tackle this problem. 
                Just Search courses according to your interest, filter them according to your preference and compare them to find the best deal.</p>
            <div class="d-flex video-image align-items-center mt-md-4">
              <a href="#" class="video img d-flex align-items-center justify-content-center"
                style="background-image: url(images/about.jpg);">
                <span class="fa fa-play-circle"></span>
              </a>
              <h4 class="ml-4">Learn & Compare any course from CoursPresso, Watch video</h4>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
              <div class="services">
                <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-tools"></span>
                </div>
                <div class="media-body">
                  <h3 class="heading mb-3">Top Quality Content</h3>
                  <p>We pride ourselves on delivering high-quality content that is carefully curated to meet the needs of our users.</p>
                </div>
              </div>
            </div>
            <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
              <div class="services">
                <div class="icon icon-2 d-flex align-items-center justify-content-center"><span
                    class="flaticon-instructor"></span></div>
                <div class="media-body">
                  <h3 class="heading mb-3">Highly Skilled Instructor</h3>
                  <p>We take pride in connecting learners with highly skilled instructors who bring a wealth of expertise and knowledge to their respective courses.</p>
                </div>
              </div>
            </div>
            <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
              <div class="services">
                <div class="icon icon-3 d-flex align-items-center justify-content-center"><span
                    class="flaticon-quiz"></span></div>
                <div class="media-body">
                  <h3 class="heading mb-3">World Class Courses &amp; Quiz</h3>
                  <p>We offer world-class courses and an engaging quiz platform to enhance your learning experience.</p>
                </div>
              </div>
            </div>
            <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
              <div class="services">
                <div class="icon icon-4 d-flex align-items-center justify-content-center"><span
                    class="flaticon-browser"></span></div>
                <div class="media-body">
                  <h3 class="heading mb-3">Get Certified</h3>
                  <p>We offer you the opportunity to enhance your professional credentials and expand your knowledge by earning certifications.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!--<section class="ftco-section bg-light">
    <div class="container">
      <div class="row justify-content-center pb-4">
        <div class="col-md-12 heading-section text-center ftco-animate">
          <span class="subheading">Our Blog</span>
          <h2 class="mb-4">Recent Post</h2>
        </div>
      </div>
      <div class="row d-flex">
        <div class="col-lg-4 ftco-animate">
          <div class="blog-entry">
            <a href="blog-single.html" class="block-20" style="background-image: url('images/image_1.jpg');">
            </a>
            <div class="text d-block">
              <div class="meta">
                <p>
                  <a href="#"><span class="fa fa-calendar mr-2"></span>Sept. 17, 2020</a>
                  <a href="#"><span class="fa fa-user mr-2"></span>Admin</a>
                  <a href="#" class="meta-chat"><span class="fa fa-comment mr-2"></span> 3</a>
                </p>
              </div>
              <h3 class="heading"><a href="#">I'm not creative, Should I take this course?</a></h3>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia...</p>
              <p><a href="blog.html" class="btn btn-secondary py-2 px-3">Read more</a></p>
            </div>
          </div>
        </div>

        <div class="col-lg-4 ftco-animate">
          <div class="blog-entry">
            <a href="blog-single.html" class="block-20" style="background-image: url('images/image_2.jpg');">
            </a>
            <div class="text d-block">
              <div class="meta">
                <p>
                  <a href="#"><span class="fa fa-calendar mr-2"></span>Sept. 17, 2020</a>
                  <a href="#"><span class="fa fa-user mr-2"></span>Admin</a>
                  <a href="#" class="meta-chat"><span class="fa fa-comment mr-2"></span> 3</a>
                </p>
              </div>
              <h3 class="heading"><a href="#">I'm not creative, Should I take this course?</a></h3>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia...</p>
              <p><a href="blog.html" class="btn btn-secondary py-2 px-3">Read more</a></p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 ftco-animate">
          <div class="blog-entry">
            <a href="blog-single.html" class="block-20" style="background-image: url('images/image_3.jpg');">
            </a>
            <div class="text d-block">
              <div class="meta">
                <p>
                  <a href="#"><span class="fa fa-calendar mr-2"></span>Sept. 17, 2020</a>
                  <a href="#"><span class="fa fa-user mr-2"></span>Admin</a>
                  <a href="#" class="meta-chat"><span class="fa fa-comment mr-2"></span> 3</a>
                </p>
              </div>
              <h3 class="heading"><a href="#">I'm not creative, Should I take this course?</a></h3>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia...</p>
              <p><a href="blog.html" class="btn btn-secondary py-2 px-3">Read more</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>-->


  <footer class="ftco-footer ftco-no-pt">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md pt-5">
          <div class="ftco-footer-widget pt-md-5 mb-4">
            <h2 class="ftco-heading-2"> Cours Presso About</h2>
            <p>CoursePress is a comprehensive course comparison website designed to assist students in making informed
              decisions about their educational journey. </p>
            <ul class="ftco-footer-social list-unstyled float-md-left float-lft">
              <li class="ftco-animate"><a href="#"><span class="fa fa-twitter"></span></a></li>
              <li class="ftco-animate"><a href="#"><span class="fa fa-facebook"></span></a></li>
              <li class="ftco-animate"><a href="#"><span class="fa fa-instagram"></span></a></li>
            </ul>
          </div>
        </div>
        <div class="col-md pt-5">
          <div class="ftco-footer-widget pt-md-5 mb-4 ml-md-5">
            <h2 class="ftco-heading-2">Help Desk</h2>
            <ul class="list-unstyled">
              <li><a href="#" class="py-2 d-block">Customer Care</a></li>
              <li><a href="#" class="py-2 d-block">Legal Help</a></li>
              <li><a href="#" class="py-2 d-block">Services</a></li>
              <li><a href="#" class="py-2 d-block">Privacy and Policy</a></li>
              <li><a href="#" class="py-2 d-block">Call Us</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md pt-5">
          <div class="ftco-footer-widget pt-md-5 mb-4">
            <h2 class="ftco-heading-2">Recent Courses</h2>
            <ul class="list-unstyled">
               <li><a href="course.php?category=web%20development" class="py-2 d-block">Web Development</a></li>
              <li><a href="course.php?category=mobile%20development" class="py-2 d-block">Android Development</a></li>
              <li><a href="course.php?category=algorithm" class="py-2 d-block">Algorithms</a></li>
              <li><a href="course.php?category=data%20analysis" class="py-2 d-block">Data Science</a></li>
              <li><a href="course.php?category=ai" class="py-2 d-block">AI & ML</a></li>
              <li><a href="course.php?category=cybersecurity" class="py-2 d-block">Cyber Security </a></li>
            </ul>
          </div>
        </div>
        <div class="col-md pt-5">
          <div class="ftco-footer-widget pt-md-5 mb-4">
            <h2 class="ftco-heading-2">Have a Question?</h2>
            <div class="block-23 mb-3">
              <ul>
                <li><span class="icon fa fa-map-marker"></span><span class="text">SVIT , Rajupura Village, Vasad,
                    Anand,</span></li>
                <li><a href="#"><span class="icon fa fa-phone"></span><span class="text"> 02692 274 766</span></a></li>
                <li><a href="#"><span class="icon fa fa-paper-plane"></span><span
                      class="text">coursepresso@gmail.com</span></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-center">

          <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;
            <script>
              document.write(new Date().getFullYear());
            </script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i>
            by
            <a href="https://colorlib.com" target="_blank">Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </p>
        </div>
      </div>
    </div>
  </footer>



  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
        stroke="#F96D00" />
    </svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false">
  </script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>

</body>

</html>
