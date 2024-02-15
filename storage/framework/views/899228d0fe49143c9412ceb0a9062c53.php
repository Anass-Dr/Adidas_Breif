<nav class="navbar navbar-expand-lg navbar-light main_box">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <a class="navbar-brand logo_h" href="../back/index.blade.php"><img src="front/assets/img/logo.png" alt=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
      <ul class="nav navbar-nav menu_nav ml-auto">
        <li class="nav-item active"><a class="nav-link" href="/">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="/store">Store</a></li>
        <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>

        <?php if(session('user_id')): ?>
          <li class="nav-item"><a class="nav-link" href="/logout">Logout</a></li>
        <?php else: ?>
          <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
          <li class="nav-item"><a class="nav-link" href="/register">Register</a></li>
        <?php endif; ?>

      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="nav-item"><a href="#" class="cart"><span class="ti-bag"></span></a></li>
        <li class="nav-item">
          <button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
        </li>
      </ul>
    </div>
  </div>
</nav><?php /**PATH C:\Users\Youcode\Documents\PHP_PROJECTS\adidas\resources\views/layouts/front/nav.blade.php ENDPATH**/ ?>