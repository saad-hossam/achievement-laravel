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
                <h4 class="content-title mb-0 my-auto">تعديل المنتج</h4>
            </div>
        </div>
        @can('project-list')
            <div class="d-flex my-xl-auto right-content">
                <a class="btn btn-primary btn-block" href="{{ route('projects.index') }}">جميع المنتجات</a>
            </div>
        @endcan
    </div>
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

                    <form method="POST" action="{{ route('projects.update', $project->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Translations Tab -->
                        <div class="card">
                            <div class="card-header">
                                <strong>{{ __('words.translations') }}</strong>
                            </div>
                            <div class="card-block">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    @foreach (config('app.languages') as $key => $lang)
                                        <li class="nav-item">
                                            <a class="nav-link @if ($loop->index == 0) active @endif" id="home-tab" data-toggle="tab" href="#{{ $key }}" role="tab" aria-controls="home" aria-selected="true">{{ $lang }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    @foreach (config('app.languages') as $key => $lang)
                                        <div class="tab-pane mt-3 fade @if ($loop->index == 0) show active in @endif" id="{{ $key }}" role="tabpanel" aria-labelledby="home-tab">
                                            <br>
                                            <div class="form-group mt-3 col-md-12">
                                                <label> الاسم-- {{ $lang }}</label>
                                                <textarea id="project_name_{{ $key }}"  name="{{ $key }}[name]" class="form-control" placeholder="الاسم" >{!! $project->translate($key)->name !!}</textarea>
                                            </div>
                                            <div class="form-group mt-3 col-md-12">
                                                <label> الوصف-- {{ $lang }}</label>
                                                <textarea id="project_description_{{ $key }}" name="{{ $key }}[description]" class="form-control" placeholder="Textarea" rows="5">{!! $project->translate($key)->description !!}</textarea>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Main Image Section -->
                        <div class="row row-xs formgroup-wrapper">
                            <div class="col-md-6 mg-t-20 mg-md-t-0">
                                <label class="form-lable h5" for="department_id">اختار القسم</label>
                                <div class="form-group">
                                    <select class="form-control select2-search" id="department_id" name="department_id">
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->id }}" @if ($project->department_id == $department->id) selected @endif>
                                                {!! $department->name !!}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6 mg-t-20 mg-md-t-0">
                                <label class="form-lable h5" for="status">حاله العميل</label>
                                <div class="form-group">
                                    <select class="form-control select2-search" id="status" name="status">
                                        <option value="active" @if ($project->status == 'active') selected @endif>مفعل</option>
                                        <option value="disabled" @if ($project->status == 'disabled') selected @endif>غير مفعل</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6 mg-t-20 mg-md-t-0">
                                <label class="form-lable h5" for="image">الصوره الرئيسية</label>
                                <div class="form-group">
                                    <input name="image" type="file" class="dropify" data-height="200" />
                                    <div class="existing-images mt-3">

                                    @if ($project->image)
                                        <a type="image" target="_blank" href="{{ '/images/projects/main/' . $project->image }}">
                                            <img class="rounded "  style="max-width: 100px; max-height: 100px;" src="{{ '/images/projects/main/' . $project->image }}">
                                        </a>


                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Additional Images Section -->
                        <div class="col-md-6 mg-t-20 mg-md-t-0">
                            <label class="form-lable h5" for="images">الصور الإضافية</label>

                            <div class="form-group">
                                <input name="images[]" type="file" class="dropify" data-height="200" multiple />

                                @if ($project->images)
                                    <div class="existing-images mt-3">
                                        @foreach ($project->images as $image)
                                            <a href="{{ asset('images/projects/gallary/' .$image) }}" target="_blank">
                                                <img src="{{ asset('images/projects/gallary/' .$image) }}" class="rounded" style="max-width: 100px; max-height: 100px;">
                                            </a>
                                        @endforeach
                                    </div>
                                @endif
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


     <!-- Internal JS Libraries -->
     <script src="{{ URL::asset('assets/admin/plugins/select2/js/select2.min.js') }}"></script>
     <script src="{{ URL::asset('assets/admin/plugins/fileuploads/js/fileupload.js') }}"></script>
     <script src="{{ URL::asset('assets/admin/plugins/fileuploads/js/file-upload.js') }}"></script>
     <script src="{{ URL::asset('assets/admin/plugins/ckeditor/ckeditor.js') }}"></script>
    <script>
        @foreach(config('app.languages') as $key => $lang)
            ClassicEditor.create(document.querySelector('#project_description_{{ $key }}')).catch(error => { console.error(error); });
            ClassicEditor.create(document.querySelector('#project_name_{{ $key }}')).catch(error => { console.error(error); });

        @endforeach

    </script>
    <script>
        $('.dropify').dropify();
    </script>
@endsection
