 <!-- Start Bootstrap Header -->
 <header class=" py-3">
    <nav class="navbar navbar-expand-lg navbar-light container">
      <!-- Logo -->
      <a class="" href="{{ route('home') }}">
        <img  src="{{ asset('assets/front/images/3.png') }}" width="80" alt="Logo">
      </a>

      <!-- Toggler button for mobile view -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
        aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Navbar links and utilities -->
      <div class="collapse navbar-collapse" id="mainNavbar">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 mainNav ">
          <li class="">
            <a class=" headLinks" href="index.html" data-lang="home"></a>
          </li>
          <li class="">
            <a class=" headLinks" href="videos.html" data-lang="videos"></a>
          </li>
          <li class="">
            <a class=" headLinks" href="about.html" data-lang="about"></a>
          </li>
        </ul>

        <!-- Right Side Buttons - Moved inside mobile menu -->
        <div class="toggle-btn">
          <!-- Dark Mode Toggle -->
          <div class="darkModeButton">
            <input type="checkbox" class="checkbox" id="chk" />
            <label class="label" for="chk">
              <i class="fas fa-moon moon"></i>
              <i class="fas fa-sun sun"></i>
              <div class="ball"></div>
            </label>
          </div>

          <!-- Language Switcher -->
          <div class="laguagesButton">
            <div class="inner1">
              <input type="checkbox" class="checkboxlang" id="chklang" aria-label="Toggle language between English and Arabic" />
              <label class="labellang" for="chklang">
                <span>Ar</span>
                <span>En</span>
                <!-- <img src="images/gb.svg" alt="English" class="gbFlag" />
                <img src="images/eg.svg" alt="Arabic" class="egFlag" /> -->
                <div class="balllang"></div>
              </label>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </header>
  <!-- End Bootstrap Header -->
