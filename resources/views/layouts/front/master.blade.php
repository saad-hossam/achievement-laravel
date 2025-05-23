<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="{{ URL::asset('assets/img/logo.png') }}" type="image/x-icon" />

    <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/front') }}/css/all.min.css" />
  <!--Link Font Awesome 6 Library-->
  <link rel="stylesheet" href="{{ asset('assets/front') }}/css/styles.css" />
  <!--Link Styles Sheet-->
  <link rel="stylesheet" href="{{ asset('assets/front') }}/css/normalize.css" />
  <!--Link Normalize-->
  <link rel="stylesheet" href="{{ asset('assets/front') }}/css/date-range-picker.css" />
  <!--Link Date Range Picker CSS-->
  <link rel="stylesheet" href="{{ asset('assets/front') }}/css/search-states.css" />
  <!--Link Search States CSS-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <!--Link Font Awesome CDN-->

  <title> اﻹنجازات</title>
</head>

<body>
    {{-- <a href="https://api.whatsapp.com/send?phone=2001015791799" target="_blank"><svg viewBox="0 0 32 32" class="whatsapp-ico"><path d=" M19.11 17.205c-.372 0-1.088 1.39-1.518 1.39a.63.63 0 0 1-.315-.1c-.802-.402-1.504-.817-2.163-1.447-.545-.516-1.146-1.29-1.46-1.963a.426.426 0 0 1-.073-.215c0-.33.99-.945.99-1.49 0-.143-.73-2.09-.832-2.335-.143-.372-.214-.487-.6-.487-.187 0-.36-.043-.53-.043-.302 0-.53.115-.746.315-.688.645-1.032 1.318-1.06 2.264v.114c-.015.99.472 1.977 1.017 2.78 1.23 1.82 2.506 3.41 4.554 4.34.616.287 2.035.888 2.722.888.817 0 2.15-.515 2.478-1.318.13-.33.244-.73.244-1.088 0-.058 0-.144-.03-.215-.1-.172-2.434-1.39-2.678-1.39zm-2.908 7.593c-1.747 0-3.48-.53-4.942-1.49L7.793 24.41l1.132-3.337a8.955 8.955 0 0 1-1.72-5.272c0-4.955 4.04-8.995 8.997-8.995S25.2 10.845 25.2 15.8c0 4.958-4.04 8.998-8.998 8.998zm0-19.798c-5.96 0-10.8 4.842-10.8 10.8 0 1.964.53 3.898 1.546 5.574L5 27.176l5.974-1.92a10.807 10.807 0 0 0 16.03-9.455c0-5.958-4.842-10.8-10.802-10.8z" fill-rule="evenodd"></path></svg></a> --}}
<main>


    @include('includes.front.header')
    @yield('content')
    @include('includes.front.footer')
