@extends('layouts.front.master')

<style>
.video-modal {
    display: none;
    position: fixed;
    z-index: 999;
    /* padding-top: 40px; */
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.9);
    visibility: hidden;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.video-modal.show {
    display: block;
    visibility: visible;
    opacity: 1;
}

.video-modal-content {
    margin: auto;
    display: block;
    max-width: 80%;
    max-height: 80%;
    position: relative;
}

.video-modal-close {
    position: absolute;
    top: -30px;
    right: 0;
    color: #fff;
    font-size: 36px;
    font-weight: bold;
    cursor: pointer;
}

.video-container iframe {
    width: 100%;
    height: 500px;
    border: none;
}
</style>

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
    <!-- Search + Filters -->
    <!-- Your existing filter/search markup here -->

    <!-- Video Counter -->
    <div class="article-counter-container">
        <div class="article-counter">
            <i class="fas fa-filter" aria-hidden="true"></i>
            <strong id="article-count">0</strong>
            <span data-lang="videosFound">Videos Found</span>
        </div>
    </div>

        <!-- Videos Grid -->
    <div class="container">
        <div class="video-grid" id="videos">
            @foreach ($videos as $video)
                <div class="video-card-wrapper"

                data-category="{{ $video->category ?? '' }}"
                    data-title="{{ $video->achievement->title ?? 'Untitled' }}"
                    data-date="{{ $video->created_at->format('Y-m-d') }}">

                    <div class="video-display-box">
                        <!-- <div class="thumbnail-container" data-video-id="{{ $video->id }}">
                            <img src="{{ asset('images/default-thumbnail.jpg') }}"
                                alt="Video Thumbnail" class="thumbnail-image">
                            <div class="main-play-icon-area">
                                <i class="fa-regular fa-circle-play"></i>
                            </div>
                        </div> -->
                        <div class="thumbnail-container" data-video-id="{{ $video->video_id }}">
                            @if ($video->type === 'video' && !empty($video->video_id))
                                <img src="https://img.youtube.com/vi/{{ $video->video_id }}/hqdefault.jpg"
                                    alt="Video Thumbnail" class="thumbnail-image">
                            @else
                                <img src="{{ asset('images/default-thumbnail.jpg') }}"
                                    alt="Fallback Thumbnail" class="thumbnail-image">
                            @endif
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

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    const thumbnails = document.querySelectorAll('.thumbnail-container');
    const modal = document.getElementById('video-modal');
    const iframe = document.getElementById('youtube-iframe');
    const closeBtn = document.querySelector('.video-modal-close');

    if (!modal || !iframe) return;

    thumbnails.forEach(thumbnail => {
        thumbnail.addEventListener('click', function () {
            const videoId = this.dataset.videoId;
            if (videoId) {
                iframe.src = `https://www.youtube.com/embed/${videoId}?autoplay=1&rel=0`;
                modal.classList.add('show');
                document.body.style.overflow = 'hidden';
            }
        });
    });

    closeBtn?.addEventListener('click', () => {
        modal.classList.remove('show');
        iframe.src = '';
        document.body.style.overflow = '';
    });

    window.addEventListener('click', event => {
        if (event.target === modal) {
            modal.classList.remove('show');
            iframe.src = '';
            document.body.style.overflow = '';
        }
    });
});

</script>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('search-input');
    const videos = document.querySelectorAll('.video-card-wrapper');
    const counter = document.getElementById('article-count');
    const noResultsMessage = document.getElementById('no-results-message');

    if (!searchInput) return;

    searchInput.addEventListener('input', () => {
        const query = searchInput.value.trim().toLowerCase();
        let matchCount = 0;

            videos.forEach(card => {
            const title = card.dataset.title?.toLowerCase() || '';
            const currentLocale = document.documentElement.lang || 'en';
            
            // Normalize Arabic text for better search
            const normalizedTitle = currentLocale === 'ar' ? 
                title.normalize('NFKD').replace(/[\u064B-\u065F\u0670]/g, '') : 
                title;
            
            const normalizedQuery = currentLocale === 'ar' ? 
                query.normalize('NFKD').replace(/[\u064B-\u065F\u0670]/g, '') : 
                query;

            if (normalizedTitle.includes(normalizedQuery)) {
                card.style.display = '';
                matchCount++;
            } else {
                card.style.display = 'none';
            }
        });

        counter.textContent = matchCount;

        if (matchCount === 0) {
            noResultsMessage.style.display = 'block';
        } else {
            noResultsMessage.style.display = 'none';
        }
    });
});
</script>

@endsection
