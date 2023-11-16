<!-- header -->
<div class="top-header-area" id="sticker">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-sm-12 text-center">
        <div class="main-menu-wrap">
          <!-- logo -->
          <div class="site-logo">
            <a href="{{ route('home') }}">
              <h2 style="color: white;">FruitStore</h2>
            </a>
          </div>
          <!-- logo -->

          <!-- menu start -->
          <nav class="main-menu">
            <ul>
              <li><a href="{{ route('home') }}">Home</a></li>
              <li><a href="{{ route('shop') }}">Shop</a></li>
              <li><a href="{{ route('about') }}">About</a></li>
              <li>
                <div class="header-icons">
                  @if ($status == 'login')
                  <a class="shopping-cart" href="{{ route("cart.index") }}"><i class="fas fa-shopping-cart"></i></a>
                  <a class="shopping-cart" href="{{ route("user") }}"><i class="fas fa-user"></i></a>
                  <a class="shopping-cart" href="{{ route("logout") }}"><i class="fas fa-right-from-bracket"></i></a>
                  @else
                  <a class="shopping-cart" href="{{ route("login.form") }}" style="color: white;"><i class="fas fa-right-to-bracket"></i></a>
                  @endif
                  ?>
                </div>
              </li>
            </ul>
          </nav>
          <div class="mobile-menu"></div>
          <!-- menu end -->
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end header -->