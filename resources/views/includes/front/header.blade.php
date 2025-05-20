<!-- Start Bootstrap Header -->
<header class=" py-3">
    <nav class="navbar navbar-expand-lg navbar-light container">
      <!-- Logo -->
      <a class="navbar-brand" href="">
        <img src="{{ asset('assets/front') }}/images/3.png" width="80" alt="Logo">
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
            <a class=" headLinks" href="{{ route('home') }}" data-lang="home"></a>
          </li>
          <li class="">
            <!-- <a class=" headLinks" href="details.html" data-lang="news"></a> -->
          </li>
          <li class="">
            <a class=" headLinks" href="{{ route('about') }}" data-lang="about"></a>
          </li>
        </ul>

        <!-- Right Side Buttons -->
        <div class="d-flex align-items-center">
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
          <div class="laguagesButton ms-5" >
            <div class="inner1">

            <input type="checkbox" class="checkboxlang" id="chklang" />
            <label class="labellang" for="chklang">
                <img src="{{ asset('assets/front') }}/images/eg.svg" alt="Egypt Flag" class="egFlag" />
                <img src="{{ asset('assets/front') }}/images/gb.svg" alt="United Kingdom Flag" class="gbFlag" />
                <div class="balllang"></div>
            </label>
            </div>
           </div>
        </div>
      </div>
    </nav>
  </header>
  <!-- End Bootstrap Header -->
