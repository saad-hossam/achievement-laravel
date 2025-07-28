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
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">تعديل المنتج</h4>
            </div>
        </div>
        @can('gallary-list')

        <div class="d-flex my-xl-auto right-content">
            <a class="btn btn-primary btn-block" href="{{ route('gallaries.index') }}">جميع المنتجات</a>

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

                    <form method="post" action="{{ route('gallaries.update', $gallary->id) }}" class="needs-validation " enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row row-xs formgroup-wrapper">
                            <div class="col-md-6 mg-t-20 mg-md-t-0">
                                <label class="form-label h5">ترتيب الصوره</label>
                                <div class="form-group">
                                    <input class="form-control" placeholder="ترتيب الصوره" type="number" name="order"
                                        value="{{ $gallary->order }}">
                                </div><!-- main-form-group -->
                            </div>
                            <div class="col-md-6 mg-t-20 mg-md-t-0">
                                <label class="form-lable h5" for="status">حاله العميل</label>
                                <div class="form-group">
                                    <select class="form-control select2-search" id="status" name="status">
                                        @if ($gallary->status == 'active')
                                            <option value="active" selected>مفعل</option>
                                            <option value="disabled">غير مفعل</option>
                                        @else
                                            <option value="active">مفعل</option>
                                            <option value="disabled" selected>غير مفعل</option>
                                        @endif

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 mg-t-20 mg-md-t-0">
                                <label class="form-lable h5" for="status">الصوره</label>
                                <div class="form-group">
                                    <input name="image" type="file" class="dropify" data-height="200" multiple />
                                    <a type="image" target="_blank"
                                        href="{{ '/images/gallary/' . $gallary->image }}">
                                        <img class="rounded float-start h-25" style="max-width:30px; max-height:30px"
                                            src="{{ '/images/gallary/' . $gallary->image }}">
                                    </a>
                                </div>
                            </div>
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
    <!-- Internal Jquery.steps js -->
    <script src="{{ URL::asset('assets/admin/plugins/jquery-steps/jquery.steps.min.js') }}"></script>
    <script src="{{ URL::asset('assets/admin/plugins/parsleyjs/parsley.min.js') }}"></script>
    <!--Internal  Form-wizard js -->
    <script src="{{ URL::asset('assets/admin/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/admin/plugins/fileuploads/js/file-upload.js') }}"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#gallary_description_ar'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#gallary_body_en'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#gallary_body_ar'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#gallary_description_en'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
