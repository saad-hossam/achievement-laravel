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
<!-- Breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <h4 class="content-title mb-0 my-auto">إضافة انجاز جديد</h4>
    </div>
    @can('achievement-list')
    <div class="d-flex my-xl-auto right-content">
        <a class="btn btn-primary btn-block" href="{{ route('achievements.index') }}">جميع الانجازات</a>
    </div>
    @endcan
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <!-- Error Messages -->
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <!-- Form -->
                <form method="POST" action="{{ route('achievements.store') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Multilingual Tabs -->
                    <div class="card">
                        <div class="card-header">
                            <strong>{{ __('words.translations') }}</strong>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-tabs" role="tablist">
                                @foreach (config('app.languages') as $key => $lang)
                                <li class="nav-item">
                                    <a class="nav-link @if ($loop->first) active @endif" data-toggle="tab"
                                        href="#{{ $key }}" role="tab">{{ $lang }}</a>
                                </li>
                                @endforeach
                            </ul>
                            <div class="tab-content">
                                @foreach (config('app.languages') as $key => $lang)
                                <div class="tab-pane mt-3 fade @if ($loop->first) show active @endif" id="{{ $key }}"
                                    role="tabpanel">
                                    <div class="form-group">
                                        <label>{{ __('words.achievement_title') }} ({{ $lang }})</label>
                                        <input type="text" name="{{ $key }}[title]" id="title-{{ $key }}" class="form-control" placeholder="الاسم" required value="{{ old($key . '.title') }}">
{{--
                                        <textarea name="{{ $key }}[name]" class="form-control plain-text"
                                            id="name-{{ $key }}" rows="2">{{ old("$key.name") }}</textarea> --}}
                                    </div>
                                    <div class="form-group">
                                        <label>{{ __('words.achievement_desc') }} ({{ $lang }})</label>
                                        <textarea name="{{ $key }}[desc]" class="form-control plain-text"
                                            id="desc-{{ $key }}"
                                            rows="5">{{ old("$key.desc") }}</textarea>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>


                    <!-- Project Details -->
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <label for="department_id">اختر القسم</label>
                            <select class="form-control select2" name="department_id">
                                @foreach ($departments as $department)
                                <option value="{{ $department->id }}">{!! $department->name !!}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label>الحالة</label>
                            <select class="form-control select2" name="status">
                                <option value="active">مفعل</option>
                                <option value="disabled">غير مفعل</option>
                            </select>
                        </div>

                        <div class="col-md-6 mt-3">
                            <label>الصورة الرئيسية</label>
                            <input type="file" name="image_layout" class="dropify" data-height="200" />
                        </div>

                        {{-- <div class="col-md-6 mt-3">
                            <label>صور إضافية</label>
                            <input type="file" name="images[]" class="dropify" data-height="200" multiple />
                        </div> --}}
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary">إضافة</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<!-- Internal JS Libraries -->
<script src="{{ URL::asset('assets/admin/plugins/select2/js/select2.min.js') }}"></script>
<script src="{{ URL::asset('assets/admin/plugins/fileuploads/js/fileupload.js') }}"></script>
<script src="{{ URL::asset('assets/admin/plugins/fileuploads/js/file-upload.js') }}"></script>
<script src="{{ URL::asset('assets/admin/plugins/ckeditor/ckeditor.js') }}"></script>
<script>
    $('.dropify').dropify();
</script>
<script>
    @foreach (config('app.languages') as $key => $lang)
    ClassicEditor
        .create(document.querySelector('#name-{{ $key }}'))
        .catch(error => console.error('Error initializing CKEditor for name:', error));

    ClassicEditor
        .create(document.querySelector('#desc-{{ $key }}'))
        .catch(error => console.error('Error initializing CKEditor for description:', error));
@endforeach

</script>
<script>
    $('.dropify').dropify();
</script>
@endsection
