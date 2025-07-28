@extends("layouts.front.master")
<style>

    </style>
@section('content')

<!-- Start Landing -->
<div class="landing">
  <div class="container">
    <div class="text">
      <h3 id="landing-title1" data-lang="landingTitle1"></h3>
      <h1 id="landing-title2" data-lang="landingTitle2"></h1>
      <p id="landing-paragraph" data-lang="landingParagraph"></p>
    </div>
    <div class="photo">
      <img src="{{ asset('assets/front/images/1.jpeg') }}" alt="landing-image" />
    </div>
  </div>
  <a href="#articles">
    <i class="fas fa-angle-double-down fa-2x"></i>
  </a>
</div>
<!-- End Landing -->

<!-- Start Articles -->
<div id="articles" style="margin: 20px; text-align: center">
  <h2 class="mainTitle" data-i18n="latestArticles">{{ __('Latest Articles') }}</h2>

  <!-- Search Input -->
  <div class="search-container">
    <div class="search-box date-filter" role="search">
      <label for="search-input" class="sr-only">{{ __('Search achievements') }}</label>
      <input
        type="text"
        id="search-input"
        placeholder="{{ __('Search achievements...') }}"
        data-i18n-placeholder="search_placeholder"
        aria-label="{{ __('Search achievements') }}"
      />
      <button id="voice-search" aria-label="{{ __('Search by voice') }}" tabindex="0">
        <i class="fas fa-microphone" aria-hidden="true"></i>
      </button>
    </div>
  </div>

  <!-- Filter Section -->
  <section class="filter-section" aria-label="{{ __('Event Filters') }}">
    <div class="filter-container">

      <!-- Category Filter -->
      <div class="filter-group">
        <select id="category-filter" class="category-filter" aria-label="{{ __('Filter by category') }}">
          <option value="" data-lang="allCategories"></option>
          @foreach ($departments as $department)
            <option value="{{ $department->id }}">{{ $department->translate(app()->getLocale())->name }}</option>

          @endforeach
        </select>
      </div>

      <!-- Date Range Filter -->
      <div class="filter-group date-filter">
        <label for="date-range" data-lang="dateRange">{{ __('Date Range') }}:</label>
        <div class="date-picker-container"></div>
        <input type="hidden" id="start-date">
        <input type="hidden" id="end-date">
      </div>

      <!-- Sort Filter -->
      <div class="filter-group">
        <select id="sort-by" class="sort-filter" aria-label="{{ __('Sort events') }}">
          <option value="date-desc"  data-lang="dateNewest" selected></option>
          <option value="date-asc"   data-lang="dateOldest"></option>
          <option value="title-asc"  data-lang="titleAZ"></option>
          <option value="title-desc" data-lang="titleZA"></option>
        </select>
      </div>

      <!-- Clear Filters -->
      <button
        class="clear-filters-btn"
        id="clear-filters"
        disabled
        aria-label="{{ __('Clear all filters') }}"
        tabindex="0"
      >
        <i class="fas fa-times" aria-hidden="true"></i>
        <span data-lang="clearFilters">{{ __('Clear All Filters') }}</span>
      </button>
    </div>
  </section>
  <!-- End Filters -->

  <!-- Article Counter -->
  <div class="article-counter-container">
    <div class="article-counter">
      <i class="fas fa-filter" aria-hidden="true"></i>
      <strong id="article-count">{{ count($achievements) }}</strong>
      <span data-lang="eventsFound">{{ __('Events Found') }}</span>
    </div>
  </div>

  <!-- Articles List -->
  <div class="container">
    @foreach ($achievements as $achievement)
      <div
        class="box"
        data-category="{{ $achievement->department_id }}"
        data-title="{{ $achievement->translate(app()->getLocale())->title }}"
        data-date="{{ optional($achievement->achievement_date)->format('Y-m-d') }}"
        onclick="window.location.href='{{ route('details', $achievement->id) }}'"
      >
        <div class="coverPhoto">
          <img
            src="{{ asset('images/achievements/' . $achievement->image_layout) }}"
            alt="{{ $achievement->translate(app()->getLocale())->title }}"
          />
        </div>

        <div class="cardText">
          <small class="article-date">
            {{ optional($achievement->achievement_date)->format('Y-m-d') }}
          </small>
          <h3>{{ $achievement->translate(app()->getLocale())->title }}</h3>
          {{-- Uncomment if you want to show description --}}
          {{-- <p>{!! $achievement->translate(app()->getLocale())->desc !!}</p> --}}
        </div>

        <div class="cardFooter">
          <a href="{{ route('details', $achievement->id) }}" data-lang="showMore">
          </a>
        </div>
      </div>
    @endforeach

    <!-- No Results -->
    <div
      id="no-results-message"
      style="display: none; text-align: center; padding: 40px; width: 100%;"
    >
      <i class="fas fa-search" style="font-size: 48px; color: #ccc; margin-bottom: 20px;"></i>
      <h3 data-lang="noResultsTitle">{{ __('No Results Found') }}</h3>
      <p data-lang="noResultsDesc">{{ __('Try adjusting your filters or search criteria.') }}</p>
    </div>
  </div>
</div>
<!-- End Articles -->

@endsection
