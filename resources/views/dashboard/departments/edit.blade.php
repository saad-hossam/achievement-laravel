@extends('layouts.dashbord.master')

@section('css')
    <!--- Internal Select2 css-->
    <link href="{{ URL::asset('assets/admin/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/admin/plugins/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/admin/plugins/quill/quill.bubble.css') }}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{ URL::asset('assets/admin/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <!---Internal Fancy uploader css-->
    <link href="{{ URL::asset('assets/admin/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
    <!-- CKEditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">تعديل قسم</h4>
            </div>
        </div>
        @can('department-list')
            <div class="d-flex my-xl-auto right-content">
                <a class="btn btn-primary btn-block" href="{{ route('departments.index') }}">جميع الاقسام</a>
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
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-info">{{ $error }}</div>
                        @endforeach
                    @endif

                    <form method="post" action="{{ route('departments.update', $department->id) }}" class="needs-validation" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="card">
                            <div class="card-header">
                                <strong>{{ __('words.translations') }}</strong>
                            </div>
                            <div class="card-block">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    @foreach (config('app.languages') as $key => $lang)
                                        <li class="nav-item">
                                            <a class="nav-link @if ($loop->index == 0) active @endif" id="{{ $key }}-tab" data-toggle="tab" href="#{{ $key }}" role="tab" aria-controls="{{ $key }}" aria-selected="true">{{ $lang }}</a>
                                        </li>
                                    @endforeach
                                </ul>

                                <div class="tab-content" id="myTabContent">
                                    @foreach (config('app.languages') as $key => $lang)
                                        <div class="tab-pane mt-3 fade @if ($loop->index == 0) show active in @endif" id="{{ $key }}" role="tabpanel" aria-labelledby="{{ $key }}-tab">
                                            <br>
                                            <div class="form-group mt-3 col-md-12">
                                                <label>الاسم -- {{ $lang }}</label>
                                                <textarea name="{{ $key }}[name]" class="form-control" id="name-{{ $key }}" placeholder="الاسم">
                                                    {!! $department->translate($key)->name !!}
                                                </textarea>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                      <!-- Image Upload and Status -->
                      <div class="row row-xs formgroup-wrapper">
                        <!-- Image Upload -->
                        <div class="col-md-6 mg-t-20 mg-md-t-0">
                            {{-- <label class="form-lable h5" for="image">الصورة</label> --}}
                            @if ($department->image)
                            <div class="form-group mt-2">
                                <label>الصورة الحالية:</label>
                                <a href="{{ asset('images/departments/' . $department->image) }}" target="_blank"><img src="{{ asset('images/departments/' . $department->image) }}"
                                     alt="department Image"
                                     class="img-thumbnail"
                                     width="70"
                                     height="70">
                                    </a>
                            </div>
                        @endif
                            <div class="form-group">
                                <input name="image" type="file" class="dropify" data-height="200" />
                            </div>

                        </div>

                        <!-- Status -->
                        <div class="col-md-6 mg-t-20 mg-md-t-0">
                            <label class="form-lable h5" for="status">حالة الخدمة</label>
                            <div class="form-group">
                                <select class="form-control select2-search" id="status" name="status">
                                    <option value="active" {{ $department->status == 'active' ? 'selected' : '' }}>مفعل</option>
                                    <option value="disabled" {{ $department->status == 'disabled' ? 'selected' : '' }}>غير مفعل</option>
                                </select>
                            </div>
                        </div>
                    </div>


                        <!-- Submit Button -->
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button class="btn btn-main-primary pd-x-20" type="submit">تاكيد</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script src="{{ URL::asset('assets/admin/plugins/select2/js/select2.min.js') }}"></script>
<script src="{{ URL::asset('assets/admin/plugins/fileuploads/js/fileupload.js') }}"></script>
<script src="{{ URL::asset('assets/admin/plugins/fileuploads/js/file-upload.js') }}"></script>
<script src="{{ URL::asset('assets/admin/plugins/ckeditor/ckeditor.js') }}"></script>
<script>
    $('.dropify').dropify();
</script>
    <script>
        // Initialize select2
        $(document).ready(function() {
            $('.select2-search').select2();
        });

        // Initialize CKEditor for each language field
        @foreach (config('app.languages') as $key => $lang)
            ClassicEditor
                .create(document.querySelector('#name-{{ $key }}'))
                .catch(error => {
                    console.error(error);
                });
        @endforeach
    </script>

@endsection