</main>

    @yield('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/front') }}/js/all.min.js"></script>
    <!--Link Font Awesome 6 Library-->
    <script src="{{ asset('assets/front') }}/js/main.js"></script>
    <script src="{{ asset('assets/front') }}/js/date-range-picker.js"></script>
    <script src="{{ asset('assets/front') }}/js/voice-search.js"></script>
    <!--Link Date Range Picker JS-->
    <script>


      // Get references to the checkbox and body
      const darkModeToggle = document.getElementById('chk');
      const body = document.body;

      // Check if dark mode is saved in local storage
      if (localStorage.getItem('darkMode') === 'enabled') {
        body.classList.add('dark-mode');
        darkModeToggle.checked = true;
      }

      // Event listener for toggle
      darkModeToggle.addEventListener('change', () => {
        if (darkModeToggle.checked) {
          body.classList.add('dark-mode');
          localStorage.setItem('darkMode', 'enabled');  // Save preference in local storage
        } else {
          body.classList.remove('dark-mode');
          localStorage.setItem('darkMode', 'disabled');
        }
      });

    </script>
    <script>
      const translations = {
        en: {
          // Header / Navigation
          home: "Home",
          news: "News",
          about: "About",
          videos: "Videos",

          // Search and filters
          search_placeholder: "Search achievements...",
          searchPlaceholder: "Search achievements...",
          category: "Category",
          allCategories: "All Categories",
          military: "Military",
          defense: "Defense",
          industry: "Industry",
          technology: "Technology",
          international: "International Relations",
          development: "Development",
          security: "Security",
          leadership: "Leadership",
          dateRange: "Date Range",
          sortBy: "Sort By",
          dateNewest: "Date (Newest First)",
          dateOldest: "Date (Oldest First)",
          titleAZ: "Title (A-Z)",
          titleZA: "Title (Z-A)",
          clearFilters: "Clear All Filters",
          noResultsTitle: "No Results Found",
          noResultsDesc: "Try adjusting your filters or search criteria.",
          showingArticles: "Showing",
          ofArticles: "of",
          articles: "articles",
          eventsFound: "Events Found",


          // Landing
          landingTitle1: "Major GeneralEngineer",
          landingTitle2: "Mokhtar Abdel Latif",
          landingParagraph: "Chairman of the Board of Directors of the Arab Organization for Industrialization",

          // Articles Section
          latestArticles: " Achievments",
          readMore: "Read More",

          // Article Titles and Descriptions
          article1Title: "Exploring the Desert",
          article1Desc: "Discover the secrets of the world's most arid regions and how life adapts to survive.",
          article2Title: "Cat Behavior Explained",
          article2Desc: "Understand your feline friend better by learning the reasons behind common behaviors.",
          article3Title: "Wildlife in the City",
          article3Desc: "A look at how urban environments are home to surprising wildlife species.",
          article4Title: "The Science of Sleep",
          article4Desc: "Why do we sleep? Dive into the fascinating biology of rest and recovery.",
          article5Title: "Ocean Wonders",
          article5Desc: "Explore the mysterious depths of the ocean and the creatures that live within.",
          article6Title: "Adventures in the Forest",
          article6Desc: "Join us on a journey through lush forests full of beauty and biodiversity.",
          article7Title: "Technology and Nature",
          article7Desc: "How modern innovations are helping to preserve the natural world.",
          article8Title: "Photographing Wildlife",
          article8Desc: "Tips and techniques for capturing stunning wildlife photos in any environment.",
          article9Title: "The Art of Night Photography",
          article9Desc: "Learn how to capture stunning images in the dark using simple settings.",
          article10Title: "Journey in the Alps",
          article10Desc: "Enjoy the breathtaking beauty of the snow-covered mountain peaks.",
          article11Title: "Future Technology",
          article11Desc: "Learn about the latest innovations that will change our lives in the coming years.",
          article12Title: "Life in the Arctic",
          article12Desc: "Discover how animals and humans survive in the harshest environment on Earth.",
          article13Title: "Beginner's Guide to Farming",
          article13Desc: "Start your own home farming journey and learn the best practices for success.",
          article14Title: "Rainforests: Nature's Treasures",
          article14Desc: "Learn about the incredible biodiversity of rainforests and their importance.",
          article15Title: "Astronomy for Beginners",
          article15Desc: "Start your journey into astronomy and learn about planets, stars, and galaxies.",
          article16Title: "How to Care for Your Houseplants",
          article16Desc: "Your daily guide to keeping your plants healthy throughout the seasons.",
          article17Title: "Artificial Intelligence in Our Lives",
          article17Desc: "How AI is changing the way we work, communicate, and learn.",
          article18Title: "The Smart Traveler's Guide",
          article18Desc: "Smart tips for traveling on a budget while having an unforgettable experience.",
          news_links: " News Links",

          // Filters
          filterTitle: "Title:",
          filterDay: "Day:",
          filterMonth: "Month:",
          filterYear: "Year:",
          applyFilter: "Apply Filter",
          all: "All",

          // Months
          month1: "January",
          month2: "February",
          month3: "March",
          month4: "April",
          month5: "May",
          month6: "June",
          month7: "July",
          month8: "August",
          month9: "September",
          month10: "October",
          month11: "November",
          month12: "December"
        },

        ar: {
          // Header / Navigation
          home: " الرئيسية",
          news: "الانجازات",
          about: "معلومات عنا",
          features: "مميزات",
          "other links": "روابط أخرى",
          gallary: "معرض الصور",
          "team members": "أعضاء الفريق",
          services: "خدمات",
          "our skills": "مهاراتنا",
          "how it works": "كيف يعمل",
          events: "الأحداث",
          "pricing plans": "خطط الأسعار",
          "videos": "معرض الفيديوهات",
          stats: "الإحصائيات",
          "request a discount": "طلب خصم",
          dateFrom: "من تاريخ:",
          dateTo: "الى تاريخ:",

          // Filter Elements
          search_placeholder: "البحث في الإنجازات...",
          category: "التصنيف",
          allCategories: "كل التصنيفات",
          military: "عسكري",
          defense: "دفاع",
          industry: "صناعة",
          technology: "تكنولوجيا",
          international: "علاقات دولية",
          development: "تطوير",
          security: "أمن",
          leadership: "قيادة",
          dateRange: "النطاق الزمني",
          sortBy: "ترتيب حسب",
          dateNewest: "التاريخ (الأحدث أولاً)",
          dateOldest: "التاريخ (الأقدم أولاً)",
          titleAZ: "العنوان (أ-ي)",
          titleZA: "العنوان (ي-أ)",
          clearFilters: "مسح الفلاتر",
          noResultsTitle: "لم يتم العثور على نتائج",
          noResultsDesc: "حاول تعديل المرشحات أو معايير البحث.",
          showingArticles: "إظهار",
          ofArticles: "من",
          articles: "المقالات",
          eventsFound: "فعالية تم العثور عليها",


          // Landing
          landingTitle1: "اللواء مهندس",
          landingTitle2: "مختار عبد اللطيف",
          landingParagraph: "رئيس مجلس إدارة الهيئة العربية للتصنيع",

          // Articles Section
          latestArticles: " الانجازات ",
          readMore: "اقرأ المزيد",

          // Article Titles and Descriptions
          article1Title: "استكشاف الصحراء",
          article1Desc: "اكتشف أسرار المناطق الأكثر جفافًا في العالم وكيف تتكيف الحياة للبقاء.",
          article2Title: "شرح سلوك القطط",
          article2Desc: "افهم صديقك القط بشكل أفضل من خلال التعرف على أسباب السلوكيات الشائعة.",
          article3Title: "الحياة البرية في المدينة",
          article3Desc: "نظرة على كيف أن البيئات الحضرية تأوي أنواعًا مدهشة من الحياة البرية.",
          article4Title: "علم النوم",
          article4Desc: "لماذا ننام؟ استكشف البيولوجيا المدهشة للراحة والتعافي.",
          article5Title: "عجائب المحيط",
          article5Desc: "استكشف أعماق المحيط الغامضة والمخلوقات التي تعيش فيها.",
          article6Title: "مغامرات في الغابة",
          article6Desc: "انضم إلينا في رحلة عبر الغابات المورقة المليئة بالجمال والتنوع البيولوجي.",
          article7Title: "التكنولوجيا والطبيعة",
          article7Desc: "كيف تساعد الابتكارات الحديثة في الحفاظ على العالم الطبيعي.",
          article8Title: "تصوير الحياة البرية",
          article8Desc: "نصائح وتقنيات لالتقاط صور مذهلة للحياة البرية في أي بيئة.",
          article9Title: "فن التصوير الليلي",
          article9Desc: "تعلم كيفية التقاط صور رائعة في الظلام باستخدام الإعدادات البسيطة.",
          article10Title: "رحلة إلى جبال الألب",
          article10Desc: "استمتع بجمال قمم الجبال المغطاة بالثلوج.",
          article11Title: "تكنولوجيا المستقبل",
          article11Desc: "تعرف على أحدث الابتكارات التي ستغير حياتنا في السنوات القادمة.",
          article12Title: "الحياة في القطب الشمالي",
          article12Desc: "اكتشف كيف ينجو الحيوانات والبشر في أقسى بيئة على وجه الأرض.",
          article13Title: "دليل المبتدئين في الزراعة",
          article13Desc: "ابدأ رحلتك الزراعية في المنزل وتعلم أفضل الممارسات للنجاح.",
          article14Title: "الغابات المطيرة: كنوز الطبيعة",
          article14Desc: "تعرف على التنوع البيولوجي المدهش للغابات المطيرة وأهميتها.",
          article15Title: "الفلك للمبتدئين",
          article15Desc: "ابدأ رحلتك في علم الفلك وتعلم عن الكواكب والنجوم والمجرات.",
          article16Title: "كيفية العناية بالنباتات المنزلية",
          article16Desc: "دليلك اليومي للحفاظ على صحة نباتاتك طوال الفصول.",
          article17Title: "الذكاء الاصطناعي في حياتنا",
          article17Desc: "كيف يغير الذكاء الاصطناعي الطريقة التي نعمل بها ونتواصل بها ونتعلم.",
          article18Title: "دليل المسافر الذكي",
          article18Desc: "نصائح ذكية للسفر بميزانية محدودة مع تجربة لا تُنسى.",
          news_links: "لينكات الصحف",

          // Filters
          filterTitle: "العنوان:",
          filterDay: "اليوم:",
          filterMonth: "الشهر:",
          filterYear: "السنة:",
          applyFilter: "تطبيق الفلتر",
          all: "الكل",

          // Months
          month1: "يناير",
          month2: "فبراير",
          month3: "مارس",
          month4: "أبريل",
          month5: "مايو",
          month6: "يونيو",
          month7: "يوليو",
          month8: "أغسطس",
          month9: "سبتمبر",
          month10: "أكتوبر",
          month11: "نوفمبر",
          month12: "ديسمبر"
        }
      };


      function typeText(element, text, speed, callback) {
        element.textContent = '';
        let index = 0;
        function type() {
          if (index < text.length) {
            element.textContent += text.charAt(index);
            index++;
            setTimeout(type, speed);
          } else if (callback) {
            callback();
          }
        }
        type();
      }

      function updateLanguage(language) {
        const elements = document.querySelectorAll('[data-lang], [data-i18n]');

        // First, immediately update all article content and regular elements
        elements.forEach(element => {
          const key = element.getAttribute('data-lang') || element.getAttribute('data-i18n');
          const translation = translations[language][key];
          if (!translation) return;

          // For articles and regular elements - update immediately without animation
          if (element.closest('.box') || element.tagName === 'OPTION' ||
              !element.id || (element.id !== "landing-title" && element.id !== "landing-paragraph")) {
            element.textContent = translation;
          }
        });

        // Update placeholders for elements with data-i18n-placeholder attributes
        const placeholderElements = document.querySelectorAll('[data-i18n-placeholder]');
        placeholderElements.forEach(element => {
          const key = element.getAttribute('data-i18n-placeholder');
          const translation = translations[language][key];
          if (translation) {
            element.placeholder = translation;
          }
        });

        // Only animate landing page elements with typewriter effect
        const landingTitle = document.getElementById("landing-title");
        const landingParagraph = document.getElementById("landing-paragraph");

        if (landingTitle) {
          const titleKey = landingTitle.getAttribute('data-lang') || landingTitle.getAttribute('data-i18n');
          const titleTranslation = translations[language][titleKey];
          if (titleTranslation) {
            typeText(landingTitle, titleTranslation, 20);
          }
        }

        if (landingParagraph) {
          const paraKey = landingParagraph.getAttribute('data-lang') || landingParagraph.getAttribute('data-i18n');
          const paraTranslation = translations[language][paraKey];
          if (paraTranslation) {
            setTimeout(() => {
              typeText(landingParagraph, paraTranslation, 10);
            }, 500); // Small delay after title
          }
        }

        // Update navigation links
        elements.forEach(element => {
          if (element.classList.contains('headLinks')) {
            const key = element.getAttribute('data-lang') || element.getAttribute('data-i18n');
            const translation = translations[language][key];
            if (translation) {
              element.textContent = translation;
            }
          }
        });

        // Update document direction and store language preference
        document.body.setAttribute('dir', language === 'ar' ? 'rtl' : 'ltr');
        localStorage.setItem('selectedLanguage', language);

        // Dispatch language change event for other scripts
        const langChangeEvent = new CustomEvent('langChange', {
          detail: language,
          bubbles: true
        });
        document.dispatchEvent(langChangeEvent);
      }

      window.addEventListener("DOMContentLoaded", () => {
        // Check for saved language preference
        const savedLanguage = localStorage.getItem('selectedLanguage') || 'en';
        const langToggle = document.getElementById("chklang");

        // Set initial state based on saved preference
        if (savedLanguage === 'ar') {
          langToggle.checked = true;
        }

        // Store translations globally for other scripts to access
        window.translations = translations;

        // Make sure translations are fully initialized before filters are created
        document.dispatchEvent(new CustomEvent('translationsLoaded', {
          detail: { language: savedLanguage }
        }));

        // Update language on page load
        updateLanguage(savedLanguage);

        // Add change event listener
        if (langToggle) {
          langToggle.addEventListener("change", function () {
            const selectedLanguage = this.checked ? "ar" : "en";

            // Save language preference
            localStorage.setItem('selectedLanguage', selectedLanguage);

            // Reload the page to apply all language changes fully
            window.location.reload();

            // Note: The code below won't run because of the reload, but we'll keep it
            // in case the reload approach is changed later

            // Update language
            updateLanguage(selectedLanguage);

            // Update filter dropdowns if function exists
            if (typeof window.updateFilterDropdowns === 'function') {
              window.updateFilterDropdowns(selectedLanguage);
            }

            // Apply translations without page reload
            updateLanguage(selectedLanguage);

            // Update filter dropdowns if function exists
            if (typeof window.updateFilterDropdowns === 'function') {
              window.updateFilterDropdowns(selectedLanguage);
            }

            // Update date range picker if function exists
            if (typeof window.updateDateRangePicker === 'function') {
              window.updateDateRangePicker(selectedLanguage);
            }
          });
        }
      });
    </script>

    <script>
      // Add null checks before adding event listeners
      const filterButton = document.getElementById('filterButton');
      if (filterButton) {
        filterButton.addEventListener('click', () => {
          const titleFilter = document.getElementById('titleFilter')?.value.trim().toLowerCase() || '';
          const selectedDay = document.getElementById('daySelect')?.value || '';
          const selectedMonth = document.getElementById('monthSelect')?.value || '';
          const selectedYear = document.getElementById('yearSelect')?.value || '';
          const fromDateValue = document.getElementById('from-date')?.value || '';
          const toDateValue = document.getElementById('to-date')?.value || '';

          // Convert from/to date values to actual Date objects, if valid.
          const fromDate = fromDateValue ? new Date(fromDateValue) : null;
          const toDate = toDateValue ? new Date(toDateValue) : null;

          const articles = document.querySelectorAll('#articles .box');
          if (articles.length > 0) {
            articles.forEach(box => {
              const title = box.getAttribute('data-title')?.toLowerCase() || '';
              const dateStr = box.getAttribute('data-date');
              // Skip processing if there's no data-date attribute
              if (!dateStr) return;

              const date = new Date(dateStr);

              let match = true;

              // Filter by title
              if (titleFilter && !title.includes(titleFilter)) {
                match = false;
              }

              // Filter by day
              if (selectedDay && date.getDate() !== parseInt(selectedDay)) {
                match = false;
              }

              // Filter by month
              if (selectedMonth && (date.getMonth() + 1) !== parseInt(selectedMonth)) {
                match = false;
              }

              // Filter by year
              if (selectedYear && date.getFullYear() !== parseInt(selectedYear)) {
                match = false;
              }

              // Filter by from date
              if (fromDate && date < fromDate) {
                match = false;
              }

              // Filter by to date
              if (toDate && date > toDate) {
                match = false;
              }

              // Apply the filter by displaying or hiding the box
              box.style.display = match ? 'block' : 'none';
            });
          }
        });
      }
    </script>

    <script>
      // Add null check before adding event listener
      const resetButton = document.getElementById('resetButton');
      if (resetButton) {
        resetButton.addEventListener('click', function () {
          // Clear all filter inputs with null checks
          const titleFilter = document.getElementById('titleFilter');
          const daySelect = document.getElementById('daySelect');
          const monthSelect = document.getElementById('monthSelect');
          const yearSelect = document.getElementById('yearSelect');
          const fromDate = document.getElementById('from-date');
          const toDate = document.getElementById('to-date');

          if (titleFilter) titleFilter.value = '';
          if (daySelect) daySelect.value = '';
          if (monthSelect) monthSelect.value = '';
          if (yearSelect) yearSelect.value = '';
          if (fromDate) fromDate.value = '';
          if (toDate) toDate.value = '';

          // Show all articles again
          document.querySelectorAll('.box').forEach(function (box) {
            box.style.display = 'block';
          });
        });
      }
    </script>

    <script>
      // Function to change the main image when a thumbnail is clicked
      function changeImage(src) {
        const mainImage = document.getElementById('mainImage');
        // Only proceed if main image exists
        if (mainImage) {
          // Change the main image
          mainImage.src = src;

          // Optional: Highlight the selected thumbnail
          const thumbnails = document.querySelectorAll('.thumbnail');
          if (thumbnails.length > 0) {
            thumbnails.forEach(thumb => {
              thumb.classList.remove('selected');
            });

            const selectedThumbnail = Array.from(thumbnails).find(thumb => thumb.src.includes(src));
            if (selectedThumbnail) {
              selectedThumbnail.classList.add('selected');
            }
          }
        }
      }
    </script>

    <!-- Wrap all script executions in safety checks -->
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        // Safely initialize components
        try {
          // Initialize filters if present
          if (typeof initFilters === 'function' && document.getElementById('filterButton')) {
            initFilters();
          }

          // Initialize dropdowns if present
          if (typeof initFilterDropdowns === 'function') {
            initFilterDropdowns();
          }
        } catch (error) {
          console.log("Error initializing page components:", error);
        }
      });
    </script>


