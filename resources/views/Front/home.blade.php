@extends("layouts.front.master")

@section('content')


   <!--Start Landing-->
   <div class="landing">
    <div class="container">
      <div class="text">
        <h3 id="" data-lang="landingTitle1"></h3>
        <h1 id="landing-title" data-lang="landingTitle2"></h1>
        <p id="landing-paragraph" data-lang="landingParagraph"></p>
      </div>
      <div class="photo">
        <img src="{{ asset('assets/front') }}/images/1.jpeg" alt="landing-image" />
      </div>
    </div>
    <a href="#articles">
      <i class="fas fa-angle-double-down fa-2x"></i>
    </a>
  </div>

  <!--End Landing-->

  <!-- Start Articles -->
  <div id="articles" style="margin:20px;">
    <h2 class="mainTitle" data-i18n="latestArticles">Latest Articles</h2>


    <!-- Search Container Start -->
    <div class="search-container">
      <div class="search-box" role="search">
        <label for="search-input" class="sr-only">Search events</label>
        <input type="text" id="search-input" placeholder="Search achievements..." data-i18n-placeholder="search_placeholder" aria-label="Search achievements">
        <button id="voice-search" aria-label="Search by voice" tabindex="0"><i class="fas fa-microphone" aria-hidden="true"></i></button>
      </div>
    </div>
    <!-- Search Container End -->

    <!-- Filter Start -->
    <section class="filter-section" aria-label="Event Filters">
      <div class="filter-container">
        <div class="filter-group">
          <!-- <label for="category-filter">Category:</label> -->
          <select id="category-filter" class="category-filter">
            <option value="" data-lang="allCategories">All Categories</option>
            <option value="military" data-lang="military">Military</option>
            <option value="defense" data-lang="defense">Defense</option>
            <option value="industry" data-lang="industry">Industry</option>
            <option value="technology" data-lang="technology">Technology</option>
            <option value="international" data-lang="international">International Relations</option>
            <option value="development" data-lang="development">Development</option>
            <option value="security" data-lang="security">Security</option>
            <option value="leadership" data-lang="leadership">Leadership</option>
          </select>
        </div>
        <!-- <div class="filter-group">
          <label for="location-filter">Location:</label>
          <select id="location-filter" aria-label="Filter by location">
            <option value="">All Locations</option>
          </select>
        </div> -->
        <div class="filter-group date-filter">
          <label for="date-range" data-lang="dateRange">Date Range:</label>
          <div class="date-picker-container">
            <!-- The date range picker will be initialized by JavaScript -->
          </div>
          <input type="hidden" id="start-date">
          <input type="hidden" id="end-date">
        </div>
        <div class="filter-group">
          <!-- <label for="sort-by">Sort By:</label> -->
          <select id="sort-by" class="sort-filter" aria-label="Sort events">
            <option value="date-desc" selected data-lang="dateNewest">Date (Newest First)</option>
            <option value="date-asc" data-lang="dateOldest">Date (Oldest First)</option>
            <option value="title-asc" data-lang="titleAZ">Title (A-Z)</option>
            <option value="title-desc" data-lang="titleZA">Title (Z-A)</option>
          </select>
        </div>
        <button class="clear-filters-btn" id="clear-filters" disabled aria-label="Clear all filters" tabindex="0">
          <i class="fas fa-times" aria-hidden="true"></i> <span data-lang="clearFilters">Clear All Filters</span>
        </button>
      </div>
    </section>
    <!-- Filter End -->

    <!-- Article Counter -->
    <div class="article-counter-container">
      <div class="article-counter">
        <i class="fas fa-filter" aria-hidden="true"></i>
        <strong id="article-count">18</strong>
        <span data-lang="eventsFound">Events Found</span>
      </div>
    </div>
    <!-- Article Counter End -->

    <div class="container">
      <!-- Article 1 -->
      <div class="box" data-category="military" data-title="Exploring the Desert" data-date="2023-12-10">
        <div class="coverPhoto">
          <img src="{{ asset('assets/front') }}/images/news/1.jpg" alt="Desert" />
        </div>
        <div class="cardText">
          <small class="article-date">2023-12-10</small>
          <h3 data-i18n="article1Title">Exploring the Desert</h3>
          <p data-i18n="article1Desc">Discover the secrets of the world's most arid regions and how life adapts to
            survive.</p>
        </div>
        <div class="cardFooter">
          <a href="{{route('services')}}" data-i18n="readMore">Read More</a>
        </div>
      </div>

      <!-- Article 2 -->
      <div class="box" data-category="defense" data-title="Cat Behavior Explained" data-date="2024-01-05">
        <div class="coverPhoto">
          <img src="{{ asset('assets/front') }}/images/news/2.jpg" alt="Desert" />
        </div>
        <div class="cardText">
          <small class="article-date">2024-01-05</small>
          <h3 data-i18n="article2Title">Cat Behavior Explained</h3>
          <p data-i18n="article2Desc">Understand your feline friend better by learning the reasons behind common
            behaviors.</p>
        </div>
        <div class="cardFooter">
          <a href="{{route('services')}}" data-i18n="readMore">Read More</a>
        </div>
      </div>

      <!-- Article 3 -->
      <div class="box" data-category="military" data-title="Ocean Depths Revealed" data-date="2024-02-14">
        <div class="coverPhoto">
          <img src="{{ asset('assets/front') }}/images/news/3.jpg" alt="Desert" />
        </div>
        <div class="cardText">
          <small class="article-date">2024-02-14</small>
          <h3 data-i18n="article3Title">Ocean Depths Revealed</h3>
          <p data-i18n="article3Desc">Dive into the unknown as we explore the hidden wonders of the ocean floor.</p>
        </div>
        <div class="cardFooter">
          <a href="{{route('services')}}" data-i18n="readMore">Read More</a>
        </div>
      </div>

      <!-- Article 4 -->
      <div class="box" data-category="technology" data-title="The Art of Night Photography" data-date="2024-03-02">
        <div class="coverPhoto">
          <img src="{{ asset('assets/front') }}/images/news/4.jpg" alt="Desert" />
        </div>
        <div class="cardText">
          <small class="article-date">2024-03-02</small>
          <h3 data-i18n="article4Title">The Art of Night Photography</h3>
          <p data-i18n="article4Desc">Learn how to capture stunning images in the dark using simple settings.</p>
        </div>
        <div class="cardFooter">
          <a href="{{route('services')}}" data-i18n="readMore">Read More</a>
        </div>
      </div>

      <!-- Article 5 -->
      <div class="box" data-category="international" data-title="Journey in the Alps" data-date="2024-03-15">
        <div class="coverPhoto">
          <img src="{{ asset('assets/front') }}/images/news/5.jpg" alt="Desert" />
        </div>
        <div class="cardText">
          <small class="article-date">2024-03-15</small>
          <h3 data-i18n="article5Title">Journey in the Alps</h3>
          <p data-i18n="article5Desc">Enjoy the breathtaking beauty of the snow-covered mountain peaks.</p>
        </div>
        <div class="cardFooter">
          <a href="{{route('services')}}" data-i18n="readMore">Read More</a>
        </div>
      </div>

      <!-- Article 6 -->
      <div class="box" data-category="technology" data-title="Future Technology" data-date="2024-04-01">
        <div class="coverPhoto">
          <img src="{{ asset('assets/front') }}/images/news/6.jpg" alt="Desert" />
        </div>
        <div class="cardText">
          <small class="article-date">2024-04-01</small>
          <h3 data-i18n="article6Title">Future Technology</h3>
          <p data-i18n="article6Desc">Learn about the latest innovations that will change our lives in the coming
            years.</p>
        </div>
        <div class="cardFooter">
          <a href="{{route('services')}}" data-i18n="readMore">Read More</a>
        </div>
      </div>

      <!-- Article 7 -->
      <div class="box" data-category="security" data-title="Life in the Arctic" data-date="2024-04-18">
        <div class="coverPhoto">
          <img src="{{ asset('assets/front') }}/images/news/7.jpg" alt="Desert" />
        </div>
        <div class="cardText">
          <small class="article-date">2024-04-18</small>
          <h3 data-i18n="article7Title">Life in the Arctic</h3>
          <p data-i18n="article7Desc">Discover how animals and humans survive in the harshest environment on Earth.
          </p>
        </div>
        <div class="cardFooter">
          <a href="{{route('services')}}" data-i18n="readMore">Read More</a>
        </div>
      </div>

      <!-- Article 8 -->
      <div class="box" data-category="development" data-title="Beginner's Guide to Farming" data-date="2024-05-01">
        <div class="coverPhoto">
          <img src="{{ asset('assets/front') }}/images/news/8.jpg" alt="Desert" />
        </div>
        <div class="cardText">
          <small class="article-date">2024-05-01</small>
          <h3 data-i18n="article8Title">Beginner's Guide to Farming</h3>
          <p data-i18n="article8Desc">Start your own home farming journey and learn the best practices for success.
          </p>
        </div>
        <div class="cardFooter">
          <a href="{{route('services')}}" data-i18n="readMore">Read More</a>
        </div>
      </div>

      <!-- Article 9 -->
      <div class="box" data-category="industry" data-title="Rainforests: Nature's Treasures" data-date="2024-05-10">
        <div class="coverPhoto">
          <img src="{{ asset('assets/front') }}/images/news/9.jpg" alt="Desert" />
        </div>
        <div class="cardText">
          <small class="article-date">2024-05-10</small>
          <h3 data-i18n="article9Title">Rainforests: Nature's Treasures</h3>
          <p data-i18n="article9Desc">Learn about the incredible biodiversity of rainforests and their importance.</p>
        </div>
        <div class="cardFooter">
          <a href="{{route('services')}}" data-i18n="readMore">Read More</a>
        </div>
      </div>

      <!-- Article 10 -->
      <div class="box" data-category="technology" data-title="Astronomy for Beginners" data-date="2024-05-20">
        <div class="coverPhoto">
          <img src="{{ asset('assets/front') }}/images/news/10.jpg" alt="Desert" />
        </div>
        <div class="cardText">
          <small class="article-date">2024-05-20</small>
          <h3 data-i18n="article10Title">Astronomy for Beginners</h3>
          <p data-i18n="article10Desc">Start your journey into astronomy and learn about planets, stars, and galaxies.
          </p>
        </div>
        <div class="cardFooter">
          <a href="{{route('services')}}" data-i18n="readMore">Read More</a>
        </div>
      </div>

      <!-- Article 11 -->
      <div class="box" data-category="development" data-title="How to Care for Your Houseplants"
        data-date="2024-06-01">
        <div class="coverPhoto">
          <img src="{{ asset('assets/front') }}/images/news/11.jpg" alt="Desert" />
        </div>
        <div class="cardText">
          <small class="article-date">2024-06-01</small>
          <h3 data-i18n="article11Title">How to Care for Your Houseplants</h3>
          <p data-i18n="article11Desc">Your daily guide to keeping your plants healthy throughout the seasons.</p>
        </div>
        <div class="cardFooter">
          <a href="{{route('services')}}" data-i18n="readMore">Read More</a>
        </div>
      </div>

      <!-- Article 12 -->
      <div class="box" data-category="technology" data-title="Artificial Intelligence in Our Lives"
        data-date="2024-06-15">
        <div class="coverPhoto">
          <img src="{{ asset('assets/front') }}/images/news/12.jpeg" alt="Desert" />
        </div>
        <div class="cardText">
          <small class="article-date">2024-06-15</small>
          <h3 data-i18n="article12Title">Artificial Intelligence in Our Lives</h3>
          <p data-i18n="article12Desc">How AI is changing the way we work, communicate, and learn.</p>
        </div>
        <div class="cardFooter">
          <a href="{{route('services')}}" data-i18n="readMore">Read More</a>
        </div>
      </div>

      <!-- Article 13 -->
      <div class="box" data-category="international" data-title="The Smart Traveler's Guide" data-date="2024-07-01">
        <div class="coverPhoto">
          <img src="{{ asset('assets/front') }}/images/news/13.jpg" alt="Desert" />
        </div>
        <div class="cardText">
          <small class="article-date">2024-07-01</small>
          <h3 data-i18n="article13Title">The Smart Traveler's Guide</h3>
          <p data-i18n="article13Desc">Smart tips for traveling on a budget while having an unforgettable experience.
          </p>
        </div>
        <div class="cardFooter">
          <a href="{{route('services')}}" data-i18n="readMore">Read More</a>
        </div>
      </div>

      <!-- Article 14 -->
      <div class="box" data-category="leadership" data-title="World Cuisine: A Culinary Journey"
        data-date="2024-07-12">
        <div class="coverPhoto">
          <img src="{{ asset('assets/front') }}/images/news/14.jpg" alt="Desert" />
        </div>
        <div class="cardText">
          <small class="article-date">2024-07-12</small>
          <h3 data-i18n="article14Title">World Cuisine: A Culinary Journey</h3>
          <p data-i18n="article14Desc">Explore famous dishes from different cultures around the world.</p>
        </div>
        <div class="cardFooter">
          <a href="{{route('services')}}" data-i18n="readMore">Read More</a>
        </div>
      </div>

      <!-- Article 15 -->
      <div class="box" data-category="leadership" data-title="World Cuisine: A Culinary Journey"
        data-date="2024-07-12">
        <div class="coverPhoto">
          <img src="{{ asset('assets/front') }}/images/news/15.jpg" alt="Desert" />
        </div>
        <div class="cardText">
          <small class="article-date">2024-07-12</small>
          <h3 data-i18n="article15Title">World Cuisine: A Culinary Journey</h3>
          <p data-i18n="article15Desc">Explore famous dishes from different cultures around the world.</p>
        </div>
        <div class="cardFooter">
          <a href="{{route('services')}}" data-i18n="readMore">Read More</a>
        </div>
      </div>

      <!-- Article 16 -->
      <div class="box" data-category="leadership" data-title="World Cuisine: A Culinary Journey"
        data-date="2024-07-12">
        <div class="coverPhoto">
          <img src="{{ asset('assets/front') }}/images/news/16.jpeg" alt="Desert" />
        </div>
        <div class="cardText">
          <small class="article-date">2024-07-12</small>
          <h3 data-i18n="article16Title">World Cuisine: A Culinary Journey</h3>
          <p data-i18n="article16Desc">Explore famous dishes from different cultures around the world.</p>
        </div>
        <div class="cardFooter">
          <a href="{{route('services')}}" data-i18n="readMore">Read More</a>
        </div>
      </div>

      <!-- Article 17 -->
      <div class="box" data-category="leadership" data-title="World Cuisine: A Culinary Journey"
        data-date="2024-07-12">
        <div class="coverPhoto">
          <img src="{{ asset('assets/front') }}/images/news/17.jpg" alt="Desert" />
        </div>
        <div class="cardText">
          <small class="article-date">2024-07-12</small>
          <h3 data-i18n="article17Title">World Cuisine: A Culinary Journey</h3>
          <p data-i18n="article17Desc">Explore famous dishes from different cultures around the world.</p>
        </div>
        <div class="cardFooter">
          <a href="{{route('services')}}" data-i18n="readMore">Read More</a>
        </div>
      </div>

      <!-- Article 18 -->
      <div class="box" data-category="leadership" data-title="World Cuisine: A Culinary Journey"
        data-date="2024-07-12">
        <div class="coverPhoto">
          <img src="{{ asset('assets/front') }}/images/news/18.jpg" alt="Desert" />
        </div>
        <div class="cardText">
          <small class="article-date">2024-07-12</small>
          <h3 data-i18n="article18Title">World Cuisine: A Culinary Journey</h3>
          <p data-i18n="article18Desc">Explore famous dishes from different cultures around the world.</p>
        </div>
        <div class="cardFooter">
          <a href="{{route('services')}}" data-i18n="readMore">Read More</a>
        </div>
      </div>

      <!-- No results message -->
      <div id="no-results-message" style="display: none; text-align: center; padding: 40px; width: 100%;">
        <i class="fas fa-search" style="font-size: 48px; color: #ccc; margin-bottom: 20px;"></i>
        <h3 data-lang="noResultsTitle">No Results Found</h3>
        <p data-lang="noResultsDesc">Try adjusting your filters or search criteria.</p>
      </div>
    </div>
  </div>










@endsection
