



  <!-- ======= Hero Section ======= -->
  <section id="hero" style="background-image: url('assets/img/<?= $companyInfo['banner']; ?>');" class="d-flex align-items-center">

    <div class="container-fluid" data-aos="zoom-out" data-aos-delay="100">
      <div class="row justify-content-center">
        <div class="col-xl-10">
          <div class="row">
            <div class="col-xl-5">
              <h1><?= $companyInfo['tagline']; ?></h1>
              <h2><?= $companyInfo['subtagline']; ?></h2>
              <!-- <a href="#about" class="btn-get-started scrollto">Get Started</a> -->
            </div>
          </div>
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients">
      <div class="container-fluid" data-aos="zoom-in">
        <div class="row justify-content-center">
          <div class="col-xl-10">
            <div class="owl-carousel clients-carousel">
              <?php 
              foreach ($client as $client) :
               ?>
              <img src="assets/img/clients/<?= $client['image']; ?>" alt="<?= $client['nama']; ?>">
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Clients Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>About</h2>
          <p><?= $aboutDesc['deskripsi']; ?></p>
        </div>

      </div>
    </section><!-- End About Section -->

    

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg ">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Services</h2>
          <p><?= $servicesDesc['deskripsi']; ?></p>
        </div>

        <div class="row">
          <?php 
          $animasi = 100;
          foreach ($services as $service) : 
          ?>
          <div class="col-md-6">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="<?= $animasi; ?>">
              <i><img src="./assets/img/services/<?= $service['image']; ?>" width="40px" height="40px"></i>
              <h4><a href="#"><?= $service['nama']; ?></a></h4>
              <p><?= $service['detail']; ?></p>
            </div>
          </div>
          <?php $animasi = $animasi + 100; ?>
          <?php endforeach; ?>
      </div>
    </section><!-- End Services Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Portfolio</h2>
          <p><?= $portfolioDesc['deskripsi']; ?></p>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
          <?php 
          foreach ($portfolio as $port) :
           ?>
          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/<?= $port['image']; ?>" class="img-fluid" width="400px" height="400px" alt="<?= $port['nama']; ?>">
              <div class="portfolio-info">
                <h4><?= $port['kategori']; ?></h4>
                <p><?= $port['nama']; ?></p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/<?= $port['image']; ?>"  data-gall="portfolioGallery" class="venobox" title="App 1"><i class="bx bx-plus"></i></a>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach;  ?>
        </div>

      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Testimonials</h2>
          <p><?= $testimonialDesc['deskripsi']; ?></p>
        </div>
      </div>

      <div class="container-fluid">

        <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">
          <div class="col-xl-10">
            <div class="owl-carousel testimonials-carousel">


              <?php
                foreach($testimoni as $testimonial) :
              ?>
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="assets/img/testimonials/<?= $testimonial['image']; ?>" class="testimonial-img" alt="">
                  <h3><?= $testimonial['nama']; ?></h3>
                  <h4><?= $testimonial['jabatan']; ?></h4>
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    <?= $testimonial['detail']; ?>
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div>           

            <?php endforeach; ?>

            </div>
          </div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>FAQ - Pertanyaan Umum</h2>
        </div>

        <ul class="faq-list" data-aos="fade-up">
          <?php 
          $i = 1;
          foreach($ask as $asked) :
          ?>
          <li class="seeAsk">
            <a data-toggle="collapse" href="#faq<?= $asked['id']; ?>" data-id="<?= $asked['pertanyaan']; ?>" class="collapsed"><?= $asked['pertanyaan']; ?><i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i></a>
            <div id="faq<?= $asked['id']; ?>" class="collapse" data-parent=".faq-list">
              <p>
                <?= $asked['jawab']; ?>
              </p>
            </div>
          </li>
        <?php endforeach; ?>
        </ul>

      </div>
    </section><!-- End Frequently Asked Questions Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Team</h2>
          <p><?= $teamDesc['deskripsi']; ?></p>
        </div>
        
        <div class="row">

          <?php 
          $animasi = 100;
          foreach($ourteam as $team) :
           ?>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="<?= $animasi; ?>">
              <div class="member-img">  
                <img src="assets/img/team/<?= $team['image']; ?>" class="img-fluid" width="230px" alt="">
                <div class="social">
                  <a href="https://<?= $team['twitter']; ?>" target="_blank"><i class="icofont-twitter"></i></a>
                  <a href="https://<?= $team['facebook']; ?>" target="_blank"><i class="icofont-facebook"></i></a>
                  <a href="https://<?= $team['instagram']; ?>" target="_blank"><i class="icofont-instagram"></i></a>
                  <a href="https://<?= $team['linkedin']; ?>" target="_blank"><i class="icofont-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4><?= $team['nama']; ?></h4>
                <span><?= $team['jabatan']; ?></span>
              </div>
            </div>
            
          </div>
          <?php $animasi = $animasi + 100; ?>       
          <?php endforeach;  ?>
          
        </div>
         

      </div>
    </section><!-- End Team Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <p><?= $contactDesc['deskripsi']; ?></p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">

          <div class="col-lg-6">

            <div class="row">
              
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-envelope"></i>
                  <h3>Email Us</h3>
                  <?php 
                  foreach($email as $email) :
                   ?>
                  <p><?= $email['deskripsi']; ?></p>
                <?php endforeach;  ?>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-phone-call"></i>
                  <h3>Call Us</h3>
                  <?php 
                  foreach($nomor as $nomor) :
                   ?>
                  <p><?= $nomor['deskripsi']; ?></p>
                <?php endforeach;  ?>
                </div>
              </div>
            </div>

          </div>

          <div class="col-lg-6">
            <div class="row">
              <div class="col-md-12 mt-4">
                <div class="info-box">
                  <i class="bx bx-map"></i>
                  <h3>Our Address</h3>
                  <?php 
                  foreach($alamat as $alamat) :
                   ?>
                  <p><?= $alamat['deskripsi']; ?></p>
                <?php endforeach;  ?>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  