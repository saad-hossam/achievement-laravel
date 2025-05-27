@extends('layouts.dashbord.master')

@section('content')
    <div class="container">
        <!-- Project Title -->
        <div class="text-center mb-5">
            <h2 class="font-weight-bold"> {!! $project->name !!}</h2>
        </div>

        <!-- Main Image Section -->
        <div class="main-image text-center mb-2">
            <h4 class="text-primary">الصورة الرئيسية</h4>
            <div class="border p-3 rounded shadow-sm bg-light d-inline-block">
                <img src="{{ asset('/images/projects/main/' . $project->image) }}" alt="Main Image" class="img-fluid rounded" style="max-height: 300px;" />
            </div>
        </div>

        <!-- Additional Images Section -->
        @if (!empty($additionalImages))
            <div class="additional-images mt-2">
                <h4 class="text-primary text-center">الصور الإضافية</h4>
                <div class="row mt-4">
                    @foreach ($additionalImages as $imagePath)
                        <div class="col-md-3 col-sm-6 col-12 mb-4">
                            <div class="border p-2 rounded shadow-sm bg-light">
                                <img src="{{ asset('/images/projects/gallary/' . $imagePath) }}"
                                alt="Additional Image"
                                class="img-fluid rounded"
                                style="max-height: auto; width: 100%; object-fit: cover;" />
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <p class="mt-5 text-center text-muted">لا توجد صور إضافية لهذا المشروع.</p>
        @endif

        <!-- Return Button -->
        <div class="text-center mt-3 mb-5">
            <a href="{{ route('projects.index') }}" class="btn btn-secondary btn-lg">
                <i class="fas fa-arrow-left"></i> العودة إلى المشاريع
            </a>
        </div>
    </div>
@endsection
