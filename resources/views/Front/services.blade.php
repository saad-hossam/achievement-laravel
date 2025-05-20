@extends("layouts.front.master")
@section('content')


<!--Start Articles-->
<div id="" style="padding-top:140px ;">
    <h2 class="mainTitle" data-lang="gallary"></h2>
    <div class="container">
      <div class="image-description mt-5">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus ducimus explicabo reiciendis officia! Provident illo quas voluptas hic repudiandae repellendus molestias dolorum! Quia consectetur fuga voluptate at ratione, beatae illum.
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus ducimus explicabo reiciendis officia! Provident illo quas voluptas hic repudiandae repellendus molestias dolorum! Quia consectetur fuga voluptate at ratione, beatae illum.

      </div>
      <h2 class="mainTitle" data-lang="gallary" style="margin-top: 50px"></h2>
  <div class="container">

  <div class="slider ">
    <!-- Main Image -->
    <div class="main-image-container">
      <img id="mainImage" src="{{ asset('assets/front') }}/images/news/1.jpg" alt="Main Image" class="main-image">
    </div>

    <!-- Thumbnail Images -->
    <div class="thumbnail-container">
  <img src="{{ asset('assets/front') }}/images/news/1.jpg" alt="Thumbnail 1" class="thumbnail" onclick="changeImage('images/news/1.jpg')">
  <img src="{{ asset('assets/front') }}/images/news/2.jpg" alt="Thumbnail 2" class="thumbnail" onclick="changeImage('images/news/2.jpg')">
  <img src="{{ asset('assets/front') }}/images/news/3.jpg" alt="Thumbnail 3" class="thumbnail" onclick="changeImage('images/news/3.jpg')">
  <img src="{{ asset('assets/front') }}/images/news/4.jpg" alt="Thumbnail 4" class="thumbnail" onclick="changeImage('images/news/4.jpg')">
  <img src="{{ asset('assets/front') }}/images/news/5.jpg" alt="Thumbnail 1" class="thumbnail" onclick="changeImage('images/news/5.jpg')">
  <img src="{{ asset('assets/front') }}/images/news/6.jpg" alt="Thumbnail 2" class="thumbnail" onclick="changeImage('images/news/6.jpg')">
  <img src="{{ asset('assets/front') }}/images/news/7.jpg" alt="Thumbnail 3" class="thumbnail" onclick="changeImage('images/news/7.jpg')">
  <img src="{{ asset('assets/front') }}/images/news/8.jpg" alt="Thumbnail 4" class="thumbnail" onclick="changeImage('images/news/8.jpg')">
  <img src="{{ asset('assets/front') }}/images/news/9.jpg" alt="Thumbnail 1" class="thumbnail" onclick="changeImage('images/news/9.jpg')">
  <img src="{{ asset('assets/front') }}/images/news/10.jpg" alt="Thumbnail 2" class="thumbnail" onclick="changeImage('images/news/10.jpg')">
  <img src="{{ asset('assets/front') }}/images/news/11.jpg" alt="Thumbnail 3" class="thumbnail" onclick="changeImage('images/news/11.jpg')">
  <img src="{{ asset('assets/front') }}/images/news/12.jpeg" alt="Thumbnail 4" class="thumbnail" onclick="changeImage('images/news/12.jpeg')">
  <img src="{{ asset('assets/front') }}/images/news/1.jpg" alt="Thumbnail 1" class="thumbnail" onclick="changeImage('images/news/1.jpg')">
  <img src="{{ asset('assets/front') }}/images/news/2.jpg" alt="Thumbnail 2" class="thumbnail" onclick="changeImage('images/news/2.jpg')">
  <img src="{{ asset('assets/front') }}/images/news/3.jpg" alt="Thumbnail 3" class="thumbnail" onclick="changeImage('images/news/3.jpg')">
  <img src="{{ asset('assets/front') }}/images/news/4.jpg" alt="Thumbnail 4" class="thumbnail" onclick="changeImage('images/news/4.jpg')">
  <img src="{{ asset('assets/front') }}/images/news/5.jpg" alt="Thumbnail 1" class="thumbnail" onclick="changeImage('images/news/5.jpg')">
  <!-- Add more thumbnails as needed -->
  </div>
  </div>
  </div>

    </div>

  </div>
  <div class="spikes"></div>
  <!--End Articles-->

  <div id="topVideos">
    <h2 class="mainTitle" data-lang="gallary"></h2>
    <div class="container">
      <div class="holder">
        <!-- Sidebar List -->
        <div class="list">
          <div class="name" data-lang="videos">Videos</div>
          <ul id="videoList">
            <li data-video="https://www.youtube.com/embed/QAOg2UAuHeg" data-info="A classic music video.">
              <div>
                <span>Classic Music Video</span>
              </div>
              <img class="thumbnail" />

            </li>
            <li data-video="https://www.youtube.com/embed/aqz-KE-bpKQ" data-info="Big Buck Bunny animated short film.">
              <div>
                <span>Big Buck Bunny</span>
              </div>
              <img class="thumbnail" />

            </li>
            <li data-video="https://www.youtube.com/embed/kXYiU_JCYtU" data-info="Numb by Linkin Park.">
              <div>
                <span>Linkin Park - Numb</span>
              </div>
              <img class="thumbnail" />

            </li>
            <li data-video="https://www.youtube.com/embed/5qap5aO4i9A" data-info="Lofi hip hop radio for relaxing.">
              <div>
                <span>Lofi Hip Hop Radio</span>
              </div>
              <img class="thumbnail" />

            </li>
            <li data-video="https://www.youtube.com/embed/oHg5SJYRHA0" data-info="You know this one.">
              <div>
                <span>Surprise Video</span>
              </div>
              <img class="thumbnail" />

            </li>
          </ul>
        </div>

        <!-- Main Preview Area -->
        <div class="preview">
          <iframe id="videoPlayer" width="100%" height="500" src="{{ asset('assets/front') }}/https://www.youtube.com/embed/QAOg2UAuHeg" frameborder="0" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>


  <div id="newsLinksSection">
    <h2 class="sectionTitle" data-lang="news">Latest News</h2>
    <ul class="newsLinks">
      <li><a href="#"><i class="fas fa-newspaper icon news-icon"></i> New development in tech industry</a></li>
      <li><a href="#"><i class="fas fa-newspaper icon news-icon"></i> Economy shows signs of recovery</a></li>
      <li><a href="#"><i class="fas fa-newspaper icon news-icon"></i> New policies announced today</a></li>
      <li><a href="#"><i class="fas fa-newspaper icon news-icon"></i> Sports team wins championship</a></li>
      <li><a href="#"><i class="fas fa-newspaper icon news-icon"></i> Upcoming cultural events</a></li>
    </ul>
  </div>








@endsection
