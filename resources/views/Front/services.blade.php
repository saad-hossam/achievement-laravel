@extends("layouts.front.master")
@section('content')


    <!-- Page Header Start -->
    <div class="container-fluid page-header bg-primary py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-3 text-white mb-4 animated slideInDown">{{trans('header.our_services')}}</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#">{{trans('home.house')}}</a></li>
                    <li class="breadcrumb-item"><a href="#"></a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{trans('header.our_services')}}</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h4 class="section-title">{{trans('services.services_title')}}</h4>
            <h6 class="display-6 mb-4">{{trans('services.services_subtitle')}}</h6>
        </div>
        <div class="row g-4">
            <!-- Always Visible Services -->
            @foreach ($services as $service )

            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item d-flex position-relative text-center h-100">
                    <img class="bg-img  " src="{{ asset('img/service-2.jpg') }}" alt="">
                    <div class="service-text  w-100">
                    <img class="mb-4 pt-3" src="{{ asset('images/services/'. $service->image) }}" alt="Icon">
                    <h3 class="mb-3">{!! $service->translate(app()->getLocale())->name !!}</h3>
                    <p class="mb-4">{!! Str::words($service->translate(app()->getLocale())->description, 20, '...') !!}</p> 
                                       <a class="btn mb-4" href="{{route('service_details',$service->id)}}"><i class="fa fa-plus text-primary  fs-2"></i>{{trans('about.read_more')}}</a>
                    </div>
                    <div>

                    </div>
                </div>
            </div>
            @endforeach

        </div>
        <!-- Show More Button -->
        <div class="text-center mt-4">
            <button class="btn btn-primary" id="toggle-more">{{trans('projects.read_more')}}</button>
        </div>
    </div>
</div>
<!-- Service End -->




@endsection
