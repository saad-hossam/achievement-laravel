@extends('layouts.front.master')

@section('content')
<style>

  </style>

  <!-- Fix for any navigation buttons with hidden class -->
  <script>
    // This script runs immediately to ensure navigation buttons are visible
    document.addEventListener('DOMContentLoaded', function() {
      // Function to check and fix navigation buttons
      function fixNavigationButtons() {
        // Fix video slider buttons
        const videoNavButtons = document.querySelectorAll('.video-nav-btn');
        videoNavButtons.forEach(button => {
          // Remove hidden class and explicitly set styles
          button.classList.remove('hidden');
          button.style.opacity = "1";
          button.style.visibility = "visible";
        });

        console.log("Fixed navigation buttons visibility");
      }

      // Run immediately
      fixNavigationButtons();

      // And also run after a small delay to catch any buttons added later
      setTimeout(fixNavigationButtons, 500);
    });
  </script>
  <!--Start Header-->


  <main>
    <!-- Banner/Breadcrumbs -->
    <div class="banner">
      <div class="container">
        <p class="breadcrumbs" data-lang="gallary">Gallery</p>
      </div>
    </div>

    <!--Start Details Content-->
    <div id="details-content" style="padding-top:40px;">
      <div class="container">
        <h2 class="mainTitle" data-lang="gallary"></h2>

        <!-- Content Filter Bar -->
        <div class="content-filter-bar">
          <button class="filter-btn active" data-filter="all" data-i18n="show_all">Show All</button>
          <button class="filter-btn" data-filter="images" data-i18n="images">Images</button>
          <button class="filter-btn" data-filter="videos" data-i18n="videos_filter">Videos</button>
          <button class="filter-btn" data-filter="news" data-i18n="news_filter">News</button>
          <button class="filter-btn" data-filter="description" data-i18n="description">Description</button>
        </div>

        <div class="details-layout">
          <!-- Image Slider Column -->
          <div class="slider-column" data-content-type="images">
            <div class="slider">
            <!-- Main Image -->
              <div class="main-image-container" id="mainImageContainer">
              <img id="mainImage"  src="{{asset('assets/front/images')}}/news/1.jpg" alt="Main Image" class="main-image">
            </div>

            <!-- Thumbnail Images -->
            <div class="thumbnail-container">
                <button class="slider-nav slider-prev" aria-label="Previous thumbnails">
                  <i class="fas fa-chevron-left rtl-flip"></i>
                </button>
                <div class="thumbnails-wrapper">
              <img  src="{{asset('assets/front/images')}}/news/1.jpg" alt="Thumbnail 1" class="thumbnail" onclick="changeImage('images/news/1.jpg')">
              <img  src="{{asset('assets/front/images')}}/news/2.jpg" alt="Thumbnail 2" class="thumbnail" onclick="changeImage('images/news/2.jpg')">
              <img  src="{{asset('assets/front/images')}}/news/3.jpg" alt="Thumbnail 3" class="thumbnail" onclick="changeImage('images/news/3.jpg')">
              <img  src="{{asset('assets/front/images')}}/news/4.jpg" alt="Thumbnail 4" class="thumbnail" onclick="changeImage('images/news/4.jpg')">
                  <img  src="{{asset('assets/front/images')}}/news/5.jpg" alt="Thumbnail 5" class="thumbnail" onclick="changeImage('images/news/5.jpg')">
                  <img  src="{{asset('assets/front/images')}}/news/6.jpg" alt="Thumbnail 6" class="thumbnail" onclick="changeImage('images/news/6.jpg')">
                  <img  src="{{asset('assets/front/images')}}/news/7.jpg" alt="Thumbnail 7" class="thumbnail" onclick="changeImage('images/news/7.jpg')">
                  <img  src="{{asset('assets/front/images')}}/news/8.jpg" alt="Thumbnail 8" class="thumbnail" onclick="changeImage('images/news/8.jpg')">
                  <img  src="{{asset('assets/front/images')}}/news/9.jpg" alt="Thumbnail 9" class="thumbnail" onclick="changeImage('images/news/9.jpg')">
                  <img  src="{{asset('assets/front/images')}}/news/10.jpg" alt="Thumbnail 10" class="thumbnail" onclick="changeImage('images/news/10.jpg')">
                  <img  src="{{asset('assets/front/images')}}/news/11.jpg" alt="Thumbnail 11" class="thumbnail" onclick="changeImage('images/news/11.jpg')">
                  <img  src="{{asset('assets/front/images')}}/news/12.jpeg" alt="Thumbnail 12" class="thumbnail" onclick="changeImage('images/news/12.jpeg')">
            </div>
                <button class="slider-nav slider-next" aria-label="Next thumbnails">
                  <i class="fas fa-chevron-right rtl-flip"></i>
                </button>
          </div>

              <!-- Slide Indicators -->
              <div class="slide-indicators-container">
                <div class="slide-indicators image-indicators"></div>
        </div>
      </div>
    </div>

          <!-- Description Column -->
          <div class="description-column" data-content-type="description">
            <div class="image-description">
              <h3 class="description-title" data-i18n="about_achievement">About This Achievement</h3>
              <div class="description-content">
                <p data-i18n="achievement_desc_p1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus ducimus explicabo reiciendis officia! Provident illo quas voluptas hic repudiandae repellendus molestias dolorum! Quia consectetur fuga voluptate at ratione, beatae illum.</p>
                <p data-i18n="achievement_desc_p2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus ducimus explicabo reiciendis officia! Provident illo quas voluptas hic repudiandae repellendus molestias dolorum! Quia consectetur fuga voluptate at ratione, beatae illum.</p>
              </div>
              <div class="achievement-details">
                <div class="detail-item">
                  <span class="detail-label" data-i18n="date_label">Date:</span>
                  <span class="detail-value" data-i18n="achievement_date">March 15, 2023</span>
                </div>
                <div class="detail-item">
                  <span class="detail-label" data-i18n="location_label">Location:</span>
                  <span class="detail-value" data-i18n="achievement_location">Cairo, Egypt</span>
                </div>
                <div class="detail-item">
                  <span class="detail-label" data-i18n="category_label">Category:</span>
                  <span class="detail-value" data-i18n="achievement_category">Industrial Development</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Related Videos Section -->
    <div id="relatedVideosSection" data-content-type="videos">
      <div class="container">
        <h2 class="sectionTitle" data-lang="videos">Related Videos</h2>

        <!-- Main Video Player -->
        <div class="main-video-container">
          <div class="main-video-player">
            <iframe id="mainVideoPlayer" src="https://www.youtube.com/embed/VIDEO_ID_1" frameborder="0" allowfullscreen></iframe>
            <button class="fullscreen-btn" onclick="openVideoModal(document.getElementById('mainVideoPlayer').src)" title="Fullscreen" data-i18n-title="fullscreen">
              <i class="fas fa-expand"></i>
            </button>
                </div>
          <div class="main-video-info">
            <h3 id="mainVideoTitle" data-i18n="achievement_overview">Achievement Overview - Industrial Development Project</h3>
            <p id="mainVideoDescription">Watch this comprehensive overview of our industrial development achievement, highlighting key milestones and outcomes of this landmark project.</p>
                </div>
                </div>

        <!-- Video Thumbnails Slider -->
        <div class="video-slider-container">
          <button class="video-nav-btn video-prev-btn" aria-label="Previous videos">
            <i class="fas fa-chevron-left rtl-flip"></i>
          </button>

          <div class="video-slider-track-wrapper">
            <div class="video-slider-track">
              <!-- Video Card 1 -->
              <div class="video-card" data-video-id="VIDEO_ID_1" data-video-title="Achievement Overview - Industrial Development Project" data-video-desc="Watch this comprehensive overview of our industrial development achievement, highlighting key milestones and outcomes of this landmark project." onclick="playInMainPlayer(this)">
                <div class="video-thumbnail-box">
                  <img  src="{{asset('assets/front/images')}}/news/1.jpg" alt="Video Thumbnail" class="video-thumbnail">
                  <div class="play-button" title="Play Video" data-i18n-title="watch_video">
                    <i class="fas fa-play-circle"></i>
                </div>
                </div>
                <div class="video-title" data-i18n="achievement_overview">Achievement Overview - Industrial Development Project</div>
          </div>

              <!-- Video Card 2 -->
              <div class="video-card" data-video-id="VIDEO_ID_2" data-video-title="Interview with Project Lead Engineer" data-video-desc="Our lead engineer discusses the technical challenges and innovative solutions implemented throughout the development process." onclick="playInMainPlayer(this)">
                <div class="video-thumbnail-box">
                  <img  src="{{asset('assets/front/images')}}/news/2.jpg" alt="Video Thumbnail" class="video-thumbnail">
                  <div class="play-button" title="Play Video" data-i18n-title="watch_video">
                    <i class="fas fa-play-circle"></i>
          </div>
        </div>
                <div class="video-title" data-i18n="project_lead_interview">Interview with Project Lead Engineer</div>
      </div>

              <!-- Video Card 3 -->
              <div class="video-card" data-video-id="VIDEO_ID_3" data-video-title="Project Completion Ceremony Highlights" data-video-desc="Highlights from the official ceremony marking the successful completion of this groundbreaking industrial development initiative." onclick="playInMainPlayer(this)">
                <div class="video-thumbnail-box">
                  <img  src="{{asset('assets/front/images')}}/news/3.jpg" alt="Video Thumbnail" class="video-thumbnail">
                  <div class="play-button" title="Play Video" data-i18n-title="watch_video">
                    <i class="fas fa-play-circle"></i>
                  </div>
                </div>
                <div class="video-title" data-i18n="completion_ceremony">Project Completion Ceremony Highlights</div>
    </div>

              <!-- Video Card 4 -->
              <div class="video-card" data-video-id="VIDEO_ID_4" data-video-title="Behind the Scenes: Project Development" data-video-desc="Go behind the scenes to see how our team worked together to overcome challenges and achieve remarkable results." onclick="playInMainPlayer(this)">
                <div class="video-thumbnail-box">
                  <img  src="{{asset('assets/front/images')}}/news/4.jpg" alt="Video Thumbnail" class="video-thumbnail">
                  <div class="play-button" title="Play Video" data-i18n-title="watch_video">
                    <i class="fas fa-play-circle"></i>
                  </div>
                </div>
                <div class="video-title" data-i18n="behind_scenes">Behind the Scenes: Project Development</div>
              </div>

              <!-- Video Card 5 -->
              <div class="video-card" data-video-id="VIDEO_ID_5" data-video-title="Impact Analysis: Community Benefits" data-video-desc="Learn about the positive economic and social impacts this project has created for the surrounding communities and region." onclick="playInMainPlayer(this)">
                <div class="video-thumbnail-box">
                  <img  src="{{asset('assets/front/images')}}/news/5.jpg" alt="Video Thumbnail" class="video-thumbnail">
                  <div class="play-button" title="Play Video" data-i18n-title="watch_video">
                    <i class="fas fa-play-circle"></i>
                  </div>
                </div>
                <div class="video-title" data-i18n="impact_analysis">Impact Analysis: Community Benefits</div>
              </div>
            </div>
          </div>

          <button class="video-nav-btn video-next-btn" aria-label="Next videos">
            <i class="fas fa-chevron-right rtl-flip"></i>
          </button>

          <!-- Video Slide Indicators -->
          <div class="slide-indicators-container">
            <div class="slide-indicators video-indicators"></div>
          </div>
        </div>
      </div>
    </div>

    <!-- Video Modal -->
    <div id="videoModal" class="video-modal">
      <div class="video-modal-content">
        <span class="video-modal-close" onclick="closeVideoModal()" title="Close" data-i18n-title="close">&times;</span>
        <div class="video-container">
          <iframe id="videoFrame" src="" frameborder="0" allowfullscreen></iframe>
        </div>
      </div>
    </div>

    <div id="newsLinksSection" data-content-type="news">
      <h2 class="sectionTitle" data-lang="news">Latest News</h2>
      <ul class="newsLinks">
        <li><a href="#"><i class="fas fa-newspaper icon news-icon"></i> <span data-i18n="news_item_1">New development in tech industry</span></a></li>
        <li><a href="#"><i class="fas fa-newspaper icon news-icon"></i> <span data-i18n="news_item_2">Economy shows signs of recovery</span></a></li>
        <li><a href="#"><i class="fas fa-newspaper icon news-icon"></i> <span data-i18n="news_item_3">New policies announced today</span></a></li>
        <li><a href="#"><i class="fas fa-newspaper icon news-icon"></i> <span data-i18n="news_item_4">Sports team wins championship</span></a></li>
        <li><a href="#"><i class="fas fa-newspaper icon news-icon"></i> <span data-i18n="news_item_5">Upcoming cultural events</span></a></li>
      </ul>
    </div>


  </main>

  <div class="scrollToTop"><i class="fa-solid fa-arrow-up"></i></div>

  <!-- Fullscreen Image Overlay -->
  <div id="fullscreenOverlay" class="fullscreen-overlay">
    <div class="overlay-header">
      <button class="overlay-close" onclick="closeFullscreenOverlay()">&times;</button>
    </div>
    <div class="overlay-content">
      <button class="overlay-nav prev-btn" onclick="changeOverlayImage(-1)">
        <i class="fas fa-chevron-left rtl-flip"></i>
      </button>
      <div class="overlay-image-container">
        <img id="overlayImage" src="" alt="Fullscreen Image">
      </div>
      <button class="overlay-nav next-btn" onclick="changeOverlayImage(1)">
        <i class="fas fa-chevron-right rtl-flip"></i>
      </button>
    </div>
    <div class="overlay-footer">
      <span id="currentImageIndex">1</span> / <span id="totalImages">12</span>
    </div>
  </div>

  <!-- Test button (temporarily for debugging) -->
  <!-- <button id="testOverlayBtn" style="position: fixed; bottom: 70px; right: 20px; z-index: 9999; padding: 10px 20px; background: #ff0000; color: white; border: none; border-radius: 5px; cursor: pointer; font-weight: bold; box-shadow: 0 4px 8px rgba(0,0,0,0.3);">Click to Test Overlay</button> -->





@endsection
