<!-- header -->
<header id="header" class="header">
  <nav class="uk-navbar-container">
    <div class="uk-container">
      <div uk-navbar>
        <div class="uk-navbar-center">
          <div class="uk-navbar-center-left">
            <ul class="uk-navbar-nav">
              <li class="uk-active"><a href="#">Home</a></li>
              <li><a href="#banner">Layanan</a></li>
            </ul>
          </div>
          <a class="uk-navbar-item uk-logo" href="<?= base_url('home'); ?>"><img src="assets/images/logo1.png" height="30" width="70" alt=""></a>
          <div class="uk-navbar-center-right">
            <ul class="uk-navbar-nav">
              <li><a href="#about">Tentang Kami</a></li>
              <li><a href="#member">Member</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </nav>

  <!-- Navbar Toggle -->
  <div class="uk-navbar-toggle uk-flex-right uk-margin-large-right uk-hidden@m" uk-toggle="target: #navbar-toggle">
    <span uk-navbar-toggle-icon></span>
  </div>

  <!-- Navbar Toggle Content -->
  <div id="navbar-toggle" uk-offcanvas="flip: true; overlay: true">
    <div class="uk-offcanvas-bar">
      <button class="uk-offcanvas-close" type="button" uk-close></button>
      <ul class="uk-nav uk-nav-default">
        <li class="uk-active"><a href="#">Home</a></li>
        <li><a href="#banner">Layanan</a></li>
        <li><a href="#about">Tentang Kami</a></li>
        <li><a href="#member">Member</a></li>
      </ul>
    </div>
  </div>
</header>
<!-- end banner -->