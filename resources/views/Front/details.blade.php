@extends('layouts.front.master')

@section('content')
<main>
    <!-- Banner/Breadcrumbs -->
    <div class="banner">
        <div class="container">
            {{-- <p class="breadcrumbs" data-lang="gallary"></p> --}}
        </div>
    </div>

    <!--Start Details Content-->
    <div id="details-content" style="padding-top:40px;">
        <div class="container">
            <h2 class="mainTitle" data-lang="gallary">
                {{ $achievement->translate(app()->getLocale())->title }}
            </h2>

            <!-- Content Filter Bar -->
            <div class="content-filter-bar">
                <button class="filter-btn active" data-filter="all" data-i18n="show_all">Show All</button>

                @if ($achievement->media->where('type', 'image')->count() > 0)
                    <button class="filter-btn" data-filter="images" data-i18n="images">Images</button>
                @endif

                @if ($achievement->media->where('type', 'video')->count() > 0)
                    <button class="filter-btn" data-filter="videos" data-i18n="videos_filter">Videos</button>
                @endif

                @if ($achievement->links->count() > 0)
                    <button class="filter-btn" data-filter="news" data-i18n="news_filter">News</button>
                @endif

                @if (!empty($achievement->translate(app()->getLocale())->desc))
                    <button class="filter-btn" data-filter="description" data-i18n="description">Description</button>
                @endif
            </div>


            @if ($achievement->media->count() > 0)
            <div class="details-layout">
                <!-- Image Slider Column -->
                <div class="slider-column" data-content-type="images">
                    <div class="slider">
                        <!-- Main Image -->
                        <div class="main-image-container" id="mainImageContainer">
                            @php
                                $mainImage = $achievement->media->where('type', 'image')->first();
                            @endphp
                            <img
                                id="mainImage"
                                src="{{ $mainImage ? asset('images/achievements/' . $mainImage->path) : asset('assets/front/images/default.jpg') }}"
                                alt="{{ $achievement->title }}"
                                class="main-image"
                            >
                        </div>

                        <!-- Thumbnail Images -->
                        <div class="thumbnail-container">
                            <button class="slider-nav slider-prev" aria-label="Previous thumbnails">
                                <i class="fas fa-chevron-left rtl-flip"></i>
                            </button>
                            <div class="thumbnails-wrapper">
                                @foreach($achievement->media->where('type', 'image') as $image)
                                    <img
                                        src="{{ asset('images/achievements/' . $image->path) }}"
                                        alt="{{ $achievement->title }}"
                                        class="thumbnail"
                                        onclick="changeImage('{{ asset('images/achievements/' . $image->path) }}')"
                                    >
                                @endforeach
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
                        <h3 class="description-title" data-lang="aboutAchievement"></h3>
                        <div class="description-content">
                            {!! $achievement->translate(app()->getLocale())->desc !!}
                        </div>
                        <div class="achievement-details">
                            <div class="detail-item">
                                <span class="detail-label" data-i18n="dateLabel">Date:</span>
                                <span class="detail-value">
                                    {{ $achievement->achievement_date ? $achievement->achievement_date->format('Y-m-d') : '' }}
                                </span>
                            </div>
                            {{-- <div class="detail-item">
                                <span class="detail-label" data-i18n="location_label">Location:</span>
                                <span class="detail-value">{{ $achievement->location }}</span>
                            </div> --}}
                            <div class="detail-item">
                                <span class="detail-label" data-i18n="categoryLabel">Category:</span>
                                <span class="detail-value">{{ $achievement->department->translate(app()->getLocale())->name }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>

    @if ($achievement->media->where('type', 'video')->count() > 0)
    <!-- Related Videos Section -->
    <div id="relatedVideosSection" data-content-type="videos">
        <div class="container">
            <h2 class="sectionTitle" data-lang="videos">Related Videos</h2>

            @php
                $firstVideo = $achievement->media->where('type', 'video')->first();
            @endphp

            <!-- Main Video Player -->
            <div class="main-video-container">
                <div class="main-video-player">
                    <iframe
                        id="mainVideoPlayer"
                        src="{{ $firstVideo ? 'https://www.youtube.com/embed/' . $firstVideo->video_id : 'https://www.youtube.com/embed/Nz6c3zAtDDg' }}"
                        frameborder="0"
                        allowfullscreen>
                    </iframe>
                    <button class="fullscreen-btn"
                            onclick="openVideoModal(document.getElementById('mainVideoPlayer').src)"
                            title="Fullscreen"
                            data-i18n-title="fullscreen">
                        <i class="fas fa-expand"></i>
                    </button>
                </div>
                <div class="main-video-info">
                    <h3 id="mainVideoTitle">{{ $achievement->title }}</h3>
                    <p id="mainVideoDescription">{{ $achievement->video_description ?? 'Watch this video for more details.' }}</p>
                </div>
            </div>

            <!-- Video Thumbnails Slider -->
            <div class="video-slider-container">
                <button class="video-nav-btn video-next-btn" aria-label="Previous videos">
                    <i class="fas fa-chevron-left rtl-flip"></i>
                </button>

                <div class="video-slider-track-wrapper">
                    <div class="video-slider-track">
                        @foreach($achievement->media->where('type', 'video') as $video)
                        <div class="video-card"
                             data-video-id="{{ $video->video_id }}"
                             data-video-title="{{ $achievement->title }}"
                             data-video-desc="{{ $achievement->video_description ?? '' }}"
                             onclick="playInMainPlayer(this)">
                            <div class="video-thumbnail-box">
                                <img src="{{ asset('videos/thumbnails/thumbnail_' . $video->video_id . '.jpg') }}"
                                     alt="Video Thumbnail"
                                     class="video-thumbnail">
                                <div class="play-button" title="Play Video" data-i18n-title="watch_video">
                                    <i class="fas fa-play-circle"></i>
                                </div>
                            </div>
                            <div class="video-title">{{ $achievement->title }}</div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <button class="video-nav-btn video-prev-btn" aria-label="Next videos">
                    <i class="fas fa-chevron-right rtl-flip"></i>
                </button>

                <!-- Video Slide Indicators -->
                <div class="slide-indicators-container">
                    <div class="slide-indicators video-indicators"></div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Video Modal -->
    <div id="videoModal" class="video-modal">
        <div class="video-modal-content">
            <span class="video-modal-close" onclick="closeVideoModal()" title="Close" data-i18n-title="close">&times;</span>
            <div class="video-container">
                <iframe id="videoFrame" src="" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </div>

    <!-- News Section -->
    @if ($achievement->links->count() > 0)
    <div id="newsLinksSection" data-content-type="news">
        <div class="">
            <h2 class="sectionTitle" data-lang="news">Latest News</h2>
            <ul class="newsLinks">
                @foreach($achievement->links as $link)
                <li>
                    <a href="{{ $link->url }}" target="_blank" rel="noopener noreferrer">
                        <i class="fas fa-newspaper icon news-icon"></i>
                        <span>{{ optional($link->translate(app()->getLocale()))->title }}</span>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif
</main>

<!-- Scroll To Top -->
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
        <span id="currentImageIndex">1</span> / 
        <span id="totalImages">{{ $achievement->media->where('type', 'image')->count() }}</span>
    </div>
</div>
@endsection
