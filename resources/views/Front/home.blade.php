@extends("layouts.front.master")

@section('content')


    <!--Start Landing-->
    <div class="landing">
        <div class="container">
          <div class="text">
            <h1 id="landing-title" data-lang="landingTitle"></h1>
            <p id="landing-paragraph" data-lang="landingParagraph"></p>
          </div>
          <div class="photo">
            <img src="{{ asset('assets/front') }}/images/1.jpeg" alt="landing-image"  />
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

        <div class="filters" style="margin-bottom: 20px;">
          <div class="filter-group">
            <label for="titleFilter" data-i18n="filterTitle">Title:</label>
            <input type="text" id="titleFilter" placeholder="Search by title..." />
          </div>


          <div class="filter-group">
          <label> from date:
            <input type="date" id="from-date">
          </label>
          </div>

          <div class="filter-group">


          <label> to date:
            <input type="date" id="to-date">
          </label>
          </div>

          <div class="filter-group">
            <label for="daySelect" data-i18n="filterDay">Day:</label>
            <select id="daySelect">
              <option value="" data-i18n="all">All</option>
              <script>
                document.write([...Array(31).keys()].map(i => `<option value="${i + 1}">${i + 1}</option>`).join(''));
              </script>
            </select>
          </div>

          <div class="filter-group">
            <label for="monthSelect" data-i18n="filterMonth">Month:</label>
            <select id="monthSelect">
              <option value="" data-i18n="all">All</option>
              <option value="1" data-i18n="month1">January</option>
              <option value="2" data-i18n="month2">February</option>
              <option value="3" data-i18n="month3">March</option>
              <option value="4" data-i18n="month4">April</option>
              <option value="5" data-i18n="month5">May</option>
              <option value="6" data-i18n="month6">June</option>
              <option value="7" data-i18n="month7">July</option>
              <option value="8" data-i18n="month8">August</option>
              <option value="9" data-i18n="month9">September</option>
              <option value="10" data-i18n="month10">October</option>
              <option value="11" data-i18n="month11">November</option>
              <option value="12" data-i18n="month12">December</option>
            </select>
          </div>

          <div class="filter-group">
            <label for="yearSelect" data-i18n="filterYear">Year:</label>
            <select id="yearSelect">
              <option value="" data-i18n="all">All</option>
              <option value="2023">2023</option>
              <option value="2024">2024</option>
              <option value="2025">2025</option>
            </select>
          </div>


          <div class="filter-group">
            <button id="filterButton" data-i18n="applyFilter">Apply Filter</button>
            <button id="resetButton" data-i18n="resetFilter">Reset</button>
          </div>


        </div>

      <div class="container">
        <!-- Article 1 -->
        <div class="box" data-title="Exploring the Desert" data-date="2023-12-10">
          <div class="coverPhoto">
            <img src="{{ asset('assets/front') }}/images/news/1.jpg" alt="Desert" />
          </div>
          <div class="cardText">
            <h3 data-i18n="article1Title">Exploring the Desert</h3>
            <p data-i18n="article1Desc">Discover the secrets of the world’s driest regions and how life adapts to survive.</p>
            <small class="article-date">2023-12-10</small>
          </div>
          <div class="cardFooter">
            <a href="{{route('services')}}" data-i18n="readMore">Read More</a>
          </div>
        </div>

        <!-- Article 2 -->
        <div class="box" data-title="Cat Behavior Explained" data-date="2024-01-05">
          <div class="coverPhoto">
            <img src="{{ asset('assets/front') }}/images/news/2.jpg" alt="Desert" />
          </div>
          <div class="cardText">
            <h3 data-i18n="article2Title">Cat Behavior Explained</h3>
            <p data-i18n="article2Desc">Understand your feline friend better by learning the reasons behind common behaviors.</p>
            <small class="article-date">2024-01-05</small>
          </div>
          <div class="cardFooter">
            <a href="{{route('services')}}" data-i18n="readMore">Read More</a>
          </div>
        </div>

        <!-- Article 3 -->
        <div class="box" data-title="Ocean Depths Revealed" data-date="2024-02-14">
          <div class="coverPhoto">
            <img src="{{ asset('assets/front') }}/images/news/3.jpg" alt="Desert" />
          </div>
          <div class="cardText">
            <h3 data-i18n="article3Title">Ocean Depths Revealed</h3>
            <p data-i18n="article3Desc">Dive into the unknown as we explore the hidden wonders of the ocean floor.</p>
            <small class="article-date">2024-02-14</small>
          </div>
          <div class="cardFooter">
            <a href="{{route('services')}}" data-i18n="readMore">Read More</a>
          </div>
        </div>

        <!-- Article 4 -->
        <div class="box" data-title="The Art of Night Photography" data-date="2024-03-02">
          <div class="coverPhoto">
            <img src="{{ asset('assets/front') }}/images/news/4.jpg" alt="Desert" />
          </div>
          <div class="cardText">
            <h3 data-i18n="article4Title">The Art of Night Photography</h3>
            <p data-i18n="article4Desc">Learn how to capture stunning images in the dark using simple settings.</p>
            <small class="article-date">2024-03-02</small>
          </div>
          <div class="cardFooter">
            <a href="{{route('services')}}" data-i18n="readMore">Read More</a>
          </div>
        </div>

        <!-- Article 5 -->
        <div class="box" data-title="Journey in the Alps" data-date="2024-03-15">
          <div class="coverPhoto">
            <img src="{{ asset('assets/front') }}/images/news/5.jpg" alt="Desert" />
          </div>
          <div class="cardText">
            <h3 data-i18n="article5Title">Journey in the Alps</h3>
            <p data-i18n="article5Desc">Enjoy the breathtaking beauty of the snow-covered mountain peaks.</p>
            <small class="article-date">2024-03-15</small>
          </div>
          <div class="cardFooter">
            <a href="{{route('services')}}" data-i18n="readMore">Read More</a>
          </div>
        </div>

        <!-- Article 6 -->
        <div class="box" data-title="Future Technology" data-date="2024-04-01">
          <div class="coverPhoto">
            <img src="{{ asset('assets/front') }}/images/news/6.jpg" alt="Desert" />
          </div>
          <div class="cardText">
            <h3 data-i18n="article6Title">Future Technology</h3>
            <p data-i18n="article6Desc">Learn about the latest innovations that will change our lives in the coming years.</p>
            <small class="article-date">2024-04-01</small>
          </div>
          <div class="cardFooter">
            <a href="{{route('services')}}" data-i18n="readMore">Read More</a>
          </div>
        </div>

        <!-- Article 7 -->
        <div class="box" data-title="Life in the Arctic" data-date="2024-04-18">
          <div class="coverPhoto">
            <img src="{{ asset('assets/front') }}/images/news/7.jpg" alt="Desert" />
          </div>
          <div class="cardText">
            <h3 data-i18n="article7Title">Life in the Arctic</h3>
            <p data-i18n="article7Desc">Discover how animals and humans survive in the harshest environment on Earth.</p>
            <small class="article-date">2024-04-18</small>
          </div>
          <div class="cardFooter">
            <a href="{{route('services')}}" data-i18n="readMore">Read More</a>
          </div>
        </div>

        <!-- Article 8 -->
        <div class="box" data-title="Beginner's Guide to Farming" data-date="2024-05-01">
          <div class="coverPhoto">
            <img src="{{ asset('assets/front') }}/images/news/8.jpg" alt="Desert" />
          </div>
          <div class="cardText">
            <h3 data-i18n="article8Title">Beginner's Guide to Farming</h3>
            <p data-i18n="article8Desc">Start your own home farming journey and learn the best practices for success.</p>
            <small class="article-date">2024-05-01</small>
          </div>
          <div class="cardFooter">
            <a href="{{route('services')}}" data-i18n="readMore">Read More</a>
          </div>
        </div>

        <!-- Article 9 -->
        <div class="box" data-title="Rainforests: Nature's Treasures" data-date="2024-05-10">
          <div class="coverPhoto">
            <img src="{{ asset('assets/front') }}/images/news/9.jpg" alt="Desert" />
          </div>
          <div class="cardText">
            <h3 data-i18n="article9Title">Rainforests: Nature's Treasures</h3>
            <p data-i18n="article9Desc">Learn about the incredible biodiversity of rainforests and their importance.</p>
            <small class="article-date">2024-05-10</small>
          </div>
          <div class="cardFooter">
            <a href="{{route('services')}}" data-i18n="readMore">Read More</a>
          </div>
        </div>

        <!-- Article 10 -->
        <div class="box" data-title="Astronomy for Beginners" data-date="2024-05-20">
          <div class="coverPhoto">
            <img src="{{ asset('assets/front') }}/images/news/10.jpg" alt="Desert" />
          </div>
          <div class="cardText">
            <h3 data-i18n="article10Title">Astronomy for Beginners</h3>
            <p data-i18n="article10Desc">Start your journey into astronomy and learn about planets, stars, and galaxies.</p>
            <small class="article-date">2024-05-20</small>
          </div>
          <div class="cardFooter">
            <a href="{{route('services')}}" data-i18n="readMore">Read More</a>
          </div>
        </div>

        <!-- Article 11 -->
        <div class="box" data-title="How to Care for Your Houseplants" data-date="2024-06-01">
          <div class="coverPhoto">
            <img src="{{ asset('assets/front') }}/images/news/11.jpg" alt="Desert" />
          </div>
          <div class="cardText">
            <h3 data-i18n="article11Title">How to Care for Your Houseplants</h3>
            <p data-i18n="article11Desc">Your daily guide to keeping your plants healthy throughout the seasons.</p>
            <small class="article-date">2024-06-01</small>
          </div>
          <div class="cardFooter">
            <a href="{{route('services')}}" data-i18n="readMore">Read More</a>
          </div>
        </div>

        <!-- Article 12 -->
        <div class="box" data-title="Artificial Intelligence in Our Lives" data-date="2024-06-15">
          <div class="coverPhoto">
            <img src="{{ asset('assets/front') }}/images/news/12.jpeg" alt="Desert" />
          </div>
          <div class="cardText">
            <h3 data-i18n="article12Title">Artificial Intelligence in Our Lives</h3>
            <p data-i18n="article12Desc">How AI is changing the way we work, communicate, and learn.</p>
            <small class="article-date">2024-06-15</small>
          </div>
          <div class="cardFooter">
            <a href="{{route('services')}}" data-i18n="readMore">Read More</a>
          </div>
        </div>

        <!-- Article 13 -->
        <div class="box" data-title="The Smart Traveler's Guide" data-date="2024-07-01">
          <div class="coverPhoto">
            <img src="{{ asset('assets/front') }}/images/news/13.jpg" alt="Desert" />
          </div>
          <div class="cardText">
            <h3 data-i18n="article13Title">The Smart Traveler's Guide</h3>
            <p data-i18n="article13Desc">Smart tips for traveling on a budget while having an unforgettable experience.</p>
            <small class="article-date">2024-07-01</small>
          </div>
          <div class="cardFooter">
            <a href="{{route('services')}}" data-i18n="readMore">Read More</a>
          </div>
        </div>

        <!-- Article 14 -->
        <div class="box" data-title="World Cuisine: A Culinary Journey" data-date="2024-07-12">
          <div class="coverPhoto">
            <img src="{{ asset('assets/front') }}/images/news/14.jpg" alt="Desert" />
          </div>
          <div class="cardText">
            <h3 data-i18n="article14Title">World Cuisine: A Culinary Journey</h3>
            <p data-i18n="article14Desc">Explore famous dishes from different cultures around the world.</p>
            <small class="article-date">2024-07-12</small>
          </div>
          <div class="cardFooter">
            <a href="{{route('services')}}" data-i18n="readMore">Read More</a>
          </div>
        </div>

        <!-- Article 15 -->

       <div class="box" data-title="World Cuisine: A Culinary Journey" data-date="2024-07-12">
          <div class="coverPhoto">
            <img src="{{ asset('assets/front') }}/images/news/15.jpg" alt="Desert" />
          </div>
          <div class="cardText">
            <h3 data-i18n="article15Title">World Cuisine: A Culinary Journey</h3>
            <p data-i18n="article15Desc">Explore famous dishes from different cultures around the world.</p>
            <small class="article-date">2024-03-02</small>
          </div>
          <div class="cardFooter">
            <a href="{{route('services')}}" data-i18n="readMore">Read More</a>
          </div>
        </div>


       <div class="box" data-title="World Cuisine: A Culinary Journey" data-date="2024-07-12">
          <div class="coverPhoto">
            <img src="{{ asset('assets/front') }}/images/news/16.jpeg" alt="Desert" />
          </div>
          <div class="cardText">
            <h3 data-i18n="article16Title">World Cuisine: A Culinary Journey</h3>
            <p data-i18n="article16Desc">Explore famous dishes from different cultures around the world.</p>
            <small class="article-date">2024-07-12</small>
          </div>
          <div class="cardFooter">
            <a href="{{route('services')}}" data-i18n="readMore">Read More</a>
          </div>
        </div>


      <div class="box" data-title="World Cuisine: A Culinary Journey" data-date="2024-14-12">
          <div class="coverPhoto">
            <img src="{{ asset('assets/front') }}/images/news/17.jpg" alt="Desert" />
          </div>
          <div class="cardText">
            <h3 data-i18n="article17Title">World Cuisine: A Culinary Journey</h3>
            <p data-i18n="article17Desc">Explore famous dishes from different cultures around the world.</p>
            <small class="article-date">2024-07-12</small>
          </div>
          <div class="cardFooter">
            <a href="{{route('services')}}" data-i18n="readMore">Read More</a>
          </div>
        </div>

       <div class="box" data-title="World Cuisine: A Culinary Journey" data-date="2024-010-12">
          <div class="coverPhoto">
            <img src="{{ asset('assets/front') }}/images/news/18.jpg" alt="Desert" />
          </div>
          <div class="cardText">
            <h3 data-i18n="article18Title">World Cuisine: A Culinary Journey</h3>
            <p data-i18n="article18Desc">Explore famous dishes from different cultures around the world.</p>
            <small class="article-date">2024-07-12</small>
          </div>
          <div class="cardFooter">
            <a href="{{route('services')}}" data-i18n="readMore">Read More</a>
          </div>
        </div>


      </div>
      <div class="spikes"></div>










@endsection
