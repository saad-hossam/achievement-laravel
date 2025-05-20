@extends("layouts.front.master")

@section('content')

<!-- Page Header Start -->
<div class="container-fluid page-header bg-primary py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-3 text-white mb-4 animated slideInDown">{{ trans('header.products') }}</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">{{ trans('home.house') }}</a></li>
                <li class="breadcrumb-item"><a href="#"></a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ trans('header.products') }}</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<style>
    .project-item {
        background: #fff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        /* padding: 20px; */
    }

    .project-item:hover {
        transform: scale(1.05);
        box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.2);
    }

    .project-item img {
        border-radius: 8px;
        transition: transform 0.3s ease-in-out;
    }

    .project-item:hover img {
        transform: scale(1.02);
    }
</style>

<div class="container-xxl py-5">
    <div class="container">
        <h1 class="display-6 text-center">{{ $department->translate(app()->getLocale())->name }}</h1>

        <div class="row mt-3">
            @foreach ($projects as $project)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="project-item text-center shadow-m">
                        <img src="{{ asset('images/projects/main/' . $project->image) }}" class="img-fluid" height="300px" alt="{{ $project->name }}">
                        <h5 class="pt-3">{!! $project->translate(app()->getLocale())->name !!}</h5>
                        <p>{!! $project->translate(app()->getLocale())->description !!}</p>
                        <a href="{{ route('project_details', $project->id) }}" class="btn btn-primary py-3 px-5 mt-3 mb-3">{{trans('about.read_more')}}</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