<script>
    document.addEventListener("DOMContentLoaded", function () {
      // Load thumbnails
      document.querySelectorAll('#videoList li').forEach(li => {
        const videoUrl = li.getAttribute("data-video");
        const videoId = videoUrl.split("/").pop(); // get ID after /embed/
        const img = li.querySelector("img.thumbnail");
        img.src = `https://img.youtube.com/vi/${videoId}/hqdefault.jpg`;
        img.alt = "Video thumbnail";
      });
    
      // Load selected video
      const videoPlayer = document.getElementById("videoPlayer");
      const videoInfo = document.getElementById("videoInfo");
    
      document.querySelectorAll('#videoList li').forEach(li => {
        li.addEventListener("click", function () {
          const videoUrl = li.getAttribute("data-video");
          const info = li.getAttribute("data-info");
    
          videoPlayer.src = videoUrl;
          if (videoInfo) videoInfo.textContent = info;
        });
      });
    });
  </script>
        
 
  <script>
    // Thumbnail slider functionality
    document.addEventListener('DOMContentLoaded', function() {
      const thumbnailsWrapper = document.querySelector('.thumbnails-wrapper');
      const prevButton = document.querySelector('.slider-prev');
      const nextButton = document.querySelector('.slider-next');
      
      if (thumbnailsWrapper && prevButton && nextButton) {
        // Set scroll amount to thumbnail width + gap (approximately)
        const scrollAmount = 85 * 3; 
        
        // Function to check if page is in RTL mode
        function isRTLMode() {
          return document.dir === 'rtl' || document.body.getAttribute('dir') === 'rtl';
        }
        
        // Function to scroll thumbnails that handles RTL mode automatically
        function scrollThumbnails(direction) {
          const scrollDir = isRTLMode() ? -direction : direction;
          thumbnailsWrapper.scrollBy({
            left: scrollDir * scrollAmount,
            behavior: 'smooth'
          });
          
          // After scrolling, update arrow visibility
          setTimeout(updateArrowVisibility, 300);
        }
        
        // Function to update arrow visibility based on scroll position
        function updateArrowVisibility() {
          const scrollPosition = thumbnailsWrapper.scrollLeft;
          const maxScroll = thumbnailsWrapper.scrollWidth - thumbnailsWrapper.clientWidth;
          
          // In RTL mode, scrollLeft is negative and goes from 0 to -maxScroll
          if (isRTLMode()) {
            // For RTL: show prev when not at rightmost position (scrollLeft is not 0)
            prevButton.classList.toggle('hidden', scrollPosition >= 0);
            // For RTL: show next when not at leftmost position (scrollLeft is not at -maxScroll)
            nextButton.classList.toggle('hidden', scrollPosition <= -maxScroll + 5);
          } else {
            // For LTR: show prev when not at leftmost position (scrollLeft is not 0)
            prevButton.classList.toggle('hidden', scrollPosition <= 0);
            // For LTR: show next when not at rightmost position (scrollLeft is not at maxScroll)
            nextButton.classList.toggle('hidden', scrollPosition >= maxScroll - 5);
          }
        }
        
        // Button click handlers
        prevButton.addEventListener('click', function() {
          scrollThumbnails(-1); // Scroll left in LTR, right in RTL
        });
        
        nextButton.addEventListener('click', function() {
          scrollThumbnails(1);  // Scroll right in LTR, left in RTL
        });
        
        // Update navigation on language change
        const langToggle = document.getElementById('chklang');
        if (langToggle) {
          langToggle.addEventListener('change', function() {
            // Small delay to allow the dir attribute to update
            setTimeout(() => {
              // Clear the scroll position to avoid confusion
              thumbnailsWrapper.scrollLeft = 0;
              updateArrowVisibility();
            }, 200);
          });
        }
        
        // Listen for scroll events to update arrow visibility
        thumbnailsWrapper.addEventListener('scroll', updateArrowVisibility);
        
        // Initial check for arrow visibility
        updateArrowVisibility();
        
        // Also update on window resize
        window.addEventListener('resize', updateArrowVisibility);
      }
    });

    // Global variables to track current image state
    let imagePaths = [];
    let currentImageIndex = 0;

    // Function to initialize image paths from thumbnails
    function initializeImagePaths() {
      const thumbnails = document.querySelectorAll('.thumbnail');
      imagePaths = Array.from(thumbnails).map(thumb => thumb.src);
      
      // Update total images display
      document.getElementById('totalImages').textContent = imagePaths.length;
    }

    // Initialize on document load
    document.addEventListener('DOMContentLoaded', function() {
      initializeImagePaths();
    });

    // Function to change the main image when a thumbnail is clicked
    function changeImage(src) {
      const mainImage = document.getElementById('mainImage');
      
      // Add fade-out effect
      mainImage.style.opacity = '0';
      mainImage.style.transition = 'opacity 0.3s ease';
      
      // Change image after fade out
      setTimeout(function() {
        mainImage.src = src;
  
        // Update current image index for the overlay
        const thumbnails = document.querySelectorAll('.thumbnail');
        currentImageIndex = Array.from(thumbnails).findIndex(thumb => thumb.src.includes(src));
        
        // Update indicators
        updateImageIndicators(currentImageIndex);
        
        // Fade back in
        mainImage.style.opacity = '1';
      }, 300);
  
      // Highlight the selected thumbnail
      const thumbnails = document.querySelectorAll('.thumbnail');
      thumbnails.forEach(thumb => {
        thumb.classList.remove('selected');
      });
  
      const selectedThumbnail = Array.from(thumbnails).find(thumb => thumb.src.includes(src));
      if (selectedThumbnail) {
        selectedThumbnail.classList.add('selected');
        
        // Scroll the thumbnail into view if needed
        selectedThumbnail.scrollIntoView({
          behavior: 'smooth',
          block: 'nearest',
          inline: 'center'
        });
      }
    }

    // Initialize with first thumbnail selected
    document.addEventListener('DOMContentLoaded', function() {
      const firstThumbnail = document.querySelector('.thumbnail');
      if (firstThumbnail) {
        firstThumbnail.classList.add('selected');
      }
    });

    // Fullscreen overlay functions
    function openFullscreenOverlay(src) {
      const overlay = document.getElementById('fullscreenOverlay');
      const overlayImage = document.getElementById('overlayImage');
      
      // Set the image source
      overlayImage.src = src;
      
      // Update current image index
      const thumbnails = document.querySelectorAll('.thumbnail');
      currentImageIndex = Array.from(thumbnails).findIndex(thumb => thumb.src.includes(src));
      
      // Update counter
      document.getElementById('currentImageIndex').textContent = currentImageIndex + 1;
      
      // Show overlay with transition
      overlay.style.display = 'flex';
      setTimeout(() => {
        overlay.classList.add('active');
      }, 10);
      
      // Add loaded class when image is loaded
      overlayImage.onload = function() {
        overlayImage.classList.add('loaded');
      };
      
      // Disable body scroll
      document.body.style.overflow = 'hidden';
      
      // Listen for keyboard events
      document.addEventListener('keydown', handleKeyPress);
    }

    function closeFullscreenOverlay() {
      const overlay = document.getElementById('fullscreenOverlay');
      const overlayImage = document.getElementById('overlayImage');
      
      // Hide with transition
      overlay.classList.remove('active');
      setTimeout(() => {
        overlay.style.display = 'none';
        overlayImage.classList.remove('loaded');
      }, 300);
      
      // Re-enable body scroll
      document.body.style.overflow = 'auto';
      
      // Remove keyboard event listener
      document.removeEventListener('keydown', handleKeyPress);
    }

    function changeOverlayImage(direction) {
      const overlayImage = document.getElementById('overlayImage');
      const prevBtn = document.querySelector('.overlay-nav.prev-btn');
      const nextBtn = document.querySelector('.overlay-nav.next-btn');
      
      // Remove loaded class
      overlayImage.classList.remove('loaded');
      
      // Calculate new index based on direction
      const isRTL = document.dir === 'rtl' || document.body.getAttribute('dir') === 'rtl';
      const effectiveDirection = isRTL ? -direction : direction;
      
      currentImageIndex = (currentImageIndex + effectiveDirection + imagePaths.length) % imagePaths.length;
      
      // Update counter
      document.getElementById('currentImageIndex').textContent = currentImageIndex + 1;
      
      // Update navigation buttons visibility
      updateOverlayNavVisibility();
      
      // Change the image with fade effect
      setTimeout(() => {
        overlayImage.src = imagePaths[currentImageIndex];
        
        // Add loaded class when image is loaded
        overlayImage.onload = function() {
          overlayImage.classList.add('loaded');
        };
      }, 300);
    }
    
    function updateOverlayNavVisibility() {
      const prevBtn = document.querySelector('.overlay-nav.prev-btn');
      const nextBtn = document.querySelector('.overlay-nav.next-btn');
      const totalImages = imagePaths.length;
      
      if (!prevBtn || !nextBtn) return;
      
      // Hide previous button if at first image
      prevBtn.classList.toggle('hidden', currentImageIndex === 0);
      
      // Hide next button if at last image
      nextBtn.classList.toggle('hidden', currentImageIndex === totalImages - 1);
    }

    function handleKeyPress(e) {
      // Handle arrow keys and escape
      switch(e.key) {
        case 'Escape':
          closeFullscreenOverlay();
          break;
        case 'ArrowLeft':
          changeOverlayImage(-1);
          break;
        case 'ArrowRight':
          changeOverlayImage(1);
          break;
      }
    }
  </script>
  
  <script>
    // Standalone overlay functionality
    document.addEventListener('DOMContentLoaded', function() {
      console.log('DOM fully loaded - initializing overlay functionality');
      initializeOverlay();
    });
    
    // If the DOM is already loaded, run initialization immediately
    if (document.readyState === 'complete' || document.readyState === 'interactive') {
      console.log('DOM already loaded - initializing overlay functionality immediately');
      initializeOverlay();
    }
    
    function initializeOverlay() {
      // Get references to overlay elements
      const overlay = document.getElementById('fullscreenOverlay');
      const overlayImage = document.getElementById('overlayImage');
      const testButton = document.getElementById('testOverlayBtn');
      const mainImage = document.getElementById('mainImage');
      
      // Set up test button click handler
      if (testButton) {
        testButton.addEventListener('click', function() {
          openFullscreenOverlay(mainImage.src);
        });
      }
      
      // Make sure main image is clickable
      const mainImageContainer = document.getElementById('mainImageContainer');
      if (mainImage && mainImageContainer) {
        // Add click event to both the image and its container
        mainImage.addEventListener('click', function() {
          openFullscreenOverlay(this.src);
        });
        
        mainImageContainer.addEventListener('click', function() {
          openFullscreenOverlay(mainImage.src);
        });
        
        console.log("Click handlers added to main image");
      }
      
      // Populate image paths immediately
      const thumbnails = document.querySelectorAll('.thumbnail');
      const imagePaths = Array.from(thumbnails).map(thumb => thumb.src);
      
      // Update total images count
      const totalImagesElement = document.getElementById('totalImages');
      if (totalImagesElement) {
        totalImagesElement.textContent = imagePaths.length;
      }
      
      // Expose necessary variables and functions to global scope
      window.imagePaths = imagePaths;
      window.currentImageIndex = 0;
      
      window.openFullscreenOverlay = function(src) {
        console.log("Opening overlay with image:", src);
        
        // Set the image source
        overlayImage.src = src;
        
        // Find current image index
        window.currentImageIndex = imagePaths.findIndex(path => path.includes(src.split('/').pop()));
        if (window.currentImageIndex === -1) window.currentImageIndex = 0;
        
        // Update counter
        document.getElementById('currentImageIndex').textContent = window.currentImageIndex + 1;
        
        // Update navigation buttons visibility
        if (typeof updateOverlayNavVisibility === 'function') {
          updateOverlayNavVisibility();
        } else {
          // If the function isn't defined yet, create a simple version
          const prevBtn = document.querySelector('.overlay-nav.prev-btn');
          const nextBtn = document.querySelector('.overlay-nav.next-btn');
          const totalImages = imagePaths.length;
          
          // Hide previous button if at first image
          if (prevBtn) prevBtn.classList.toggle('hidden', window.currentImageIndex === 0);
          
          // Hide next button if at last image
          if (nextBtn) nextBtn.classList.toggle('hidden', window.currentImageIndex === totalImages - 1);
        }
        
        // Show overlay with transition
        overlay.style.display = 'flex';
        setTimeout(() => {
          overlay.classList.add('active');
        }, 10);
        
        // Add loaded class when image is loaded
        overlayImage.onload = function() {
          overlayImage.classList.add('loaded');
        };
        
        // Disable body scroll
        document.body.style.overflow = 'hidden';
        
        // Listen for keyboard events
        document.addEventListener('keydown', handleKeyPress);
      };
      
      window.closeFullscreenOverlay = function() {
        // Hide with transition
        overlay.classList.remove('active');
        setTimeout(() => {
          overlay.style.display = 'none';
          overlayImage.classList.remove('loaded');
        }, 300);
        
        // Re-enable body scroll
        document.body.style.overflow = 'auto';
        
        // Remove keyboard event listener
        document.removeEventListener('keydown', handleKeyPress);
      };
      
      window.changeOverlayImage = function(direction) {
        // Remove loaded class
        overlayImage.classList.remove('loaded');
        
        // Calculate new index based on direction
        const isRTL = document.dir === 'rtl' || document.body.getAttribute('dir') === 'rtl';
        const effectiveDirection = isRTL ? -direction : direction;
        
        window.currentImageIndex = (window.currentImageIndex + effectiveDirection + imagePaths.length) % imagePaths.length;
        
        // Update counter
        document.getElementById('currentImageIndex').textContent = window.currentImageIndex + 1;
        
        // Change the image with fade effect
        setTimeout(() => {
          overlayImage.src = imagePaths[window.currentImageIndex];
          
          // Add loaded class when image is loaded
          overlayImage.onload = function() {
            overlayImage.classList.add('loaded');
          };
        }, 300);
      };
      
      function handleKeyPress(e) {
        // Handle arrow keys and escape
        switch(e.key) {
          case 'Escape':
            window.closeFullscreenOverlay();
            break;
          case 'ArrowLeft':
            window.changeOverlayImage(-1);
            break;
          case 'ArrowRight':
            window.changeOverlayImage(1);
            break;
        }
      }
      
      window.handleKeyPress = handleKeyPress;
      
      console.log("Fullscreen overlay initialized with " + imagePaths.length + " images");
    }
  </script>
  
  <!-- Video Player JavaScript -->
  <script>
    // Content Filter Functionality
    document.addEventListener('DOMContentLoaded', function() {
      const filterButtons = document.querySelectorAll('.filter-btn');
      const contentSections = document.querySelectorAll('[data-content-type]');
      
      // Initialize with 'all' filter
      applyActiveFilter('all');
      
      // Add click event listeners to filter buttons
      filterButtons.forEach(button => {
        button.addEventListener('click', function() {
          const filter = this.getAttribute('data-filter');
          
          // Update active button
          filterButtons.forEach(btn => btn.classList.remove('active'));
          this.classList.add('active');
          
          // Apply the filter
          applyActiveFilter(filter);
        });
      });
      
      // Function to apply the active filter
      function applyActiveFilter(filter) {
        // First fade out all content
        contentSections.forEach(section => {
          section.classList.add('fade-out');
        });
        
        // After transition completes, show/hide sections based on filter
        setTimeout(() => {
          contentSections.forEach(section => {
            const contentType = section.getAttribute('data-content-type');
            
            if (filter === 'all' || filter === contentType) {
              section.classList.remove('hidden-content');
              setTimeout(() => {
                section.classList.remove('fade-out');
                section.classList.add('fade-in');
              }, 50);
            } else {
              section.classList.add('hidden-content');
            }
          });
          
          // Trigger window resize to ensure sliders update properly
          window.dispatchEvent(new Event('resize'));
        }, 300);
      }
    });
    
    // Main Video Player Function
    function playInMainPlayer(videoCard) {
      // Get video information from data attributes
      const videoId = videoCard.getAttribute('data-video-id');
      const videoTitle = videoCard.getAttribute('data-video-title');
      const videoDesc = videoCard.getAttribute('data-video-desc');
      
      // Update main player
      const mainPlayer = document.getElementById('mainVideoPlayer');
      const mainTitle = document.getElementById('mainVideoTitle');
      const mainDesc = document.getElementById('mainVideoDescription');
      
      // Add a loading class to the container
      const container = document.querySelector('.main-video-container');
      container.classList.add('loading');
      
      // Update video source with slight delay to allow for loading animation
      setTimeout(() => {
        mainPlayer.src = `https://www.youtube.com/embed/${videoId}?autoplay=1`;
        mainTitle.textContent = videoTitle;
        mainDesc.textContent = videoDesc;
        
        // Remove the loading class
        container.classList.remove('loading');
        
        // Highlight the active video card
        const videoCards = document.querySelectorAll('.video-card');
        const currentIndex = Array.from(videoCards).indexOf(videoCard);
        
        videoCards.forEach(card => {
          card.classList.remove('active');
        });
        videoCard.classList.add('active');
        
        // Update video indicators
        updateVideoIndicators(currentIndex);
        
        // Scroll the selected thumbnail into better view within the slider
        centerSelectedVideoInSlider(videoCard);
        
        // Scroll to the main video area if on mobile
        if (window.innerWidth < 768) {
          document.querySelector('.main-video-container').scrollIntoView({
            behavior: 'smooth',
            block: 'start'
          });
        }
      }, 300);
    }
    
    // Function to center the selected video card in the slider
    function centerSelectedVideoInSlider(videoCard) {
      const sliderTrack = document.querySelector('.video-slider-track');
      const sliderWrapper = document.querySelector('.video-slider-track-wrapper');
      
      if (!sliderTrack || !sliderWrapper) return;
      
      // Get all video cards and determine special positions
      const videoCards = sliderTrack.querySelectorAll('.video-card');
      const totalCards = videoCards.length;
      const isFirstVideo = videoCard === videoCards[0];
      const isSecondVideo = videoCard === videoCards[1];
      const isLastVideo = videoCard === videoCards[totalCards - 1];
      
      // Calculate max scroll position
      const containerWidth = sliderWrapper.offsetWidth;
      const trackWidth = sliderTrack.scrollWidth;
      const maxScroll = Math.max(0, trackWidth - containerWidth);
      
      // Handle special cases for first, second, and last video
      if (isFirstVideo || isSecondVideo) {
        // First or second video: reset to beginning position
        console.log("First or second video selected, setting to beginning position");
        sliderTrack.style.transition = 'transform 0.5s ease';
        sliderTrack.style.transform = 'translateX(0)';
        window.currentVideoPosition = 0;
        return;
      }
      
      if (isLastVideo) {
        // Last video: go to end position
        console.log("Last video selected, setting to end position");
        const isRTL = document.dir === 'rtl' || document.body.getAttribute('dir') === 'rtl';
        const endPosition = isRTL ? maxScroll : -maxScroll;
        
        sliderTrack.style.transition = 'transform 0.5s ease';
        sliderTrack.style.transform = `translateX(${endPosition}px)`;
        window.currentVideoPosition = Math.abs(endPosition);
        return;
      }
      
      // For other videos, continue with normal centering
      // Check if RTL mode is active
      const isRTL = document.dir === 'rtl' || document.body.getAttribute('dir') === 'rtl';
      
      // Calculate the current scroll position and the card's position
      const wrapperRect = sliderWrapper.getBoundingClientRect();
      const cardRect = videoCard.getBoundingClientRect();
      
      // Calculate center positions
      const wrapperCenter = wrapperRect.left + (wrapperRect.width / 2);
      const cardCenter = cardRect.left + (cardRect.width / 2);
      
      // Calculate how far the card is from the center
      const distanceFromCenter = cardCenter - wrapperCenter;
      
      // Get the current transform value
      let currentTranslate = 0;
      const transformValue = sliderTrack.style.transform;
      if (transformValue) {
        const match = transformValue.match(/translateX\(([-\d.]+)px\)/);
        if (match && match[1]) {
          currentTranslate = parseFloat(match[1]);
        }
      }
      
      // Calculate new position, accounting for RTL if needed
      let newTranslate = currentTranslate;
      if (isRTL) {
        newTranslate -= distanceFromCenter;
      } else {
        newTranslate -= distanceFromCenter;
      }
      
      // Apply boundary limits
      if (Math.abs(newTranslate) > maxScroll) {
        newTranslate = isRTL ? maxScroll : -maxScroll;
      }
      if (newTranslate > 0 && !isRTL) newTranslate = 0;
      if (newTranslate < 0 && isRTL) newTranslate = 0;
      
      // Apply the new transform with smooth animation
      sliderTrack.style.transition = 'transform 0.5s ease';
      sliderTrack.style.transform = `translateX(${newTranslate}px)`;
      
      // Update the stored position for the slider navigation
      window.currentVideoPosition = Math.abs(newTranslate);
    }
    
    // Video Modal Functions
    function openVideoModal(videoSrc) {
      // Get modal elements
      const modal = document.getElementById('videoModal');
      const videoFrame = document.getElementById('videoFrame');
      
      // Set video source
      videoFrame.src = videoSrc;
      
      // Show modal with a fade effect
      modal.style.display = 'block';
      setTimeout(() => {
        modal.style.opacity = '1';
      }, 10);
      
      // Disable body scroll
      document.body.style.overflow = 'hidden';
      
      // Add escape key event listener
      document.addEventListener('keydown', handleVideoModalKeyPress);
    }
    
    function closeVideoModal() {
      // Get modal elements
      const modal = document.getElementById('videoModal');
      const videoFrame = document.getElementById('videoFrame');
      
      // Fade out and hide
      modal.style.opacity = '0';
      setTimeout(() => {
        modal.style.display = 'none';
        // Clear video source to stop playback
        videoFrame.src = '';
      }, 300);
      
      // Re-enable body scroll
      document.body.style.overflow = 'auto';
      
      // Remove key event listener
      document.removeEventListener('keydown', handleVideoModalKeyPress);
    }
    
    function handleVideoModalKeyPress(e) {
      if (e.key === 'Escape') {
        closeVideoModal();
      }
    }
    
    // Close the modal if user clicks outside of content
    window.addEventListener('click', function(event) {
      const modal = document.getElementById('videoModal');
      if (event.target === modal) {
        closeVideoModal();
      }
    });
    
    // Initialize the first video as active on page load
    document.addEventListener('DOMContentLoaded', function() {
      const firstVideoCard = document.querySelector('.video-card');
      if (firstVideoCard) {
        // Just add active class without triggering centering
        firstVideoCard.classList.add('active');
        
        // Reset track position to ensure we start at the beginning
        const videoTrack = document.querySelector('.video-slider-track');
        if (videoTrack) {
          videoTrack.style.transform = 'translateX(0)';
          window.currentVideoPosition = 0;
        }
      }
    });
  </script>

 

  <script>
    // Video slider navigation
    document.addEventListener('DOMContentLoaded', function() {
      const videoTrack = document.querySelector('.video-slider-track');
      const prevButton = document.querySelector('.video-prev-btn');
      const nextButton = document.querySelector('.video-next-btn');
      
      // Ensure buttons are visible by default until we can check them
      if (prevButton) {
        prevButton.classList.remove('hidden');
        prevButton.style.opacity = "1";
        prevButton.style.visibility = "visible";
      }
      
      if (nextButton) {
        nextButton.classList.remove('hidden');
        nextButton.style.opacity = "1";
        nextButton.style.visibility = "visible";
      }
      
      if (videoTrack && prevButton && nextButton) {
        // Set scroll amount to slide one video card at a time
        const scrollAmount = 280; // Card width + gap
        
        // Initialize global position tracker
        window.currentVideoPosition = 0;
        
        // Function to check if page is in RTL mode
        function isRTLMode() {
          return document.dir === 'rtl' || document.body.getAttribute('dir') === 'rtl';
        }
        
        // Function to scroll videos that handles RTL mode
        function scrollVideos(direction) {
          const isRtl = isRTLMode();
          // For RTL, we do NOT reverse the logical direction, but the visual transform will be opposite
          const videoCards = videoTrack.querySelectorAll('.video-card');
          const containerWidth = videoTrack.parentElement.offsetWidth;
          const trackWidth = videoTrack.scrollWidth;
          const maxScroll = Math.max(0, trackWidth - containerWidth);
          
          // Update current position - use the global tracker
          window.currentVideoPosition = window.currentVideoPosition || 0;
          window.currentVideoPosition += (direction * scrollAmount);
          
          // Apply boundary limits
          if (window.currentVideoPosition < 0) window.currentVideoPosition = 0;
          if (window.currentVideoPosition > maxScroll) window.currentVideoPosition = maxScroll;
          
          // Apply transform for smooth sliding
          // For RTL, we invert the sign of the transform
          const translateValue = isRtl ? window.currentVideoPosition : -window.currentVideoPosition;
          videoTrack.style.transform = `translateX(${translateValue}px)`;
          
          console.log(`Direction: ${direction}, RTL: ${isRtl}, Position: ${window.currentVideoPosition}, Transform: ${translateValue}px`);
        }
        
        // Function to check if there are more cards to scroll
        function updateButtonVisibility() {
          const containerWidth = videoTrack.parentElement.offsetWidth;
          const trackWidth = videoTrack.scrollWidth;
          const isRtl = isRTLMode();
          
          console.log("Video slider: Container width =", containerWidth, "Track width =", trackWidth, "Current position =", window.currentVideoPosition, "RTL mode:", isRtl);
          
          // In RTL mode, we don't swap the buttons logically - we keep the same button references
          // but the arrow appearance is flipped via CSS
          
          // Only show prev button if not at the start
          if (window.currentVideoPosition <= 0) {
            prevButton.classList.add('hidden');
            prevButton.style.opacity = "0";
            prevButton.style.visibility = "hidden";
          } else {
            prevButton.classList.remove('hidden');
            prevButton.style.opacity = "1";
            prevButton.style.visibility = "visible";
          }
          
          // Only show next button if not at the end
          if (window.currentVideoPosition >= trackWidth - containerWidth) {
            nextButton.classList.add('hidden');
            nextButton.style.opacity = "0";
            nextButton.style.visibility = "hidden";
          } else {
            nextButton.classList.remove('hidden');
            nextButton.style.opacity = "1";
            nextButton.style.visibility = "visible";
          }
        }
        
        // Button click handlers
        prevButton.addEventListener('click', function() {
          scrollVideos(-1);
          updateButtonVisibility();
        });
        
        nextButton.addEventListener('click', function() {
          scrollVideos(1);
          updateButtonVisibility();
        });
        
        // Update on language change
        const langToggle = document.getElementById('chklang');
        if (langToggle) {
          langToggle.addEventListener('change', function() {
            // Reset position on language change to avoid confusion
            setTimeout(() => {
              window.currentVideoPosition = 0;
              videoTrack.style.transform = 'translateX(0)';
              updateButtonVisibility();
            }, 50);
          });
        }
        
        // Handle window resize
        window.addEventListener('resize', function() {
          // Reset position on window resize
          window.currentVideoPosition = 0;
          videoTrack.style.transform = 'translateX(0)';
          updateButtonVisibility();
        });
        
        // Initial button visibility check - with delay to ensure DOM calculations are accurate
        setTimeout(() => {
          console.log("Running initial video slider button visibility check");
          updateButtonVisibility();
        }, 300);
      }
    });
  </script>


  </script>

  <style>
    /* Content Filter Bar Styles */
    .content-filter-bar {
      display: flex;
      flex-wrap: wrap;
      justify-content: center !important;
      gap: 10px;
      margin-bottom: 25px;
      padding-block: 4rem 1rem;
      border-bottom: 2px solid #eee;

    }
    
    .filter-btn {
      padding: 8px 18px;
      border: 2px solid #eee;
      background-color: #f9f9f9;
      color: #333;
      border-radius: 5px;
      font-weight: 500;
      cursor: pointer;
      transition: all 0.3s ease;
    }
    
    .filter-btn:hover {
      border-color: var(--primary-color, #2196f3);
    }
    
    .filter-btn.active {
      background-color: var(--primary-color, #2196f3);
      color: white;
      border-color: var(--primary-color, #2196f3);
    }
    
    .dark-mode .filter-btn {
      background-color: var(--background-secondary);
      color: var(--text-primary);
      border-color: var(--border-color);
    }
    
    .dark-mode .filter-btn:hover {
      border-color: var(--primary-color, #2196f3);
    }

    .dark-mode .filter-btn.active {
      background-color: var(--primary-color, #2196f3);
      color: white;
      border-color: var(--primary-color, #2196f3);
    }
    
    .hidden-content {
      display: none;
    }
    
    /* Smooth transition for content visibility */
    [data-content-type] {
      transition: opacity 0.3s ease;
    }
    
    .fade-out {
      opacity: 0;
    }
    
    .fade-in {
      opacity: 1;
    }
    
    @media (max-width: 768px) {
      .content-filter-bar {
        justify-content: flex-start;
        overflow-x: auto;
        padding-bottom: 10px;
        margin-bottom: 15px;
      }
    }
    
    /* Enhanced Description Section Styles */
    .image-description {
      background-color: #f9f9f9;
      border-radius: 10px;
      padding: 25px;
      box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
    }
    
    .dark-mode .image-description {
      box-shadow: 0 3px 10px rgba(0, 0, 0, 0.3);
    }
    
    .description-title {
      font-size: 1.6rem;
      color: var(--primary-color, #2196f3);
      margin-bottom: 20px;
      position: relative;
      display: inline-block;
    }
    
    .description-title:after {
      content: '';
      position: absolute;
      bottom: -8px;
      left: 0;
      right: 0;
      height: 3px;
      background-color: var(--primary-color, #2196f3);
      border-radius: 3px;
    }
    
    [dir="rtl"] .description-title:after {
      right: 0;
      left: 0;
    }
    
    .description-content {
      font-size: 1rem;
      line-height: 1.6;
      color: #444;
      margin-bottom: 25px;
    }
    
    .dark-mode .description-content {
      color: #ddd;
    }
    
    .achievement-details {
      display: flex;
      flex-direction: column;
      gap: 12px;
      border-top: 1px solid #eee;
      padding-top: 20px;
    }
    
    .dark-mode .achievement-details {
      border-color: #444;
    }
    
    .detail-item {
      display: flex;
      align-items: baseline;
    }
    
    .detail-label {
      font-weight: 600;
      color: #555;
      width: 100px;
    }
    
    .dark-mode .detail-label {
      color: #ccc;
    }
    
    .detail-value {
      color: #333;
    }
    
    .dark-mode .detail-value {
      color: #f0f0f0;
    }
    
    /* Enhanced News Links Styles */
    #newsLinksSection {
      padding: 30px;
      margin: 30px auto;
      max-width: 900px;
      background-color: #f9f9f9;
      border-radius: 10px;
      box-shadow: 0 3px 15px var(--shadow-color);
    }
    
    .dark-mode #newsLinksSection {
      background-color: var(--background-secondary);
      box-shadow: 0 3px 15px var(--shadow-color);
    }
    
    #newsLinksSection .sectionTitle {
      text-align: center;
      color: var(--primary-color, #2196f3);
      margin-bottom: 25px;
      font-size: 1.8rem;
    }
    
    .newsLinks {
      list-style: none;
      padding: 0;
      margin: 0;
    }
    
    .newsLinks li {
      margin-bottom: 15px;
      padding: 15px;
      background-color: white;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
      transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    
    .dark-mode .newsLinks li {
      background-color: #333;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
    }
    
    .newsLinks li:hover {
      transform: translateY(-3px);
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }
    
    .newsLinks a {
      display: flex;
      align-items: center;
      color: #333;
      text-decoration: none;
      font-weight: 500;
    }
    
    .dark-mode .newsLinks a {
      color: #f0f0f0;
    }
    
    .news-icon {
      color: var(--primary-color, #2196f3);
      margin-inline-end: 15px;
      font-size: 1.2rem;
      min-width: 25px;
    }
    
    /* RTL-specific fixes */
    [dir="rtl"] .newsLinks a {
      text-align: right;
    }
    
    [dir="rtl"] .news-icon {
      margin-left: 15px;
      margin-right: 0;
    }
    
    /* Slide Indicators Styles */
    .slide-indicators-container {
      width: 100%;
      display: flex;
      justify-content: center;
      margin-top: 15px;
    }
    
    .slide-indicators {
      display: flex;
      justify-content: center;
      gap: 8px;
      padding: 10px 0;
    }
    
    .indicator-dot {
      width: 10px;
      height: 10px;
      border-radius: 50%;
      background-color: #ccc;
      cursor: pointer;
      transition: all 0.2s ease;
    }
    
    .indicator-dot:hover {
      background-color: #999;
    }
    
    .indicator-dot.active {
      background-color: var(--primary-color, #2196f3);
      transform: scale(1.2);
    }
    
    .dark-mode .indicator-dot {
      background-color: #555;
    }
    
    .dark-mode .indicator-dot:hover {
      background-color: #777;
    }
    
    .dark-mode .indicator-dot.active {
      background-color: var(--primary-color, #2196f3);
    }
    
    @media (max-width: 768px) {
      .slide-indicators {
        gap: 6px;
      }
      
      .indicator-dot {
        width: 8px;
        height: 8px;
      }
    }
  </style>

  <script>
    // Initialize slide indicators for both image and video sliders
    document.addEventListener('DOMContentLoaded', function() {
      initializeImageIndicators();
      initializeVideoIndicators();
    });
    
    // Generate and initialize image indicators
    function initializeImageIndicators() {
      const thumbnails = document.querySelectorAll('.thumbnail');
      const indicatorsContainer = document.querySelector('.image-indicators');
      
      if (!thumbnails.length || !indicatorsContainer) return;
      
      // Clear any existing indicators
      indicatorsContainer.innerHTML = '';
      
      // Create an indicator dot for each thumbnail
      thumbnails.forEach((thumb, index) => {
        const indicator = document.createElement('div');
        indicator.classList.add('indicator-dot');
        
        // Set first indicator as active by default
        if (index === 0) {
          indicator.classList.add('active');
        }
        
        // Add click event to change image
        indicator.addEventListener('click', function() {
          changeImage(thumb.src);
        });
        
        indicatorsContainer.appendChild(indicator);
      });
    }
    
    // Generate and initialize video indicators
    function initializeVideoIndicators() {
      const videoCards = document.querySelectorAll('.video-card');
      const indicatorsContainer = document.querySelector('.video-indicators');
      
      if (!videoCards.length || !indicatorsContainer) return;
      
      // Clear any existing indicators
      indicatorsContainer.innerHTML = '';
      
      // Create an indicator dot for each video
      videoCards.forEach((card, index) => {
        const indicator = document.createElement('div');
        indicator.classList.add('indicator-dot');
        
        // Set first indicator as active by default
        if (index === 0) {
          indicator.classList.add('active');
        }
        
        // Add click event to play video
        indicator.addEventListener('click', function() {
          playInMainPlayer(card);
          updateVideoIndicators(index);
        });
        
        indicatorsContainer.appendChild(indicator);
      });
    }
    
    // Update indicator active state for images
    function updateImageIndicators(index) {
      const indicators = document.querySelectorAll('.image-indicators .indicator-dot');
      
      if (!indicators.length) return;
      
      // Remove active class from all indicators
      indicators.forEach(dot => dot.classList.remove('active'));
      
      // Add active class to current indicator
      if (indicators[index]) {
        indicators[index].classList.add('active');
      }
    }
    
    // Update indicator active state for videos
    function updateVideoIndicators(index) {
      const indicators = document.querySelectorAll('.video-indicators .indicator-dot');
      
      if (!indicators.length) return;
      
      // Remove active class from all indicators
      indicators.forEach(dot => dot.classList.remove('active'));
      
      // Add active class to current indicator
      if (indicators[index]) {
        indicators[index].classList.add('active');
      }
    }
    
    // Thumbnail slider functionality
  </script>
    <!--Main JS App File-->
    <script src="{{ asset('assets/front') }}/js/articles-filter.js"></script>
    <script src="js/filter-dropdowns.js"></script>
    <script src="js/app.js"></script>


</body>

</html>
