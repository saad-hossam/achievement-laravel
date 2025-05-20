@extends('layouts.dashbord.master')

@section('css')
    <!-- Internal Select2 CSS -->
    <link href="{{ URL::asset('assets/admin/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!-- Internal Quill Editor CSS -->
    <link href="{{ URL::asset('assets/admin/plugins/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/admin/plugins/quill/quill.bubble.css') }}" rel="stylesheet">
    <!-- Internal File Upload CSS -->
    <link href="{{ URL::asset('assets/admin/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <!-- Internal Fancy Uploader CSS -->
    <link href="{{ URL::asset('assets/admin/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
    <!-- CKEditor CSS -->
    <link href="{{ URL::asset('assets/admin/plugins/ckeditor/ckeditor.css') }}" rel="stylesheet">
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">إضافة خدمة</h4>
            </div>
        </div>
        @can('service-list')
        <div class="d-flex my-xl-auto right-content">
            <a class="btn btn-primary btn-block" href="{{ route('services.index') }}">جميع الخدمات</a>
        </div>
        @endcan
    </div>
    <!-- breadcrumb -->
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

                    <!-- Form Start -->
                    <form method="post" action="{{ route('services.store') }}" class="needs-validation" enctype="multipart/form-data">
                        @csrf

                        <!-- Translations Tabs -->
                        <div class="card">
                            <div class="card-header">
                                <strong>{{ __('words.translations') }}</strong>
                            </div>
                            <div class="card-block">
                                <ul class="nav nav-tabs" id="languageTabs" role="tablist">
                                    @foreach (config('app.languages') as $key => $lang)
                                    <li class="nav-item">
                                        <a class="nav-link @if ($loop->index == 0) active @endif" id="{{ $key }}-tab" data-toggle="tab" href="#{{ $key }}" role="tab" aria-controls="{{ $key }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                            {{ $lang }}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>

                                <div class="tab-content mt-3" id="languageTabsContent">
                                    @foreach (config('app.languages') as $key => $lang)
                                    <div class="tab-pane fade @if ($loop->index == 0) show active @endif" id="{{ $key }}" role="tabpanel" aria-labelledby="{{ $key }}-tab">
                                        <div class="form-group">
                                            <label for="name-{{ $key }}">الاسم -- {{ $lang }}</label>
                                            <input type="text" name="{{ $key }}[name]" id="name-{{ $key }}" class="form-control" placeholder="الاسم">
                                        </div>

                                        <div class="form-group">
                                            <label for="description-{{ $key }}">الوصف -- {{ $lang }}</label>
                                            <textarea name="{{ $key }}[description]" id="description-{{ $key }}" class="form-control" placeholder="الوصف"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="body-{{ $key }}">المحتوى -- {{ $lang }}</label>
                                            <textarea name="{{ $key }}[body]" id="body-{{ $key }}" class="form-control" placeholder="المحتوى"></textarea>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Image Upload -->
                        <div class="form-group">
                            <label for="image">الصورة</label>
                            <input type="file" name="image" id="image" class="dropify" data-height="200">
                        </div>

                        <!-- Status Selection -->
                        <div class="form-group">
                            <label for="status">حالة العميل</label>
                            <select name="status" id="status" class="form-control select2-search">
                                <option value="active" selected>مفعل</option>
                                <option value="disabled">غير مفعل</option>
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">تأكيد</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <!-- Internal Select2 js -->
    <script src="{{ URL::asset('assets/admin/plugins/select2/js/select2.min.js') }}"></script>
    <!-- Internal File Upload js -->
    <script src="{{ URL::asset('assets/admin/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/admin/plugins/fileuploads/js/file-upload.js') }}"></script>
    <!-- Internal CKEditor -->
    <script src="{{ URL::asset('assets/admin/plugins/ckeditor/ckeditor.js') }}"></script>
    <script>
        // Initialize Dropify for File Upload
        $('.dropify').dropify();

        // Initialize CKEditor for Each Language Tab
        @foreach (config('app.languages') as $key => $lang)
            ClassicEditor
                .create(document.querySelector('#description-{{ $key }}'))
                .catch(error => console.error(error));

            ClassicEditor
                .create(document.querySelector('#body-{{ $key }}'))
                .catch(error => console.error(error));
        @endforeach
    </script>
@endsection
