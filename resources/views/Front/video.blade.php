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
            <!-- Video items with data attributes for filtering -->
            <div class="video-card-wrapper" data-category="military" data-title="Military Exercise"
                data-date="2024-03-15">
                <div class="video-display-box">
                    <div class="thumbnail-container">
                        <img src="https://img.youtube.com/vi/dY3t90L_q3Q/hqdefault.jpg" alt="Video Thumbnail"
                            class="thumbnail-image">
                        <div class="main-play-icon-area">
                            <i class="fa-regular fa-circle-play"></i>
                        </div>
                    </div>
                    <div class="youtube-logo-wrapper">
                        <img src="images/favicon.png" alt="YouTube Logo" class="youtube-logo-image">
                    </div>
                </div>
                <p class="video-card-title" data-lang="video1"></p>
            </div>

            <div class="video-card-wrapper" data-category="defense" data-title="Defense Strategy"
                data-date="2024-02-20">
                <div class="video-display-box">
                    <div class="thumbnail-container">
                        <img src="https://img.youtube.com/vi/pOWKt8p-GYY/hqdefault.jpg" alt="Video Thumbnail"
                            class="thumbnail-image">
                        <div class="main-play-icon-area">
                            <i class="fa-regular fa-circle-play"></i>
                        </div>
                    </div>
                    <div class="youtube-logo-wrapper">
                        <img src="images/favicon.png" alt="YouTube Logo" class="youtube-logo-image">
                    </div>
                </div>
                <p class="video-card-title" data-lang="video2"></p>
            </div>

            <div class="video-card-wrapper" data-category="technology" data-title="New Technology"
                data-date="2024-01-10">
                <div class="video-display-box">
                    <div class="thumbnail-container">
                        <img src="https://img.youtube.com/vi/e65Q-NrK-dc/hqdefault.jpg" alt="Video Thumbnail"
                            class="thumbnail-image">
                        <div class="main-play-icon-area">
                            <i class="fa-regular fa-circle-play"></i>
                        </div>
                    </div>
                    <div class="youtube-logo-wrapper">
                        <img src="images/favicon.png" alt="YouTube Logo" class="youtube-logo-image">
                    </div>
                </div>
                <p class="video-card-title" data-lang="video3"></p>
            </div>

            <div class="video-card-wrapper" data-category="industry" data-title="Industry Development"
                data-date="2023-12-15">
                <div class="video-display-box">
                    <div class="thumbnail-container">
                        <img src="https://img.youtube.com/vi/ftV6GKQyKw4/hqdefault.jpg" alt="Video Thumbnail"
                            class="thumbnail-image">
                        <div class="main-play-icon-area">
                            <i class="fa-regular fa-circle-play"></i>
                        </div>
                    </div>
                    <div class="youtube-logo-wrapper">
                        <img src="images/favicon.png" alt="YouTube Logo" class="youtube-logo-image">
                    </div>
                </div>
                <p class="video-card-title" data-lang="video4"></p>
            </div>

            <div class="video-card-wrapper" data-category="international" data-title="International Relations"
                data-date="2023-11-05">
                <div class="video-display-box">
                    <div class="thumbnail-container">
                        <img src="https://img.youtube.com/vi/7iEtc19nQNs/hqdefault.jpg" alt="Video Thumbnail"
                            class="thumbnail-image">
                        <div class="main-play-icon-area">
                            <i class="fa-regular fa-circle-play"></i>
                        </div>
                    </div>
                    <div class="youtube-logo-wrapper">
                        <img src="images/favicon.png" alt="YouTube Logo" class="youtube-logo-image">
                    </div>
                </div>
                <p class="video-card-title" data-lang="video5"></p>
            </div>

            <div class="video-card-wrapper" data-category="development" data-title="Development Project"
                data-date="2023-10-20">
                <div class="video-display-box">
                    <div class="thumbnail-container">
                        <img src="https://img.youtube.com/vi/Nz6c3zAtDDg/hqdefault.jpg" alt="Video Thumbnail"
                            class="thumbnail-image">
                        <div class="main-play-icon-area">
                            <i class="fa-regular fa-circle-play"></i>
                        </div>
                    </div>
                    <div class="youtube-logo-wrapper">
                        <img src="images/favicon.png" alt="YouTube Logo" class="youtube-logo-image">
                    </div>
                </div>
                <p class="video-card-title" data-lang="video6"></p>
            </div>

            <div class="video-card-wrapper" data-category="security" data-title="Security Operations"
                data-date="2023-09-15">
                <div class="video-display-box">
                    <div class="thumbnail-container">
                        <img src="https://img.youtube.com/vi/pKFod1gJflk/hqdefault.jpg" alt="Video Thumbnail"
                            class="thumbnail-image">
                        <div class="main-play-icon-area">
                            <i class="fa-regular fa-circle-play"></i>
                        </div>
                    </div>
                    <div class="youtube-logo-wrapper">
                        <img src="images/favicon.png" alt="YouTube Logo" class="youtube-logo-image">
                    </div>
                </div>
                <p class="video-card-title" data-lang="video7"></p>
            </div>

            <div class="video-card-wrapper" data-category="leadership" data-title="Leadership Conference"
                data-date="2023-08-25">
                <div class="video-display-box">
                    <div class="thumbnail-container">
                        <img src="https://img.youtube.com/vi/WmRxceCn7MU/hqdefault.jpg" alt="Video Thumbnail"
                            class="thumbnail-image">
                        <div class="main-play-icon-area">
                            <i class="fa-regular fa-circle-play"></i>
                        </div>
                    </div>
                    <div class="youtube-logo-wrapper">
                        <img src="images/favicon.png" alt="YouTube Logo" class="youtube-logo-image">
                    </div>
                </div>
                <p class="video-card-title" data-lang="video8"></p>
            </div>

            <div class="video-card-wrapper" data-category="military" data-title="Military Technology"
                data-date="2023-07-10">
                <div class="video-display-box">
                    <div class="thumbnail-container">
                        <img src="https://img.youtube.com/vi/3ZxtQTsN0tE/hqdefault.jpg" alt="Video Thumbnail"
                            class="thumbnail-image">
                        <div class="main-play-icon-area">
                            <i class="fa-regular fa-circle-play"></i>
                        </div>
                    </div>
                    <div class="youtube-logo-wrapper">
                        <img src="images/favicon.png" alt="YouTube Logo" class="youtube-logo-image">
                    </div>
                </div>
                <p class="video-card-title" data-lang="video9"></p>
            </div>

            <div class="video-card-wrapper" data-category="defense" data-title="Defense Innovation"
                data-date="2023-06-05">
                <div class="video-display-box">
                    <div class="thumbnail-container">
                        <img src="https://img.youtube.com/vi/oovmi47l3gk/hqdefault.jpg" alt="Video Thumbnail"
                            class="thumbnail-image">
                        <div class="main-play-icon-area">
                            <i class="fa-regular fa-circle-play"></i>
                        </div>
                    </div>
                    <div class="youtube-logo-wrapper">
                        <img src="images/favicon.png" alt="YouTube Logo" class="youtube-logo-image">
                    </div>
                </div>
                <p class="video-card-title" data-lang="video10"></p>
            </div>
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
