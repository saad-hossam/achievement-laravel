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
    <div class="scrollToTop"><i class="fa-solid fa-arrow-up"></i></div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/front') }}/js/all.min.js"></script>
    <!--Link Font Awesome 6 Library-->
    <script src="{{ asset('assets/front') }}/js/main.js"></script>
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
          news: "Achievments",
          about: "information",
          features: "Features",
          "other links": "Other Links",
          gallary: "Gallary",
          "team members": "Team Members",
          services: "Services",
          "our skills": "Our Skills",
          "how it works": "How It Works",
          events: "Events",
          "pricing plans": "Pricing Plans",
          "videos": "Top Videos",
          stats: "Stats",
          requestadiscount: "Request a Discount",
          dateFrom:"Date From",
          dateTo:"Date To",


          // Landing
          landingTitle: "Major General Engineer/ Mokhtar Abdel Latif",
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
          news_links:" News Links",

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
          about: "  معلومات",
          features: "مميزات",
          "other links": "روابط أخرى",
          gallary: "معرض الصور",
          "team members": "أعضاء الفريق",
          services: "خدمات",
          "our skills": "مهاراتنا",
          "how it works": "كيف يعمل",
          events: "الأحداث",
          "pricing plans": "خطط الأسعار",
          "videos": "أفضل الفيديوهات",
          stats: "الإحصائيات",
          "request a discount": "طلب خصم",
          dateFrom:"من تاريخ:",
          dateTo:"الى تاريخ:",


          // Landing
          landingTitle: "اللواء مهندس / مختار عبد اللطيف",
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
          news_links:"لينكات الصحف",

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
        elements.forEach(element => {
          const key = element.getAttribute('data-lang') || element.getAttribute('data-i18n');
          const translation = translations[language][key];
          if (!translation) return;

          if (element.id === "landing-title") {
            typeText(element, translation, 75);
          } else if (element.id === "landing-paragraph") {
            typeText(element, translation, 40);
          } else if (element.tagName === 'OPTION') {
            element.textContent = translation;
          } else {
            element.textContent = translation;
          }
        });

        document.body.setAttribute('dir', language === 'ar' ? 'rtl' : 'ltr');
      }

      window.addEventListener("DOMContentLoaded", () => {
        updateLanguage("en");

        const langToggle = document.getElementById("chklang");
        if (langToggle) {
          langToggle.addEventListener("change", function () {
            const selectedLanguage = this.checked ? "ar" : "en";
            updateLanguage(selectedLanguage);
          });
        }
      });
      </script>

    <script>
  document.getElementById('filterButton').addEventListener('click', () => {
  const titleFilter = document.getElementById('titleFilter').value.trim().toLowerCase();
  const selectedDay = document.getElementById('daySelect').value;
  const selectedMonth = document.getElementById('monthSelect').value;
  const selectedYear = document.getElementById('yearSelect').value;
  const fromDateValue = document.getElementById('from-date').value;
  const toDateValue = document.getElementById('to-date').value;

  // Convert from/to date values to actual Date objects, if valid.
  const fromDate = fromDateValue ? new Date(fromDateValue) : null;
  const toDate = toDateValue ? new Date(toDateValue) : null;

  document.querySelectorAll('#articles .box').forEach(box => {
    const title = box.getAttribute('data-title').toLowerCase();
    const date = new Date(box.getAttribute('data-date')); // Assuming data-date is in a valid format (YYYY-MM-DD)

    let match = true;

    // Debugging: Check title and filter input
    console.log('Title:', title);
    console.log('Filter:', titleFilter);

    // فلترة العنوان (Filter by title)
    if (titleFilter && !title.includes(titleFilter)) {
      match = false;
    }

    // Debugging: Check if the match is set to false due to title filter
    if (!match) {
      console.log('Title does not match:', title);
    }

    // فلترة اليوم (Filter by day)
    if (selectedDay && date.getDate() !== parseInt(selectedDay)) {
      match = false;
    }

    // فلترة الشهر (Filter by month)
    if (selectedMonth && (date.getMonth() + 1) !== parseInt(selectedMonth)) {
      match = false;
    }

    // فلترة السنة (Filter by year)
    if (selectedYear && date.getFullYear() !== parseInt(selectedYear)) {
      match = false;
    }

    // فلترة من تاريخ (Filter by from date)
    if (fromDate && date < fromDate) {
      match = false;
    }

    // فلترة إلى تاريخ (Filter by to date)
    if (toDate && date > toDate) {
      match = false;
    }

    // Apply the filter by displaying or hiding the box
    box.style.display = match ? 'block' : 'none';
  });
});

