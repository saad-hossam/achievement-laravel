@extends("layouts.front.master")
@section('content')

 <!-- Page Header Start -->
 <div class="container-fluid page-header bg-primary py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-3 text-white mb-4 animated slideInDown">{{trans('header.about_us')}}</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">{{trans('home.house')}}</a></li>
                <li class="breadcrumb-item"><a href="#"></a></li>
                <li class="breadcrumb-item active" aria-current="page">{{trans('header.about_us')}}</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- About Start -->
<div class="container-xxl py-5 about">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="about-img">
                    <img class="img-fluid" src="{{asset('img/about-1.jpg')}}" alt="">
                    <img class="img-fluid" src="{{asset('img/about-2.jpg')}}" alt="">
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" style="font-size: 17px" data-wow-delay="0.5s">
                <h2 class="section-title">{{ trans('about.title') }}</h2>
                <h6 class="display-5 mb-4">{{ trans('about.headline') }}</h6>
                <p>{{ trans('about.description.part1') }}</p>
                <p>{{ trans('about.description.part2') }}</p>
                <p>{{ trans('about.description.part3') }}</p>
                <div class="d-flex align-items-center mb-5">
                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center border border-5 border-primary" style="width: 120px; height: 120px;">
                        <h1 class="display-1 mb-n2" data-toggle="counter-up">25</h1>
                    </div>
                    <div class="ps-4">
                        <h3>{{ trans('about.years_working_experience') }}</h3>
                    </div>
                </div>
                <a class="btn btn-primary py-3 px-5" href="">{{ trans('about.read_more') }}</a>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

<!-- Feature Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-3">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="section-title">{{ trans('features.title') }}</h2>
                <h6 class="display-5 mb-4">{{ trans('features.headline') }}</h6>
                <div class="row g-4">
                    <div class="col-12">
                        <div class="d-flex align-items-start" style="font-size: 17px">
                            <img class="flex-shrink-0" src="{{asset('img/icons/icon-2.png')}}" alt="Icon">
                            <div class="ms-4">
                                <h3>{{ trans('features.mission.title') }}</h3>
                                <p class="mb-0">{{ trans('features.mission.description') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-flex align-items-start">
                            <img class="flex-shrink-0" src="{{asset('img/icons/icon-3.png')}}" alt="Icon">
                            <div class="ms-4">
                                <h3>{{ trans('features.vision.title') }}</h3>
                                <p class="mb-0">{{ trans('features.vision.description') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-flex align-items-start">
                            <img class="flex-shrink-0" src="{{asset('img/icons/icon-4.png')}}" alt="Icon">
                            <div class="ms-4">
                                <h3>{{ trans('features.goal.title') }}</h3>
                                <p class="mb-0">{{ trans('features.goal.description') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="feature-img">
                    <img class="img-fluid" src="{{asset('img/about-2.jpg')}}" alt="">
                    <img class="img-fluid" src="{{asset('img/about-1.jpg')}}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Feature End -->


<!-- Story Start -->
<div class="container-fluid story position-relative " id="weddingStory">
    <div class="container position-relative py-1">
        <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
            {{-- <h5 class="text-uppercase text-primary fw-bold mb-4">{{trans('about.history_title')}}</h5> --}}
            <h3 class="display-4">{{trans('about.history_subtitle')}}</h3>
        </div>
        <div class="story-timeline">
            @foreach($histories as $index => $story)
                <div class="row {{ $index % 2 == 0 ? '' : 'flex-column-reverse flex-md-row' }} wow fadeInUp" data-wow-delay="0.2s">
                    <div class="col-md-6 text-{{ $index % 2 == 0 ? 'end' : 'start' }} border-0 border-top border-end border-secondary p-4">
                        <div class="d-inline-flex align-items-center h-100">
                            <img src="{{ asset('images/histories/' . $story->image) }}" class="img-fluid w-100 img-border" alt="">
                        </div>
                    </div>
                    <div class="col-md-6 border-start border-top border-secondary p-4 pe-0">
                        <div class="h-100 d-flex flex-column justify-content-center bg-primary p-4">
                            <h4 class="mb-2 text-dark">{{ $story->translate(app()->getLocale())->name }}</h4>
                            <p class="text-uppercase text-primary mb-2" style="letter-spacing: 3px;">{{ $story->year }}</p>
                            <p class="m-0 fs-5">{{ $story->translate(app()->getLocale())->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Story End -->


@endsection
