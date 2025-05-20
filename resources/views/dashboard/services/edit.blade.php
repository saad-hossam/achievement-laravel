@extends('layouts.dashbord.master')

@section('css')
    <!-- Internal Select2 CSS -->
    <link href="{{ URL::asset('assets/admin/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/admin/plugins/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/admin/plugins/quill/quill.bubble.css') }}" rel="stylesheet">
    <!-- Internal File Upload CSS -->
    <link href="{{ URL::asset('assets/admin/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <!-- Internal Fancy Uploader CSS -->
    <link href="{{ URL::asset('assets/admin/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
    <!-- CKEditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>
@endsection

@section('page-header')
    <!-- Breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">تعديل الخدمة</h4>
            </div>
        </div>
        @can('service-list')
            <div class="d-flex my-xl-auto right-content">
                <a class="btn btn-primary btn-block" href="{{ route('services.index') }}">جميع الخدمات</a>
            </div>
        @endcan
    </div>
    <!-- Breadcrumb -->
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <!-- Display Errors -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Update Form -->
                    <form method="POST" action="{{ route('services.update', $service->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Translations -->
                        <div class="card">
                            <div class="card-header">
                                <strong>{{ __('words.translations') }}</strong>
                            </div>
                            <div class="card-body">
                                <ul class="nav nav-tabs" id="language-tabs" role="tablist">
                                    @foreach (config('app.languages') as $key => $lang)
                                        <li class="nav-item">
                                            <a class="nav-link @if ($loop->first) active @endif"
                                               id="{{ $key }}-tab"
                                               data-toggle="tab"
                                               href="#{{ $key }}"
                                               role="tab"
                                               aria-controls="{{ $key }}"
                                               aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                                {{ $lang }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="tab-content" id="language-tabs-content">
                                    @foreach (config('app.languages') as $key => $lang)
                                        <div class="tab-pane fade @if ($loop->first) show active @endif"
                                             id="{{ $key }}"
                                             role="tabpanel"
                                             aria-labelledby="{{ $key }}-tab">
                                            <div class="form-group mt-3">
                                                <label> الاسم ({{ $lang }})</label>
                                                <textarea name="{{ $key }}[name]" class="form-control editor" id="name-{{ $key }}">{{ old($key . '.name', $service->translate($key)->name ?? '') }}</textarea>
                                            </div>
                                            <div class="form-group mt-3">
                                                <label> الوصف ({{ $lang }})</label>
                                                <textarea name="{{ $key }}[description]" class="form-control editor" id="description-{{ $key }}">{{ old($key . '.description', $service->translate($key)->description ?? '') }}</textarea>
                                            </div>
                                            <div class="form-group mt-3">
                                                <label> المحتوى ({{ $lang }})</label>
                                                <textarea name="{{ $key }}[body]" class="form-control editor" id="body-{{ $key }}">{{ old($key . '.body', $service->translate($key)->body ?? '') }}</textarea>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Image Upload and Status -->
                        <div class="row mt-4">
                            <!-- Image Upload -->
                            <div class="col-md-6">
                                <label>الصورة</label>
                                @if ($service->image)
                                    <div class="form-group">
                                        <label>الصورة الحالية:</label>
                                        <a href="{{ asset('images/services/' . $service->image) }}" target="_blank">
                                            <img src="{{ asset('images/services/' . $service->image) }}"
                                                 alt="Service Image"
                                                 class="img-thumbnail"
                                                 width="100">
                                        </a>
                                    </div>
                                @endif
                                <input name="image" type="file" class="dropify" data-height="200" />
                            </div>

                            <!-- Status -->
                            <div class="col-md-6">
                                <label>حالة الخدمة</label>
                                <select class="form-control select2" name="status">
                                    <option value="active" {{ $service->status == 'active' ? 'selected' : '' }}>مفعل</option>
                                    <option value="disabled" {{ $service->status == 'disabled' ? 'selected' : '' }}>غير مفعل</option>
                                </select>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center mt-4">
                            <button class="btn btn-primary" type="submit">تأكيد</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <!-- Internal Select2 JS -->
    <script src="{{ URL::asset('assets/admin/plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ URL::asset('assets/admin/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/admin/plugins/fileuploads/js/file-upload.js') }}"></script>
    <!-- CKEditor Initialization -->
    <script>
        document.querySelectorAll('.editor').forEach(editor => {
            ClassicEditor.create(editor).catch(error => console.error(error));
        });

        // Initialize Dropify
        $('.dropify').dropify();

        // Initialize Select2
        $('.select2').select2();
    </script>
@endsection
