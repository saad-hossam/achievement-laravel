@extends("layouts.front.master")

@section('content')

    <!--Start Landing-->
    <div class="landing">
      <div class="container">
        <div class="text">
          <h3 id="landing-title1" data-lang="landingTitle1"></h3>
          <h1 id="landing-title2" data-lang="landingTitle2"></h1>
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

    <!-- Start Articles -->
    <div id="articles" style="margin:20px;">
      <h2 class="mainTitle" data-i18n="latestArticles">Latest Articles</h2>


      <!-- Search Container Start -->
      <div class="search-container">
        <div class="search-box" role="search">
          <label for="search-input" class="sr-only">Search events</label>
          <input type="text" id="search-input" placeholder="Search achievements..."
            data-i18n-placeholder="search_placeholder" aria-label="Search achievements">
          <button id="voice-search" aria-label="Search by voice" tabindex="0"><i class="fas fa-microphone"
              aria-hidden="true"></i></button>
        </div>
      </div>
      <!-- Search Container End -->

      <!-- Filter Start -->
      <section class="filter-section" aria-label="Event Filters">
        <div class="filter-container">
          <div class="filter-group">
            <!-- <label for="category-filter" data-lang="category">Category:</label> -->
            <select id="category-filter" class="category-filter">
    <option value="" data-lang="allCategories">{{ __('All Categories') }}</option>
    @foreach ($departments as $department)
        <option value="{{ $department->id }}">
            {{ $department->translate(app()->getLocale())->name }}
        </option>
    @endforeach
</select>

          </div>
          <div class="filter-group date-filter">
            <label for="date-range" data-lang="dateRange">Date Range:</label>
            <div class="date-picker-container">
              <!-- The date range picker will be initialized by JavaScript -->
            </div>
            <input type="hidden" id="start-date">
            <input type="hidden" id="end-date">
          </div>
          <div class="filter-group">
            <!-- <label for="sort-by" data-lang="sortBy">Sort By:</label> -->
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
          @foreach($achievements as $achievement)
              <div class="box"
                   data-category="{{ $achievement->department->translate(app()->getLocale())->name ?? 'general' }}"
                   data-title="{{ $achievement->translate(app()->getLocale())->title }}"
         data-date="{{ $achievement->achievement_date ? $achievement->achievement_date->format('Y-m-d') : '' }}">
                  <div class="coverPhoto">

                    <img src="{{ asset('images/achievements/' . $achievement->image_layout) }}" alt="{{ $achievement->title }}">
                  </div>
                  <div class="cardText">
                      <small class="article-date">{{ $achievement->achievement_date ? $achievement->achievement_date->format('Y-m-d') : '' }}</small>
                      <h3>{{ $achievement->translate(app()->getLocale())->title }}</h3>
                      {{-- <p>{!!  $achievement->translate(app()->getLocale())->desc !!}</p> --}}
                  </div>

                  <div class="cardFooter">
                      <a href="{{ route('details', $achievement->id) }}">
                          {{ __('Read More') }}
                      </a>
                  </div>
              </div>
          @endforeach



          <!-- No results message -->
        <div id="no-results-message" style="display: none; text-align: center; padding: 40px; width: 100%;">
          <i class="fas fa-search" style="font-size: 48px; color: #ccc; margin-bottom: 20px;"></i>
          <h3 data-lang="noResultsTitle">No Results Found</h3>
          <p data-lang="noResultsDesc">Try adjusting your filters or search criteria.</p>
        </div>
      </div>
    </div>



@endsection
