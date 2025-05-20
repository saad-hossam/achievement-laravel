@extends("layouts.front.master")

@section('content')

{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> --}}

<style>
    .gallery-img {
        cursor: pointer;
        transition: transform 0.3s ease;
    }
    .gallery-img:hover {
        transform: scale(1.1);
    }
    .preview {
        width: 100%;
        max-height: 400px;
        /* object-fit: contain; */
        cursor: pointer;
    }
    .thumbnail-container {
        display: flex;
        gap: 10px;
        justify-content: center;
        flex-wrap: wrap;
        margin-top: 15px;
    }
    .thumbnail-container img {
        width: 130px;
        object-fit: cover;
        border: 2px solid transparent;
        cursor: pointer;
        transition: all 0.3s;
        border: 2px solid #007bff;
    }
    .thumbnail-container img:hover {
        border: 2px solid #007bff;
    }
</style>

<!-- Page Header Start -->
<div class="container-fluid page-header bg-primary py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-3 text-white mb-4 animated slideInDown">{{ trans('header.projects') }}</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">{{ trans('home.house') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ trans('header.projects') }}</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Project Start -->
<div class="container py-5">
    <div class="container">
        <div class="row">
            <!-- Project Details -->
            <div class="col-lg-3">
                <div class="text-start mb-4">
                    <h1 class="display-6">{!! $project->translate(app()->getLocale())->name !!}</h1>
                    <p class="lead">{!! $project->department->name !!}</p>
                    <p>{!! $project->translate(app()->getLocale())->description !!}</p>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="container-fluid mt-4">
                    <div class="row justify-content-center">
                        <!-- Large Image Preview (Click to Open Modal) -->
                        <div class="col-md-11 text-center">
                            <img id="previewImage" src="{{ asset('images/projects/main/' . $project->image) }}"
                                class="img-fluid preview border-none rounded "
                                onclick="openImageModal(this)">
                        </div>

                        <!-- Image Thumbnails -->
                        <div class="col-md-11 thumbnail-container">
                            @foreach($project->images as $image)
                                <img src="{{ asset('images/projects/gallary/' . $image) }}"
                                     class="img-thumbnail gallery-img"
                                     onclick="changeImage(this)">
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap Modal for Image Popup -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lg modal-dialog-centered" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                <h5 class="modal-title" id="imageModalLabel">Image Preview</h5>
            </div>
            <div class="modal-body text-center" style="height: 500px">
                <img id="modalImage" src="" width="400px" class="img-fluid border rounded shadow">
            </div>
        </div>
    </div>
</div>

<script>
    function changeImage(element) {
        document.getElementById("previewImage").src = element.src;
    }

    function openImageModal(element) {
        document.getElementById("modalImage").src = element.src;
        var myModal = new bootstrap.Modal(document.getElementById('imageModal'));
        myModal.show();
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@endsection
