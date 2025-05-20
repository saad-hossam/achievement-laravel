@extends("layouts.front.master")

@section('content')

<style>
    .project-item {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); /* Initial shadow */
    border-radius: 10px;
    overflow: hidden;
}

.project-item:hover {
    transform: scale(1.05);
    box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.2); /* Stronger shadow on hover */
}

</style>
    <!-- Page Header Start -->
    <div class="container-fluid page-header bg-primary py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-3 text-white mb-4 animated slideInDown">{{trans('header.projects')}}</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#">{{trans('home.house')}}</a></li>
                    <li class="breadcrumb-item"><a href="#"></a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{trans('header.projects')}}</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <div class="container-xxl py-5">
        <div class="container">
            {{-- <h1 class="display-6">{{ $department->translate(app()->getLocale())->name }}</h1> --}}
            {{-- <p>{{ trans('header.projects_in_department') }}</p> --}}

            <div class="row">
                @foreach ($projects as $project)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="project-item text-center">
                        <img src="{{ asset('images/projects/main/' . $project->image) }}" class="img-fluid" alt="{{ $project->name }}">
                        <h5 class="mt-3">{!! $project->translate(app()->getLocale())->name !!}</h5>
                        <a href="{{ route('project_details', $project->id) }}" class="btn btn-primary py-3 px-5 mt-3 mb-3">{{trans('about.read_more')}}</a>
                    </div>
                </div>


                @endforeach
            </div>
        </div>
    </div>


@endsection