</script>
<script>
  document.getElementById('resetButton').addEventListener('click', function () {
    // Clear all filter inputs
    document.getElementById('titleFilter').value = '';
    document.getElementById('daySelect').value = '';
    document.getElementById('monthSelect').value = '';
    document.getElementById('yearSelect').value = '';
    document.getElementById('from-date').value = '';
    document.getElementById('to-date').value = '';

    // Show all articles again
    document.querySelectorAll('.box').forEach(function (box) {
      box.style.display = 'block';
    });
  });
</script>



<script>
  document.getElementById('filterButton').addEventListener('click', () => {
  const titleFilter = document.getElementById('titleFilter').value.trim().toLowerCase();
  const selectedDay = document.getElementById('daySelect').value;
  const selectedMonth = document.getElementById('monthSelect').value;
  const selectedYear = document.getElementById('yearSelect').value;
  const fromDateValue = document.getElementById('from-date').value;
  const toDateValue = document.getElementById('to-date').value;

  // Convert from/to date values to actual Date objects, if valid.
  const fromDate = fromDateValue ? new Date(fromDateValue) : null;
  const toDate = toDateValue ? new Date(toDateValue) : null;

  document.querySelectorAll('#articles .box').forEach(box => {
    const title = box.getAttribute('data-title').toLowerCase();
    const date = new Date(box.getAttribute('data-date')); // Assuming data-date is in a valid format (YYYY-MM-DD)

    let match = true;

    // فلترة العنوان (Filter by title)
    if (titleFilter && !title.includes(titleFilter)) {
      match = false;
    }

    // فلترة اليوم (Filter by day)
    if (selectedDay && date.getDate() !== parseInt(selectedDay)) {
      match = false;
    }

    // فلترة الشهر (Filter by month)
    if (selectedMonth && (date.getMonth() + 1) !== parseInt(selectedMonth)) {
      match = false;
    }

    // فلترة السنة (Filter by year)
    if (selectedYear && date.getFullYear() !== parseInt(selectedYear)) {
      match = false;
    }

    // فلترة من تاريخ (Filter by from date)
    if (fromDate && date < fromDate) {
      match = false;
    }

    // فلترة إلى تاريخ (Filter by to date)
    if (toDate && date > toDate) {
      match = false;
    }

    // Apply the filter by displaying or hiding the box
    box.style.display = match ? 'block' : 'none';
  });
});

  </script>


<script>
  // Function to change the main image when a thumbnail is clicked
  function changeImage(src) {
    // Change the main image
    document.getElementById('mainImage').src = src;

    // Optional: Highlight the selected thumbnail
    const thumbnails = document.querySelectorAll('.thumbnail');
    thumbnails.forEach(thumb => {
      thumb.classList.remove('selected');
    });

    const selectedThumbnail = Array.from(thumbnails).find(thumb => thumb.src.includes(src));
    if (selectedThumbnail) {
      selectedThumbnail.classList.add('selected');
    }
  }

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
          videoInfo.textContent = info;
        });
      });
    });
    </script>


    <script>
      // Function to change the main image when a thumbnail is clicked
      function changeImage(src) {
        // Change the main image
        document.getElementById('mainImage').src = src;

        // Optional: Highlight the selected thumbnail
        const thumbnails = document.querySelectorAll('.thumbnail');
        thumbnails.forEach(thumb => {
          thumb.classList.remove('selected');
        });

        const selectedThumbnail = Array.from(thumbnails).find(thumb => thumb.src.includes(src));
        if (selectedThumbnail) {
          selectedThumbnail.classList.add('selected');
        }
      }

    </script>



</body>

</html>
