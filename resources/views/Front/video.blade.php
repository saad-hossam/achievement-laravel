@extends('layouts.front.master')

@section('content')

<section class="video-gallery-section">
    <!-- Banner/Breadcrumbs -->
    <div class="banner">
        <div class="container">
            <p class="breadcrumbs" data-lang="video_library"></p>
        </div>
    </div>

    <!-- Search Container Start -->
    <div class="search-container">
        <div class="search-box" role="search">
            <label for="search-input" class="sr-only">Search videos</label>
            <input type="text" id="search-input" placeholder="Search videos..."
                data-i18n-placeholder="search_videos_placeholder" aria-label="Search videos">
            <button id="voice-search" aria-label="Search by voice" tabindex="0"><i class="fas fa-microphone"
                    aria-hidden="true"></i></button>
        </div>
    </div>
    <!-- Search Container End -->

    <!-- Filter Start -->
    <section class="filter-section" aria-label="Video Filters" style="margin:0 20px;">
        <div class="filter-container">
            <div class="filter-group">
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
            <div class="filter-group date-filter">
                <label for="date-range" data-lang="dateRange">Date Range:</label>
                <div class="date-picker-container">
                    <!-- The date range picker will be initialized by JavaScript -->
                </div>
                <input type="hidden" id="start-date">
                <input type="hidden" id="end-date">
            </div>
            <div class="filter-group">
                <select id="sort-by" class="sort-filter" aria-label="Sort videos">
                    <option value="date-desc" selected data-lang="dateNewest">Date (Newest First)</option>
                    <option value="date-asc" data-lang="dateOldest">Date (Oldest First)</option>
                    <option value="title-asc" data-lang="titleAZ">Title (A-Z)</option>
                    <option value="title-desc" data-lang="titleZA">Title (Z-A)</option>
                </select>
            </div>
            <button class="clear-filters-btn" id="clear-filters" disabled aria-label="Clear all filters"
                tabindex="0">
                <i class="fas fa-times" aria-hidden="true"></i> <span data-lang="clearFilters">Clear All
                    Filters</span>
            </button>
        </div>
    </section>
    <!-- Filter End -->
<div id="video-results" class="video-results"></div>
    <!-- Video Counter -->
    <div class="article-counter-container">
        <div class="article-counter">
            <i class="fas fa-filter" aria-hidden="true"></i>
            <strong id="article-count">0</strong>
            <span data-lang="videosFound">Videos Found</span>
        </div>
    </div>
    <!-- Video Counter End -->

    <div class="container">
        <div class="video-grid" id="videos">
            @foreach ($videos as $video)
                <div class="video-card-wrapper"
                     data-category="{{ $video->achievement->category ?? '' }}"
                     data-title="{{ $video->achievement->title ?? 'Untitled' }}"
                     data-date="{{ $video->achievement->date ?? '2025-01-01' }}">
                    <div class="video-display-box">
                        <div class="thumbnail-container">
                            <img src="https://img.youtube.com/vi/{{ $video->video_id }}/hqdefault.jpg"
                                 alt="Video Thumbnail"
                                 class="thumbnail-image">
                            <div class="main-play-icon-area">
                                <i class="fa-regular fa-circle-play"></i>
                            </div>
                        </div>
                        <div class="youtube-logo-wrapper">
                            <img src="{{ asset('images/favicon.png') }}" alt="YouTube Logo" class="youtube-logo-image">
                        </div>
                    </div>
                    <p class="video-card-title">{{ $video->achievement->title ?? 'No Title' }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Add no results message -->
<!-- No results message -->
<div id="no-results-message" style="display: none; text-align: center; padding: 40px; width: 100%;">
    <i class="fas fa-search" style="font-size: 48px; color: #ccc; margin-bottom: 20px;"></i>
    <h3 data-lang="noResultsTitle">No Results Found</h3>
    <p data-lang="noResultsDesc">Try adjusting your filters or search criteria.</p>
</div>

<!-- Video Modal -->
<div id="video-modal" class="video-modal">
    <div class="video-modal-content">
        <span class="video-modal-close">&times;</span>
        <div class="video-container">
            <iframe id="youtube-iframe" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>
</div>
@endsection
