@extends("layouts.front.master")

@section('content')

    <!-- Banner/Breadcrumbs -->
    <div class="banner">
        <div class="container">
            <p class="breadcrumbs" data-lang="about"></p>
        </div>
    </div>

    <!-- Hero Section -->
    <div class="container py-5">
        <div class="row align-items-center hero-section">
            <div class="col-lg-5 mb-4 mb-lg-0">
                <div class="profile-image-container shadow">
                    <img src="{{ asset('assets/front') }}/images/1.jpeg"
                         alt="Major General Mokhtar Abdel Latif"
                         class="img-fluid rounded"
                         onerror="this.src='https://via.placeholder.com/400x500?text=Profile+Photo'">
                </div>
            </div>
             <div class="col-lg-7">
          <div class="card border-0 bg-transparent">
            <div class="card-body px-md-4 bg-transparent">
              <h1 class=" mb-0 fw-bold" data-lang="bioTitle">Major General Eng Mokhtar Abdel
                Latif</h1>
              <h1 class="display-4 mt-0 mb-2 fw-bold" data-lang="bioTitle1">Major General Eng Mokhtar Abdel
                Latif</h1>
              <h3 class=" mb-2" data-lang="chairmanTitle">Chairman of the Arab Organization for
                Industrialization</h3>
              <p class="lead" data-lang="bioIntro">
                Major General Mokhtar Abdel Latif assumed the position of Chairman of the Arab Organization for
                Industrialization, succeeding General Abdel Moneim El-Terras in 2022.
              </p>
              <!-- <div class="d-flex mt-4">
                <div class="me-3">
                  <span class="badge p-2 rounded-pill"><i class="fas fa-star me-1"></i> <span
                      data-lang="leadership">Leadership</span></span>
                </div>
                <div class="me-3">
                  <span class="badge p-2 rounded-pill"><i class="fas fa-gear me-1"></i> <span
                      data-lang="engineering">Engineering</span></span>
                </div>
                <div class="me-3">
                  <span class="badge p-2 rounded-pill"><i class="fas fa-shield-alt me-1"></i> <span
                      data-lang="military">Military</span></span>
                </div>
              </div> -->
            </div>
          </div>
        </div>
        </div>
    </div>

    <!-- Biography Sections -->
    <div class="container pb-5">
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card h-100 shadow hover-card border-0">
                    <div class="card-body border-color-white">
                        <div class="d-flex align-items-center mb-3 gap-3">
                            <i class="fas fa-graduation-cap fs-3"></i>
                            <h3 class="card-title text-secondary mb-0" data-lang="militaryEduTitle">Military Education</h3>
                        </div>
                        <p data-lang="militaryEduDesc">
                            He received military education in Egypt and graduated from the Military Technical College with a
                            specialization in Chemical and Nuclear Engineering (Class 14 and Military Class 66).
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card h-100 shadow hover-card border-0">
                    <div class="card-body border-color-white">
                        <div class="d-flex align-items-center mb-3 gap-3">
                            <i class="fas fa-medal fs-3"></i>
                            <h3 class="card-title text-secondary mb-0" data-lang="medalsTitle">Medals and Decorations</h3>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <ul class="list-group list-group-flush medal-list">
                                    <li class="list-group-item border-0 d-flex align-items-center px-0" data-lang="medal1">
                                        <i class="fas fa-award text-warning me-2"></i> Long Service and Good Conduct Medal
                                    </li>
                                    <li class="list-group-item border-0 d-flex align-items-center px-0" data-lang="medal2">
                                        <i class="fas fa-award text-warning me-2"></i> Silver Jubilee Medal for the Liberation of Sinai
                                    </li>
                                    <li class="list-group-item border-0 d-flex align-items-center px-0" data-lang="medal3">
                                        <i class="fas fa-award text-warning me-2"></i> Silver Jubilee Medal for the October 1973 Victory
                                    </li>
                                </ul>

                                <div class="collapse" id="moreMedals">
                                    <ul class="list-group list-group-flush medal-list">
                                        <li class="list-group-item border-0 d-flex align-items-center px-0" data-lang="medal4">
                                            <i class="fas fa-award text-warning me-2"></i> 50th Anniversary Medal for the July 23, 1952 Revolution
                                        </li>
                                        <li class="list-group-item border-0 d-flex align-items-center px-0" data-lang="medal5">
                                            <i class="fas fa-award text-warning me-2"></i> January 25 Revolution Medal
                                        </li>
                                        <li class="list-group-item border-0 d-flex align-items-center px-0" data-lang="medal6">
                                            <i class="fas fa-award text-warning me-2"></i> June 30, 2013 Medal
                                        </li>
                                        <li class="list-group-item border-0 d-flex align-items-center px-0" data-lang="medal7">
                                            <i class="fas fa-award text-warning me-2"></i> Second Class Military Duty Decoration
                                        </li>
                                        <li class="list-group-item border-0 d-flex align-items-center px-0" data-lang="medal8">
                                            <i class="fas fa-award text-warning me-2"></i> Excellent Service Decoration
                                        </li>
                                        <li class="list-group-item border-0 d-flex align-items-center px-0" data-lang="medal9">
                                            <i class="fas fa-award text-warning me-2"></i> Order of the Republic – Second Class
                                        </li>
                                    </ul>
                                </div>

                                <button class="btn btn-link px-0 show-more-btn" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#moreMedals" aria-expanded="false" aria-controls="moreMedals">
                                    <span class="btn-text" data-lang="showMore">Show More</span>
                                    <i class="fas fa-chevron-down arrow-icon"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Positions Timeline -->
        <div class="card shadow mb-4 hover-card border-0">
            <div class="card-body">
                <div class="d-flex align-items-center mb-4 gap-3">
                    <i class="fas fa-briefcase fs-3"></i>
                    <h3 class="card-title text-secondary mb-0" data-lang="positionsHeldTitle">Positions Held</h3>
                </div>

                <div class="timeline">
                    <div class="timeline-item">
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <h4 class="position-title" data-lang="pos9">Chairman of the Arab Organization for Industrialization</h4>
                            <p class="text-muted">2022 - Present</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <h4 class="position-title" data-lang="pos8">Chairman of Al-Nasr Company for Intermediate Chemicals</h4>
                            <p class="text-muted">2020 - 2022</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <h4 class="position-title" data-lang="pos7">Director of Production Department at Al-Nasr Company</h4>
                            <p class="text-muted">2018 - 2020</p>
                        </div>
                    </div>

                    <div class="collapse" id="morePositions">
                        <div class="timeline-item">
                            <div class="timeline-marker"></div>
                            <div class="timeline-content">
                                <h4 class="position-title" data-lang="pos6">General Manager of Al-Nasr Company for Bottling Natural Water (Safi)</h4>
                                <p class="text-muted">2015 - 2018</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-marker"></div>
                            <div class="timeline-content">
                                <h4 class="position-title" data-lang="pos5">General Manager of the National Company for Intermediate Chemicals</h4>
                                <p class="text-muted">2012 - 2015</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-marker"></div>
                            <div class="timeline-content">
                                <h4 class="position-title" data-lang="pos4">Director of Safi Natural Water Factory in Siwa</h4>
                                <p class="text-muted">2010 - 2012</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-marker"></div>
                            <div class="timeline-content">
                                <h4 class="position-title" data-lang="pos3">Commander of the 1st Chemical Warfare Group</h4>
                                <p class="text-muted">2008 - 2010</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-marker"></div>
                            <div class="timeline-content">
                                <h4 class="position-title" data-lang="pos2">Commander of the 7th Missile Regiment</h4>
                                <p class="text-muted">2005 - 2008</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-marker"></div>
                            <div class="timeline-content">
                                <h4 class="position-title" data-lang="pos1">Head of the Chemical Warfare Training Branch</h4>
                                <p class="text-muted">2000 - 2005</p>
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-link show-more-btn" type="button" data-bs-toggle="collapse"
                            data-bs-target="#morePositions" aria-expanded="false" aria-controls="morePositions">
                        <span class="btn-text" data-lang="showMore">Show More</span>
                        <i class="fas fa-chevron-down arrow-icon"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

@endsection
