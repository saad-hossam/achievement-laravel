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
