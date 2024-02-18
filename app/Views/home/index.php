<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>


<?= $this->include('templates/header') ?>

<main>
   <section id="parallax" class="parallax ">
      <div class="uk-height-large uk-background-cover uk-overflow-hidden uk-light uk-flex uk-animation-slide-left-medium blur-background" style="background-image: url('assets/images/img2.jpg');">
         <div class="content-overlay">
            <h1>Website Spa Massage No 1 Di Jogja</h1>
            <p>Investasi Ketenangan dan Kenyamanan Tubuh Anda!</p>
            <button type="button" uk-toggle="target: #offcanvas-overlay" class="btn btn-primary">Testimonial</button>
         </div>
      </div>

   </section>


   <!-- Banner -->
   <section id="banner" class="banner uk-margin-large-top uk-animation-slide-bottom-medium">
      <div class="section-title uk-margin-large-top">
         <h4 class="text-center"><strong>LAYANAN KAMI</strong></h4>
         <hr class="with-blue-underline">
      </div>
      <div class="uk-slider-container-offset" uk-slider="autoplay: true" uk-scrollspy="cls: uk-animation-slide-right; delay: 300;">
         <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1">
            <ul class="uk-slider-items uk-child-width-1-3@s uk-grid">
               <li>
                  <div class="uk-card uk-card-hover uk-card-default">
                     <div class="uk-card-media-top">
                        <img src="assets/images/img1.jpg" width="500" height="500" alt="">
                     </div>
                     <div class="uk-card-body">
                        <h3 class="uk-card-title">Light Massage & Face Acupressure</h3>
                        <p><strong>Price : Rp. 150.000</strong></p>
                        <p>Kombinasi pijat ringan pada pundak tangan dan kaki dipadukan penekanan di titik-titik meridien wajah anda membuat peredaran darah lancar dan wajah lebih bersinar</p>
                     </div>
                  </div>
               </li>
               <li>
                  <div class="uk-card uk-card-hover uk-card-default">
                     <div class="uk-card-media-top">
                        <img src="assets/images/img2.jpg" width="500" height="500" alt="">
                     </div>
                     <div class="uk-card-body">
                        <h3 class="uk-card-title">Full Body Massage & Scrub</h3>
                        <p><strong>Price : Rp. 220.000</strong></p>
                        <p>Perpaduan massage seluruh badan dan melembutkan kulit tubuh dengan scrub terbaik.</p>
                     </div>
                  </div>
               </li>
               <li>
                  <div class="uk-card uk-card-hover uk-card-default">
                     <div class="uk-card-media-top">
                        <img src="assets/images/img5.jpg" width="500" height="500" alt="">
                     </div>
                     <div class="uk-card-body">
                        <h3 class="uk-card-title">Refleksi</h3>
                        <p><strong>Price : Rp. 100.000</strong></p>
                        <p>Pemijatan yang terfokus pada titik-titik saraf pada tubuh untuk melancarkan peredaran darah dan dapat menghilangkan rasa pegal.</p>
                     </div>
                  </div>
               </li>
               <li>
                  <div class="uk-card uk-card-hover uk-card-default">
                     <div class="uk-card-media-top">
                        <img src="assets/images/img4.jpg" width="500" height="500" alt="">
                     </div>
                     <div class="uk-card-body">

                        <h3 class="uk-card-title">Light Massage & Reflexology</h3>
                        <p><strong>Price : Rp. 150.000</strong></p>
                        <p>Pijatan ringan pada tangan,punggung dan kepala mengembalikan kesegaran tubuh, mengkombinasikan dengan penekanan pada titik refleksi kaki. </p>
                     </div>
                  </div>
               </li>
               <li>
                  <div class="uk-card uk-card-hover uk-card-default">
                     <div class="uk-card-media-top">
                        <img src="assets/images/img3.jpg" width="500" height="500" alt="">
                     </div>
                     <div class=" uk-card-body">
                        <h3 class="uk-card-title">Full Body Massage & Reflexolgy</h3>
                        <p><strong>Price : Rp. 200.000</strong></p>
                        <p>Perpaduan pemijatan seluruh tubuh dan mengkombinasikan dengan penekanan pada titik refleksi kaki adalah formula yang cocok untuk memberikan rasa nyaman untuk seluruh tubuh. </p>
                     </div>
                  </div>
               </li>
            </ul>

            <a class="uk-position-center-left uk-position-small " style="color: black;" href uk-slidenav-previous uk-slider-item="previous"></a>
            <a class="uk-position-center-right uk-position-small " style="color: black;" href uk-slidenav-next uk-slider-item="next"></a>

         </div>
         <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>
   </section>
   <!-- End Banner -->

   <!-- About -->

   <section id="about" class="about uk-margin-large-top">
      <div class="uk-container uk-container-small">
         <div class="about-body">
            <div class="row">
               <div class="col-md-6">
                  <div class="about-text uk-margin-small-left" uk-scrollspy="cls: uk-animation-slide-left; delay: 300;">
                     <h2><strong>BS Spa ,Massage & Reflexology</strong></h2>
                     <p>
                        BSpa menyediakan jasa reservasi/booking panggilan massage/pijat/refleksi hanya untuk area Yogyakarta.
                        Kami memiliki tenaga terapis
                        yang profesional dan berpengalaman di bidang spa,refleksi,massage atau pijat.Kami berusaha memberikan pelayanan terbaik kami kepada customer dan member untuk kepuasan customer.
                     </p>

                     <p>
                        Mari Manjakan dirimu dengan berbagai treatment dari BS Spa, Massage & Reflexology. <strong>(Bebas Biaya Transportasi)</strong>
                     </p>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="about-img">
                     <img src="assets/images/img2.jpg" alt="">
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>

   <!-- Member -->
   <section id="member" class="member uk-margin-small-top ">
      <div class="member-body text-center">
         <div class="uk-background-muted uk-height-large uk-width-expand uk-text-center uk-margin-auto uk-margin-auto-vertical">
            <div class="uk-card uk-card-default uk-card-body uk-text-center uk-position-z-index" uk-sticky="end: !.uk-height-large; offset: 200" uk-scrollspy="cls: uk-animation-slide-top; delay: 300; repeat: true">
               <h2>Wanna be our member?</h2>
               <a role="button" class="btn btn-primary" href="<?= base_url('login'); ?>">Join Us</a>
            </div>
         </div>
      </div>
   </section>

   <section id="services" class="services uk-margin-medium-top uk-margin-large-bottom">
      <div class="uk-container uk-container-medium">
         <div class="section-title uk-margin-large-top">
            <h4 class="text-center"><strong>"MENGAPA HARUS BSPA MASSAGE"</strong></h4>
            <hr class="with-blue-underline">
         </div>
         <div class="uk-child-width-expand@s uk-text-center" uk-scrollspy="cls: uk-animation-slide-bottom; target: .uk-card-body; delay: 300;" uk-grid>
            <div>
               <div class="uk-card-body" uk-scrollspy-class="uk-animation-slide-left">
                  <div class="uk-card-media-top">
                     <img src="assets/images/icon3.png" width="100" height="100" alt="">
                  </div>
                  <h3 class="uk-card-title">Harga Terjangkau</h3>
                  <p>Harga yang kami tawarkan terjangkau dan bebas biaya transport.</p>
               </div>
            </div>
            <div>
               <div class="uk-card-body" uk-scrollspy-class="uk-animation-slide-top">
                  <div class="uk-card-media-top">
                     <img src="assets/images/icon1.png" width="100" height="100" alt="">
                  </div>
                  <h3 class="uk-card-title">Terapis Profesional</h3>
                  <p>Terapis kami baik pria dan wanita memiliki pengalaman, sertifikat,dan profesional.</p>
               </div>
            </div>
            <div>
               <div class="uk-card-body" uk-scrollspy-class="uk-animation-slide-right">
                  <div class="uk-card-media-top">
                     <img src="assets/images/icon2.png" width="100" height="100" alt="">
                  </div>
                  <h3 class="uk-card-title">Higienis</h3>
                  <p>Terapis kami dalam keadaan sehat dan menerapkan protokol kesehatan.</p>
               </div>
            </div>
         </div>
      </div>
   </section>

   <section id="promo" class="promo">
      <div class="uk-container-medium uk-padding-large " uk-scrollspy="cls: uk-animation-slide-top; delay: 300;">
         <div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s uk-margin" uk-grid>
            <div class="uk-card-media-left uk-cover-container">
               <img src="assets/images/promo1.png" alt="" uk-cover>
               <canvas width="600" height="600"></canvas>
            </div>
            <div>
               <div class="uk-card-body">
                  <h2 class="uk-card-title uk-text-center">Promo Diskon</h2>
                  <p class="uk-text-center">Diskon 20% untuk customer yang telah menjadi member pada proses booking. Harga yang diterima customer akan di potong sebanyak 20%.Jadi, mari bergabung menjadi member BSpa Massage untuk mendapatkan diskon dan masih akan ada promo lainnya.</p>
               </div>
            </div>
         </div>
      </div>
   </section>

   <!-- End Member -->

   <div id="offcanvas-overlay" uk-offcanvas="overlay: true">
      <div class="uk-offcanvas-bar">

         <button class="uk-offcanvas-close" type="button" uk-close></button>


         <img class="uk-border-circle" width="30" height="30" src="assets/images/faces/face1.jpg" alt="Avatar">

         <p>Steve Fox</p>
         <p>Layanan mudah dapat booking dengan menjadi member atau langsung lewat whatsapp sehingga untuk user yang tidak memahami cara menjadi member terbantu.</p>

         <img class="uk-border-circle" width="30" height="30" src="assets/images/faces/face2.jpg" alt="Avatar">

         <p>Asuka Kazama</p>
         <p>Pelayanan bagus,terapis sangat profesional dan higienis. Fleksibel karena saya tetap bisa relaksasi ditengah kesibukan saya</p>

         <img class="uk-border-circle" width="30" height="30" src="assets/images/faces/face3.jpg" alt="Avatar">
         <p>Bryan Fury</p>
         <p>Proses booking mudah, harga murah dan terjangkau sesuai dengan pelayanannya.</p>

      </div>
   </div>

   <!-- Whatsapp -->

   <a href="https://api.whatsapp.com/send?phone=628123456789" target="_blank" class="whatsapp-floating">
      <i class="fab fa-whatsapp"></i>
   </a>

   <!-- End Whatsapp -->


</main>


<?= $this->endSection() ?>