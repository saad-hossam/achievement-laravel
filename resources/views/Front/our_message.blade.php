@extends("layouts.front.master")
@section('content')



    <!-- Page Header Start -->
    <div class="container-fluid page-header bg-primary py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-3 text-white mb-4 animated slideInDown">{{trans('about.message_title')}}</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#">{{trans('home.house')}}</a></li>
                    <li class="breadcrumb-item"><a href="#"></a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{trans('about.message_title')}}</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->



<!-- about-details Start -->
<div class="container bg-white marginForce" style="margin-top: 50px">
    <div class="container-fluid bg-white">
        <h1 class="text-center">{{ __('about.title') }}</h1>

        <div class="col-lg-12 col-md-12 wow fadeInUp bg-white" data-wow-delay="0.3s">
            <a class="cat-item d-block text-center rounded p-3" href="">
                <div class="rounded p-1 bg-light">
                    <div class="icon my-3 text-center">
                        <img src="img/icon-02.png" class="img-responsive" alt="{{trans('pagination.alt_title')}}" />
                    </div>

                    <h1 class="text-center">{{ __('about.message_title') }}</h1>
                    <span style="font-size: 20px">{{ __('about.message_description') }}</span>
                </div>
            </a>
        </div>
    </div>
</div>
<!-- about-details End -->



@endsection
