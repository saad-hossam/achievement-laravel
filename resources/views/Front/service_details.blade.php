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
    <div class="container-xxl py-5 service-bg">
        <div class="container">
            <!-- Service Title and Image -->
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="service-detail d-flex flex-column align-items-center text-center">
                        <!-- Service Image -->
                        <img class="img-fluid mb-4" src="{{ asset('images/services/'. $service->image) }}" alt="Interior Design Image"
                            style="max-width: 100%; height:100%">
                        <h3 class="mb-3">{{trans('services.Service_Name')}}</h3>

                        <!-- Service Title -->
                        <h1 class="display-5 mb-4">{!! $service->translate(app()->getLocale())->name !!}</h1>

                        <!-- Service Description -->
                        <h3 class="mb-3">{{trans('services.Service_Description')}}</h3>
                        <p>{!! $service->translate(app()->getLocale())->description !!}</p>
                    </div>
                </div>
            </div>

            <!-- Service Details Body -->
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h3 class="mb-3">{{trans('services.Service_Details')}}</h3>
                    <div class="service-body">
                        <p class="mb-4">{!! $service->translate(app()->getLocale())->body !!}</p>
                        <!-- Contact or Call to Action -->
                        <div class="text-center mt-5">
                            <a class="btn btn-primary" href="{{route('contact-us')}}"><i class="fa fa-phone me-3"></i>{{trans('services.Get_in_Touch')}}</a>
                        </div>
                        <br>
                        <strong>{{trans('services.OR')}}</strong>
                        <div class="text-center mt-3">
                            <a class="btn btn-primary" href="{{route('services')}}"><i class="fa fa-cogs me-3"></i>{{trans('services.Go_To_Services')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>






@endsection
